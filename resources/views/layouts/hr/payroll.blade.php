@extends('layouts.dashboard')


@section('title', 'Payroll Management')



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
                        <a href="{{ route('payroll.index', ['department_id' => 1]) }}" class="ms-1 text-lg text-gray-700 hover:text-secondary transition-colors duration-200 ease-in-out font-medium">Payrolls Management</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a class="ms-1 text-lg text-secondary transition-colors duration-200 ease-in-out font-medium">Payroll</a>
                    </div>
                </li>
            </ol>
        </nav>

        @foreach($employees as $employee)
        <form action="{{ route('payroll.update', ['department_id' => $employee->position->department->id ,'payroll_id' => $employee->payroll->id]) }}" method="post" id="{{$employee->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            @csrf
            @method('PUT')
            <div  class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 transition-colors duration-200 ease-in-out hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $employee->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Update {{ $employee->first_name }}'s salary</h3>
                        {{--TODO BENEFIT --}}
                        <div class="w-full my-3 text-left">
                            @error('benefit_id')
                                <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                            @enderror
                            <label for="benefit_id" class="block">Benefit</label>
                            <select id="benefit_id" name="benefit_id" class="bg-gray-50 border focus:border-none outline-none border-gray-500 focus:ring-secondary text-gray-700 rounded-lg focus:ring-1 focus:border-secondary w-full p-2">
                                @if (optional($employee->payroll->benefit)->id === null)
                                    <option selected value="">None</option>
                                @else
                                    <option selected value="{{ $employee->payroll->benefit->id }}">{{ $employee->payroll->benefit->description }} - &#8369; {{ $employee->payroll->benefit->amount }}</option>
                                @endif
                                @forelse ($benefits as $benefit)
                                    <option value="{{ $benefit->id }}">{{ $benefit->description }} - &#8369; {{ $benefit->amount }}</option>
                                @empty
                                    <option value="">null</option>
                                @endforelse
                            </select>
                        </div>
                        {{--TODO DEDUCTION --}}
                        <div class="w-full my-3 text-left">
                            @error('deduction_id')
                                <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                            @enderror
                            <label for="deduction_id" class="block">Deduction</label>
                            <select id="deduction_id" name="deduction_id" class="bg-gray-50 border focus:border-none outline-none border-gray-500 focus:ring-secondary text-gray-700 rounded-lg focus:ring-1 focus:border-secondary w-full p-2">
                                @if (optional($employee->payroll->deduction)->id === null)
                                    <option selected value="">None</option>
                                @else
                                    <option selected value="{{ $employee->payroll->deduction->id }}">{{ $employee->payroll->deduction->description }} - &#8369; {{ $employee->payroll->deduction->amount }}</option>
                                @endif
                                @forelse ($deductions as $deduction)
                                    <option value="{{ $deduction->id }}">{{ $deduction->description }} - &#8369; {{ $deduction->amount }}</option>
                                @empty
                                    <option value="">null</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="w-full my-3 text-left">
                            @error('status')
                                <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                            @enderror
                            <label for="status" class="block">Status</label>
                            <select id="status" name="status" class="bg-gray-50 border focus:border-none outline-none border-gray-500 focus:ring-secondary text-gray-700 rounded-lg focus:ring-1 focus:border-secondary w-full p-2">
                                @php
                                    $statuses = ['Pending', 'Approval', 'Rejected'];
                                @endphp
                                @foreach ($statuses as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full my-3 text-left">
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                Submit to be reviewed by the Accountant Department
                            </span>
                        </div>
                        <button data-modal-hide="{{$employee->id}}" type="button" class="py-2.5 transition-colors duration-200 ease-in-out px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Cancel
                        </button>
                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center transition-colors duration-200 ease-in-out">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endforeach


        <div class="w-full h-fit p-4 flex gap-3 bg-white rounded justify-between">
            <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">{{ $selectedDepartment->name }}<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div id="dropdownDivider" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                    @foreach ($departments as $department)
                    @if ($department->id === $selectedDepartment->id)
                            <li>
                                <a href="{{ route('payroll.index', ['department_id' => $selectedDepartment->id]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $selectedDepartment->name }}</a>
                            </li>
                            @continue
                        @endif
                        <li>
                            <a href="{{ route('payroll.index', ['department_id' => $department->id]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $department->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="w-fit h-fit flex gap-2 items-center">
                <a href="{{ route('benefit.index') }}" class="bg-violet-500 text-white hover:bg-violet-600 duration-200 ease-in-out rounded px-3 py-2 transition-colors flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                    </svg>
                      
                    Benefits
                </a>
                <a href="{{ route('deduction.index') }}" class="bg-amber-500 text-white hover:bg-amber-600 duration-200 ease-in-out rounded px-3 py-2 transition-colors flex gap-2 items-center">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181" />
                    </svg>
                    Deductions
                </a>
            </div>
        </div>

        <table id="default-applicant-table" class="fade-in-early font-semibold text-md table-auto border text-white w-full shadow">
            <caption class="text-gray-800 text-center">Payrolls</caption>
            <thead class="bg-secondary">
                <tr class=" rounded-lg">
                    <th class="px-3 py-2 rounded-tl-lg">Employee Name</th>
                    <th class="px-3 py-2">Position</th>
                    <th class="px-1 py-2">Department</th>
                    <th class="px 3 py-2">Total Deductions</th>
                    <th class="px-3 py-2">Total Benefits</th>
                    <th class="px-3 py-2">Total Hours</th>
                    <th class="px-3 py-2">Status</th>
                    <th class="px-3 py-2">Total Salary</th>
                    <th class="px-3 py-2">Net Pay</th>
                    <th class="px-6 py-4 rounded-tr-lg">Action</th>
                </tr>
            </thead>
            <tbody id="table-applicant-body" class="bg-white text-left rounded-b-lg">

                @forelse ($employees as $employee)
                    <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                        <td class="px-1 py-2 text-left">{{ $employee->first_name }}, {{ $employee->last_name }}</td>
                        <td class="px-3 py-2 text-left">{{ $employee->position->name }}</td>
                        <td class="px-3 py-2 text-center">{{ $employee->position->department->name }}</td>
                        <td class="px-3 py-2 text-center">&#8369; {{ $employee->payroll->deduction->amount ?? 0.00 }}</td>
                        <td class="px-3 py-2 text-center">&#8369; {{ $employee->payroll->benefit->amount ?? 0.00 }}</td>
                        <td class="px-3 py-2 text-center">{{ $employee->attendance_sum_total_hours }}</td>
                        <td class="px-3 py-2 text-center">
                        @switch($employee->payroll->status)
                            @case('Approval')
                                    <p class="px-2 py-1 bg-amber-600 rounded text-white">{{ $employee->payroll->status }}</p>
                                @break
                            @case('Approved')
                                    <p class="px-2 py-1 bg-green-600 rounded text-white">{{ $employee->payroll->status }}</p>
                                @break
                            @case('Pending')
                                    <p class="px-2 py-1 bg-blue-600 rounded text-white">{{ $employee->payroll->status }}</p>
                                @break
                            @case('Rejected')
                                    <p class="px-2 py-1 bg-red-600 rounded text-white">{{ $employee->payroll->status }}</p>
                                @break 
                        @endswitch
                     </td>
                        <td class="px-3 py-2 text-center">&#8369; {{ $employee->payroll->total_salary ?? 0.00  }}</td>
                        <td class="px-3 py-2 text-center">&#8369; {{ $employee->payroll->net_pay ?? 0.00  }}</td>
                        <td class="px-2 py-1 w-auto">
                            <button data-modal-target="{{$employee->id}}" data-modal-toggle="{{$employee->id}}" class="block m-auto text-white bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg> 
                            </button> 
                        </td>

                    </tr>

                @empty
                    <tr class="text-black font-normal h-96 text-center py-5 w-full bg-white">
                        <td colspan="7" class="text-center rounded-b-lg h-96 font-medium text-gray-700">
                            No payrolls yet
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









