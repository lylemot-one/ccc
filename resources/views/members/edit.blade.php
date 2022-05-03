<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Member') }}
        </h2> 
    </x-slot>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-create-validation-errors class="mb-4 mx-4 sm:mx-auto" :errors="$errors" />
            <form action="{{ route('members.update', $member->coop_MID) }}" method="POST">
        @method('PUT')
        @csrf
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Type of Member</h3>
                                <p class="mt-1 text-sm text-gray-600"> </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    @livewire('dropdowns', ['t1'=>old('coop_TypeL1', $member->coop_TypeL1), 't2'=>old('coop_TypeL2', $member->coop_TypeL2)])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>
                <div id="emp_Info" class="mt-10 sm:mt-0 @if($member->coop_TypeL1 != '1000') hidden  @endif">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Employee Info</h3>
                                <p class="mt-1 text-sm text-gray-600"> For goverment employee only. </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="emp_ID" class="block text-sm font-medium text-gray-700">Employee ID No. *</label>
                                            <input type="text" name="emp_ID" id="emp_ID" value="{{ old('emp_ID', $member->emp_ID) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('emp_ID')) border border-red-500 @endif"> 
                                        </div>
                                        <!-- <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="emp_Status" class="block text-sm font-medium text-gray-700">Employee Status *</label>
                                            <input type="text" name="emp_Status" id="emp_Status" value="{{ old('emp_Status', $member->emp_Status) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('emp_Status')) border border-red-500 @endif"> 
                                        </div> -->
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="emp_Dept" class="block text-sm font-medium text-gray-700">Department/Agency *</label>
                                            <input type="text" name="emp_Dept" id="emp_Dept" value="{{ old('emp_Dept', $member->emp_Dept) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('emp_Dept')) border border-red-500 @endif"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="emp_Pos" class="block text-sm font-medium text-gray-700">Designation *</label>
                                            <input type="text" name="emp_Pos" id="emp_Pos" value="{{ old('emp_Pos', $member->emp_Pos) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('emp_Pos')) border border-red-500 @endif"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="emp_TelWork" class="block text-sm font-medium text-gray-700">Office Phone No. *</label>
                                            <input type="number" name="emp_TelWork" id="emp_TelWork" value="{{ old('emp_TelWork', $member->emp_TelWork) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('emp_TelWork')) border border-red-500 @endif"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="emp_TIN" class="block text-sm font-medium text-gray-700">TIN ID No. *</label>
                                            <input type="number" name="emp_TIN" id="emp_TIN" value="{{ old('emp_TIN', $member->emp_TIN) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('emp_TIN')) border border-red-500 @endif"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="emp_GSIS" class="block text-sm font-medium text-gray-700">GSIS ID No. *</label>
                                            <input type="number" name="emp_GSIS" id="emp_GSIS" value="{{ old('emp_GSIS', $member->emp_GSIS) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('emp_GSIS')) border border-red-500 @endif"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden sm:block" aria-hidden="true">
                        <div class="py-5">
                            <div class="border-t border-gray-200"></div>
                        </div>
                    </div>
                </div>
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Info</h3>
                                <p class="mt-1 text-sm text-gray-600"> </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="info_LName" class="block text-sm font-medium text-gray-700">Last Name *</label>
                                            <input type="text" name="info_LName" id="info_LName" value="{{ old('info_LName', $member->info_LName) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('info_LName')) border border-red-500 @endif"> 
                                            <input type="hidden" id="updated_by" name="updated_by" value="{{ Auth::user()->id }}">
                                        </div>
                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="info_FName" class="block text-sm font-medium text-gray-700">Given Name *</label>
                                            <input type="text" name="info_FName" id="info_FName" value="{{ old('info_FName', $member->info_FName) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('info_FName')) border border-red-500 @endif"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="info_MName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                                            <input type="text" name="info_MName" id="info_MName" value="{{ old('info_MName', $member->info_MName) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6">
                                            <label for="info_Address" class="block text-sm font-medium text-gray-700">Complete Address *</label>
                                            <input type="text" name="info_Address" id="info_Address" value="{{ old('info_Address', $member->info_Address) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('info_Address')) border border-red-500 @endif"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_BDay" class="block text-sm font-medium text-gray-700">Date of Birth *</label>
                                            <input type="date" name="info_BDay" id="info_BDay" value="{{ old('info_BDay', $member->info_BDay) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('info_BDay')) border border-red-500 @endif"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_BPlace" class="block text-sm font-medium text-gray-700">Birth Place *</label>
                                            <input type="text" name="info_BPlace" id="info_BPlace" value="{{ old('info_BPlace', $member->info_BPlace) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('info_BPlace')) border border-red-500 @endif"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_Citizen" class="block text-sm font-medium text-gray-700">Citizenship *</label>
                                            <input type="text" name="info_Citizen" id="info_Citizen" value="{{ old('info_Citizen', $member->info_Citizen) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('info_Citizen')) border border-red-500 @endif"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="info_CStatus" class="block text-sm font-medium text-gray-700">Civil Status *</label>
                                            <select id="info_CStatus" name="info_CStatus" value="{{ old('info_CStatus', $member->info_CStatus) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <option value="Single" {{ old('info_CStatus', $member->info_CStatus) == 'Single' ? 'selected':'' }}>Single</option>
                                                <option value="Married" {{ old('info_CStatus', $member->info_CStatus) == 'Married' ? 'selected':'' }}>Married</option>
                                                <option value="Widowed" {{ old('info_CStatus', $member->info_CStatus) == 'Widowed' ? 'selected':'' }}>Widowed</option>
                                            </select>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="info_Gender" class="block text-sm font-medium text-gray-700">Gender *</label>
                                            <select name="info_Gender" id="info_Gender" value="{{ old('info_Gender', $member->info_Gender) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <option value="M" {{ old('info_Gender', $member->info_Gender) == 'M' ? 'selected':'' }}>Male</option>
                                                <option value="F" {{ old('info_Gender', $member->info_Gender) == 'F' ? 'selected':'' }}>Female</option>
                                            </select>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_MthIncome" class="block text-sm font-medium text-gray-700">Monthly Income *</label>
                                            <input type="text" name="info_MthIncome" id="info_MthIncome" value="{{ old('info_MthIncome', $member-> info_MthIncome) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('info_MthIncome')) border border-red-500 @endif"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_Income" class="block text-sm font-medium text-gray-700">Source of Income *</label>
                                            <input type="text" name="info_Income" id="info_Income" value="{{ old('info_Income', $member-> info_Income) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('info_Income')) border border-red-500 @endif"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_Education" class="block text-sm font-medium text-gray-700">Educational Attainment *</label>
                                            <select name="info_Education" id="info_Education" value="{{ old('info_Education', $member->info_Education) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <option value="Elementary School" {{ old('info_Education', $member->info_Education) == 'Elementary School' ? 'selected':'' }}>Elementary School</option>
                                                <option value="High School" {{ old('info_Education', $member->info_Education) == 'High School' ? 'selected':'' }}>High School</option>
                                                <option value="Bachelors Degree" {{ old('info_Education', $member->info_Education) == 'Bachelors Degree' ? 'selected':'' }}>Bachelor's Degree</option>
                                                <option value="Vocational" {{ old('info_Education', $member->info_Education) == 'Vocational' ? 'selected':'' }}>Vocational</option>
                                            </select> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_Spouse" class="block text-sm font-medium text-gray-700">Name of Spouse</label>
                                            <input type="text" name="info_Spouse" id="info_Spouse" value="{{ old('info_Spouse', $member->info_Spouse) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Contact Details</h3>
                                <p class="mt-1 text-sm text-gray-600">  </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_Cell" class="block text-sm font-medium text-gray-700">Mobile No. *</label>
                                            <input type="text" name="info_Cell" id="info_Cell" value="{{ old('info_Cell', $member->info_Cell) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('info_Cell')) border border-red-500  @endif"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_Tel" class="block text-sm font-medium text-gray-700">Landline No.</label>
                                            <input type="text" name="info_Tel" id="info_Tel" value="{{ old('info_Tel', $member->info_Tel) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_EAdd" class="block text-sm font-medium text-gray-700">Email Address *</label>
                                            <input type="text" name="info_EAdd" id="info_EAdd" value="{{ old('info_EAdd', $member->info_EAdd) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @if($errors->has('info_EAdd')) border border-red-500  @endif"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Dependents</h3>
                                <p class="mt-1 text-sm text-gray-600">  </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">
                                            <div class="relative overflow-x-auto sm:rounded-lg">
                                                <table class="w-full text-sm font-medium text-gray-700">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="px-6">
                                                                Name
                                                            </th>
                                                            <th scope="col" class="px-6">
                                                                Birthday
                                                            </th>
                                                            <th scope="col" class="px-6">
                                                                Relationship
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(count($dependents) > 0)
                                                        @foreach($dependents as $dependent)
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="{{ 'info_D'.$dependent->id.'Name' }}" value="{{ $dependent->dpdnt_Name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                            <td class="px-6">
                                                                <input type="date" name="{{ 'info_D'.$dependent->id.'Bday' }}" value="{{ $dependent->dpdnt_DOB }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                            <td>
                                                                <input type="text" name="{{ 'info_D'.$dependent->id.'Rel' }}" value="{{ $dependent->dpdnt_Rel }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                        @for ($i = 1; $i <= 5 - count($dependents); $i++)
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="{{ 'info_DName'.$i }}" value="{{ old( '$dependent->info_DName'.$i ) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                            <td class="px-6">
                                                                <input type="date" name="{{ 'info_DBday'.$i }}" value="{{ old( '$dependent->info_DBday'.$i ) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                            <td>
                                                                <input type="text" name="{{ 'info_DRel'.$i }}" value="{{ old( '$dependent->info_DRel'.$i ) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                        </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Photo</h3>
                                <p class="mt-1 text-sm text-gray-600">  </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="@if($errors->has('picdata')) border border-red-500 @endif">
                                    <div id="photoholder" class="mt-1 flex items-center place-content-center">
                                        @if(!$picraw)
                                        <span class="inline-block h-40 w-40 rounded-full overflow-hidden bg-gray-100">
                                          <svg class="h-40 w-40 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                          </svg>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="mt-1 flex items-center place-content-center">
                                        @if($picraw)
                                        <img id="piccurrent" src="data:image/jpeg;base64,{{ base64_encode($picraw) }}" />
                                        @endif
                                        <div class="hidden" id="picresult"></div>
                                        <input id="picdata" type="hidden" name="picdata" value="{{ old( 'picdata' ) }}"/>
                                    </div>
                                    </div>
                                    <div class="mt-5 flex items-center place-content-center">
                                        <button type="button" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="toggleModal('modal-popup')">Change</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>
                
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1"> </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div class="px-4 py-3 text-right sm:px-0">
                                <a href="{{ route('members.index') }}">
                                    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300"> Back </button>
                                </a>
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300"> Save </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-popup">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                    <h3 class="text-3xl font-semibold">
                    Camera
                    </h3>
                    <button class="p-1 ml-auto bg-transparent border-0 text-black float-right outline-none focus:outline-none" onclick="toggleModal('modal-popup')">
                        <span class="bg-transparent text-black h-6 w-6 block outline-none focus:outline-none text-indigo-900 hover:text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </button>
                </div>
            <!--body-->
                <div class="mt-5 flex place-content-center">
                    <div id="piccamera"></div>
                </div>
                <div class="mt-5 flex place-content-center">
                    <a id="snap" class="text-indigo-900 hover:text-indigo-600" href="javascript:void(take_snapshot())"><svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg></a>
                </div>
            <!--footer-->
                <div class="mt-5 flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                    <x-button class="ml-3" onclick="toggleModal('modal-popup')">
                    Close
                    </x-button>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-popup-backdrop"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
      $(document).ready(function(){
            $('#coop_TypeL1').on('change', function() {
              if ( this.value == '1000') {
                $("#emp_Info").fadeIn(400);
              }
              else {
                $("#emp_Info").fadeOut(400);
              }
            });

            $("#snap").click(function(event){
                $("#photoholder").hide();
                $("#piccurrent").hide();
                $("#picresult").show();
            });
        });
    </script>
    <script type="text/javascript">
      function toggleModal(modalID){
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
      }
    </script>
    <script language="JavaScript">
        Webcam.set({
                width: 320,
                height: 240,
                image_format: 'jpeg',
                jpeg_quality: 90,
                force_flash: false,
                flip_horiz: true,
                fps: 45
            });
        Webcam.attach( '#piccamera' );
        
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
                document.getElementById('picdata').value = raw_image_data;
                document.getElementById('picresult').innerHTML = '<img src="'+data_uri+'"/>';
            } );
        }
    </script>
</x-app-layout>