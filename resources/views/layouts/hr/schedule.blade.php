

@extends('layouts.dashboard')

@section('title', 'Schedules')

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
    <div class="h fit w-full space-y-5">
        @foreach ($departments as $department)
            <table id="default-applicant-table" class="fade-in font-semibold text-md table-fixed border text-white w-full shadow">
                <caption class="text-gray-800 text-center">{{ $department->name }} Position Schedules</caption>
                <thead class="bg-secondary">
                    <tr class=" rounded-lg">
                        <th class="px-3 py-2 rounded-tl-lg">Department</th>
                        <th class="px-3 py-2">Position</th>
                        <th colspan="2" class="px-3 py-2">Schedule</th>
                        <th class="px-3 py-2 rounded-tr-lg">Employee Count</th>
                    </tr>
                </thead>
                <tbody id="table-applicant-body" class="bg-white text-left rounded-b-lg">
                    @forelse($department->positions as $position)
                            <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                                <td class="px-3 py-2">{{ $department->name }}</td>
                                <td class="px-1 py-2 text-center">{{ $position->name }}</td>
                                @if ($position->schedule->shift == 'Day')
                                    <td colspan="2" class="px-3 text-white bg-amber-500 py-2 w-fit text-center">{{ $position->schedule->time_start }} AM - {{ $position->schedule->time_end }} PM</td>
                                @elseif ($position->schedule->shift == 'Night')
                                    <td colspan="2" class="px-3 text-white bg-slate-700 py-2 w-fit text-center">{{ $position->schedule->time_start }} PM - {{ $position->schedule->time_end }} AM</td>
                                @endif
                                <td class="px-3 py-2 font-bold text-center">{{ $position->employees->count() }}</td>
                            </tr>
                    @empty
                        <td colspan="5" class="text-center rounded-b-lg h-96 font-medium text-gray-700">
                            No positions found
                        </td>
                    @endforelse
                </tbody>
            </table>
        @endforeach
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
   
@endsection
