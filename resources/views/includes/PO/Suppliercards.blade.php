@php
    $i = 1;
@endphp

@while ($i <= 10)

    <div class="w-full md:w-[500px] p-4 relative bg-blue-700 rounded-3xl mb-4">
        <div class="flex justify-end">
            <div class="flex justify-center items-center text-white hover:text-gray-300 transition-all duration-200 ease-in-out hover:scale-110 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        </div>
        <div class="relative flex flex-col items-center bg-white rounded-xl   md:rounded-tl-[30%]">
            <div class="flex absolute top-0 left-2">
                <img src="{{ asset(Auth::user()->image)}}" class="w-24 h-24 bg-black border-blue-700 border-4 border-solid object-center rounded-full -translate-y-6 object-cover aspect-square " ></img>

            </div>
            <p class="px-1 pt-24 pb-1 md:pl-32 md:pr-1 md:py-2  w-full h-fit">
                <b class=" w-full h-full text-center">GARDANIA</b><br>
                <strong>Contact:</strong> 999999999<br>
                <strong>Address:</strong> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis alias aliquid tempore eveniet quidem rerum consectetur voluptas molestias totam eligendi<br>
                <strong>Email:</strong> 9999999@9.com<br>
                <strong class="w-full">Description:</strong><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit quaerat dignissimos voluptatum, minima error dolore odio blanditiis laudantium animi sequi fugiat voluptatibus a, excepturi optio sapiente quos totam iusto id.<br>

            </p>
            <div class=" w-full mt-7 flex justify-center p-2 pr-1 bg-blue-300 hover:bg-blue-100 rounded-b-xl group">
                <a class="text-xs text-opacity-75 cursor-pointer text-gray-600  font-bold group-hover:text-blue-900">Edit</a>
            </div>
        </div>
    </div>

@php
    $i++;
@endphp
@endwhile
