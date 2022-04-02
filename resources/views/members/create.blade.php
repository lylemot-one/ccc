<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Member') }}
        </h2> 
    </x-slot>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-create-validation-errors class="mb-4 mx-4 sm:mx-auto" :errors="$errors" />
            <form action="{{ route('members.store') }}" method="POST"> @csrf
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
                                    @livewire('dropdowns', ['t1'=>"", 't2'=>""])
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
                <div id="emp_Info" class="mt-10 sm:mt-0 hidden">
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
                                            <label for="emp_ID" class="block text-sm font-medium text-gray-700">Employee ID No.</label>
                                            <input type="text" name="emp_ID" id="emp_ID" value="{{ old('emp_ID') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="emp_Status" class="block text-sm font-medium text-gray-700">Employee Status</label>
                                            <input type="text" name="emp_Status" id="emp_Status" value="{{ old('emp_Status') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="emp_Dept " class="block text-sm font-medium text-gray-700">Department/Agency</label>
                                            <input type="text" name="emp_Dept " id="emp_Dept " value="{{ old('emp_Dept ') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="emp_Desig " class="block text-sm font-medium text-gray-700">Designation</label>
                                            <input type="text" name="emp_Desig " id="emp_Desig " value="{{ old('emp_Desig ') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="emp_TelWork " class="block text-sm font-medium text-gray-700">Office Phone No.</label>
                                            <input type="number" name="emp_TelWork " id="emp_TelWork " value="{{ old('emp_TelWork ') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="emp_TIN " class="block text-sm font-medium text-gray-700">TIN ID No.</label>
                                            <input type="number" name="emp_TIN " id="emp_TIN " value="{{ old('emp_TIN ') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="emp_GSIS " class="block text-sm font-medium text-gray-700">GSIS ID No.</label>
                                            <input type="number" name="emp_GSIS " id="emp_GSIS " value="{{ old('emp_GSIS ') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
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
                                            <label for="info_LName" class="block text-sm font-medium text-gray-700">Last Name</label>
                                            <input type="text" name="info_LName" id="info_LName" value="{{ old('info_LName') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                            <input type="hidden" id="created_by" name="created_by" value="{{ Auth::user()->id }}">
                                        </div>
                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="info_FName" class="block text-sm font-medium text-gray-700">Given Name</label>
                                            <input type="text" name="info_FName" id="info_FName" value="{{ old('info_FName') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="info_MName" class="block text-sm font-medium text-gray-700">Middle Name</label>
                                            <input type="text" name="info_MName" id="info_MName" value="{{ old('info_MName') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6">
                                            <label for="street-address" class="block text-sm font-medium text-gray-700">Street Address</label>
                                            <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                            <input type="text" name="city" id="city" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="region" class="block text-sm font-medium text-gray-700">Province</label>
                                            <input type="text" name="region" id="region" autocomplete="address-level1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="postal-code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                                            <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_BDay" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                            <input type="date" name="info_BDay" id="info_BDay" value="{{ old('info_BDay') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                            <input type="hidden" id="info_Address" name="info_Address" value="">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_BPlace" class="block text-sm font-medium text-gray-700">Birth Place</label>
                                            <input type="text" name="info_BPlace" id="info_BPlace" value="{{ old('info_BPlace') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_Citizen" class="block text-sm font-medium text-gray-700">Citizenship</label>
                                            <input type="text" name="info_Citizen" id="info_Citizen" value="{{ old('info_Citizen') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="info_CStatus" class="block text-sm font-medium text-gray-700">Civil Status</label>
                                            <select id="info_CStatus" name="info_CStatus" value="{{ old('info_CStatus') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option>
                                            </select>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-3">
                                            <label for="info_Gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                            <select name="info_Gender" id="info_Gender" value="{{ old('info_Gender') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_MthIncome" class="block text-sm font-medium text-gray-700">Monthly Income</label>
                                            <input type="text" name="info_MthIncome" id="info_MthIncome" value="{{ old(' info_MthIncome') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_Income" class="block text-sm font-medium text-gray-700">Source of Income</label>
                                            <input type="text" name="info_Income" id="info_Income" value="{{ old(' info_Income') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_Education" class="block text-sm font-medium text-gray-700">Educational Attainment</label>
                                            <input type="text" name="info_Education" id="info_Education" value="{{ old('info_Education') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_Spouse" class="block text-sm font-medium text-gray-700">Name of Spouse</label>
                                            <input type="text" name="info_Spouse" id="info_Spouse" value="{{ old('info_Spouse') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
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
                                            <label for="info_Cell" class="block text-sm font-medium text-gray-700">Mobile No.</label>
                                            <input type="text" name="info_Cell" id="info_Cell" value="{{ old('info_Cell') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_Tel" class="block text-sm font-medium text-gray-700">Landline No.</label>
                                            <input type="text" name="info_Tel" id="info_Tel" value="{{ old('info_Tel') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                        </div>
                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="info_EAdd" class="block text-sm font-medium text-gray-700">Email Address</label>
                                            <input type="text" name="info_EAdd" id="info_EAdd" value="{{ old('info_EAdd') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
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
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="info_D1Name" id="info_D1Name" value="{{ old('info_D1Name') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                            <td class="px-6">
                                                                <input type="date" name="info_D1Bday" id="info_D1Bday" value="{{ old('info_D1Bday') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                            <td>
                                                                <input type="text" name="info_D1Rel" id="info_D1Rel" value="{{ old('info_D1Rel') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="info_D2Name" id="info_D2Name" value="{{ old('info_D2Name') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                            <td class="px-6">
                                                                <input type="date" name="info_D2Bday" id="info_D2Bday" value="{{ old('info_D2Bday') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                            <td>
                                                                <input type="text" name="info_D2Rel" id="info_D2Rel" value="{{ old('info_D2Rel') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="info_D1Name" id="info_D1Name" value="{{ old('info_D1Name') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                            <td class="px-6">
                                                                <input type="date" name="info_D1Bday" id="info_D1Bday" value="{{ old('info_D1Bday') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                            <td>
                                                                <input type="text" name="info_D1Rel" id="info_D1Rel" value="{{ old('info_D1Rel') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
                                                            </td>
                                                        </tr>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
            $('#coop_TypeL1').on('change', function() {
              if ( this.value == '1000')
              {
                $("#emp_Info").fadeIn(400);
              }
              else
              {
                $("#emp_Info").fadeOut(400);
              }
            });
        });
    </script>
</x-app-layout>