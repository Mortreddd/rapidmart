

@extends('layouts.dashboard')

@section('title', 'Create Applicant')


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
                        <span class="ms-1 text-lg font-medium text-secondary md:ms-2">Create</span>
                    </div>
                </li>
            </ol>
        </nav>
        
        <div class="relative w-full h-fit flex justify-center py-5">
            <form action="{{ route('applicant.store') }}" method="post" class="w-auto py-4 px-6 h-fit space-y-5 bg-white rounded-xl fade-in-early" enctype="multipart/form-data">
                @csrf
                <div class="relative w-full gap-3 grid grid-cols-6">
                    <div class="col-span-2">
                        @if ( Session::has('first_name') )
                            <p class="text-xs text-red-600 font-semibold">{{ Session::get('first_name') }}</p>
                        @endif
                        <label for="first_name" class="block">First Name</label>
                        <input type="text" name="first_name" id="first_name" autocomplete="off" placeholder="First Name" class="w-auto outline-none focus:ring-1 focus:border-none focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                    </div>
                    <div class="col-span-2">
                        @if ( Session::has('middle_name') )
                            <p class="text-xs text-red-600 font-semibold">{{ Session::get('middle_name') }}</p>
                        @endif
                        <label for="middle_name" class="block">Middle Name</label>
                        <input type="text" name="middle_name" autocomplete="off" id="middle_name" placeholder="Middle Name" class="w-auto outline-none focus:ring-1 focus:border-none focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                    </div>
                    <div class="col-span-2">
                        @if ( Session::has('last_name') )
                            <p class="text-xs text-red-600 font-semibold">{{ Session::get('last_name') }}</p>
                        @endif
                        <label for="last_name" class="block">Last Name</label>
                        <input type="text" name="last_name" autocomplete="off" id="last_name" placeholder="Last Name" class="w-auto outline-none focus:ring-1 focus:border-none focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                    </div>
                </div>
                <div class="relative w-full gap-3 grid grid-cols-6">
                    <div class="col-span-2">
                        @if ( Session::has('gender') )
                            <p class="text-xs text-red-600 font-semibold">{{ Session::get('gender') }}</p>
                        @endif
                        <label for="gender" class="block">Gender</label>
                        <select id="gender" name="gender"  class="bg-gray-50 border focus:border-none outline-none border-gray-500 focus:ring-secondary text-gray-700 rounded-lg focus:ring-1 focus:border-secondary w-full p-2">
                            <option selected disabled>Choose a gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        @if ( Session::has('age') )
                            <p class="text-xs text-red-600 font-semibold">{{ Session::get('age') }}</p>
                        @endif
                        <label for="age" class="block">Age</label>
                        <input type="number" name="age" id="age" autocomplete="off" max="200" placeholder="Age" class="w-full outline-none focus:ring-1 focus:ring-secondary focus:border-none border border-gray-500 placeholder:text-gray-700 rounded p-2">
                    </div>
                    <div class="col-span-2">
                        @if ( Session::has('position_id') )
                            <p class="text-xs text-red-600 font-semibold">{{ Session::get('position_id') }}</p>
                        @endif
                        <label for="position_id" class="block">Position</label>
                        <select id="position_id" name="position_id" class="bg-gray-50 border focus:border-none outline-none border-gray-500 text-gray-700 rounded-lg focus:ring-1 focus:ring-secondary focus:border-secondary w-full p-2">
                            <option selected disabled>Choose a position</option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-span-6">
                    @if ( Session::has('phone') )
                            <p class="text-xs text-red-600 font-semibold">{{ Session::get('phone') }}</p>
                    @endif
                    <label for="phone" class="block">Contact Number</label>
                    <input type="number" name="phone" id="phone" autocomplete="off" placeholder="Contact Number" class="w-full outline-none focus:border-none focus:ring-1 focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                </div>

                <div class="relative w-full gap-3 grid grid-cols-6">
                    <div class="col-span-6">
                        @if ( Session::has('address') )
                            <p class="text-xs text-red-600 font-semibold">{{ Session::get('address') }}</p>
                        @endif
                        <label for="address" class="block">Address</label>
                        <input type="text" name="address" id="address" autocomplete="off" placeholder="Address" class="w-full outline-none focus:border-none focus:ring-1 focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                    </div>
                </div>

                <div class="relative w-full gap-3 grid grid-cols-6">
                    <div class="col-span-6">
                        @if ( Session::has('email') )
                            <p class="text-xs text-red-600 font-semibold">{{ Session::get('email') }}</p>
                        @endif
                        <label for="email" class="block">Email</label>
                        <input type="email" name="email" id="email" autocomplete="off" placeholder="Email" class="w-full outline-none focus:border-none focus:ring-1 focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                    </div>
                </div>

                <div class="relative w-full grid grid-cols-6">
                    <div class="col-span-6">
                        @if ( Session::has('resume') )
                            <p class="text-xs text-red-600 font-semibold">{{ Session::get('resume') }}</p>
                        @endif
                        <label class="block mb-2 text-sm font-medium text-gray-700" for="resume_input">Upload Resume</label>
                        <input class="block w-full text-sm text-gray border border-gray-300 rounded-lg cursor-pointer bg-gray-50 accent-primary dark:text-gray-400 focus:outline-none" id="file_input" name="resume" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Must not exceed 6MB.</p>
                    </div>
                </div>
                <div class="relative w-full gap-3 grid grid-cols-6">
                    <div class="col-span-6">
                        @if ( Session::has('notes') )
                            <p class="text-xs text-red-600 font-semibold">{{ Session::get('email') }}</p>
                        @endif
                        
                        <label for="notes" class="block">Notes</label>
                        <textarea id="notes" name="notes" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-700 focus:border-none focus:ring-secondary focus:ring-1 outline-none" placeholder="Write your notes here..."></textarea>
                    </div>
                </div>
                <div class="w-full h-fit flex items-center justify-end gap-4">
                    <a href="{{ URL::previous() }}" class="rounded text-black hover:bg-gray-300 bg-gray-200 px-4 py-2 transition-colors duration-200 ease-in-out">Cancel</a>
                    <button type="submit" class="rounded bg-secondary px-4 py-2 text-white transition-colors duration-200 ease-in-out hover:bg-secondary/80">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection