

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
                    <a href="{{ route('employee.index') }}" class="ms-1 text-lg text-gray-700 hover:text-secondary transition-colors duration-200 ease-in-out font-medium">Employee Management</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                    <span class="ms-1 text-lg font-medium text-secondary md:ms-2">Employees</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="grid gap-5 grid-cols-4 grid-flow-row">
        <span class="py-4 px-6 text-white bg-blue-500 rounded shadow-lg flex justify-between gap-3 items-center">
            <h3 class="text-lg text-white">
                {{ $overallEmployeeCount }} Overall Employees
            </h3>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>     
        </span>
        @foreach ($departments as $department)
        <span class="py-4 px-6 text-white bg-blue-500 rounded shadow-lg flex justify-between gap-3 items-center">
            <h3 class="text-lg text-white">
                {{ $department->employees_count }} {{ $department->name }}
            </h3>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>     
        </span>
        @endforeach
        
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
            Add Employee 
        </a>
    </div>
    <table id="default-applicant-table" class="fade-in font-semibold text-md table-fixed border text-white w-full shadow">
        <caption class="text-gray-800 text-center">Employee List</caption>
        <thead class="bg-secondary">
            <tr class=" rounded-lg">
                <th class="px-3 py-2 rounded-tl-lg">Full Name</th>
                <th class="px-1 py-2">Gender</th>
                <th class="px-3 py-2">Phone</th>
                <th class="px-3 py-2">Email</th>
                <th class="px-3 py-2">Address</th>
                <th class="px-3 py-4">Position</th>
                <th class="px-3 py-4">Department</th>
                <th class="px-3 py-4">Resume</th>
                <th class="px-3 py-2">Employed Date</th>
                <th class="px-3 py-2 rounded-tr-lg">Action</th>
            </tr>
        </thead>
        <tbody id="table-applicant-body" class="bg-white text-left rounded-b-lg">
            @forelse($employees as $employee)
                <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                    
                    <td class="px-3 py-2">{{ $employee->last_name }}, {{ $employee->first_name }}</td>
                    <td class="px-1 py-2 text-center">{{ $employee->gender }}</td>
                    <td class="px-3 py-2">{{ $employee->phone }}</td>
                    <td class="px-3 py-2 truncate mx-auto">{{ $employee->email }}</td>
                    <td class="px-3 py-2 truncate">{{ $employee->address }}</td>
                    <td class="px-3 py-2">{{ $employee->position->name }}</td>
                    <td class="px-3 py-2">{{ $employee->position->department->name }}</td>
                    <th class="px-3 py-2 text-center">
                        @if($employee->resume != null)
                            <a href="{{ asset( 'storage/resumes/'.$employee->resume ) }}" target="_blank" class="text-black bg-gray-200 border-gray-300 hover:bg-gray-300 transition-colors duration-200 ease-in-out px-4 py-2 font-semibold">View</a>
                        @else 
                            <a href="" class="text-black pointer-events-none cursor-not-allowed bg-gray-200 border-gray-300 hover:bg-gray-300 transition-colors duration-200 ease-in-out px-4 py-2 font-semibold">No Resume</a>
                        @endif
                    </th>
                    <td class="px-3 py-2">{{ $employee->employedDate() }}</td>
                    <td class="px-3 py-2 flex items-center justify-center ">
                        <button data-modal-target="{{$employee->id}}" data-modal-toggle="{{$employee->id}}" class="block text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                            </svg>  
                        </button>
                    </td>
                </tr>
            @empty
                <td colspan="9" class="text-center rounded-b-lg h-96 font-medium text-gray-700">
                    No employees found
                </td>
            @endforelse
        </tbody>
    </table>
        @if($employees->hasPages())
            <div class="py-3 flex justify-center items-center gap-4 h-fit fade-in">
                    @if($employees->previousPageUrl())
                        <a href="{{ $employees->previousPageUrl() }}" class="rounded bg-secondary px-4 py-2 text-white font-sans transition-colors hover:bg-secondary/70 duration-300 ease-in-out">
                            Prev
                        </a>
                    @else
                        <a href="" class="rounded hover:cursor-not-allowed px-4 py-2 pointer-events-none border-gray-700 bg-gray-100 hover:bg-gray-200 font-sans transition-colors duration-300 ease-in-out">
                            Prev
                        </a>
                    @endif
                    <div class="w-auto px-2 h-fit">
                        <span class="text-sm text-gray-700 dark:text-gray-400">
                            Showing <span class="font-semibold text-gray-900">{{ $employees->firstItem() }}</span> to <span class="font-semibold text-gray-900">{{ $employees->lastItem() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $employees->total() }}</span> Entries
                        </span>
                    </div>
                    @if($employees->nextPageUrl())
                        <a href="{{ $employees->nextPageUrl() }}" class="rounded bg-secondary px-4 py-2 text-white font-sans transition-colors hover:bg-secondary/70 duration-300 ease-in-out">
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

@endsection
