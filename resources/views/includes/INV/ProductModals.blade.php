{{-- ? store8 --}}
<div id="add-product-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            {{-- ? Header --}}
            <div class="flex justify-between  p-4">
                <h3 class="text-xl font-bold">Add Product</h3>

                <button id="close-add-product-modal-form" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            {{-- ? Form --}}
            <form id="storeProduct" class="p-4 md:p-5" enctype="multipart/form-data">
                <div class="grid gap-4 mb-4 grid-cols-2">


                    <div class="col-span-2">
                        <label for="product_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <input type="text" id="product_name" name="product_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: My Product">
                        <span id="product_name_erroradd" class=" h-2 text-sm text-red-500"></span>
                    </div>

                    <div class="col-span-2 sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="image">Upload Picture</label>
                        <input id="image" name="image"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file" accept="image/*">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG or JPG
                            (10MB).</p>
                        <span id="image_erroradd" class=" h-2 text-sm text-red-500"></span>
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        <label for="category_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                            Category</label>
                        <select id="category_id" name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option value="" selected>Choose a Category</option>
                            @forelse ($category as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @empty
                                <option value="">You dont have a Category yet..</option>
                            @endforelse
                        </select>

                        <span id="category_id_erroradd" class=" h-2 text-sm text-red-500"></span>
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        <label for="supplier_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                            Supplier</label>
                        <select id="supplier_id" name="supplier_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option value="" selected>Choose a Supplier</option>
                            @forelse ($supplier as $s)
                                <option value="{{ $s->id }}">{{ $s->company_name }}</option>
                            @empty
                                <option value="">You dont have a Supplier yet..</option>
                            @endforelse
                        </select>

                        <span id="supplier_id_erroradd" class=" h-2 text-sm text-red-500"></span>
                    </div>


                    <div class="col-span-2 sm:col-span-1">
                        <label for="stock"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                        <input type="number" id="stock" name="stock"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: 24">
                        <span id="stock_erroradd" class=" h-2 text-sm text-red-500"></span>
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        <label for="unit"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                            Unit</label>
                        <select id="unit" name="unit"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Choose a Unit</option>
                            <option value="pc">Piece (Pc)</option>
                            <option value="pack">Pack</option>
                            <option value="box">Box</option>
                            <option value="bottle">Bottle</option>
                            <option value="can">Can</option>
                            <option value="jar">Jar</option>
                            <option value="bag">Bag</option>
                            <option value="roll">Roll</option>
                            <option value="carton">Carton</option>
                        </select>

                        <span id="unit_erroradd" class=" h-2 text-sm text-red-500"></span>
                    </div>

                    <div class="col-span-2 sm:col-span-2">
                        <label for="selling_price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selling Price
                            (₱)</label>
                        <input type="text" id="selling_price" name="selling_price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: 324.21">
                        <span id="selling_price_erroradd" class=" h-2 text-sm text-red-500"></span>
                    </div>


                    <div class="col-span-2 sm:col-span-2">
                        <label for="buying_price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Buying Price
                            (₱)</label>
                        <input type="text" id="buying_price" name="buying_price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: 324.21">
                        <span id="buying_price_erroradd" class=" h-2 text-sm text-red-500"></span>
                    </div>





                </div>
                <button id="submitProduct" type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Add Product
                </button>
            </form>
        </div>
    </div>

</div>


{{-- ? edit --}}
<div id="edit-product-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full">

    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <button type="button"
                class="deleteProduct w-full p-1 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete
                Product</button>
            <div class="flex justify-between  p-4">
                <h3 class="text-xl font-bold">Edit Product</h3>

                <button id="close-edit-product-modal-form" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <form id="editProduct" class="p-4 md:p-5" enctype="multipart/form-data">

                <div class="grid gap-4 mb-4 grid-cols-2">
                    <input type="hidden" value="" id="product_id" name="id">


                    <div class="col-span-2">
                        <label for="edit_product_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <input type="text" id="edit_product_name" name="product_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: My Product">
                        <span id="product_name_erroredit" class=" h-2 text-sm text-red-500"></span>
                    </div>

                    <div class="col-span-2 sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="edit_image">Upload Picture</label>
                        <input id="edit_image" name="image"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file" accept="image/*">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG or JPG
                            (10MB).</p>
                        <span id="image_erroredit" class=" h-2 text-sm text-red-500"></span>
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        <label for="edit_category_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                            Category</label>
                        <select id="edit_category_id" name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option value="" selected>Choose a Category</option>
                            @forelse ($category as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @empty
                                <option value="">You dont have a Category yet..</option>
                            @endforelse
                        </select>

                        <span id="category_id_erroredit" class=" h-2 text-sm text-red-500"></span>
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        <label for="edit_supplier_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                            Supplier</label>
                        <select id="edit_supplier_id" name="supplier_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            <option value="" selected>Choose a Supplier</option>
                            @forelse ($supplier as $s)
                                <option value="{{ $s->id }}">{{ $s->company_name }}</option>
                            @empty
                                <option value="">You dont have a Supplier yet..</option>
                            @endforelse
                        </select>

                        <span id="supplier_id_erroredit" class=" h-2 text-sm text-red-500"></span>
                    </div>


                    <div class="col-span-2 sm:col-span-1">
                        <label for="edit_stock"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                        <input type="number" id="edit_stock" name="stock"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: 24">
                        <span id="stock_erroredit" class=" h-2 text-sm text-red-500"></span>
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        <label for="edit_unit"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                            Unit</label>
                        <select id="edit_unit" name="unit"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Choose a Unit</option>
                            <option value="pc">Piece (Pc)</option>
                            <option value="pack">Pack</option>
                            <option value="box">Box</option>
                            <option value="bottle">Bottle</option>
                            <option value="can">Can</option>
                            <option value="jar">Jar</option>
                            <option value="bag">Bag</option>
                            <option value="roll">Roll</option>
                            <option value="carton">Carton</option>
                        </select>

                        <span id="unit_erroredit" class=" h-2 text-sm text-red-500"></span>
                    </div>

                    <div class="col-span-2 sm:col-span-2">
                        <label for="edit_selling_price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selling Price
                            (₱)</label>
                        <input type="text" id="edit_selling_price" name="selling_price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: 324.21">
                        <span id="price_erroredit" class=" h-2 text-sm text-red-500"></span>
                    </div>


                    <div class="col-span-2 sm:col-span-2">
                        <label for="edit_buying_price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Buying Price
                            (₱)</label>
                        <input type="text" id="edit_buying_price" name="buying_price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: 324.21">
                        <span id="buying_price_erroredit" class=" h-2 text-sm text-red-500"></span>
                    </div>




                    <div class="col-span-2 sm:col-span-2">
                        <span id="isChanged" class=" h-fit text-sm text-red-500"></span>
                    </div>
                </div>


                <button id="submit_editProduct" type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Edit Product
                </button>
            </form>
        </div>

    </div>

</div>



{{-- ? delete modal --}}
<div id="delete-product-modal" data-modal-target="delete-product-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Delete Product
                </h3>

            </div>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to Delete
                    Product?</h3>
                <h3 id="supplierName" class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"></h3>
                <button id="remove" type="button"
                    class="deleteFinal text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, I'm sure
                </button>
                <button id="cancelremove" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                    cancel</button>
            </div>
        </div>
    </div>

</div>

{{-- ? category --}}

<div id="category-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full">

    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg pb-6 shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between  p-4">
                <h3 class="text-xl font-bold">Add Category</h3>

                <button id="category-modal-form" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <form id="category-form" class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
                        <input type="text" id="category" name="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="ex: Fruits,Canned Goods,Frozen...">
                        <span id="category_categoryError" class=" h-2 text-sm text-red-500"></span>
                    </div>
                </div>


                <button id="submit_category" type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Add Category
                </button>
            </form>

            <h3 class="text-l font-bold p-4">Categories</h3>
            <div id="category-container" class="w-full flex flex-wrap justify-center">
                @forelse ($category as $cr)
                    <div id="category{{$cr->id}}" class="flex justify-center items-center border-4 border-blue-800 rounded-full m-1 p-1 text-xs "> {{$cr->name}}<a data-id="{{$cr->id}}" class="delete-category"><svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                      </svg>
                      </a>
                    </div>
                @empty
                <div class="w-full grid place-items-center">Empty</div>
                @endforelse
            </div>
        </div>
    </div>

</div>
