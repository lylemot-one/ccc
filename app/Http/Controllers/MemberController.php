<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\CoopType1;
use App\Models\CoopType2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'info_Address' => $request->input('street-address').', '.$request->input('city').', '.$request->input('region').', '.$request->input('postal-code')
        ]);

        Validator::make($request->all(), 
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
            ], 
            [
                'required' => ':attribute is required.',
                'email' => ':attribute is invalid.',
                'numeric' => ':attribute is not numeric.',
            ],
            [ 
                'coop_TypeL1' => 'Member Type L1', 
                'coop_TypeL2' => 'Member Type L2',
                'info_FName' => 'Given Name',
                'info_LName' => 'Last Name',
                'info_Address' => 'Address',
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
        ])->validate();

        // if ($request->coop_TypeL1 == '1000') {
        //     Validator::make($request->all(), 
        //     [
        //         'emp_ID' => 'required|numeric',
        //         'emp_Status' => 'required|numeric',
        //         'emp_Dept' => 'required',
        //         'emp_Pos' => 'required',
        //         'emp_TelWork' => 'required',
        //         'emp_TIN' => 'required|numeric',
        //         'emp_GSIS' => 'required|numeric',
        //     ], 
        //     [
        //         'required' => ':attribute is required.',
        //         'numeric' => ':attribute is not numeric.',
        //     ],
        //     [
        //         'emp_ID' => 'Employee ID No.',
        //         'emp_Status' => 'Employee Status',
        //         'emp_Dept' => 'Department/Agency',
        //         'emp_Pos' => 'Position',
        //         'emp_TelWork' => 'Office Phone No.',
        //         'emp_TIN' => 'TIN ID No.',
        //         'emp_GSIS' => 'GSIS ID No.',
        //     ])->validate();
        // }

        $ct1 = CoopType1::where('coop_L1ID', $request->input('coop_TypeL1'))->first();
        $ct2 = CoopType2::where(['coop_L1ID' => $ct1->coop_L1ID, 'coop_L2ID' => $request->input('coop_TypeL2')])->first();

        $request->merge([
            'coop_TypeL1Txt' => $ct1->coop_L1Text,
            'coop_TypeL2Txt' => $ct2->coop_L2Text,
        ]);


        Member::create($request->all());

        return redirect()->route('members.index')
            ->with('success', 'Member created.');
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
        return view('members.edit', compact('member'));
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
        Validator::make($request->all(), 
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
            ], 
            [
                'required' => ':attribute is required.',
                'email' => ':attribute is invalid.',
                'numeric' => ':attribute is not numeric.',
            ],
            [ 
                'coop_TypeL1' => 'Member Type L1', 
                'coop_TypeL2' => 'Member Type L2',
                'info_FName' => 'Given Name',
                'info_LName' => 'Last Name',
                'info_Address' => 'Address',
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
            ]
        )->validate();

        // if ($request->coop_TypeL1 == '1000') {
        //     Validator::make($request->all(), 
        //     [
        //         'emp_ID' => 'required|numeric',
        //         'emp_Status' => 'required|numeric',
        //         'emp_Dept' => 'required',
        //         'emp_Pos' => 'required',
        //         'emp_TelWork' => 'required',
        //         'emp_TIN' => 'required|numeric',
        //         'emp_GSIS' => 'required|numeric',
        //     ], 
        //     [
        //         'required' => ':attribute is required.',
        //         'numeric' => ':attribute is not numeric.',
        //     ],
        //     [
        //         'emp_ID' => 'Employee ID No.',
        //         'emp_Status' => 'Employee Status',
        //         'emp_Dept' => 'Department/Agency',
        //         'emp_Pos' => 'Position',
        //         'emp_TelWork' => 'Office Phone No.',
        //         'emp_TIN' => 'TIN ID No.',
        //         'emp_GSIS' => 'GSIS ID No.',
        //     ])->validate();
        // }

        $member->update($request->all());

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
