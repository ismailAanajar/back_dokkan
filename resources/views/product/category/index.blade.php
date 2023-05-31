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
    <a href="{{ route('admin.products.category.create') }}" class="text-white  focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center border border-yellow-500 hover:bg-yellow-600">Create</a>
   </div>
  </x-slot>

    <div class="w-[90%] mx-auto mt-7">
        <form action="{{ route('admin.products.category.index') }}" method="get" class="flex gap-3 my-3">
            <x-forms.input name='name' holder='category name' class="mt-0 flex-1" :value="request('name')"/>
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
                @forelse ($categories as $category)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-700 dark:hover:bg-gray-700">
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $category->name }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="{{ asset($category->image_url) }}" alt="" class="w-8 max-h-9">
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $category->created_at }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $category->status }}</td>
                        <td class="flex items-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{-- <a href="{{ route('admin.categories.show', $category->id) }}" class="!bg-transparent text-blue-700 border border-blue-700 hover:!bg-blue-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-1.5 py-1   text-center inline-flex items-center mr-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 text-blue-500 fill-blue-500 hover:fill-white" version="1.1" id="Capa_1"
                                        width="800px" height="800px" viewBox="0 0 442.04 442.04"
                                        xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203
                                                c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219
                                                c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367
                                                c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021
                                                c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212
                                                c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071
                                                c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z"/>
                                        </g>
                                        <g>
                                            <path d="M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188
                                                c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993
                                                c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5
                                                s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z"/>
                                        </g>
                                        <g>
                                            <path d="M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z"/>
                                        </g>
                                    </g>
                                </svg>
                            </a> --}}
                            <a href="{{ route('admin.products.category.edit', $category->id) }}" class="!bg-transparent text-green-700 border border-green-700 hover:!bg-green-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-1.5 py-1   text-center inline-flex items-center mr-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:focus:ring-green-800">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.products.category.delete', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-atoms.button type='submit' class="!bg-transparent text-red-700 border border-red-700 hover:!bg-red-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-1.5 py-1 !m-0  text-center inline-flex items-center  dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </x-atoms.button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <p class="text-xl text-center py-2 text-red-400">There is no category to show</p>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-2">
            {{ $categories->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>