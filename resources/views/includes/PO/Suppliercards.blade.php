@if ($showSupplier->isEmpty())
    <div class="w-full">No Data Found</div>
@else
    @foreach ($showSupplier as $supplier)
        <div
            class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
            <div class="flex justify-end px-4 pt-4">
                <button id="ddbtn_{{ $supplier->id }}" data-dropdown-toggle="dropdown{{ $supplier->id }}"
                    class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                    type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown{{ $supplier->id }}"
                    class="z-10 border border-blue-600 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2" aria-labelledby="ddbtn_{{ $supplier->id }}">
                        <li>
                            <button
                                class="editSupplier w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                data-id="{{ $supplier->id }}" data-name="{{ $supplier->company_name }}"
                                data-address="{{ $supplier->address }}" data-picture="{{ $supplier->picture }}"
                                data-email="{{ $supplier->email }}"
                                data-description="{{ $supplier->description }}">Edit</button>
                        </li>
                        <li>
                            <button
                                class="deleteSupplier block w-full px-4 py-2 text-sm text-red-600 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                data-id="{{ $supplier->id }}"
                                data-name="{{ $supplier->company_name }}">Delete</button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="h-fit flex flex-col items-center pb-10">

                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('/storage/' . $supplier->picture) }}"
                    alt="Supplier IMG" />
                <h5
                    class="w-11/12 text-center break-words mb-1 text-xl font-medium text-gray-900 dark:text-white  truncate ...">
                    {{ $supplier->company_name }}</h5>
                <span
                    class="w-11/12 text-center break-words text-sm text-gray-500 dark:text-gray-400">{{ $supplier->email }}</span>
                <div class="p-5 w-11/12">
                    <h5 class="break-words mb-1 text-sm font-medium text-gray-700 dark:text-white">
                        {{ $supplier->address }}</h5>
                    <p class="break-words h-28 overflow-y-auto  font-normal text-gray-700 dark:text-gray-400">
                        {{ $supplier->description }}</p>
                </div>
            </div>
        </div>
    @endforeach
@endif
