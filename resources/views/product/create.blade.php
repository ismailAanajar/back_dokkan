<x-app-layout>
   <style>
    .ck-editor__editable_inline{
      height: 300px;
    }
  </style>
  <x-slot name="header">
    <div class="flex justify-between items-center bg-slate-700 p-3 px-[2.5%] my-5">
      <h1 class="font-bold text-blue-200 ">create category</h1>
      <a href="{{ route('admin.products.index') }}" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Back</a>
     </div>
  </x-slot>
  <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data" class="grid grid-cols-2 gap-4 col ">
    @csrf
    
    @include('product._form')

    <div class="justify-self-start col-start-1">
      <x-atoms.button type='submit'>Save</x-atoms.button>
    </div>
</form>
  @push('scripts')
       <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
        let editor =null;
         ClassicEditor
        .create( document.querySelector( '#description' ) )
        .then(neditor => editor = neditor)
        .catch( error => {
            console.error( error );
        } );
        </script>
  @endpush
</x-app-layout>