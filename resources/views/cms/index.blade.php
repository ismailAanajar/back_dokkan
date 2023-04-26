<x-app-layout>
   <x-slot name="header">
   <div class="flex justify-between  items-center bg-slate-700 p-3 px-[2.5%] gap-4">
    <h1 class="font-bold text-blue-200 ">cms</h1>
    {{-- <a href="{{ route('admin.categories.trash') }}" class="text-white  focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center border border-yellow-500  ml-auto mr-5 hover:bg-yellow-600">Trash</a> --}}
    <a href="{{ route('admin.cms.create') }}" class="text-white  focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center border border-yellow-500 hover:bg-yellow-600">create</a>
   </div>
  </x-slot>
</x-app-layout>