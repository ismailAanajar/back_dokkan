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
    

    <div class="w-[90%] mx-auto mt-7">
       <form action="{{ route('admin.media.store') }}" enctype="multipart/form-data" method="post" class=" w-[90%] mt-5 mx-auto">
    @csrf
    <div >
  <x-forms.input label="media name" name="name"  />
</div>
    <div class=" rounded-md shadow-md bg-white overflow-hidden pb-8 mt-3">
      <div class="p-[30px] font-bold text-lg[30px] border border-gray-100 mb-8">Dropzone Media</div>
      <div class=" px-[30px]">
        <label for="" class="text-center  border border-dashed border-red-400 rounded-lg min-h-[150px]  flex justify-center items-center">
          Drag filed or click to browser
          <input type="file" name="media" id="" class="border border-gray-200 p-1 ml-4">
        </label>
      </div>
    </div>
    <div class="justify-self-start col-start-1 mt-3">
      <x-atoms.button type='submit'>Save</x-atoms.button>
    </div>
  </form>
        {{-- <form action="{{ route('admin.products.category.index') }}" method="get" class="flex gap-3 my-3">
            <x-forms.input name='name' holder='category name' class="mt-0 flex-1" :value="request('name')"/>
            <x-forms.select name="status" default='All' :options="$options" class="flex-1" :value="request('status')"/>
            <x-atoms.button class="px-2 py-1 mx-0 my-0 bg-red-500 hover:bg-red-400" type='submit'>Filter</x-atoms.button>
        </form> --}}
        <div class="scrollbar-thin scrollbar-thumb-yellow-700 scrollbar-track-yellow-100  overflow-y-scroll relative shadow-md sm:rounded-lg">
          <table class="h-full w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                        <th scope="col" class="py-3 px-6">
                            Image
                        </th>
                        <th scope="col" class="py-3 px-6">
                            name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            url
                        </th>
                        <th scope="col" class="py-3 px-6">
                            created at
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($media as $item)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-700 dark:hover:bg-gray-700">
                      <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          <img src="{{ asset($item->image_url) }}" alt="" class="w-8 max-h-9">
                      </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->name }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ Str::limit($item->image_url, 20) }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->created_at }}</td>
                        <td class="flex items-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           
                            <x-atoms.button id="copyButton" type='button' class="copyButton !bg-transparent text-green-700 border border-green-700 hover:!bg-green-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-1.5 py-1 !m-0  text-center inline-flex items-center  dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:focus:ring-green-800" data-url="{{ $item->image_url }}">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 115.77 122.88" style="enable-background:new 0 0 115.77 122.88" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0 text-green-400 fill-green-500" d="M89.62,13.96v7.73h12.19h0.01v0.02c3.85,0.01,7.34,1.57,9.86,4.1c2.5,2.51,4.06,5.98,4.07,9.82h0.02v0.02 v73.27v0.01h-0.02c-0.01,3.84-1.57,7.33-4.1,9.86c-2.51,2.5-5.98,4.06-9.82,4.07v0.02h-0.02h-61.7H40.1v-0.02 c-3.84-0.01-7.34-1.57-9.86-4.1c-2.5-2.51-4.06-5.98-4.07-9.82h-0.02v-0.02V92.51H13.96h-0.01v-0.02c-3.84-0.01-7.34-1.57-9.86-4.1 c-2.5-2.51-4.06-5.98-4.07-9.82H0v-0.02V13.96v-0.01h0.02c0.01-3.85,1.58-7.34,4.1-9.86c2.51-2.5,5.98-4.06,9.82-4.07V0h0.02h61.7 h0.01v0.02c3.85,0.01,7.34,1.57,9.86,4.1c2.5,2.51,4.06,5.98,4.07,9.82h0.02V13.96L89.62,13.96z M79.04,21.69v-7.73v-0.02h0.02 c0-0.91-0.39-1.75-1.01-2.37c-0.61-0.61-1.46-1-2.37-1v0.02h-0.01h-61.7h-0.02v-0.02c-0.91,0-1.75,0.39-2.37,1.01 c-0.61,0.61-1,1.46-1,2.37h0.02v0.01v64.59v0.02h-0.02c0,0.91,0.39,1.75,1.01,2.37c0.61,0.61,1.46,1,2.37,1v-0.02h0.01h12.19V35.65 v-0.01h0.02c0.01-3.85,1.58-7.34,4.1-9.86c2.51-2.5,5.98-4.06,9.82-4.07v-0.02h0.02H79.04L79.04,21.69z M105.18,108.92V35.65v-0.02 h0.02c0-0.91-0.39-1.75-1.01-2.37c-0.61-0.61-1.46-1-2.37-1v0.02h-0.01h-61.7h-0.02v-0.02c-0.91,0-1.75,0.39-2.37,1.01 c-0.61,0.61-1,1.46-1,2.37h0.02v0.01v73.27v0.02h-0.02c0,0.91,0.39,1.75,1.01,2.37c0.61,0.61,1.46,1,2.37,1v-0.02h0.01h61.7h0.02 v0.02c0.91,0,1.75-0.39,2.37-1.01c0.61-0.61,1-1.46,1-2.37h-0.02V108.92L105.18,108.92z"/></g></svg>
                                                            </x-atoms.button>

                            <form action="{{ route('admin.products.category.delete', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-atoms.button type='submit' class="!bg-transparent text-red-700 border border-red-700 hover:!bg-red-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-1.5 py-1 !m-0  text-center inline-flex items-center  dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </x-atoms.button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <p class="text-xl text-center py-2 text-red-400">There is no media to show</p>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-2">
            {{ $media->withQueryString()->links() }}
        </div>
    </div>
    @push('scripts')
        <script>
  document.addEventListener('DOMContentLoaded', function() {
    var copyButton = document.querySelectorAll('.copyButton');
    console.log(copyButton);
    Array.prototype.forEach.call (copyButton, function (btn) {
      btn.addEventListener('click', function() {
      console.log( );
      navigator.clipboard.writeText(this.dataset.url)
        .then(function() {
          alert('Text copied to clipboard!');
        })
        .catch(function(error) {
          console.error('Error copying text to clipboard:', error);
        });
    });
    })
    
  });
</script>

    @endpush
</x-app-layout>