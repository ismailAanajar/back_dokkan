<x-app-layout>
  <x-slot name="header">
   <div class="flex justify-between items-center bg-slate-700 p-3 px-[2.5%] gap-4">
    <h1 class="font-bold text-blue-200 ">cms</h1>
    <a href="{{ route('admin.cms.index') }}" class="text-white  focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center border border-yellow-500 hover:bg-yellow-600">back</a>
   </div>
  </x-slot>

  <form action="{{ route('admin.cms.store') }}" method="post" x-data="{cmsType : '', offerType: '', carouselType: ''}"  enctype="multipart/form-data"> 
    @csrf
    <div class="mb-6">
      <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select cms type</label>
      <select @change="cmsType = $event.target.value; console.log(cmsType)" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="cmsType">
        <option value="">Select a cms</option>
        <option value="codeEditor">code editor</option>
        <option value="text_image">Text image</option>
        <option value="link_image">link image</option>
        <option value="custom_html">Custom html</option>
        <option value="text">text</option>
        <option value="carousel">carousel</option>
      </select>
    </div>  
    <div x-cloak x-show="cmsType === 'link_image'" >
      
          <div >
          <x-forms.input label="page" name="page_li" value=""  />
         </div>
         <div >
          <x-forms.input label="width" name="width_li" value="" type='number' />
         </div>
         <div >
          <x-forms.textarea label="style" name="style_li" value="" />
         </div>
         <div >
            <x-forms.input label="link" name="link_li" value=""  />
          </div>
          <div >
            <x-forms.input label='image' type='file' name='image_li' class="justify-self-start"/>
          </div>
    </div>  
       
       
       <div x-cloak x-show="cmsType === 'text_image'" class="grid grid-cols-2 gap-3 mt-3">
         <div >
          <x-forms.input label="page" name="page_ti" value=""  />
         </div>
         <div >
          <x-forms.input label="width" name="width_ti" value="" type='number' />
         </div>
         <div >
          <x-forms.textarea label="style" name="style_ti" value="" />
         </div>
        <div >
          <x-forms.input label="title" name="title_ti" value=""  />
        </div>
        <div >
          <x-forms.input label="sub_title" name="sub_title_ti" value=""  />
        </div>
        <div >
          <x-forms.input label="link" name="link_ti" value=""  />
        </div>
        <div >
          <x-forms.input label='image' type='file' name='image_ti' class="justify-self-start"/>
        </div>
       </div>
       <div x-cloak x-show="cmsType === 'custom_html'" class="grid grid-cols-2 gap-3 mt-3">
         <div >
          <x-forms.input label="page" name="page_ch" value=""  />
         </div>
         <div >
          <x-forms.input label="width" name="width_ch" value="" type='number' />
         </div>
         <div >
          <x-forms.textarea label="style" name="style_ch" value="" />
         </div>
        <div class="col-start-1 col-end-3">
          <x-forms.textarea id='html' label="html" name="html" value=""/>
        </div>
       </div>

       
      
    <div x-cloak x-show="cmsType === 'carousel'">
      <div class="mb-6">
      <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select carousel type</label>
      <select @change="carouselType = $event.target.value; " id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="carouselType">
        <option value="">Select a type</option>
        <option value="product">product</option>
        <option value="category">category</option>
        <option value="custom">custom</option>
      </select>
      <div class="w-[90%] mx-auto mt-7" x-cloak x-show="carouselType === 'product'">
        <div>
          <div >
            <x-forms.input label="page" name="page" value=""  />
          </div>
          <div >
            <x-forms.input label="title" name="title" value=""  />
          </div>
          <div >
            <x-forms.input label="sub_title" name="sub_title" value=""  />
          </div>
        </div>
        <div class="scrollbar-thin scrollbar-thumb-yellow-700 scrollbar-track-yellow-100  overflow-y-auto relative shadow-md sm:rounded-lg">
          <table class="h-full w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="py-3 px-6">
                          
                        </th>
                      <th scope="col" class="py-3 px-6">
                          Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            category
                        </th>
                        <th scope="col" class="py-3 px-6">
                            price
                        </th>
                        <th scope="col" class="py-3 px-6">
                            created at
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($products as $product)
                    

                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-700 dark:hover:bg-gray-700">
                        <td>
                          <x-forms.checkbox name="prod[]" value="{{ $product->id }}"/>
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->name }}</td>
                        <td>
                          {{ $product->category->name ?? '' }}
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->price }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->created_at }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->status }}</td>
                    </tr>
                    @empty
                    <p class="text-xl text-center py-2 text-red-400">There is no product to show</p>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-2">
            {{-- {{ $products->withQueryString()->links() }} --}}
        </div>
      </div>
      <div class="w-[90%] mx-auto mt-7" x-cloak x-show="carouselType === 'category'">
        <div class="w-[90%] mx-auto mt-7">
        <div>
          <div >
            <x-forms.input label="page" name="page_cat" value=""  />
          </div>
          <div >
            <x-forms.input label="title" name="title_cat" value=""  />
          </div>
          <div >
            <x-forms.input label="sub_title" name="sub_title_cat" value=""  />
          </div>
        </div>
        <div class="scrollbar-thin scrollbar-thumb-yellow-700 scrollbar-track-yellow-100  overflow-y-scroll relative shadow-md sm:rounded-lg">
          <table class="h-full w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="py-3 px-6">
                          
                        </th>
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
                    </tr>
                </thead>
                <tbody>
                @forelse ($categories as $category)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-700 dark:hover:bg-gray-700">
                      <td>
                          <x-forms.checkbox name="categories[]" value="{{ $product->id }}"/>
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $category->name }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="{{ asset($category->image_url) }}" alt="" class="w-8 max-h-9">
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $category->created_at }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $category->status }}</td>
                    </tr>
                    @empty
                    <p class="text-xl text-center py-2 text-red-400">There is no category to show</p>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
       
    </div>
      </div>  
    </div>  
    </div>
    <x-atoms.button type='submit'>Save</x-atoms.button>
   
  </form>

   

  <!-- resources/views/editor.blade.php -->


   @push('scripts')
  
       <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
        CKEDITOR.replace( 'html' )
        </script>
        
    
  @endpush
</x-app-layout>