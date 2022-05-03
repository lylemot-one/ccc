<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\CoopType1;
use App\Models\CoopType2;
use App\Models\Dependent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = Member::where([
            ['info_FName', '!=', Null],
            [function ($query) use ($request){
                if (($search = $request->search)) {
                    $query->orWhere('info_FName', 'LIKE', '%' . $search . '%')->get();
                }
            }]
        ])->orderBy("coop_MID")->paginate(10);

        if (Storage::disk('local')->exists('tempic.jpeg')) {
            Storage::delete('tempic.jpeg');
        }

        return view('members.index', compact('members'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Storage::disk('local')->exists('tempic.jpeg')) {
            $picraw = Storage::get('tempic.jpeg');
        } else {
            $picraw = false;
        }
        return view('members.create', compact( 'picraw' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $temppic = 'tempic.jpeg';
        Storage::disk('local')->put($temppic, base64_decode($request->picdata));

        if ($request->coop_TypeL1 == '1000') {
            $validateemp = $this->validateemp($request);
            $validateinfo = $this->validateinfo($request);

            if ($validateinfo->fails() && $validateemp->fails()) {
                $validationMessages = array_merge_recursive($validateinfo->messages()->toArray(), $validateemp->messages()->toArray());
                return redirect('members/create')
                        ->withErrors($validationMessages)
                        ->withInput()
                        ->with('picraw', base64_decode($request->picdata));
            } 

            if ($validateemp->fails()) {
                return redirect('members/create')
                        ->withErrors($validateemp)
                        ->withInput()
                        ->with('picraw', base64_decode($request->picdata));
            }

            if ($validateinfo->fails()) {
                return redirect('members/create')
                        ->withErrors($validateinfo)
                        ->withInput()
                        ->with('picraw', base64_decode($request->picdata));
            }
        } else {
            $validateinfo = $this->validateinfo($request);
            if ($validateinfo->fails()) {
                return redirect('members/create')
                        ->withErrors($validateinfo)
                        ->withInput()
                        ->with('picraw', base64_decode($request->picdata));
            }

        }

        $ct1 = CoopType1::where('coop_L1ID', $request->input('coop_TypeL1'))->first();
        $ct2 = CoopType2::where(['coop_L1ID' => $ct1->coop_L1ID, 'coop_L2ID' => $request->input('coop_TypeL2')])->first();

        $request->merge([
            'coop_TypeL1Txt' => $ct1->coop_L1Text,
            'coop_TypeL2Txt' => $ct2->coop_L2Text,
        ]);

        $member = Member::create($request->all());

        for ($x = 1; $x <= 5; $x++) {
            if ($request->input('info_D'.$x.'Name')) {
                $dependent = new Dependent;
                $dependent->coop_MID = $member->coop_MID;
                $dependent->dpdnt_Name = $request->input('info_D'.$x.'Name');
                $dependent->dpdnt_DOB = $request->input('info_D'.$x.'Bday');
                $dependent->dpdnt_Rel = $request->input('info_D'.$x.'Rel');
                $dependent->save();
            }
        }

        // if ($request->input('picdata')) {
        //     $path = Storage::disk('s3')->put('profile'.$member->coop_MID.rand(100000,999999).'.jpeg', base64_decode($request->picdata));
        //     $path = Storage::disk('s3')->url($path);
        // }
        if ($request->input('picdata')) {
            $filename = 'profile'.$member->coop_MID.rand(100000,999999).'.jpeg';
            if (Storage::put($filename, base64_decode($request->picdata))) {
                $path = Storage::disk('local')->put($filename, base64_decode($request->picdata));
                $path = Storage::disk('local')->url($path); 
                $member->info_Pic = $filename;
                $member->save();
                if (Storage::disk('local')->exists($temppic)) {
                    Storage::delete($temppic);
                }
            }
        }

        return redirect()->route('members.index')
            ->with('success', 'Member created.');
    }

    private function validateinfo(Request $request) {
        return $validator = Validator::make($request->all(), 
            [
                'coop_TypeL1' => 'required',
                'coop_TypeL2' => 'required',
                'info_FName' => 'required',
                'info_LName' => 'required',
                'info_Address' => 'required',
                'info_Cell' => 'required|numeric',
                'info_EAdd' => 'required|email:rfc',
                'info_BDay' => 'required',
                'info_BPlace' => 'required',
                'info_CStatus' => 'required',
                'info_Gender' => 'required',
                'info_Citizen' => 'required',
                'info_Income' => 'required',
                'info_MthIncome' => 'required',
                'info_Education' => 'required',
                'picdata' => 'required'
            ], 
            [
                'required' => ':attribute is required.',
                'email' => ':attribute is invalid.',
                'numeric' => ':attribute is not numeric.',
                'info_Address.required' => 'Complete address is required.',
            ],
            [ 
                'coop_TypeL1' => 'Member Type L1', 
                'coop_TypeL2' => 'Member Type L2',
                'info_FName' => 'Given Name',
                'info_LName' => 'Last Name',
                'info_Cell' => 'Cellphone No.',
                'info_EAdd' => 'Email address',
                'info_BDay' => 'Birthday',
                'info_BPlace' => 'Birth Place',
                'info_CStatus' => 'Civil Status',
                'info_Gender' => 'Gender',
                'info_Citizen' => 'Citizenship',
                'info_Income' => 'Source of Income',
                'info_MthIncome' => 'Monthly Income',
                'info_Education' => 'Educational Attainment',
                'picdata' => 'Profile Photo'
            ]);
    }

    private function validateemp(Request $request) {
        return $validator = Validator::make($request->all(), 
            [
                'emp_ID' => 'required|numeric',
                // 'emp_Status' => 'required|numeric',
                'emp_Dept' => 'required',
                'emp_Pos' => 'required',
                'emp_TelWork' => 'required',
                'emp_TIN' => 'required|numeric',
                'emp_GSIS' => 'required|numeric',
            ], 
            [
                'required' => ':attribute is required.',
                'numeric' => ':attribute is not numeric.',
            ],
            [
                'emp_ID' => 'Employee ID No.',
                // 'emp_Status' => 'Employee Status',
                'emp_Dept' => 'Department/Agency',
                'emp_Pos' => 'Position',
                'emp_TelWork' => 'Office Phone No.',
                'emp_TIN' => 'TIN ID No.',
                'emp_GSIS' => 'GSIS ID No.',
            ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $dependents = Dependent::where('coop_MID', $member->coop_MID)->get();

        // $file_path = 'profile'.$member->coop_MID.'.jpeg';

        // $client = Storage::disk('s3')->getDriver()->getAdapter()->getClient();

        // $bucket = config('filesystems.disks.s3.bucket');
        // $command = $client->getCommand('GetObject', [
        //         'Bucket' => $bucket,
        //         'Key' => $file_path  
        // ]);

        // $request = $client->createPresignedRequest($command, '+5 minutes');

        // $presignedUrl = (string) $request->getUri();
        if (Storage::disk('local')->exists('temppic'.$member->coop_MID.'.jpeg')) {
            $picraw = Storage::get('temppic'.$member->coop_MID.'.jpeg');
        } elseif (Storage::disk('local')->exists($member->info_Pic)) {
            $picraw = Storage::get($member->info_Pic);
        } else {
            $picraw = false;
        }
        
        return view('members.edit', compact('member', 'dependents', 'picraw' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $temppic = 'temppic'.$member->coop_MID.'.jpeg';
        Storage::disk('local')->put($temppic, base64_decode($request->picdata));
        if ($request->coop_TypeL1 == '1000') {
            $validateemp = $this->validateemp($request);
            $validateinfo = $this->validateinfo($request);

            if ($validateinfo->fails() && $validateemp->fails()) {
                $validationMessages = array_merge_recursive($validateinfo->messages()->toArray(), $validateemp->messages()->toArray());
                return redirect('members/' .  $member->coop_MID . '/edit')
                        ->withErrors($validationMessages)
                        ->withInput();
            } 

            if ($validateemp->fails()) {
                return redirect('members/' .  $member->coop_MID . '/edit')
                        ->withErrors($validateemp)
                        ->withInput();
            }

            if ($validateinfo->fails()) {
                return redirect('members/' .  $member->coop_MID . '/edit')
                        ->withErrors($validateinfo)
                        ->withInput();
            }
        } else {
            $validateinfo = $this->validateinfo($request);
            if ($validateinfo->fails()) {
                return redirect('members/' .  $member->coop_MID . '/edit')
                        ->withErrors($validateinfo)
                        ->withInput();
            }

        }

        $ct1 = CoopType1::where('coop_L1ID', $request->input('coop_TypeL1'))->first();
        $ct2 = CoopType2::where(['coop_L1ID' => $ct1->coop_L1ID, 'coop_L2ID' => $request->input('coop_TypeL2')])->first();

        $request->merge([
            'coop_TypeL1Txt' => $ct1->coop_L1Text,
            'coop_TypeL2Txt' => $ct2->coop_L2Text,
        ]);

        $dependent_all = Dependent::where('coop_MID', $member->coop_MID)->get();

        foreach ($dependent_all as $dep) {
            $dependent = Dependent::find($dep->id);
            $dependent->dpdnt_Name = $request->input('info_D'.$dep->id.'Name');
            $dependent->dpdnt_DOB = $request->input('info_D'.$dep->id.'Bday');
            $dependent->dpdnt_Rel = $request->input('info_D'.$dep->id.'Rel');
            $dependent->save();
        }

        for ($x = 1; $x <= 5 - $dependent_all->count(); $x++) {
            if ($request->input('info_DName'.$x)) {
                $dependent_new = new Dependent;
                $dependent_new->coop_MID = $member->coop_MID;
                $dependent_new->dpdnt_Name = $request->input('info_DName'.$x);
                $dependent_new->dpdnt_DOB = $request->input('info_DBday'.$x);
                $dependent_new->dpdnt_Rel = $request->input('info_DRel'.$x);
                $dependent_new->save();
            }
        }

        $member->update($request->all());

        // if ($request->input('picdata')) {
        //     $path = Storage::disk('s3')->put('profile'.$member->coop_MID.'.jpeg', base64_decode($request->picdata));
        //     $path = Storage::disk('s3')->url($path);
        // }
        if ($request->input('picdata')) {
            $filename = 'profile'.$member->coop_MID.rand(100000,999999).'.jpeg';
            if (Storage::put($filename, base64_decode($request->picdata))) {
                $path = Storage::disk('local')->put($filename, base64_decode($request->picdata));
                $path = Storage::disk('local')->url($path);
                $oldfn =  $member->info_Pic;
                $member->info_Pic = $filename;
                $member->save();
                if (Storage::disk('local')->exists($temppic)) {
                    Storage::delete($temppic);
                }
                if (Storage::disk('local')->exists($oldfn)) {
                    Storage::delete($oldfn);
                }
            }
        }

        return redirect()->route('members.index')
            ->with('success', 'Member updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
