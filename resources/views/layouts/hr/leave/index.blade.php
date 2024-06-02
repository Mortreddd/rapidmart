

@extends('layouts.dashboard')

@section('title', 'Leave Management')

@section('content')
    <div class="w-full h-full p-5">
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
                    <a href="{{ route('employee.index') }}" class="ms-1 text-lg text-gray-700 hover:text-secondary transition-colors duration-200 ease-in-out font-medium">Employees</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                        <span class="ms-1 text-lg font-medium text-secondary md:ms-2">On Leaves</span>
                    </div>
                </li>
            </ol>
        </nav>


        <div class="w-full h-fit p-4 flex gap-3 bg-white rounded justify-end">
            <button data-modal-target="file-leave-form" data-modal-toggle="file-leave-form" class="rounded-lg py-2 px-3 transition-colors text-lg duration-200 ease-in-out flex gap-3 items-center bg-orange-500 text-white hover:bg-orange-600 cursor-pointer pointer-events-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                </svg>
                File on leave
            </button>

            <form action="{{ route('leave.store') }}" method="post" id="file-leave-form" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                @csrf
                <div  class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 transition-colors duration-200 ease-in-out hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="file-leave-form">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            @error('employee_id')
                                <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                            @enderror
                            <select id="employee" name="employee_id"  class="bg-gray-50 border focus:border-none outline-none border-gray-500 focus:ring-secondary text-gray-700 rounded-lg focus:ring-1 focus:border-secondary w-full p-2">
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">File a leave for a employee</h3>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->last_name }}, {{ $employee->first_name }}</option>
                                @endforeach
                            </select>
                            <div class="w-full my-3 text-left">
                                <label for="start_date" class="block">Start Date</label>
                                @error('start_date')
                                    <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                                @enderror
                                <input datepicker datepicker-format="mm-dd-yyyy" value="{{ old('start_date') }}" required type="text" required autocomplete="off" name="start_date" id="interview_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-auto ps-10 p-2.5" placeholder="Start date">              
                            </div>
                            <div class="w-full my-3 text-left">
                                <label for="end_date" class="block">End Date</label>
                                @error('end_date')
                                    <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                                @enderror
                                <input datepicker datepicker-format="mm-dd-yyyy" value="{{ old('end_date') }}" required type="text" required autocomplete="off" name="end_date" id="interview_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-auto ps-10 p-2.5" placeholder="End date">           
                            </div>
                            <div class="w-full my-3 text-left">
                                <label for="reason" class="block">Reason</label>
                                @error('reason')
                                    <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                                @enderror
                                <textarea name="reason" id="reason" class="w-full rounded" rows="3" placeholder="Write the reason"></textarea>
                            </div>
                            <button data-modal-hide="file-leave-form" type="button" class="py-2.5 transition-colors duration-200 ease-in-out px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Cancel
                            </button>
                            <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center transition-colors duration-200 ease-in-out">
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
  
        <table id="default-applicant-table" class="fade-in-early font-semibold text-md table-auto border text-white w-full shadow">
            <caption class="text-gray-800 text-center">On Leave Employees </caption>
            <thead class="bg-secondary">
                <tr class=" rounded-lg">
                    <th class="px-3 py-2 rounded-tl-lg">Employee Name</th>
                    <th class="px-3 py-2">Position</th>
                    <th class="px-1 py-2">Start Date</th>
                    <th class="px-3 py-2">Until Date</th>
                    <th class="px-6 py-4 rounded-tr-lg">Reason</th>
                </tr>
            </thead>
            <tbody id="table-applicant-body" class="bg-white text-left rounded-b-lg">
                @forelse($onLeaveEmployees as $employee)
                    <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                        <td class="px-1 py-2 text-left">{{ $employee->first_name }}, {{ $employee->last_name }}</td>
                        <td class="px-3 py-2 text-left">{{ $employee->position->name }}</td>
                        <td class="px-3 py-2 text-center">{{ Carbon\Carbon::parse($employee->leave->start_date)->format('Y-m-d') }}</td>
                        <td class="px-3 py-2 text-center">{{ Carbon\Carbon::parse($employee->leave->end_date)->format('Y-m-d') }}</td>
                        <td class="px-3 py-2 text-center truncate">{{ $employee->leave->reason }}</td>
                    </tr>
                @empty
                    <tr class="text-black font-normal h-96 text-center py-5 w-full bg-white">
                        <td colspan="5" class="text-center rounded-b-lg h-96 font-medium text-gray-700">
                            No Onleave employees
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @endsection
@section('scripts')
    @parent

@endsection