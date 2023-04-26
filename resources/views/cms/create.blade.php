<x-app-layout>
  <x-slot name="header">
   <div class="flex justify-between items-center bg-slate-700 p-3 px-[2.5%] gap-4">
    <h1 class="font-bold text-blue-200 ">cms</h1>
    <a href="{{ route('admin.cms.index') }}" class="text-white  focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center border border-yellow-500 hover:bg-yellow-600">back</a>
   </div>
  </x-slot>

  <form action="" method="post" x-data="{cmsType : '', offerType: ''}" > 
    <div class="mb-6">
      <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select cms type</label>
      <select @change="cmsType = $event.target.value; console.log(cmsType)" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="cmsType">
        <option value="">Select a cms</option>
        <option value="carousel">carousel</option>
        <option value="offer">offer</option>
      </select>
    </div>  
    <div x-cloak x-show="cmsType === 'offer'" >
       <div class="mb-6">
          <label for="offerType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select offer type</label>
          <select @change="offerType = $event.target.value;" id="offerType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="offerType">
            <option value="">offer type</option>
            <option value="link_image">link&image</option>
            <option value="text_image">text&image</option>
            <option value="text">text</option>
          </select>
       </div> 
       <div x-cloak x-show="offerType === 'link_image'" class="grid grid-cols-2 gap-3 mt-3">
        <div >
          <x-forms.input label="link" name="link" value=""  />
        </div>
        <div >
          <x-forms.input label='image' type='file' name='image' class="justify-self-start"/>
        </div>
       </div>
       <div x-cloak x-show="offerType === 'text_image'" class="grid grid-cols-2 gap-3 mt-3">
        text img
       </div>
       <div x-cloak x-show="offerType === 'text'" class="grid grid-cols-2 gap-3 mt-3">
        text
       </div>
    </div>
    <div x-cloak x-show="cmsType === 'carousel'">
      carousel
    </div>
  </form>
  @push('scripts')
      
  @endpush
</x-app-layout>