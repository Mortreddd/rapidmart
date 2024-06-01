

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

    @foreach($attendances as $attendance)
        <form action="{{ route('attendance.update', ['attendance_id' => $attendance->id]) }}" method="post" id="{{$attendance->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            @csrf
            <div  class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 transition-colors duration-200 ease-in-out hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $attendance->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Update attendance of {{ $attendance->employee->first_name }}, {{ $attendance->employee->last_name}}</h3>
                        <div class="w-full my-3 text-left">
                            <label for="check_in" class="block">Check In</label>
                            @error('check_in')
                                <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                            @enderror
                            <input type="time" id="check_in" placeholder="Select time" name="check_in" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-auto" required />                
                        </div>
                        <div class="w-full my-3 text-left">
                            <label for="check_out" class="block">Check In</label>
                            @error('check_out')
                                <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                            @enderror
                            <input type="time" id="check_out" placeholder="Select time" name="check_out" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-auto" />                
                        </div>
                        
                        <button data-modal-hide="{{$attendance->id}}" type="button" class="py-2.5 transition-colors duration-200 ease-in-out px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Cancel
                        </button>
                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center transition-colors duration-200 ease-in-out">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endforeach



    <div class="bg-gray-100 p-5 rounded w-full h-fit">
        <div class="w-full h-fit flex justify-between">
            <div class="w-fit h-fit">
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

                <button id="datesButton" data-dropdown-toggle="dates" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">{{ $currentDate !== Carbon\Carbon::now() || $currentDate !== null ? Carbon\Carbon::createFromTimeString($currentDate)->format('Y-m-d') : Carbon\Carbon::parse($dateAttendances->first()->date)->format('Y-m-d') }}<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                
                <!-- Dropdown menu -->
                <div id="dates" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 h-72 overflow-y-auto" aria-labelledby="datesButton">
                        @foreach ($dateAttendances as $date)
                            <li>
                                <form class="dates" action="{{ route('attendance.index', ['department' => $selectedDepartment->id]) }}" method="get">
                                    <button type="submit" class="block px-4 py-2 hover:bg-gray-200 duration-200 ease-in-out dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer bg-none w-full">
                                        {{ Carbon\Carbon::parse($date->date)->format('d F Y') }}
                                    </button>
                                    <input type="hidden" name="date" value="{{ $date->date }}">
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="w-fit h-fit">
                <p class="px-4 py-2 bg-green-500 text-white rounded-lg">
                    {{ Carbon\Carbon::parse($currentDate)->format('Y-m-d') }}
                </p>
            </div>
        
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
                    <th class="px-3 py-2">Date</th>
                    <th class="px-3 py-2">Schedule</th>
                    <th class="px-3 py-2">Check In</th>
                    <th class="px-3 py-2">Check Out</th>
                    <th class="px-3 py-2">Total Hours</th>
                    <th class="px-3 py-2 rounded-tr-lg">Action</th>

                </tr>
            </thead>
            <tbody id="table-applicant-body" class="bg-white text-left rounded-b-lg">

                    @forelse ($attendances as $attendance)
                            <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                                <td class="px-3 py-2">{{ $attendance->employee->first_name }}, {{ $attendance->employee->last_name }}</td>
                                <td class="px-1 py-2">{{ $attendance->employee->position->name }}</td>
                                <td class="px-1 py-2">{{ $attendance->employee->position->department->name }}</td>
                                <td class="px-1 py-2 text-center">{{ Carbon\Carbon::parse($attendance->date)->format('Y-m-d') }}</td>
                                <td class="px-1 py-2 text-center">{{ $attendance->schedule->time_start }} - {{ $attendance->schedule->time_end }}</td>
                                @if ($attendance->schedule->shift == 'Day')
                                    <td class="px-3 text-white bg-amber-500 py-2 w-fit text-center">{{ $attendance->check_in !== null ? $attendance->check_in : "--:--" }}</td>
                                @elseif ($attendance->schedule->shift == 'Night')
                                    <td class="px-3 text-white bg-slate-700 py-2 w-fit text-center">{{ $attendance->check_in !== null ? $attendance->check_in : "--:--" }}</td>
                                @endif

                                @if ($attendance->schedule->shift == 'Day')
                                    <td class="px-3 text-white bg-amber-500 py-2 w-fit text-center">{{ $attendance->check_out !== null ? $attendance->check_out : "--:--" }}</td>
                                @elseif ($attendance->schedule->shift == 'Night')
                                    <td class="px-3 text-white bg-slate-700 py-2 w-fit text-center">{{ $attendance->check_out !== null ? $attendance->check_out : "--:--" }}</td>
                                @endif
                                    
                                @if ($attendance->total_hours !== null)
                                    <td class="px-3 py-2 w-fit text-center text-black">{{ $attendance->total_hours }} Hours</td>
                                @else
                                    <td class="px-3 py-2 w-fit text-center text-black">{{ "--:--" }}</td>
                                    
                                @endif
                            
                                @if ($attendance->check_in === null && $attendance->check_out === null)
                                    <td class="px-2 py-1 w-auto">
                                        <button data-modal-target="{{$attendance->id}}" data-modal-toggle="{{$attendance->id}}" class="block m-auto text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg> 
                                        </button> 
                                    </td>
                                @else
                                    <td class="px-2 py-1 w-auto">
                                        <p class="text-white bg-green-500 rounded px-3 py-1 m-auto w-fit">Present</p>
                                    </td>
                                @endif
                            </tr>
                    @empty
                        <td colspan="7" class="text-center rounded-b-lg h-96 font-medium text-gray-700">
                            No attendances found
                        </td>
                    @endforelse
            </tbody>
        </table>
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


   <script>
        const dates = querySelectorAll('dates');


        dates.forEach(date => {
            date.addEventListener('click', function(){
                date.submit();
            })
        })
    </script>
@endsection
