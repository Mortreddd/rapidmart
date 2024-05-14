

@extends('layouts.dashboard')

@section('title', 'Employee List')

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
                    <a href="{{ route('schedule.index') }}" class="ms-1 text-lg text-gray-700 hover:text-secondary transition-colors duration-200 ease-in-out font-medium">Schedule Management</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                    <span class="ms-1 text-lg font-medium text-secondary md:ms-2">Schedules</span>
                </div>
            </li>
        </ol>
    </nav>
    
    <table id="default-applicant-table" class="fade-in font-semibold text-md table-fixed border text-white w-full shadow">
        <caption class="text-gray-800 text-center">List of Schedules</caption>
        <thead class="bg-secondary">
            <tr class=" rounded-lg">
                <th class="px-3 py-2 rounded-tl-lg">ID</th>
                <th class="px-3 py-2 rounded-tl-lg">Full Name</th>
                <th class="px-1 py-2">Department</th>
                <th class="px-3 py-2">Position</th>
                <th class="px-3 py-2">Email</th>
                <th class="px-3 py-2 rounded-tr-lg">Schedule</th>
            </tr>
        </thead>
        <tbody id="table-applicant-body" class="bg-white text-left rounded-b-lg">
            @forelse($schedules as $)
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
    @if($schedules->hasPages())
        <div class="py-3 flex justify-center items-center gap-4 h-fit fade-in">
            @if($schedules->previousPageUrl())
                <a href="{{ $schedules->previousPageUrl() }}" class="rounded bg-secondary px-4 py-2 text-white font-sans transition-colors hover:bg-secondary/70 duration-300 ease-in-out">
                    Prev
                </a>
            @else
                <a href="" class="rounded hover:cursor-not-allowed px-4 py-2 pointer-events-none border-gray-700 bg-gray-100 hover:bg-gray-200 font-sans transition-colors duration-300 ease-in-out">
                    Prev
                </a>
            @endif
            <div class="w-auto px-2 h-fit">
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900">{{ $schedules->firstItem() }}</span> to <span class="font-semibold text-gray-900">{{ $schedules->lastItem() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $schedules->total() }}</span> Entries
                </span>
            </div>
            @if($schedules->nextPageUrl())
                <a href="{{ $schedules->nextPageUrl() }}" class="rounded bg-secondary px-4 py-2 text-white font-sans transition-colors hover:bg-secondary/70 duration-300 ease-in-out">
                    Next
                </a>
            @else
                <a href="" class="rounded hover:cursor-not-allowed px-4 py-2 pointer-events-none border-gray-700 bg-gray-100 hover:bg-gray-200 font-sans transition-colors duration-300 ease-in-out">
                    Next
                </a>
            @endif
        </div>
    @endif
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
   
@endsection
