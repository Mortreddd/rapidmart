
<div class="relative p-4 w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <button type="button" class="deleteProduct w-full p-1 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete Product</button>
        <div class="flex justify-between  p-4">
            <h3 class="text-xl font-bold">Edit Product</h3>

            <button id="close-edit-product-modal-form"  type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>

        <!-- Modal body -->
        <form id="editProduct" class="p-4 md:p-5" enctype="multipart/form-data">
            <div class="grid gap-4 mb-4 grid-cols-2">
                <input type="hidden" value="" id="product_id" name="id">
                <div class="col-span-2">
                    <label for="edit_product_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                    <input type="text" id="edit_product_name" name="product_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="My Product">
                    <span id="product_name_erroredit" class=" h-2 text-sm text-red-500"></span>
                </div>
                <div class="col-span-2 sm:col-span-2">
                    <label for="edit_stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                    <input type="number"  id="edit_stock" name="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="24">
                    <span id="stock_erroredit"  class=" h-2 text-sm text-red-500"></span>
                </div>


                <div class="col-span-2 sm:col-span-2">
                    <label for="edit_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price (₱)</label>
                    <input type="text"  id="edit_price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="324.21">
                    <span id="price_erroredit"  class=" h-2 text-sm text-red-500"></span>
                </div>

                <div class="col-span-2 md:col-span-1">
                    <label for="edit_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a Category</label>
                    <select id="edit_category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                      <option value="" selected>Choose a Category</option>
                      @forelse ($category as $c)
                      <option value="{{$c->id}}">{{$c->name}}</option>
                      @empty
                      <option value="">You dont have a Category yet..</option>
                      @endforelse
                    </select>

                    <span id="category_id_erroredit"  class=" h-2 text-sm text-red-500"></span>
                </div>

                <div class="col-span-2 sm:col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="edit_image">Upload Picture</label>
                    <input id="edit_image" name="image"  class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file"  accept="image/*">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG or JPG (10MB).</p>
                    <span id="image_erroredit"  class=" h-2 text-sm text-red-500"></span>
                </div>


            </div>
            <button  id="submit_editProduct" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Update Product
            </button>
        </form>

    </div>

</div>
