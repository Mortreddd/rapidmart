

@extends('layouts.dashboard')

@section('title', 'Attendances')

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

    <div class="bg-gray-100 p-5 flex-justify-start rounded w-full h-fit">    
        <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">{{ $selectedDepartment->name }}<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>
            
            <!-- Dropdown menu -->
            <div id="dropdownDivider" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                    @foreach ($departments as $department)
                        @if ($department->id === $selectedDepartment->id)
                            <li>
                                <a href="{{ route('attendance.index', ['department' => $selectedDepartment->id]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $department->name }}</a>
                            </li>
                            @continue
                        @endif
                        <li>
                            <a href="{{ route('attendance.index', ['department' => $department->id]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $department->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
    
    </div>
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
                    @forelse ($attendances as $attendance)
                        @forelse ($attendance->employees as $employee)
                            @if ($selectedDepartment->id === $employee->department_id)
                                <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                                    <td class="px-3 py-2">{{ $employee->first_name }}, {{ $employee->last_name }}</td>
                                    <td class="px-1 py-2">{{ $employee->position->name }}</td>
                                    <td class="px-1 py-2">{{ $employee->position->department->name }}</td>
                                    @if ($attendance->schedule->shift == 'Day')
                                        <td class="px-3 text-white bg-amber-500 py-2 w-fit text-center">{{ $attendance->check_in }}</td>
                                    @elseif ($attendance->schedule->shift == 'Night')
                                        <td class="px-3 text-white bg-slate-700 py-2 w-fit text-center">{{ $attendance->check_in }}</td>
                                    @endif
                                    @if ($attendance->schedule->shift == 'Day')
                                        <td class="px-3 text-white bg-amber-500 py-2 w-fit text-center">{{ $attendance->check_out }}</td>
                                    @elseif ($attendance->schedule->shift == 'Night')
                                        <td class="px-3 text-white bg-slate-700 py-2 w-fit text-center">{{ $attendance->check_out }}</td>
                                    @endif
                                    
                                    @if (optional($employee->leave)->id === null && $attendance->id !== null)
                                        <td class="px-3 py-2 font-bold rounded text-center bg-green-500">Present</td>
                                    @elseif (optional($employee->leave)->id !== null)
                                        <td class="px-3 py-2 font-bold rounded text-center bg-amber-500">On Leave</td>
                                    @elseif ($attendance->id !== null)
                                        <td class="px-3 py-2 font-bold rounded text-center bg-green-500">Present</td>
                                    @else
                                        <td class="px-3 py-2 font-bold rounded text-center bg-red-500">Absent</td>
                                    @endif
                                </tr>
                            @endif
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


   <script>
        document.addEventListener('change', function(){

        });
    </script>
@endsection
