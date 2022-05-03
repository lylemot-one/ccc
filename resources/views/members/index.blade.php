<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members Area') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <div class="w-60 bg-green-200 overflow-hidden shadow-sm rounded-lg mb-4 sm:ml-0 ml-4">
                <div class="p-5 bg-green-200">
                    <div class="alert alert-success">
                       {{ session('success') }} 
                    </div>
                </div>
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white border-b border-gray-200">
                    <form action="{{ route('members.index') }}" method="GET" role="search">
                        <div class="grid grid-cols-6 gap-2">
                                <div class="col-span-2 md:col-span-1">
                                    <input type="text" name="search" id="search" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <button type="submit" class="items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                                    </button>
                                </div>
                                <div class="col-end-7 col-span-1 place-self-end">
                                    <a href="{{ route('members.create') }}">
                                        <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
                                        </button>
                                    </a>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-800">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                ID
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Member Type
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                First Name
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Last Name
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Address
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Action
                                </th>
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($members as $member)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                {{ $member->coop_MID }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                {{ $member->coop_TypeL1Txt }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                {{ $member->info_FName }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                {{ $member->info_LName }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                {{ $member->info_Address }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('members.edit', $member->coop_MID) }}" class="text-indigo-900 hover:text-indigo-600">
                                        <i><svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg></i>
                                    </a> | 
                                    <button class="text-indigo-900 hover:text-indigo-600" type="button" onclick="toggleModal('modal-{{ $member->coop_MID }}')" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg></button>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
            <div class="py-2">
                {{ $members->links() }}
            </div>
        </div>
    </div>
    @foreach ($members as $member)
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-{{ $member->coop_MID }}">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                    <h3 class="text-3xl font-semibold">
                    Member Info
                    </h3>
                    <button class="p-1 ml-auto bg-transparent border-0 text-black float-right outline-none focus:outline-none" onclick="toggleModal('modal-{{ $member->coop_MID }}')">
                        <span class="bg-transparent text-black h-6 w-6 block outline-none focus:outline-none text-indigo-900 hover:text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </button>
                </div>
            <!--body-->
                <div class="relative p-6 flex-auto">
                    <dl>
                        <div id="photoholder" class="mt-1 flex items-center place-content-center mb-8">
                            <span class="inline-block h-40 w-40 rounded-full overflow-hidden bg-gray-100">
                              <svg class="h-40 w-40 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                              </svg>
                            </span>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Given Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $member->info_FName }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Last Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $member->info_LName }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Employee Status</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $member->coop_TypeL2Txt }}</dd>
                        </div>
                         <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Member Type</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $member->coop_TypeL1Txt }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Monthly Income</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $member->info_MthIncome }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">ID Number</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $member->emp_ID }}</dd>
                        </div>
                    </dl>   
                </div>
            <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                    <x-button class="ml-3" onclick="toggleModal('modal-{{ $member->coop_MID }}')">
                    Close
                    </x-button>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-{{ $member->coop_MID }}-backdrop"></div>
    @endforeach   
    <script type="text/javascript">
      function toggleModal(modalID){
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
      }
    </script>
</x-app-layout>
