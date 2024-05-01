@extends('layouts.dashboard')
@section('content')


@include('includes.PO.POtoast')


<div id="mainContainer" class=" h-fit  p-2">

    <div id="delete-modal" data-modal-target="delete-modal" tabindex="-1"  aria-hidden="true"  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        @include('includes.PO.DeleteSupplier')
    </div>

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
                    <a href="{{ route('po.index') }}" class="ms-1 text-lg text-gray-700 text-[12px] sm:text-lghover:text-secondary transition-colors duration-200 ease-in-out font-medium">Purchase Order</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                    <span class="ms-1 text-lg font-medium text-secondary md:ms-2 text-[12px] sm:text-lg">Creating Purchase Order</span>
                </div>
            </li>
        </ol>
    </nav>


    <h1 class="mb-4 text-sm font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl dark:text-white">Puchase Order Creation</h1>
    <form id="createPO" class="w-full p-5 mx-auto border border-slate-800 rounded-xl bg-slate-400" enctype="multipart/form-data">
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2 md:col-span-1">
                <label for="supplier" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a Supplier</label>
                <select id="supplier" name="supplier" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                  <option value="" selected>Choose a Supplier</option>
                  @forelse ($selectSupplier as $s)
                  <option value="{{$s->id}}">{{$s->company_name}}</option>
                  @empty
                  <option value="">You dont have a supplier yet..</option>
                  @endforelse
                </select>

                <span id="supplier_error"  class=" h-2 text-sm text-red-500"></span>
            </div>

            <div class="col-span-2 md:col-span-1 md:row-span-2">
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Subject</label>
                <textarea id="subject" name="subject" rows="6" class="md:max-h-[124.3px] block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write the Purchase Order Subject here..."></textarea>
                <span id="subject_error"  class=" h-2 text-sm text-red-500"></span>
            </div>

            <div class="col-span-2 md:col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload file</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file" name="pdf_path" type="file"  accept="application/pdf" >
                <span id="pdf_path_error"  class=" h-2 text-sm text-red-500"></span>
            </div>
        </div>

        <button type="submit" data-target-model="popup-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
    </form>

    <div>
        <h1 class="my-4 text-sm font-extrabold leading-none tracking-tight text-gray-900 md:text-xl lg:text-2xl dark:text-white">Puchase Requisite</h1>
        <div > <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Supplier Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Purchase Order File
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody id="PR">

            </tbody>
        </table>

        </div>
    </div>
</div>

@endsection

@section('scripts')
@vite('resources/js/Pojs/MainPO.js')

<script type="module">
let cancelID;

function getPR(){
    $.ajax({
        url: '{{route('po.showpr')}}',
        type: 'GET',
        contentType: false,
        processData: false,
        success: (result) => {
            $('#PR').empty();
            // console.log("🚀 ~ getPR ~ result:", result)
            if(result.PR.length > 0){
                result.PR.forEach(item => {
                    let downloadURL = '{{ route("po.download", ":id") }}';
                    // let downloadURL = "{{ Storage::url(':path')}}";
                    downloadURL = downloadURL.replace(':id', item.id);
                    // console.log("🚀 ~ getPR ~ downloadURL:", downloadURL)

                    $('#PR').append(`
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            ${item.company_name}
                        </th>
                        <td class="px-6 py-4">
                            <a href='${downloadURL}' class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Download</a>
                        </td>
                        <td class="px-6 py-4">
                            <button data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="cancelpr focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"  data-id="${item.id}">Cancel</button>
                        </td>
                    </tr>
                    `);
                });
            } else {
                $('#PR').append(`
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 text-center" colspan="3" >Empty Data Set</td>
                </tr>
                `);
            }
        },
});
}

$("#PR").on("click", ".cancelpr", function () {
    cancelID = $(this).attr('data-id');
    new mp.opencancelModal('delete-modal')
});




$(document).ready(()=>{

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $('#createPO').on('submit',function(e){
            e.preventDefault();
            new mp.showModal()
    })


    $('#closeConfirm').on('click',function(){
        new mp.closeModal();
        $("#createPO").find("span").text("");
        $("#createPO")[0].reset()
    })

    $('#confirm').on('click',function(){
        let formData = new FormData($("#createPO")[0]);

        $.ajax({
            url: '{{ route('po.create')}}',
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            complete: () => {
                new mp.closeModal();
            },

            success: (result) => {
                // console.log("🚀 ~ create ~ result:", result);
                if (result.status == "success") {
                    new mp.openModal('static-modal')
                    $("#createPO").find("span").text("");
                    $("#createPO")[0].reset()
                    getPR()
                } else if (result.status == "error") {
                    $("#createPO").find("span").text("");
                    $.each(result.errors, function (key, value) {
                        var showerror = $('#createPO').find("#" + key + "_error");
                        showerror.html(value);
                    });
                }
            },
            error: (error) => {
                console.log(error);
            },

    })

    })

    $('#remove').on('click',()=>{
        var url = '{{route('po.delete','id')}}';
        url = url.replace('id',cancelID);

        $.ajax({
        url: url,
        type: "GET",
        contentType: false,
        processData: false,
        beforeSend: () => {
            $("#remove").prop("disabled", true);
        },
        complete: () => {
            $("#remove").prop("disabled", false);
        },
        success: (result) => {
            console.log("🚀 ~ $ ~ result:", result)
            new mp.closeModals('delete-modal')
            getPR();
        },
        error: (error) => {
            console.log(error.responseText);
        },
    });
})



})

$(window).on('load',function(){
        getPR()
        // alert('loaded')
    })
</script>

@endsection
