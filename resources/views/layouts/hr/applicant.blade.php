

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
  
        <div class="grid gap-5 grid-cols-4 grid-flow-col">
            <a class="py-4 px-6 text-white bg-blue-500 rounded shadow-lg flex justify-between gap-3 items-center">
                <h3 class="text-lg text-white">
                    {{ $allApplicants->count() }} Overall Applicants
                </h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
                  
            </a>
            <a class="py-4 px-6 bg-green-500 text-white rounded shadow-lg flex justify-between gap-3 items-center">
                <h3 class="text-lg text-white">
                    {{ $acceptedApplicant->count() }} Accepted Applicants
                </h3>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>
            </a>
            <a href="{{ route('applicant.pending.index') }}" class="py-4 px-6 bg-yellow-500 hover:bg-yellow-600 transition-colors duration-300 ease-in-out text-white rounded shadow-lg flex justify-between gap-3 items-center">
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
            
        </div>
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
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Resume</th>
                    <th class="px-3 py-2">Submitted Date</th>
                    <th class="px-6 py-4 rounded-tr-lg">Action</th>
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
                        <td class="px-3 text-black py-2 w-fit text-center">{{ $applicant->status }}</td>
                        <th class="px-3 py-2 text-center">
                            
                            @if($applicant->resume == null)
                                <a href="" class="text-black pointer-events-none cursor-not-allowed bg-gray-200 border-gray-300 hover:bg-gray-300 transition-colors duration-200 ease-in-out px-4 py-2 font-semibold">No Resume</a>
                            @else 
                                <a href="{{ asset( 'storage/resumes/'.$applicant->resume ) }}" target="_blank" class="text-black bg-gray-200 border-gray-300 hover:bg-gray-300 transition-colors duration-200 ease-in-out px-4 py-2 font-semibold">View</a>
                            @endif
                        </th>
                        <td class="px-3 py-2">{{ $applicant->submissionDate() }}</td>
                        <td class="px-6 py-2 flex items-center justify-between gap-1">
                            <a href="{{ route('applicant.view.edit', ['applicant_id' => $applicant->id ]) }}" class="rounded text-white my-2 hover:text-gray-200 p-3 bg-amber-600 hover:bg-amber-700 transition-colors duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </a>
                            <form action="{{ route('applicant.destroy', ['applicant_id' => $applicant->id ]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded text-white my-2 hover:text-gray-200 p-3 bg-red-600 hover:bg-red-700 transition-colors duration-300 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="text-black font-normal h-32 text-center py-5 w-full bg-white">
                        <td class="px-1 py-2 text-center"></td>
                        <td class="px-1 py-2 text-center"></td>
                        <td class="px-1 py-2 text-center"></td>
                        <td class="px-1 py-2 text-center"></td>
                        <td class="px-1 py-2 text-center">No applicants yet</td>
                        <td class="px-1 py-2 text-center"></td>
                        <td class="px-1 py-2 text-center"></td>
                        <td class="px-1 py-2 text-center"></td>
                        <td class="px-1 py-2 text-center"></td>
                    </tr>
                    
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
