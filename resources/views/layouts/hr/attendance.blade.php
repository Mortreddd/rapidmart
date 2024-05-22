

@extends('layouts.dashboard')

@section('title', 'Attendance List')

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
                    <a href="{{ route('attendance.index') }}" class="ms-1 text-lg text-gray-700 hover:text-secondary transition-colors duration-200 ease-in-out font-medium">Attendance Management</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                    <span class="ms-1 text-lg font-medium text-secondary md:ms-2">Attendance</span>
                </div>
            </li>
        </ol>
    </nav>
    <a href="{{ route('applicant.accepted.index') }}" class="py-4 px-6 bg-green-500 hover:bg-green-600 transition-colors ease-in-out duration-300 text-white rounded shadow-lg flex justify-between gap-3 items-center w-fit">
        <h3 class="text-lg text-white">
            {{ $schedules->count() }} Accepted Applicants
        </h3>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
        </svg>
    </a>
    <div class="h fit w-full space-y-5">
        <table id="default-applicant-table" class="fade-in font-semibold text-md table-fixed border text-white w-full shadow">
            <caption class="text-gray-800 text-center">Attendances</caption>
            <thead class="bg-secondary">
                <tr class=" rounded-lg">
                    <th class="px-3 py-2 rounded-tl-lg">Full Name</th>
                    <th class="px-3 py-2">Position</th>
                    <th class="px-3 py-2">Department</th>
                    <th class="px-3 py-2">Time In</th>
                    <th class="px-3 py-2">Time End</th>
                    <th class="px-3 py-2 rounded-tr-lg">Status</th>
                </tr>
            </thead>
            <tbody id="table-applicant-body" class="bg-white text-left rounded-b-lg">
                    @forelse ($schedules as $schedule)
                        @forelse ($schedule->employees as $employee)
                            <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                                <td class="px-3 py-2">{{ $employee->first_name }}, {{ $employee->last_name }}</td>
                                <td class="px-1 py-2">{{ $schedule->position->name }}</td>
                                <td class="px-1 py-2">{{ $schedule->position->department->name }}</td>
                                @if ($schedule->shift == 'Day')
                                    <td class="px-3 text-white bg-amber-500 py-2 w-fit text-center">{{ $schedule->time_start }}</td>
                                @elseif ($schedule->shift == 'Night')
                                    <td class="px-3 text-white bg-slate-700 py-2 w-fit text-center">{{ $schedule->time_start }}</td>
                                @endif
                                @if ($schedule->shift == 'Day')
                                    <td class="px-3 text-white bg-amber-500 py-2 w-fit text-center">{{ $schedule->time_end }}</td>
                                @elseif ($schedule->shift == 'Night')
                                    <td class="px-3 text-white bg-slate-700 py-2 w-fit text-center">{{ $schedule->time_end }}</td>
                                @endif
                                <td class="px-3 py-2 font-bold text-center">Absent</td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center rounded-b-lg h-96 font-medium text-gray-700">
                                No employees found
                            </td>
                        @endforelse
                    @empty
                        <td colspan="6" class="text-center rounded-b-lg h-96 font-medium text-gray-700">
                            No schedules found
                        </td>
                    @endforelse
            </tbody>
        </table>
    </div>
    {{-- @if($schedules->hasPages())
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
    @endif --}}
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
@endsection
