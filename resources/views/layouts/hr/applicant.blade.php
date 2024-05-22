

@extends('layouts.dashboard')

@section('title', 'Applicant List')

@section('content')
    <div class="w-full px-5 h-full py-6">
        
        <!-- Breadcrumb -->
        <nav class="flex px-5 py-3 mb-4 text-gray-700 border border-gray-200 rounded-lg bg-gray-50">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center font-medium text-lg text-gray-700 hover:text-secondary transition-colors ease-in-out duration-200">
                        <svg class="w- h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('applicant.index') }}" class="ms-1 text-lg text-gray-700 hover:text-secondary transition-colors duration-200 ease-in-out font-medium">Hiring Management</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                        <span class="ms-1 text-lg font-medium text-secondary md:ms-2">Applicants</span>
                    </div>
                </li>
            </ol>
        </nav>
  
        <div class="grid gap-5 grid-cols-4 grid-flow-row">
            <a class="py-4 px-6 text-white bg-blue-500 rounded shadow-lg flex justify-between gap-3 items-center">
                <h3 class="text-lg text-white">
                    {{ $allApplicants->count() }} Overall Applicants
                </h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
                  
            </a>
            <a href="{{ route('applicant.accepted.index') }}" class="py-4 px-6 bg-green-500 hover:bg-green-600 transition-colors ease-in-out duration-300 text-white rounded shadow-lg flex justify-between gap-3 items-center">
                <h3 class="text-lg text-white">
                    {{ $acceptedApplicant->count() }} Accepted Applicants
                </h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>
            </a>
            <a href="{{ route('applicant.pending.index') }}" class="py-4 px-6 bg-amber-500 hover:bg-amber-600 transition-colors duration-300 ease-in-out text-white rounded shadow-lg flex justify-between gap-3 items-center">
                <h3 class="text-lg text-white">
                    {{ $pendingApplicant->count() }} Pending Applicants
                </h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                </svg>
            </a>
            <a href="{{ route('applicant.rejected.index') }}" class="py-4 px-6 bg-red-500 hover:bg-red-600 transition-colors duration-300 ease-in-out text-white rounded shadow-lg flex justify-between gap-3 items-center">
                <h3 class="text-lg text-white">
                    {{ $rejectedApplicant->count() }} Rejected Applicants
                </h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
            </a>

            <a href="{{ route('interview.index') }}" class="py-4 px-6 bg-violet-500 hover:bg-violet-600 transition-colors duration-300 ease-in-out text-white rounded shadow-lg flex justify-between gap-3 items-center">
                <h3 class="text-lg text-white">
                    {{ $interviews->count() }} Appointed Interviews
                </h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                </svg>
            </a>
            
        </div>
        @foreach($applicants as $applicant)

            <form action="{{ route('applicant.reject', ['applicant_id' => $applicant->id ]) }}" method="post" id="{{$applicant->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                @csrf
                @method('PUT')
                <div  class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 transition-colors duration-200 ease-in-out hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $applicant->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to reject {{ $applicant->first_name }}, {{ $applicant->last_name}}?</h3>
                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center transition-colors duration-200 ease-in-out">
                                Reject
                            </button>
                            <button data-modal-hide="{{$applicant->id}}" type="button" class="py-2.5 transition-colors duration-200 ease-in-out px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
        <div class="w-full h-fit fade-in-early flex justify-center gap-5 py-4">
            <div class="w-fit h-fit p-3 bg-white rounded-xl">
                <canvas id="pie-chart" style="height: 300px; width: 400px;"></canvas>
            </div>
            <div class="w-fit h-fit fade-in-early p-3 bg-white rounded-xl">
                <canvas id="applicant-chart" style="height: 300px; width: 700px;"></canvas>
            </div>
        </div>
        <div class="pt-8 w-full fade-in-early flex justify-end gap-5 items-center">
            <div class="w-fit">
                <form action=" {{ route('applicant.index') }}" method="get" class="flex w-96 items-center gap-3">
                    <input type="search" name="search" value="{{ Request::get('search') }}" id="search-applicant-input" placeholder="Search Applicant..." class="bg-gray-50 border border-secondary text-gray-700 text-sm rounded-lg focus:outline-none focus:ring-1 focus:ring-primary block w-full p-2.5" autocomplete="off"/>
                    <button id="search-applicant-button" type="submit" class="rounded-lg p-2 transition-colors duration-200 ease-in-out bg-secondary hover:bg-secondary/80 text-white ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </form>
            </div>
            <a href="{{ route('applicant.store') }}" class="rounded-lg py-2 px-3 transition-colors text-lg duration-200 ease-in-out flex gap-3 items-center bg-orange-500 text-white hover:bg-orange-600 cursor-pointer pointer-events-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
                Add Applicant 
            </a>
        </div>
        <table id="default-applicant-table" class="fade-in font-semibold text-md table-fixed border text-white w-full shadow">
            <caption class="text-gray-800 text-center">Applicant List</caption>
            <thead class="bg-secondary">
                <tr class=" rounded-lg">
                    <th class="px-3 py-2 rounded-tl-lg">Full Name</th>
                    <th class="px-1 py-2">Gender</th>
                    <th class="px-3 py-2">Phone</th>
                    <th class="px-3 py-2">Email</th>
                    <th class="px-3 py-2">Address</th>
                    <th class="px-3 py-4">Status</th>
                    <th class="px-3 py-4">Resume</th>
                    <th class="px-3 py-2">Submitted Date</th>
                    <th class="px-3 py-2">Appointment</th>
                    <th class="px-3 py-2 rounded-tr-lg">Reject</th>
                </tr>
            </thead>
            <tbody id="table-applicant-body" class="bg-white text-left rounded-b-lg">
                @forelse($applicants as $applicant)
                    <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                        
                        <td class="px-3 py-2">{{ $applicant->last_name }}, {{ $applicant->first_name }}</td>
                        <td class="px-1 py-2 text-center">{{ $applicant->gender }}</td>
                        <td class="px-3 py-2">{{ $applicant->phone }}</td>
                        <td class="px-3 py-2 truncate mx-auto">{{ $applicant->email }}</td>
                        <td class="px-3 py-2 truncate">{{ $applicant->address }}</td>
                        <td class="px-3 text-white bg-amber-500 py-2 w-fit text-center">{{ $applicant->status }}</td>
                        <th class="px-3 py-2 text-center">
                            
                            @if($applicant->resume != null)
                                <a href="{{ asset( 'storage/resumes/'.$applicant->resume ) }}" target="_blank" class="text-black bg-gray-200 border-gray-300 hover:bg-gray-300 transition-colors duration-200 ease-in-out px-4 py-2 font-semibold">View</a>
                            @else 
                                <a href="" class="text-black pointer-events-none cursor-not-allowed bg-gray-200 border-gray-300 hover:bg-gray-300 transition-colors duration-200 ease-in-out px-4 py-2 font-semibold">No Resume</a>
                            @endif
                        </th>
                        <td class="px-3 py-2">{{ $applicant->submissionDate() }}</td>
                        <td class="px-3 py-2">
                            @if( !$applicant->isAppointed() )
                                <a href="{{ route('applicant.view.edit', ['applicant_id' => $applicant->id ]) }}" class="appointment-button buttons rounded flex items-center gap-2 text-white my-2 hover:text-gray-200 p-3 bg-blue-600 hover:bg-blue-700 transition-colors duration-300 ease-in-out">
                                    Appoint
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                    </svg>
                                </a>
                            @else
                                <p class="px-3 py-2 text-center">Already Appointed</p>
                            @endif
                        </p>
                        <td class="px-3 py-2 flex items-center justify-center ">
                            <button data-modal-target="{{$applicant->id}}" data-modal-toggle="{{$applicant->id}}" class="block text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                </svg>  
                            </button>
                        </td>
                    </tr>
                @empty
                    <td colspan="9" class="text-center rounded-b-lg h-96 font-medium text-gray-700">
                        No rejected applicants found
                    </td>
                @endforelse
            </tbody>
        </table>
        @if($applicants->hasPages())
            <div class="py-3 flex justify-center items-center gap-4 h-fit fade-in">
                    @if($applicants->previousPageUrl())
                        <a href="{{ $applicants->previousPageUrl() }}" class="rounded bg-secondary px-4 py-2 text-white font-sans transition-colors hover:bg-secondary/70 duration-300 ease-in-out">
                            Prev
                        </a>
                    @else
                        <a href="" class="rounded hover:cursor-not-allowed px-4 py-2 pointer-events-none border-gray-700 bg-gray-100 hover:bg-gray-200 font-sans transition-colors duration-300 ease-in-out">
                            Prev
                        </a>
                    @endif
                    <div class="w-auto px-2 h-fit">
                        <span class="text-sm text-gray-700 dark:text-gray-400">
                            Showing <span class="font-semibold text-gray-900">{{ $applicants->firstItem() }}</span> to <span class="font-semibold text-gray-900">{{ $applicants->lastItem() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $applicants->total() }}</span> Entries
                        </span>
                    </div>
                    @if($applicants->nextPageUrl())
                        <a href="{{ $applicants->nextPageUrl() }}" class="rounded bg-secondary px-4 py-2 text-white font-sans transition-colors hover:bg-secondary/70 duration-300 ease-in-out">
                            Next
                        </a>
                    @else
                        <a href="" class="rounded hover:cursor-not-allowed px-4 py-2 pointer-events-none border-gray-700 bg-gray-100 hover:bg-gray-200 font-sans transition-colors duration-300 ease-in-out">
                            Next
                        </a>
                    @endif
                </div>
            @endif
    </div>
    @if ( Session::has('created') )
        <x-toast.success>
            {{ Session::get('created') }}
        </x-toast.success>
    @elseif( Session::has('deleted') )
        <x-toast.success>
            {{ Session::get('deleted') }}
        </x-toast.success>
    @elseif( Session::has('rejected') )
        <x-toast.success>
            {{ Session::get('rejected') }}
        </x-toast.success>
    @elseif( Session::has('error') )
        <x-toast.danger>
            {{ Session::get('error') }}
        </x-toast.danger>
    @elseif( Session::has('success') )
        <x-toast.success>
            {{ Session::get('success') }}
        </x-toast.success>
    @endif
