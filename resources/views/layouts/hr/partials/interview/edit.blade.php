@extends('layouts.dashboard')

@section('title', 'Reschedule Interview')


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
                        <a href="{{ route('interview.index') }}" class="ms-1 text-lg text-gray-700 hover:text-secondary transition-colors duration-200 ease-in-out font-medium">Interviews</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                        <span class="ms-1 text-lg font-medium text-secondary md:ms-2">Appointment</span>
                    </div>
                </li>
                
            </ol>
        </nav>
        <div class="relative w-full h-fit flex justify-center py-5">
            <div class="w-fit h-fit flex flex-col items-center space-y-5">
                <form action="{{ route('applicant.status.edit', ['interview_id' => $interview->id, 'applicant_id' => $interview->applicant->id]) }}" method="post" class="w-full py-4 px-6 h-fit space-y-5 bg-white rounded-xl fade-in-early">
                    @csrf
                    @method('PUT')
                    <h3 class="text-xl font-sans text-gray-700">
                        Edit the status of <strong>{{ $interview->applicant->last_name }}, {{ $interview->applicant->first_name }}</strong> 
                    </h3>
                    <select id="interviewer_id" name="interviewer_id" class="bg-gray-50 border focus:border-none outline-none border-gray-500 text-gray-700 rounded-lg focus:ring-1 focus:ring-secondary focus:border-secondary w-auto p-2">
                        
                        @switch($interview->applicant->status)
                            @case('Accepted')
                                <option value="Accepted" selected>{{ $interview->applicant->status }}</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Pending">Pending</option>
                                <option value="Cancelled">Cancelled</option>
                                @break
                            @case('Rejected')
                                <option value="Accepted">Accepted</option>
                                <option value="Rejected" selected>{{ $interview->applicant->status }}</option>
                                <option value="Pending">Pending</option>
                                <option value="Cancelled">Cancelled</option>
                                @break
                            @case('Pending')
                                <option value="Pending" selected>{{ $interview->applicant->status }}</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Accepted">Accepted</option>
                                <option value="Cancelled">Cancelled</option>
                                @break
                            @case('Cancelled')
                                <option value="Cancelled" selected>{{ $interview->applicant->status }}</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Pending">Pending</option>
                                <option value="Accepted">Accepted</option>
                                @break
                    
                            @default
                                
                        @endswitch
                    </select>
                </form>
                <form action="{{ route('interview.edit', ['interview_id' => $interview->id]) }}" method="post" class="w-full sm:w-[80vw] md:w-[50vw] py-4 px-6 h-fit space-y-5 bg-white rounded-xl fade-in-early" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="applicant_id" value="{{ $interview->applicant->id }}">
                    <div class="col-span-6"> 
                        <h3 class="text-xl font-sans text-gray-700">
                            Reschedule the appointment of <strong>{{ $interview->applicant->last_name }}, {{ $interview->applicant->first_name }}</strong> for an interview
                        </h3>
                    </div>
                    <div class="relative w-full gap-3 grid grid-cols-6">
                        <div class="col-span-6">
                            <label for="interview_date" class="block">Interview Date</label>
                            @error('interview_date')
                                <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                            @enderror
                            <input datepicker datepicker-format="mm-dd-yyyy" type="text" required autocomplete="off" name="interview_date" id="interview_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-auto ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                        </div>
                    </div>

                    <div class="relative w-full gap-3 grid grid-cols-6">
                    
                        <div class="col-span-6">
                            <label for="interview_time" class="block">Interview Time</label>
                            @error('interview_time')
                                <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                            @enderror
                            <input type="time" id="interview_time" placeholder="Select time" name="interview_time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-auto" required />                
                        </div>
                    </div>
                    <div class="col-span-6">
                        <label for="interviewer_id" class="block">Interviewer</label>
                        @error('interviewer_id')
                                <p class="text-xs text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                        <select id="interviewer_id" name="interviewer_id" class="bg-gray-50 border focus:border-none outline-none border-gray-500 text-gray-700 rounded-lg focus:ring-1 focus:ring-secondary focus:border-secondary w-auto p-2">
                            
                            @foreach ($interviewers as $interviewer)
                                @if ($interviewer->id == $interview->interviewer->id)
                                    <option selected value="{{ $interview->interviewer->id }}">{{ $interview->interviewer->last_name }}, {{ $interview->interviewer->first_name }}</option>
                                    @continue
                                @endif
                                <option value="{{ $interviewer->id }}">{{ $interviewer->last_name }}, {{ $interviewer->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative w-full gap-3 grid grid-cols-6">
                        <div class="col-span-6">
                            <label for="interview_note" class="block">Notes</label>
                            <textarea id="interview_note" name="interview_note" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-700 focus:border-none focus:ring-secondary focus:ring-1 outline-none" placeholder="Write your notes here...">{{ $interview->interview_note }}</textarea>
                        </div>
                    </div>
                    <div class="w-full h-fit flex items-center justify-end gap-4">
                        <a href="{{ route('interview.index' ) }}" class="rounded text-black hover:bg-gray-300 bg-gray-200 px-4 py-2 transition-colors duration-200 ease-in-out">Cancel</a>
                        <button type="submit" class="rounded bg-secondary px-4 py-2 text-white transition-colors duration-200 ease-in-out hover:bg-secondary/80">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection