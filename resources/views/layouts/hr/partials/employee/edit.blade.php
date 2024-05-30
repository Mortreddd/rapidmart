

@extends('layouts.dashboard')

@section('title', 'Edit Employee')


@section('content')
    <div class="w-full p-5 relative">
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
                        <span class="ms-1 text-lg font-medium text-secondary md:ms-2">Edit</span>
                    </div>
                </li>
            </ol>
        </nav>
        
        <div class="relative w-full h-fit flex justify-center py-5">
            <form action="{{ route('employee.update', ['employee_id' => $employee->id]) }}" method="post" class="w-auto py-4 px-6 h-fit space-y-5 bg-white rounded-xl fade-in-early" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="relative w-full gap-3 grid grid-cols-6">
                    <div class="col-span-2">
                        @error('first_name')
                            <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                        <label for="first_name" class="block">First Name</label>
                        <input type="text" name="first_name" id="first_name" autocomplete="off" placeholder="First Name" value="{{ $employee->first_name }}" class="w-auto outline-none focus:ring-1 focus:border-none focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                    </div>
                    <div class="col-span-2">
                        @error('middle_name')
                            <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                        <label for="middle_name" class="block">Middle Name</label>
                        <input type="text" name="middle_name" autocomplete="off" id="middle_name" value="{{ $employee->middle_name }}" placeholder="Middle Name" class="w-auto outline-none focus:ring-1 focus:border-none focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                    </div>
                    <div class="col-span-2">
                        @error('last_name')
                            <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                        <label for="last_name" class="block">Last Name</label>
                        <input type="text" name="last_name" autocomplete="off" id="last_name" placeholder="Last Name" value="{{ $employee->last_name }}" class="w-auto outline-none focus:ring-1 focus:border-none focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                    </div>
                </div>
                <div class="relative w-full gap-3 grid grid-cols-6">
                    <div class="col-span-3">
                        @error('gender')
                            <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                        <label for="gender" class="block">Gender</label>
                        <select id="gender" name="gender"  class="bg-gray-50 border focus:border-none outline-none border-gray-500 focus:ring-secondary text-gray-700 rounded-lg focus:ring-1 focus:border-secondary w-full p-2">
                            @if ($employee->gender === 'M')
                                <option value="M" selected>Male</option>
                                <option value="F">Female</option>
                            @else
                                <option value="M">Male</option>
                                <option value="F" selected>Female</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-span-3">
                        @error('age')
                            <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                        <label for="age" class="block">Age</label>
                        <input type="number" name="age" id="age" autocomplete="off" value="{{ $employee->age }}" max="200" placeholder="Age" class="w-full outline-none focus:ring-1 focus:ring-secondary focus:border-none border border-gray-500 placeholder:text-gray-700 rounded p-2">
                    </div>
                    
                </div>

                <div class="col-span-6">
                    @error('phone')
                            <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                    <label for="phone" class="block">Contact Number</label>
                    <input type="text" name="phone" id="phone" autocomplete="off" value="{{ $employee->phone }}" placeholder="Contact Number" class="w-full outline-none focus:border-none focus:ring-1 focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                </div>

                <div class="relative w-full gap-3 grid grid-cols-6">
                    <div class="col-span-6">
                        @error('address')
                            <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                        <label for="address" class="block">Address</label>
                        <input type="text" name="address" id="address" autocomplete="off" value="{{ $employee->address }}" placeholder="Address" class="w-full outline-none focus:border-none focus:ring-1 focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                    </div>
                </div>

                <div class="col-span-2">
                    @error('employment_status')
                        <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                    <label for="employment_status" class="block">Employment Status</label>
                    <select id="employment_status" name="employment_status"  class="bg-gray-50 border focus:border-none outline-none border-gray-500 focus:ring-secondary text-gray-700 rounded-lg focus:ring-1 focus:border-secondary w-auto p-2">
                        @switch($employee->employment_status)
                            @case('Training')
                                <option value="Training" selected>Training</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Resigned">Resigned</option>
                                <option value="Terminated">Terminated</option>
                                @break
                            @case('Part Time')
                                <option value="Part Time" selected>Part Time</option>
                                <option value="Training">Training</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Resigned">Resigned</option>
                                <option value="Terminated">Terminated</option>
                                @break
                            @case('Full Time')
                                <option value="Full Time" selected>Full Time</option>
                                <option value="Training">Training</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Resigned">Resigned</option>
                                <option value="Terminated">Terminated</option>
                                @break
                            @case('Resigned')
                                <option value="Resigned" selected>Resigned</option>
                                <option value="Training">Training</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Terminated">Terminated</option>
                                @break
                            @case('Terminated')
                                <option value="Terminated" selected>Terminated</option>
                                <option value="Training">Training</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Resigned">Resigned</option>
                                <option value="Part Time">Part Time</option>
                                @break
                        @endswitch
                    </select>
                </div>
                
                <div class="relative w-full gap-3 grid grid-cols-6">
                    <div class="col-span-6">
                        @error('email')
                            <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                        <label for="email" class="block">Email</label>
                        <p>{{ $employee->email }}</p>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Can't be replace.</p>
                    </div>
                </div>

                <div class="col-span-2">
                    @error('position_id')
                        <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                    <label for="position_id" class="block">Position</label>
                    <p>{{ $employee->position->name }}</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Can't be replace.</p>
                </div>

                <div class="relative w-full grid grid-cols-6">
                    <div class="col-span-6">
                        <label class="block mb-2 text-sm font-medium text-gray-700" for="resume_input">Resume</label>
                        <a href="{{ asset( 'storage/resumes/'.$employee->resume ) }}" target="_blank" class="text-black bg-gray-200 mb-2 border-gray-300 hover:bg-gray-300 transition-colors duration-200 ease-in-out px-4 py-2 font-semibold rounded">Resume</a>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Can't be replace.</p>
                    </div>
                </div>
                <div class="w-full h-fit flex items-center justify-end gap-4">
                    <a href="{{ route('employee.index') }}" class="rounded text-black hover:bg-gray-300 bg-gray-200 px-4 py-2 transition-colors duration-200 ease-in-out">Cancel</a>
                    <button type="submit" class="rounded bg-amber-500 px-4 py-2 text-white transition-colors duration-200 ease-in-out hover:bg-amber-600">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection