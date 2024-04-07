<form id="storeSupplier" class=" w-full h-fit  bg-blue-700 rounded-md lg:rounded-3xl pt-8 mb-6 border-2 flex flex-wrap justify-around p-1 " enctype="multipart/form-data" >
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
            <textarea id="description" name="description" type="" class="h-full ml-2 rounded p-1 w-[90%] lg:w-[416px]  max-h-52 lg:max-h-24 lg:min-h-8" >
            </textarea>
        </div>
        <button id="saveSupplier" type="submit" class="w-[80%]  py-4 px-8 bg-blue-900 border rounded-md lg:rounded-full border-white text-white font-bold my-4">Save</button>

        </div>
</form>
