

@extends('layouts.dashboard')

@section('title', 'Create Applicant')


@section('content')
    <div class="w-full h-[95vh] flex justify-center py-5">
        <form action="" method="post" class="w-auto p-4 space-y-5 bg-white rounded-xl">
            <div class="w-full gap-3 grid grid-cols-6">
                <div class="col-span-2">
                    <label for="first_name" class="block">First Name</label>
                    <input type="text" name="first_name" id="first_name" placeholder="First Name" class="w-auto outline-none focus:ring-1 focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                </div>
                <div class="col-span-2">
                    <label for="middle_name" class="block">Middle Name</label>
                    <input type="text" name="middle_name" id="middle_name" placeholder="Middle Name" class="w-auto outline-none focus:ring-1 focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                </div>
                <div class="col-span-2">
                    <label for="last_name" class="block">Last Name</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="w-auto outline-none focus:ring-1 focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                </div>
            </div>
            <div class="w-full gap-3 grid grid-cols-6">
                <div class="col-span-3">
                    <label for="countries" class="block">Gender</label>
                    <select id="countries" class="bg-gray-50 border focus:border-none outline-none border-gray-500 text-gray-700 rounded-lg focus:ring-1 focus:border-secondary w-full p-2">
                        <option selected disabled>Choose a gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                <div class="col-span-3">
                    <label for="phone" class="block">Contact Number</label>
                    <input type="text" name="phone" id="phone" placeholder="Last Name" class="w-auto outline-none focus:ring-1 focus:ring-secondary border border-gray-500 placeholder:text-gray-700 rounded p-2">
                </div>
            </div>
        </form>
    </div>
@endsection