@endsection

@section('scripts')
    @parent
    @vite(['resources/js/utils/modal/applicant.js', 'resources/js/utils/search/search-applicant.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script>
        let applicantData = @json($applicantData);
        let labelMonths = [];
        let totalApplicants = [];
        applicantData.forEach( (data) => {
            labelMonths.push(data.EachMonth);
            totalApplicants.push(data.TotalApplicants);
        });

        let applicantChart = new Chart('applicant-chart', {
            type: 'line',
            data: {
                labels: labelMonths,
                datasets: [{
                    label: 'Overall Applicant Submissions',
                    data: totalApplicants,
                    backgroundColor: '#799CF0',
                    borderColor: '#2A42C0',
                    borderWidth: 1
                }]
            } 
        });

        let rejectedApplicantCount = {{ $rejectedApplicant->count() }}
        let acceptedApplicantApplicantCount = {{ $acceptedApplicant->count() }}
        let pendingApplicantCount = {{ $pendingApplicant->count() }}

        let pieChartApplicant = new Chart('pie-chart', {
         type: 'pie',
         data: {
            labels: ["Accepted", "Pending", "Rejected"],
            datasets: [{
               label: "Overall Applicants Chart",
               data: [acceptedApplicantApplicantCount, pendingApplicantCount, rejectedApplicantCount],
               backgroundColor: ['#48bb78', '#ecc94b', '#f56565'],
               hoverOffset: 5
            }],
         },
         options: {
            responsive: true,
         },
      });
    </script>
@endsection
