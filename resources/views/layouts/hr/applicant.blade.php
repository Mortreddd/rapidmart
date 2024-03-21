

@extends('layouts.dashboard')

@section('title', 'Applicant List')

@section('content')
    <div class="w-full px-5 h-full">
        <div class="w-full py-4 px-5">

        </div>
        <section class="w-full flex justify-center gap-6 items-center h-fit fade-in-early">
            
        </section>
        <div class="w-full h-fit flex justify-end py-4">
            <div class="w-full h-full">
                <div class="grid gap-5 grid-rows-2 grid-cols-2 grid-flow-col">

                    <article class="py-4 px-6 bg-green-500 rounded shadow-lg">
                        <h3 class="text-lg text-white">
                            {{ $acceptedApplicant->count() }} Accepted Applicants
                        </h3>
                    </article>
                    <article class="py-4 px-6 bg-yellow-500 rounded shadow-lg">
                        <h3 class="text-lg text-white">
                            {{ $pendingApplicant->count() }} Pending Applicants
                        </h3>
                    </article>
                    <article class="py-4 px-6 bg-red-500 rounded shadow-lg">
                        <h3 class="text-lg text-white">
                            {{ $rejectedApplicant->count() }} Rejected Applicants
                        </h3>
                    </article>
                    {{-- TODO TASK: THE NUMBER OF FREQUENTLY REQUESTED POSITION --}}
                    <article class="py-4 px-6 bg-red-500 rounded shadow-lg">
                        <h3 class="text-lg text-white">
                            {{ $rejectedApplicant->count() }} Rejected Applicants
                        </h3>
                    </article>
                </div>
            </div>
            <div class="w-fit h-fit">
                <canvas id="applicant-chart" style="height: 500px; width: 700px;"></canvas>
            </div>
        </div>
        <table class="fade-in font-semibold text-md table-auto border text-white w-full shadow">
            <caption class="text-gray-800 text-center">Applicant List</caption>
            <thead class="bg-secondary ">
                <tr class=" rounded-lg">
                    <th class="px-6 py-4 rounded-tl-lg">Name</th>
                    <th class="px-6 py-4">Gender</th>
                    <th class="px-6 py-4">Phone</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Specialization</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Submitted Date</th>
                    <th class="px-6 py-4 rounded-tr-lg">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white text-left rounded-b-lg">
                @foreach ($applicants as $applicant)
                    <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                        <td class="px-6 py-2">{{ $applicant->last_name }}, {{ $applicant->first_name }}</td>
                        <td class="px-6 py-2">{{ $applicant->gender }}</td>
                        <td class="px-6 py-2">{{ $applicant->phone }}</td>
                        <td class="px-6 py-2">{{ $applicant->email }}</td>
                        <td class="px-6 py-2">{{ $applicant->position->name }}</td>
                        
                        @switch($applicant->status)
                            @case('Accepted')
                                <td class="px-6 text-white py-2 bg-green-500 text-center">{{ $applicant->status }}</td>
                                @break
                            @case('Pending')
                                <td class="px-6 text-white py-2 bg-orange-500 text-center">{{ $applicant->status }}</td>
                                @break
                            @case('Rejected')
                                <td class="px-6 text-white py-2 bg-red-500 text-center">{{ $applicant->status }}</td>
                                @break
                            @default
                                <td class="px-6 text-white py-2">{{ $applicant->status }}</td>
                        @endswitch
                        <td class="px-6 py-2">{{ $applicant->submissionDate() }}</td>
                        <td class="px-6 py-2 text-center space-y-1">
                            <form action="{{ route('applicant.edit', [ 'applicant_id' => $applicant->id ]) }}" method="post" class="absolute top-0 left-0 invisible w-44 h-fit flex flex-col">
                                <input type="radio" name="status" id="" value="Accepted">
                                <input type="radio" name="status" id="" value="Accepted">
                                <input type="radio" name="stauts" id="" value="Accepted">
                            </form>
                            <button type="button" class="rounded mx-auto text-white hover:text-gray-200 px-3 py-1 bg-amber-600 hover:bg-amber-700 transition-colors duration-300 ease-in-out">
                                Edit
                            </button>

                            <button type="button" class="rounded mx-auto modal-open-button text-white hover:text-gray-200 px-3 py-1 bg-red-600 hover:bg-red-700 transition-colors duration-300 ease-in-out">
                                Delete
                            </button>
                            <form action="{{ route('applicant.delete', ['applicant_id' => $applicant->id]) }}" method="post" class="fixed inset-0 w-full h-full modal-applicant-background flex justify-center items-center modal-inactive">
                                @csrf
                                <div class="modal-content fade-out-modal w-72 h-fit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto w-10 h-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>  
                                    <h1 class="text-xl text-black text-center py-4">
                                        Are you sure to delete {{ $applicant->last_name }}, {{ $applicant->first_name }}?
                                    </h1>
                                    <div class="w-full flex items-center justify-center gap-3 py-3">
                                        <button type="button" class="text-black rounded modal-close-button inline-block px-4 py-2 bg-gray-200 hover:bg-gray-300 transition-colors duration-300 ease-out">
                                            Cancel
                                        </button>
                                        <button type="button" class="text-white rounded inline-block px-4 py-2 bg-red-500 hover:bg-red-600 transition-colors duration-300 ease-out">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
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
    @if ( Session::has('editted') )
        <div id="toast-success" class="flex bottom-10 right-10 fixed items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ Session::get('editted') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
    @if ( Session::has('deleted') )
        <div id="toast-success" class="flex bottom-10 right-10 fixed items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ Session::get('editted') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif

@endsection

@section('scripts')
    @parent
    @vite(['resources/js/utils/modal/applicant.js'])
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
    </script>
@endsection
