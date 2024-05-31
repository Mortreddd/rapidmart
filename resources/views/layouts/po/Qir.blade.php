@extends('layouts.dashboard')
@section('content')

<div class=" h-fit p-2">
    <nav class="flex px-5 py-3 mb-4 text-gray-700 border border-gray-200 bg-gray-50 rounded-md ">
        <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}" class="inline-flex items-center font-medium text-[12px] sm:text-lg text-gray-700 hover:text-secondary transition-colors ease-in-out duration-200">
                    <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg> Dashboard </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('qir.index') }}" class="ms-1 text-lg text-gray-700 text-[12px] sm:text-lghover:text-secondary transition-colors duration-200 ease-in-out font-medium">Purchase Order</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-lg font-medium text-secondary md:ms-2 text-[12px] sm:text-lg">Quality Inspection Reports</span>
                </div>
            </li>
        </ol>
    </nav> 

    @include('includes.PO.QirModals') 
    @include('includes.PO.QirToast')
    <div class="flex justify-between items-center mb-2">
        <h1 class="mb-4 text-sm font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl dark:text-white">Quality Inspection Reports</h1>
        <div class="flex items-center justify-center">
        
        <form class="flex" action="{{ route('qir.index')}}">
            <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-4 mr-1">
                <option value="" {{ Request::get('status') == '' ? 'selected' : '' }}>Choose a Status</option>
                <option value="passed" {{ Request::get('status') == 'passed' ? 'selected' : '' }}>Passed</option>
                <option value="failed" {{ Request::get('status') == 'failed' ? 'selected' : '' }}>Failed</option>
            </select>
            
            <select name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-4 mr-1">
                <option value="all" {{ Request::get('date') == 'all' ? 'selected' : '' }}>All Dates</option>
                <option value="today" {{ Request::get('date') == 'today' ? 'selected' : '' }}>Today</option>
                <option value="yesterday" {{ Request::get('date') == 'yesterday' ? 'selected' : '' }}>Yesterday</option>
                <option value="this_week" {{ Request::get('date') == 'this_week' ? 'selected' : '' }}>This Week</option>
                <option value="last_week" {{ Request::get('date') == 'last_week' ? 'selected' : '' }}>Last Week</option>
                <option value="this_month" {{ Request::get('date') == 'this_month' ? 'selected' : '' }}>This Month</option>
                <option value="last_month" {{ Request::get('date') == 'last_month' ? 'selected' : '' }}>Last Month</option>
                <option value="this_year" {{ Request::get('date') == 'this_year' ? 'selected' : '' }}>This Year</option>
                <option value="last_year" {{ Request::get('date') == 'last_year' ? 'selected' : '' }}>Last Year</option>
            </select>
            

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 mr-4">Filter</button>
        </form>



        <button id="openform" class="flex items-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-1 py-2.5 me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
            <svg class="w-6 h-6 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill="currentColor" d="M13 13h-2V7h2m-2 8h2v2h-2m4.73-14H8.27L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27z" />
            </svg> Add Reports </button>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3"> Inspector </th>
                    <th scope="col" class="px-6 py-3"> Documents </th>
                    <th scope="col" class="px-6 py-3"> Status </th>
                    <th scope="col" class="px-6 py-3"> Date </th>
                    <th scope="col" class=" py-3">
                        <span class="sr-only">action-btn</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($QualityReportData as $QR)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{$QR->first_name.' '.$QR->last_name}} </th>
                    <td class="px-6 py-4 flex flex-col justify-center">
                        <a href="{{ route('qir.download', $QR->id)  }}" class=" font-medium text-blue-600 dark:text-blue-500 hover:underline">QIR File</a>
                        <a href="{{ route('po.download', $QR->po_id)  }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">PO File</a>
                    </td>
                    <td class="px-6 py-4"> {{ $QR->status}} </td>
                    <td class="px-2 py-4"> {{ $QR->report_date}} </td>
                    @if (auth()->user()->position_id == 17 && $QR->status == 'Failed')
                    <td class="px-2 py-4 flex justify-evenly items-center">
                        <button class="editbtn" data-id="{{ $QR->id}}">
                            <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                            </svg>
                        </button>
                        <button class="deletebtn" data-id="{{ $QR->id}}">
                            <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                            </svg>
                        </button>

                        @if ($QR->isEmailed_status == 'send')
                        <button class="returnshipment focus:outline-none text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 rounded-md text-sm p-1 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-900 cursor-not-allowed" disabled data-id="{{ $QR->id}}" >Request Send</button>
                        @else
                        <button class="returnshipment focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-md text-sm p-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900" data-id="{{ $QR->id}}" >Return Shipment</button>
                        @endif
                       
                    </td>
                    @else
                    <td class="px-2 py-4 flex justify-evenly items-center">
                        <button class="editbtn" data-id="{{ $QR->id}}">
                            <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                            </svg>
                        </button>
                        <button class="deletebtn" data-id="{{ $QR->id}}">
                            <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                            </svg>
                        </button>
                        <button class="releaseOrder focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-md text-sm p-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900" data-id="{{ $QR->id}}" >Release Order</button>
                    </td>
                    @endif
                    
                </tr>
                @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 text-center" colspan="5" >Empty Data Set</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{$QualityReportData->onEachSide(4)->links() }}
    </div>
