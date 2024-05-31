@extends('layouts.dashboard')
@section('content')

<div class=" h-fit  p-2">
    <nav class="flex px-5 py-3 mb-4 text-gray-700 border border-gray-200 bg-gray-50 rounded-md ">
        <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}" class="inline-flex items-center font-medium text-[12px] sm:text-lg text-gray-700 hover:text-secondary transition-colors ease-in-out duration-200">
                    <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="{{ route('invoice.index') }}" class="ms-1 text-lg text-gray-700 text-[12px] sm:text-lghover:text-secondary transition-colors duration-200 ease-in-out font-medium">Accounting</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                    <span class="ms-1 text-lg font-medium text-secondary md:ms-2 text-[12px] sm:text-lg">Invoices</span>
                </div>
            </li>
        </ol>
    </nav>

    @include('includes.PO.InvoiceToast')




    <div class=" mb-4 flex flex-col md:flex-row md:justify-between md:items-center">
        <h1 class=" text-sm font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl dark:text-white">Invoice Approval</h1>

        <div>
            <form method="get" class="flex" action="{{route('invoice.index')}}" id="findSupplier" class="max-w-md mx-2 flex"> 
                <div>
                <select name="supplier" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-4">
    
                    <option value="" {{ Request::get('supplier') ? 'selected' : '' }}>Choose a Supplier</option>
    
                    @forelse ($SuppliersOnPR as $s)
                        <option value="{{$s->id}}" {{ Request::get('supplier') == $s->id ? 'selected' : '' }}>{{$s->company_name}}</option>
                    @empty
                        <option value="">Empty...</option>
                    @endforelse
                </select>
            </div> 
                
                <div class="flex flex-col">
                    <div class="relative w-96">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" name="datasearch" class="block w-full p-4 ps-10 pe-20 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search ..." value="{{ Request::get('datasearch') }}"/>
                    
        
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Filter</button>
                    </div>
                    @error('datasearch')
                    <span class=" h-2 text-sm text-red-500"> {{ $message}}</span>
                    @enderror
                </div>
            </form>
           
        </div>
        
    
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Supplier Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Purchase Order ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Puchase Order PDF
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Cost
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">action-btn</span>
                    </th>
                </tr>
            </thead>
            <tbody>
               @forelse ($PR as $data)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$data->company_name}}
                        </th>
                        <td class="px-6 py-4">
                            {{$data->id}}
                        </td>
                        <td class="px-6 py-4">
                            <a href='{{ route('po.download', $data->id) }}' class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Download</a>
                        </td>
                        <td class="px-6 py-4">
                            ₱{{$data->total_cost}}
                        </td>
                        <td class="px-6 py-4 flex justify-end flex-wrap">
                            <a class="approved cursor-pointer mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" data-id="{{$data->id}}">Approve</a>

                            <a class="reject ml-2 mt-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 cursor-pointer"  data-id="{{$data->id}}">Reject</a>
                        </td>
                    </tr>
               @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 text-center" colspan="5" >Empty Data Set</td>
                    </tr>
               @endforelse
            </tbody>
        </table>
    </div>


</div>
@endsection

@section('scripts')
@vite('resources/js/Pojs/MainInvoice.js')
<script type="module">
    var dataID;
$(document).ready(()=>{

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $('.reject').on('click',function(){
        new iv.openModal('delete-modal');
        dataID = $(this).attr('data-id');

        $('.deleteFinal').on('click',()=>{
        var url = '{{route('po.delete','id')}}';
        url = url.replace('id',dataID);

            $.ajax({
                url: url,
                type: "GET",
                contentType: false,
                processData: false,
                    beforeSend: () => {
                        $("#remove").prop("disabled", true);
                        $("#cancelremove").prop("disabled", true);
                        
                    },
                    complete: () => {
                        $("#remove").prop("disabled", false);
                    },
                    success: (result) => {
                        new iv.closeModal('delete-modal');
                        setTimeout(location.reload(true), 1000);
                    },
                    error: (error) => {
                        console.log(error.responseText);
                    },
            });
        })
    })


    $('.approved').on('click',function(){
        new iv.openModal('approve-modal');
        dataID = $(this).attr('data-id');
    })

    $('.approveFinal').on('click',()=>{
        var url = '{{route('invoice.sendmail','id')}}';
        url = url.replace('id',dataID);
        $('.approveFinal').html(`
        <svg aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
        </svg>
        Loading...
        `)

            $.ajax({
                url: url,
                type: "POST",
                contentType: false,
                processData: false,
                    beforeSend: () => {
                        $("#approve").prop("disabled", true);
                        $("#cancelapprove").prop("disabled", true);
                        
                    },
                    complete: () => {
                        $("#approve").prop("disabled", false);
                        $('.approveFinal').html("Yes, I'm sure")
                    },
                    success: (result) => {
                        if(result.status == "success"){
                            new iv.closeModal('approve-modal');
                            new iv.openModal('send-toast')
                            setTimeout(location.reload(true), 1000);
                        }
                    },
                    error: (error) => {
                        console.log(error);
                    },
            });
        })



})
</script>
@endsection
