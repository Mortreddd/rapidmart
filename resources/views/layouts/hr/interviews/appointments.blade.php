@extends('layouts.dashboard')


@section('title', 'Pending Applicants')

@section('content')
    
    @foreach($interviews as $interview)
        @if ( in_array($interview->status, ['Cancelled', 'Rejected']))
            <form action="{{ route('appointment.destroy', ['interview_id' => $interview->id]) }}" method="post" id="{{$interview->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                @csrf
                @method('DELETE')
                <div  class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 transition-colors duration-200 ease-in-out hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $interview->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete?</h3>
                            <button data-modal-hide="{{$interview->id}}" type="button" class="py-2.5 transition-colors duration-200 ease-in-out px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-gray-100 rounded-lg border border-gray-300 hover:bg-gray-300 focus:z-10 focus:ring-4 focus:ring-gray-100">
                                Cancel
                            </button>
                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center transition-colors duration-200 ease-in-out">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        @elseif ( $interview->status === 'Pending')
            <form action="{{ route('interview.cancel', ['interview_id' => $interview->id]) }}" method="post" id="{{$interview->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                @csrf
                @method('PUT')
                <div  class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 transition-colors duration-200 ease-in-out hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $interview->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to cancel this appointment?</h3>
                            <button data-modal-hide="{{$interview->id}}" type="button" class="py-2.5 transition-colors duration-200 ease-in-out px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-gray-100 rounded-lg border border-gray-300 hover:bg-gray-300 focus:z-10 focus:ring-4 focus:ring-gray-100">
                                Cancel
                            </button>
                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center transition-colors duration-200 ease-in-out">
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        @elseif ( $interview->status === 'Accepted')
            <form action="{{ route('applicant.employ', ['applicant_id' => $interview->applicant->id ]) }}" method="post" id="{{$interview->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                @csrf
                <div  class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow sapce-y-5 dark:bg-gray-700">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 transition-colors duration-200 ease-in-out hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $interview->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to employ {{ $interview->applicant->first_name }}, {{ $interview->applicant->last_name}}?</h3>
                            <div class="w-full flex justify-center my-3 items-center">

                                <input datepicker datepicker-format="mm-dd-yyyy" value="{{ old('start_date') }}" type="text" required autocomplete="off" name="start_date" id="start_date" class="bg-gray-50 py-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-auto ps-10 p-2.5" placeholder="Select starting date">
                            </div>
                            <div class="w-full justify-around items-center">
                                <button data-modal-hide="{{$interview->id}}" type="button" class="py-2.5 transition-colors duration-200 ease-in-out px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    Cancel
                                </button>
                                <button type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center transition-colors duration-200 ease-in-out">
                                    Employ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    @endforeach

    <div class="w-full h-full py-5 px-8">
        <nav class=" flex px-5 py-3 mb-4 text-gray-700 border border-gray-200 rounded-lg bg-gray-50">
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
                        <span class="ms-1 text-lg font-medium text-secondary md:ms-2">Appointments</span>
                    </div>
                </li>
            </ol>
        </nav>
        <table id="default-applicant-table" class="fade-in-early font-semibold text-md table-auto border text-white w-full shadow">
            <caption class="text-gray-800 text-center">Appointment List</caption>
            <thead class="bg-secondary">
                <tr class=" rounded-lg">
                    <th class="px-3 py-2 rounded-tl-lg">Interview Date</th>
                    <th class="px-1 py-2">Interview Time</th>
                    <th class="px-3 py-2">Applicant Name</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Interviewer</th>
                    <th class="px-3 py-2">Appointed Date</th>
                    <th class="px-3 py-2">Action</th>
                </tr>
            </thead>
            <tbody id="table-applicant-body" class="bg-white text-left rounded-b-lg">
                @forelse($interviews as $interview)
                    <tr class="text-black font-normal odd:bg-[#CAD9FF]">
                        <td class="px-1 py-2 text-center">{{ $interview->interviewDate() }}</td>
                        <td class="px-3 py-2 text-center">{{ $interview->interviewTime() }}</td>
                        <td class="px-3 py-2">{{ $interview->applicant->last_name }}, {{ $interview->applicant->first_name }}</td>
                        @switch($interview->status)
                            @case('Pending')
                                <td class="px-3 text-white bg-blue-500 py-2 w-fit text-center">{{ $interview->status }}</td>
                                @break
                            @case('Accepted')
                                <td class="px-3 text-white bg-green-500 py-2 w-fit text-center">{{ $interview->status }}</td>
                                @break
                            @case('Rejected')
                                <td class="px-3 text-white bg-red-500 py-2 w-fit text-center">{{ $interview->status }}</td>
                                @break
                            @case('Cancelled')
                                <td class="px-3 text-white bg-amber-500 py-2 w-fit text-center">{{ $interview->status }}</td>
                                @break
                            @default
                                <td class="px-3 text-white bg-amber-500 py-2 w-fit text-center">{{ $interview->status }}</td>
                        @endswitch

                        <td class="px-3 py-2 truncate mx-auto text-center">{{ $interview->interviewer->last_name }}, {{ $interview->interviewer->first_name }}</td>
                        <td class="px-3 py-2 truncate mx-auto text-center">{{ $interview->appointedDate() }}</td>
                        <td class="px-3 py-2">
                            @if ( in_array($interview->status, ['Cancelled', 'Rejected']))
                                <button data-modal-target="{{$interview->id}}" data-modal-toggle="{{$interview->id}}" class="block text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            @elseif ( $interview->status === 'Accepted')
                                <button data-modal-target="{{$interview->id}}" data-modal-toggle="{{$interview->id}}" class="block text-white bg-green-500 hover:bg-green-600 transition-colors duration-200 ease-in-out focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 16 16">
                                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </button>
                            @elseif ( $interview->status === 'Pending')
                                <a href="{{ route('appointment.show', ['interview_id' => $interview->id]) }}" class="block mb-1 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 w-fit focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                                <button data-modal-target="{{$interview->id}}" data-modal-toggle="{{$interview->id}}" class="block text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                    </svg>                                      
                                </button>
                            @endif

                        </td>
                    </tr>
                @empty
                    <tr class="text-black font-normal h-96 text-center py-5 w-full bg-white">
                        <td colspan="10" class="text-center rounded-b-lg h-96 font-medium text-gray-700">
                            No appointments available
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if( Session::has('deleted') )
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
        @elseif( Session::has('cancelled') )
            <x-toast.success>
                {{ Session::get('cancelled') }}
            </x-toast.success>
        @elseif( Session::has('success') )
            <x-toast.success>
                {{ Session::get('success') }}
            </x-toast.success>
        @endif
    </div>

@endsection

@section('scripts')
    @parent
    @vite(['resources/js/utils/modal/warning.js', 'resources/js/utils/tootltip/appointment.js', 'resources/js/utils/form/on-submit.js'])

@endsection