</div>


@endsection
@section('scripts')
@vite('resources/js/Pojs/MainQir.js')
<script type="module">
    var dataID;


    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    
    $(document).ready(()=>{
        // Store
        $('#storeQirReport').on('submit', function(e){
            e.preventDefault();
            let formData = new FormData($("#storeQirReport")[0]);
            $.ajax({
                url:' {{ route('qir.addQualitycheck') }}',
                data: formData,
                type: "POST",
                contentType: false,
                processData: false,

                success: (result) => {
                            
                    if (result.status == "success") {
                        new qr.closeModal('form-modal');
                        $("#storeQirReport").find("span").text("");
                        $("#storeQirReport")[0].reset();
                        new qr.openModal('success-toast');
                        setTimeout(location.reload(true), 1000);
                    } else if (result.status == "error") {
                        $("#storeQirReport").find("span").text("");
                        $.each(result.errors, function (key, value) {
                            var showerror = $(document).find("#" + key + "_error");
                            showerror.html(value);
                        });
                    }
                },
                error: (error) => {
                    console.log(error.responseText);
                },
            });
        });
        
        //edit action
        $('.editbtn').on('click',function(){
            var dataID = $(this).attr('data-id');
            var url = '{{route('qir.getItem','id')}}';
            url = url.replace('id',dataID);

            $.ajax({
                url: url,
                type: "GET",
                contentType: false,
                processData: false,

                success: (result) => {
                    // console.log(result)
                $('#qrID').val(result.data[0].id)
                $('#editstatus').val(result.data[0].status)
                $('#editdescription').val(result.data[0].description)   
                $('#editPOF_current').html('Current File: '+ result.data[0].po_id + '-'+ result.data[0].company_name)  
                new qr.openModal('edit-modal')
                },
                error: (error) => {
                    console.log(error);
                },
            })
        });

        //update
        $('#editQirReport').on('submit',function(e){
            e.preventDefault();
            let formData = new FormData($("#editQirReport")[0]);
            $.ajax({
                url:' {{ route('qir.updateReport') }}',
                data: formData,
                type: "POST",
                contentType: false,
                processData: false,

                success: (result) => {
                    console.log(result)
                    if (result.status == "success") {
                        $("#editQirReport").find("span").text("");
                        $("#editQirReport")[0].reset();
                        new qr.closeModal('edit-modal');
                        new qr.openModal('edit-success-toast');
                        setTimeout(location.reload(true), 1000);
                    } else if (result.status == "error") {
                        $("#editQirReport").find("span").text("");
                        $.each(result.errors, function (key, value) {
                            var showerror = $(document).find("#" + key + "_error");
                            showerror.html(value);
                        });
                    }else if (result.status == "nothing"){
                        $('#nothing_error').html(result.message)
                    }
                },
                error: (error) => {
                    console.log(error.responseText);
                },
            });
        })

        //delete
        $('.deletebtn').on('click',function(){
            new qr.openModal('delete-modal');
            dataID = $(this).attr('data-id');
        })

        $('#delete').on('click',function(){
            $.ajax({
                url: '{{route('qir.deleteReport')}}',
                type: "POST",
                data:{
                    itemID: dataID,
                },

                success: (result) => {
                    console.log(result)
                    new qr.closeModal('delete-modal');
                    new qr.openModal('');
                },
                error: (error) => {
                    console.log(error);
                },
            })
        })


        //send Mail
        $('.returnshipment').on('click',function(){
            new qr.openModal('request-modal');
            dataID = $(this).attr('data-id');
        })

        $('#send-request').on('click',function(){
            var url = '{{route('qir.requestReturn','id')}}';
            url = url.replace('id',dataID);
            $('#send-request').html(`
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
                            $("#send-request").prop("disabled", true);
                        },
                        complete: () => {
                            $("#send-request").prop("disabled", false);
                            $('#send-request').html("Yes, I'm sure")
                        },
                        success: (result) => {
                            if(result.status == "success"){
                                console.log(result)
                                setTimeout(location.reload(true), 1000);
                            }
                        },
                        error: (error) => {
                            console.log(error);
                        },
                });
        })

        //release
        $('.releaseOrder').on('click',function(){
            new qr.openModal('release-modal');
            dataID = $(this).attr('data-id');
        })

        $('#send-release').on('click',function(){
            var url = '{{route('qir.releaseOrder','id')}}';
            url = url.replace('id',dataID);
            $('#send-release').html(`
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
                            $("#send-release").prop("disabled", true);
                        },
                        complete: () => {
                            $("#send-release").prop("disabled", false);
                            $('#send-release').html("Yes, I'm sure")
                        },
                        success: (result) => {
                            if(result.status == "success"){
                                console.log(result)
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