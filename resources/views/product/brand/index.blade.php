@php
    $options = [
                [
                    'id' => 'active', 
                    'name' => 'avtive', 
                    'value' => 'active'
                ],
                [
                    'id' => 'archived', 
                    'name' => 'archived', 
                    'value' => 'archived'
                ],
            ];
@endphp
<x-app-layout>
    <x-slot name="header">
   <div class="flex justify-between items-center bg-slate-700 p-3 px-[2.5%]">
    <h1 class="font-bold text-blue-200 ">Categories</h1>
    {{-- <a href="{{ route('admin.categories.trash') }}" class="text-white  focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center border border-yellow-500  ml-auto mr-5 hover:bg-yellow-600">Trash</a> --}}
    <a href="{{ route('admin.products.brand.create') }}" class="text-white  focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center border border-yellow-500 hover:bg-yellow-600">Create</a>
   </div>
  </x-slot>

    <div class="w-[90%] mx-auto mt-7">
        <form action="{{ route('admin.products.brand.index') }}" method="get" class="flex gap-3 my-3">
            <x-forms.input name='name' holder='brand name' class="mt-0 flex-1" :value="request('name')"/>
            <x-forms.select name="status" default='All' :options="$options" class="flex-1" :value="request('status')"/>
            <x-atoms.button class="px-2 py-1 mx-0 my-0 bg-red-500 hover:bg-red-400" type='submit'>Filter</x-atoms.button>
        </form>
        <div class="scrollbar-thin scrollbar-thumb-yellow-700 scrollbar-track-yellow-100  overflow-y-scroll relative shadow-md sm:rounded-lg">
          <table class="h-full w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="py-3 px-6">
                          Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Image
                        </th>
                        <th scope="col" class="py-3 px-6">
                            created at
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($brands as $brand)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-700 dark:hover:bg-gray-700">
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $brand->name }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="{{ asset($brand->image_url) }}" alt="" class="w-11 max-h-9">
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $brand->created_at }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $brand->status }}</td>
                        <td class="flex items-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           
                            <a href="{{ route('admin.products.brand.edit', $brand->id) }}" class="!bg-transparent text-green-700 border border-green-700 hover:!bg-green-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-1.5 py-1   text-center inline-flex items-center mr-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:focus:ring-green-800">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.products.brand.delete', $brand->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-atoms.button type='submit' class="!bg-transparent text-red-700 border border-red-700 hover:!bg-red-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-1.5 py-1 !m-0  text-center inline-flex items-center  dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </x-atoms.button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <p class="text-xl text-center py-2 text-red-400">There is no brand to show</p>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-2">
            {{ $brands->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>