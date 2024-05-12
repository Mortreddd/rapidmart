{{-- ? Store MODAL --}}
<div id="form-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
           <div class="flex justify-between  p-4">
              <h3 class="text-xl font-bold">Add Reports</h3>
              <button id="close-form"  type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                 <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                 </svg>
                 <span class="sr-only">Close modal</span>
              </button>
           </div>
           <!-- Modal body -->
           <form id="storeQirReport" class="p-4 md:p-5" enctype="multipart/form-data">
              <div class="grid gap-4 mb-4 grid-cols-2">
                 <div class="col-span-2 ">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Choose a Purchase Order File for your report</label>
                    <select id="POF" name="POF" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                       <option value="" class=" text-gray-400" selected> Chooose a File </option>
                       @forelse ($PoNullInQR as $s)
                       <option value="{{$s->id}}">{{$s->id}}-{{$s->company_name}}</option>
                       @empty
                       <option value="">You dont have a Approved PO file yet..</option>
                       @endforelse
                    </select>
                    <span id="POF_error"  class=" h-2 text-sm text-red-500"></span>
                 </div>

                 <div class="col-span-2 ">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Status (Passed / Failed)</label>
                    <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                       <option value="" class=" text-gray-400" selected> Choose Status </option>
                       <option value="Passed"  > Passed</option>
                       <option value="Failed"  > Failed </option>

                    </select>
                    <span id="status_error"  class=" h-2 text-sm text-red-500"></span>
                 </div>

    
                 <div class="col-span-2 ">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload Quality Inspection Reports File</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="pdf_path" name="pdf_path" type="file"  accept="application/pdf" >
                    <span id="pdf_path_error"  class=" h-2 text-sm text-red-500"></span>
                 </div>
    
                 <div class="col-span-2 ">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Report Description</label>
                    <textarea id="description" name="description" rows="6" class="md:max-h-[124.3px] block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write the description here... This will be also used in email"></textarea>
                    <span id="description_error"  class=" h-2 text-sm text-red-500"></span>
                 </div>
    
                    <button  id="saveReport" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Submit Report
                    </button>
                </div> 
           </form>
        </div>
     </div>
</div>

{{-- ? Edit MODAL --}}
<div id="edit-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full max-h-full">
   <div class="relative p-4 w-full max-w-md max-h-full">
       <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <div class="flex justify-between  p-4 pb-0">
             <h3 class="text-xl font-bold">Edit Reports</h3>
             <button id="edit-close-form"  type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
             </button>
          </div>
          <!-- Modal body -->
          <form id="editQirReport" class="p-4 md:p-5" enctype="multipart/form-data">
            <input id="qrID" type="hidden" name="qrID" value="">
             <div class="grid gap-4 mb-4 grid-cols-2">
               <span id="nothing_error"  class=" h-2 text-sm text-red-500"></span>
                <div class="col-span-2 ">
                   <label for="editPOF" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                       Choose a Purchase Order File for your report</label>
                   <select id="editPOF" name="editPOF" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option value="" class=" text-gray-400" selected> Chooose a File </option>
                      @forelse ($PoNullInQR as $s)
                      <option value="{{$s->id}}">{{$s->id}}-{{$s->company_name}}</option>
                      @empty
                      <option value="">You dont have a Approved PO file yet..</option>
                      @endforelse
                   </select>
                   <div class=" flex flex-col">
                     <span id="editPOF_error"  class=" h-2 text-sm text-red-500"></span>
                     <span id="editPOF_current"  class=" h-2 text-sm text-gray-500"></span>
                   </div>
                   
                </div>

                <div class="col-span-2 ">
                   <label for="editstatus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                       Status (Passed / Failed)</label>
                   <select id="editstatus" name="editstatus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                      <option value="" class=" text-gray-400" selected> Choose Status </option>
                      <option value="Passed"  > Passed</option>
                      <option value="Failed"  > Failed </option>
                   </select>
                   <span id="editstatus_error"  class=" h-2 text-sm text-red-500"></span>
                </div>

   
                <div class="col-span-2 ">
                   <label for="editpdf_path" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload Quality Inspection Reports File</label>
                   <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="editpdf_path" name="editpdf_path" type="file"  accept="application/pdf" >
                   <span id="editpdf_path_error"  class=" h-2 text-sm text-red-500"></span>
                </div>
   
                <div class="col-span-2 ">
                   <label for="editdescription" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Report Description</label>
                   <textarea id="editdescription" name="editdescription" rows="6" class="md:max-h-[124.3px] block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write the description here... This will be also used in email"></textarea>
                   <span id="editdescription_error"  class=" h-2 text-sm text-red-500"></span>
                </div>
   
                   <button  id="saveReport" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                       <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                       </svg>
                       Update Report
                   </button>
               </div> 
          </form>
       </div>
    </div>
</div>

{{-- ? Delete MODAL  --}}
<div id="delete-modal" data-modal-target="delete-modal" tabindex="-1"  aria-hidden="true"  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
   <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <div class="flex items-center p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Delete Quality Report...
              </h3>
   
          </div>
          <div class="p-4 md:p-5 text-center">
              <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
              </svg>
              <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to Delete the Report?</h3>

              <button id="delete" class=" text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                  Yes, I'm sure
              </button>
              <button id="cancel-delete" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
          </div>
      </div>
   </div>
</div>


<div id="request-modal" data-modal-target="request-modal" tabindex="-1"  aria-hidden="true"  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
   <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <div class="flex items-center p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Send a Return?
              </h3>
   
          </div>
          <div class="p-4 md:p-5 text-center">
              <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
              </svg>
              <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to Send the Report?</h3>

              <button id="send-request" class=" text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                  Yes, I'm sure
              </button>
              <button id="cancel-request" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
          </div>
      </div>
   </div>
</div>