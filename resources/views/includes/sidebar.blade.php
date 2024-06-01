
<div class="top-0 sticky left-0 flex flex-col items-start w-full justify-between overflow-y-hidden">
    <div class="flex flex-col items-center h-full px-5 space-y-4 bg-white w-fit">
        <div class="flex items-center justify-center w-full h-20 py-3">
            <img src="{{ asset('images/rapidmart-text.png') }}" alt="rapidmart" class="w-96 h-fit mix-blend-multiply">
        </div>
        <div class="flex flex-col items-center w-full">
            <img src="{{ asset(Auth::user()->image) }}" alt="" class="object-cover w-32 h-32 border-2 rounded-full border-secondary">
        <h3 class="text-lg text-gray-700">{{ Auth::user()->first_name }} {{ Auth::user()->last_name}}</h3>
    </div>
    <ul class="flex flex-col flex-wrap w-full h-fit">
        <li id="dashboard" class="flex items-center justify-between w-full link inactive-link h-fit ">
            <div class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                </svg>

                <a href="{{ route('home') }}" class="dropdown">
                    Dashboard
                </a>
            </div>
        </li>

        {{-- ! PURCHASE ORDER LAYER --}}
        <li id="purchase-order" class="flex items-center justify-between w-full h-fit link inactive-link">
            <div class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>

                <button class="dropdown">
                    Purchase Order
                </button>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="arrow purchase-order-arrow">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </li>
        <li class="w-full overflow-y-hidden bg-gray-100 rounded purchase-order grid-template-row-0 height-transition">
            <ul class="flex flex-col w-full space-y-2 rounded h-fit">
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('supplier.index') }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Supplier
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('po.index') }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Create Purchase Order
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('qir.index') }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Quality Inspection Report
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('document.index')}}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        PO Reports Documentation
                    </a>
                </li>
            </ul>
        </li>
        {{-- ! PURCHASE ORDER LAYER --}}

        {{-- ! SALES LAYER --}}
        <li id="sales" class="flex items-center justify-between w-full h-fit link inactive-link">
            <div class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5"/>
                </svg>

                <button class="dropdown">
                    Sales
                </button>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="arrow sales-arrow">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </li>
        <li class="w-full overflow-y-hidden bg-gray-100 rounded sales grid-template-row-0 height-transition">
            <ul class="flex flex-col w-full space-y-2 rounded h-fit">
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('sales.checkinventory.index') }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Product Availability
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('sales.salesreport.index') }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Daily Sales Report
                        {{-- {{ route('sales.salesreport.index') }} --}}
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Add Sales
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('sales.promoinformation.index') }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Promo Information
                        {{-- {{ route('sales.promoinformation.index') }} --}}
                    </a>
                </li>
            </ul>
        </li>
        {{-- ! SALES LAYER --}}

        {{-- ! INVENTORY LAYER --}}
        <li id="inventory" class="flex items-center justify-between w-full h-fit link inactive-link">
            <div class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                <button class="dropdown">
                    Inventory
                </button>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="arrow inventory-arrow">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </li>
        <li class="w-full overflow-y-hidden bg-gray-100 rounded inventory grid-template-row-0 height-transition">
            <ul class="flex flex-col w-full space-y-2 rounded h-fit">
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('product.index') }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Warehouse
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('stock.index') }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Product Stock
                    </a>
                </li>
            </ul>
        </li>
        {{-- ! INVENTORY LAYER --}}

        {{-- ! HUMAN RESOURCE MANAGEMENT LAYER --}}
        <li id="human-resource" class="flex items-center justify-between w-full link inactive-link h-fit">
            <div class="flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
                <button class="dropdown">
                    Human Resource
                </button>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="arrow human-resource-arrow">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </li>
        <li class="w-full overflow-y-hidden bg-gray-100 rounded human-resource grid-template-row-0 height-transition">
            <ul class="flex flex-col w-full space-y-2 rounded h-fit">
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('applicant.index') }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Hiring Management
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('employee.index') }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Employee Management
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('schedule.index') }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Schedule Management
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('attendance.index', ['department' => 1]) }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Attendance Management
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a href="{{ route('payroll.index') }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Salary Management
                    </a>
                </li>
            </ul>
        </li>
        {{-- ! HUMAN RESOURCE MANAGEMENT LAYER --}}

        {{-- ! ACCOUNTING & FINANCE LAYER --}}
        <li id="accounting" class="flex items-center justify-between w-full h-fit link inactive-link">
            <div class="flex items-center justify-start gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                </svg>
                <button class="">
                    Accounting
                </button>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="arrow accounting-arrow">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </li>
        <li class="w-full overflow-y-hidden bg-gray-100 rounded accounting grid-template-row-0 height-transition">
            <ul class="flex flex-col w-full space-y-2 rounded h-fit">
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a  href="{{ route('invoice.index') }}" class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Invoices
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Sales Receipt
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Expenses
                    </a>
                </li>
                <li class="flex flex-col items-end w-full px-3 py-1 h-fit">
                    <a class="text-sm text-black transition-colors duration-200 ease-in-out cursor-pointer text hover:text-secondary/80">
                        Financial Report
                    </a>
                </li>
            </ul>
        </li>
        {{-- ! ACCOUNTING & FINANCE LAYER --}}

        <li id="accounting" class="w-full h-fit">
            <form action="{{ route('logout') }}" method="post" class="flex items-center w-full h-fit">
                @csrf
                <button class="flex w-full p-2 items-center rounded justify-start gap-3 bg-transparent text-black hover:text-white hover:bg-red-600 transition-colors duration-200 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                    </svg>
                    Logout
                </button>
            </form>
        </li>
    </ul>


</div>
