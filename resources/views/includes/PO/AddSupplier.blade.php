{{--
<form  class=" w-full md:w-fit h-full  bg-blue-900 rounded-md lg:rounded-xl p-4 border-2 overflow-y-scroll overflow-x-hidden hide-scrollbar" enctype="multipart/form-data">

    <label for="email-address-icon" class="block mb-2 text-sm font-medium text-white">Your Email</label>
    <div class="relative">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
          <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
          <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
        </svg>
      </div>
      <input type="text" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">
    </div>
  </form> --}}





<form id="storeSupplier" class=" w-fit h-fit bg-blue-900 rounded-md lg:rounded-xl p-4 border-2   "  >

    <div class="flex justify-between mb-2">
        <h3 class="text-3xl font-bold text-white">Add Supplier</h3>

        <button id="close-form"  type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" >
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
        </div>


        <div class=" w-full md:w-[50%] lg:w-fit lg:mr-4">
        <div class="w-full mb-1 h-fit lg:h-9 flex flex-col items-center lg:flex-row">
            <label class="ml-1 h-full w-full lg:w-[130px] lg:text-right font-bold text-white">Company Name</label>
            <input id="company_name" name="company_name" class="  lg:ml-2 h-full  w-[90%] lg:w-[416px] rounded p-1" placeholder="My Company">
            <span id="company_name_error"></span>
        </div>
        <div class=" w-full mb-1 h-fit lg:h-9 flex flex-col  items-center lg:flex-row">
            <label class="ml-1 h-full  w-full lg:w-[130px] lg:text-right font-bold text-white">Address</label>
            <input id="address" name="address" class="lg:ml-2 h-full  w-[90%] lg:w-[416px] rounded p-1" placeholder="Company Adress">
            <span id="address_error"></span>
        </div>
        <div class=" w-full mb-1 h-fit lg:h-9 flex flex-col  items-center lg:flex-row">
            <label class="ml-1 h-full w-full lg:w-[130px] lg:text-right font-bold text-white">Email</label>
            <input id="email" name="email" class=" lg:ml-2 h-full  w-[90%]  lg:w-[416px] rounded p-1" placeholder="Company@email.com">
            <span id="email_error"></span>

        </div>
        <div class=" w-full mb-1 h-fit lg:h-9 flex justify-end  items-center flex-col lg:flex-row">
            <label class="ml-1 h-full w-full lg:w-[130px] lg:text-right font-bold text-white">Upload Picture</label>
            <input id="picture" name="picture" type="file" class="block lg:ml-2 w-[90%]   items-center lg:w-[416px] text-md text-gray-900 border rounded-lg cursor-pointer bg-gray-50 file:py-1 file:px-6  file:h-full    file:border-none file:bg-violet-300 file:cursor-pointer"  accept="image/*">
            <span id="email_error"></span>
        </div>
        </div>
        <div class="w-full h-full  md:w-[50%]  lg:w-fit flex lg:justify-center items-center flex-col lg:items-end">
        <div class="mb-1 h-fit flex w-full lg:items-start flex-col lg:flex-row items-center">
            <label class="ml-1 h-full w-full lg:w-[120px] lg:text-right font-bold text-white">Description</label>
            <textarea id="description" name="description" class="h-full ml-2 rounded p-1 w-[90%] lg:w-[416px]  max-h-52 lg:max-h-24 lg:min-h-8" >
            </textarea>
        </div>
        <button id="saveSupplier" type="submit" class="w-[80%]  py-4 px-8 bg-blue-900 border rounded-md lg:rounded-full border-white text-white font-bold my-4">Save</button>

        </div>
</form>
