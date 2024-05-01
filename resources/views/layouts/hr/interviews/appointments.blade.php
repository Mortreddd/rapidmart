@extends('layouts.dashboard')


@section('title', 'Pending Applicants')

@section('content')
        
        
    <div class="w-full h-full py-5 px-8">
        <nav class=" flex px-5 py-3 mb-4 text-gray-700 border border-gray-200 rounded-lg bg-gray-50">
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
                        <a href="{{ route('applicant.index') }}" class="ms-1 text-lg text-gray-700 hover:text-secondary transition-colors duration-200 ease-in-out font-medium">Applicants</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                        <span class="ms-1 text-lg font-medium text-secondary md:ms-2">Appointments</span>
                    </div>
                </li>
            </ol>
        </nav>
        <table id="default-applicant-table" class="fade-in-early font-semibold text-md table-auto border text-white w-full shadow">
            <caption class="text-gray-800 text-center">Appointment List</caption>
            <thead class="bg-secondary">
                <tr class=" rounded-lg">
                    <th class="px-3 py-2 rounded-tl-lg">Interview Date</th>
                    <th class="px-1 py-2">Interview Time</th>
                    <th class="px-3 py-2">Applicant Name</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Interviewer</th>
                    <th class="px-3 py-2">Appointed Date</th>
                    <th class="px-3 py-2">Action</th>
                </tr>
            </thead>
            <tbody id="table-applicant-body" class="bg-white text-left rounded-b-lg">
                @forelse($interviews as $interview)
                    <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                        <td class="px-1 py-2 text-center">{{ $interview->interviewDate() }}</td>
                        <td class="px-3 py-2 text-center">{{ $interview->interviewTime() }}</td>
                        <td class="px-3 py-2">{{ $interview->applicant->last_name }}, {{ $interview->applicant->first_name }}</td>
                        <td class="px-3 text-white bg-amber-500 py-2 w-fit text-center">{{ $interview->status }}</td>
                        <td class="px-3 py-2 truncate mx-auto text-center">{{ $interview->interviewer->last_name }}, {{ $interview->interviewer->first_name }}</td>
                        <td class="px-3 py-2 truncate mx-auto text-center">{{ $interview->appointedDate }}</td>
                        {{-- Appointment Button --}}
                        {{-- Reject --}}
                        <td class="px-3 py-2">
                            <button data-modal-target="{{$interview->id}}" data-modal-toggle="{{$interview->id}}" class="block text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                </svg>  
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr class="text-black font-normal h-96 text-center py-5 w-full bg-white">
                        <td colspan="10" class="text-center rounded-b-lg h-96 font-medium text-gray-700">
                            No appointments available
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if( Session::has('deleted') )
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
        @endif
    </div>

@endsection

@section('scripts')
    @parent
    @vite(['resources/js/utils/modal/warning.js', 'resources/js/utils/tootltip/appointment.js', 'resources/js/utils/form/on-submit.js'])

@endsection