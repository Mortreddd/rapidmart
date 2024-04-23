@extends('layouts.dashboard')
@section('content')



  <!-- toast modal -->
@include('includes.PO.ToastModalsSupplier')

{{-- Delete Form Modal --}}
<div id="delete-modal" data-modal-target="delete-modal" tabindex="-1"  aria-hidden="true"  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    @include('includes.PO.DeleteSupplier')
</div>


{{-- Edit Form Modal --}}
<div id="edit-modal" tabindex="-1"  aria-hidden="true"  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    @include('includes.PO.EditSupplier')

</div>


{{--Store Form modall --}}
<div id="form-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full">
  @include('includes.PO.AddSupplier')
</div>


<div class="sm:p-2 relative">

{{-- BreadCrumbs --}}
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
                <a href="{{ route('supplier.index') }}" class="ms-1 text-lg text-gray-700 text-[12px] sm:text-lghover:text-secondary transition-colors duration-200 ease-in-out font-medium">Purchase Order</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
                <span class="ms-1 text-lg font-medium text-secondary md:ms-2 text-[12px] sm:text-lg">Suppliers</span>
            </div>
        </li>
    </ol>
</nav>
{{-- Action button --}}
<div class="flex justify-end">
<button id="open-form" type="button" class="flex justify-center items-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
    <svg class="w-6 h-6 mr-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" viewBox="0 0 24 24">
    <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
  </svg>
  Add Supplier</button>
</div>

{{-- Supplier Main Container --}}
<div class="sm:p-4 grid place-items-center h-fit w-full sm:bg-white sm:border-4 border-solid border-gray-500">
    {{-- Suppliers Cards Container --}}
<div id="supplierContainer" class="supplierContainer bg-blue-500 w-full h-fit sm:rounded-3xl p-2 sm:p-6" >
    {{-- Cards --}}

    <div class="flex flex-wrap justify-around">
    @if($showSupplier->isEmpty())
        <div class="w-full">No Data Found</div>
    @else
        @foreach ($showSupplier as $supplier)
            @include('includes.PO.Suppliercards')
        @endforeach
    @endif
    </div>


</div>

{{$showSupplier->onEachSide(4)->links() }}


</div>



</div>
@endsection

@section('scripts')
{{-- @parent --}}
@vite(['resources/js/Pojs/MainSupplier'])


<script type="module">
    // global Variables (for edit)
    var globalName, globalAddress, globalDescription, globalPicture;

$.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
//this is the start...

$('document').ready(()=>{


// store Supplier
$("#storeSupplier").on("submit", (e) => {
    e.preventDefault();
    let formData = new FormData($("#storeSupplier")[0]);

    //this function is in POjs
        new ms.storeSupplier('{{ route('supplier.store') }}',formData);
});


// delete  Supplier
$('.deleteSupplier').on('click',function(){

    new ms.opendelete();
    var supplier_id = $(this).attr('data-id');
    var supplier_name = $(this).attr('data-name');

    $('#supplierName').html(supplier_name);
    $('.deleteFinal').on('click',()=>{
        var url = '{{route('supplier.delete','id')}}';
        url = url.replace('id',supplier_id);

        $.ajax({
        url: url,
        type: "GET",
        contentType: false,
        processData: false,
        beforeSend: () => {
            $("remove").prop("disabled", true);
        },
        complete: () => {
            $("remove").prop("disabled", false);
        },
        success: (result) => {
            new ms.closedelete();
            new ms.openDeleteModal();

            setTimeout(location.reload(true), 1000);
        },
        error: (error) => {
            console.log(error.responseText);
        },
    });
    })
})

//edit Supplier


$('.editSupplier').on('click',function(){


    var id = $(this).attr('data-id')
    var name = $(this).attr('data-name')
    var address = $(this).attr('data-address')
    var email = $(this).attr('data-email')
    var description = $(this).attr('data-description')
    var picture = $(this).attr('data-picture').split('/')[1];



    $('#SupplierNameEdit').html(name)
    $('#edit_id').val(id)
    $('#edit_name').val(name)
    $('#edit_address').val(address)
    $('#edit_email').val(email)
    $('#edit_description').val(description)
    $('#pictureFile').html("Current Picture: "+picture)



    globalName = name;
    globalAddress = address;
    globalDescription = description;
    globalPicture = picture;

    new ms.showedit();
})

function checkIfValueChanged(NAME, ADDRESS, DESCRIPTION, PICTURE) {



    if (
        globalName !== NAME ||
        globalAddress !== ADDRESS ||
        globalDescription !== DESCRIPTION ||
        globalPicture !== PICTURE
    ) {

        return true
    } else {
       return false
    }
}



$('#editSupplier').on('submit',(e)=>{
    e.preventDefault();
    let NAME = $('#editSupplier input[name="company_name"]').val();
    let ADDRESS = $('#editSupplier input[name="address"]').val();
    let DESCRIPTION = $('#editSupplier textarea[name="description"]').val();
    let TempPIC = $('#editSupplier input[name="picture"]')[0];
    let PICTURE;
    if(TempPIC.files.length !== 0){
        PICTURE = $('#editSupplier input[name="picture"]').val().split('\\')[2];
    }else{
        PICTURE = globalPicture;
    }

    if(checkIfValueChanged(NAME, ADDRESS, DESCRIPTION, PICTURE)){
        let editformData = new FormData($("#editSupplier")[0]);
        new ms.editSupplier('{{ route('supplier.edit') }}',editformData);
    }else{
        $('#isChanged').html("Theres Nothing to Change Please Update Something")
    }

})

})


</script>



@endsection

