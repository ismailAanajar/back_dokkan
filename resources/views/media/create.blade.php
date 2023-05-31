<x-app-layout>
     <x-slot name="header">
    <div class="flex justify-between items-center bg-slate-700 p-3 px-[2.5%]">
      <h1 class="font-bold text-blue-200 ">create media</h1>
      <a href="{{ route('admin.media.index') }}" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Back</a>
     </div>
  </x-slot>
 
</x-app-layout>