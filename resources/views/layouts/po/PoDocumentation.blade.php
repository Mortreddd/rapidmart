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
                    <span class="ms-1 text-lg font-medium text-secondary md:ms-2 text-[12px] sm:text-lg">Purchase Order Documentation</span>
                </div>
            </li>
        </ol>
    </nav> 

    @include('includes.PO.PodModals')

    <div class="flex justify-between items-center mb-2">
        <h1 class="mb-4 text-sm font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl dark:text-white">Purchase Order Documentation</h1>

        <div>
        <div class="flex items-end justify-center">
        
            <form class="flex" action="{{ route('document.index')}}">
                <div class="flex flex-col justify-end mr-1">
                    <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-3 w-fit">
                        <option value="" {{ Request::get('status') == '' ? 'selected' : '' }}>Choose a Status</option>
                        <option value="passed" {{ Request::get('status') == 'passed' ? 'selected' : '' }}>Passed</option>
                        <option value="failed" {{ Request::get('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                </div>

                <div class="flex flex-col mr-1">
                    <label for="start_date"> Start Date</label>
                    <input type="date" name="start_date" value="{{Request::get('start_date')}}" required>
                </div>

                <div class="flex flex-col mr-1">
                    <label for="end_date"> End Date</label>
                    <input type="date" name="end_date" value="{{Request::get('end_date')}}" required>
                </div>

                <div class=" flex items-end">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-3 mr-4">Filter</button>
                </div>
                
            </form>
        </div>
        @error('end_date')
            <span class=" h-2 text-sm text-red-500"> {{$message}}</span>
        @enderror
    </div>
    </div>

<div class=" mb-2">
    <button type="button" id="delete-btn" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-3 mr-4 gris place-items-center">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
        </svg>
    </button>
</div>


<div class="relative overflow-x-auto">
    <form action="">
    <table id="dataTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-7 px-1 flex justify-center items-center">
                    <input type="checkbox" id="selectAll-CB">
                </th>
                <th scope="col" class=" py-3 w-fit">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Cost
                </th>
                <th scope="col" class="px-6 py-3">
                    Po File
                </th>
                <th scope="col" class="px-6 py-3">
                    Report File
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($POD as $document)
            <tr id="document{{$document->id}}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class=" py-7 flex justify-center items-center">
                    <input type="checkbox" name="ids" class="checkbox_ids" value="{{ $document->id }}">
                </td>
                @if( $document->status == 'Passed')
                <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-green-500 rounded-lg w-fit">
                    {{ $document->id}}
                </th>
                @elseif (  $document->status == 'Failed' )
                <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-red-500 rounded-lg w-fit">
                    {{ $document->id}}
                </th>
                @endif
                <td class="px-6 py-4">
                    <a data-id="{{ $document->id }}" class="viewDescription font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">
                      View
                    </a>
                </td>
                <td class="px-6 py-4">
                    ₱{{ $document->total_cost}}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('po.download',$document->po_id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">
                        Download
                    </a>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('qir.download',$document->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">
                        Download
                      </a>
                </td>
            </tr>
            @empty
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4 text-center" colspan="6" >Empty Data Set</td>
            </tr>
                
            @endforelse
          
        </tbody>
    </table>
</form>
</div>


</div>
@endsection
@section('scripts')
@vite('resources/js/Pojs/MainDocument.js')
<script type="module">
    var dataID;
$(document).ready(()=>{

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $('.viewDescription').on('click',function(e){
        e.preventDefault();

        dataID = $(this).attr('data-id');

        $.ajax({
                url: "{{ route('document.description')}}",
                type: "GET",
                data:{
                    poID: dataID
                },

                    success: (result) => {
                        console.log(result)
                        $('#inspector').html('Inspector: ' + result.data[0].inspector_first_name + ' ' + result.data[0].inspector_last_name)
                        $('#qirDescription').html(result.data[0].description)
                        $('#qirSubject').html(result.data[0].subject)
                        $('#cost').html('Total Cost: ' + result.data[0].total_cost)
                        $('#creator').html('PO Creator: ' + result.data[0].creator_first_name + ' ' + result.data[0].creator_last_name)

                        $('#supplier').html('Supplier: ' + result.data[0].company_name)

                        new md.openModal('description-modal')
                    },
                    error: (error) => {
                        console.log(error);
                    },
            });
    })

    $('#selectAll-CB').on('click',function(){
        $('.checkbox_ids').prop('checked',$(this).prop('checked'))
    });

    function checkEmptyTable() {
    var table = $("#dataTable");
        if (table.find("tr").length === 1) {
            setTimeout(location.reload(true), 1000);
        }
    }


    $('#deleteAllSelected').on('click',function(){
        var all_checked = [];
        $('input:checkbox[name=ids]:checked').each(function(){
            all_checked.push($(this).val())
        })

        if (all_checked.length === 0) {
            $('#none').html('Nothing to delete...')
            return; 
        }

        $.ajax({
            url:'{{route('document.delete')}}',
            type:"DELETE",
            data:{
                ids:all_checked,
            },
            success:function(result){
               
                $.each(all_checked,function(key,val){
                    $('#document'+val).remove();
                })
                checkEmptyTable();
            }

        })
    })




})


</script>
@endsection