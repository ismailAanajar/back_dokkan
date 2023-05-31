<x-app-layout>
   <style>
    .ck-editor__editable_inline{
      height: 300px;
    }
  </style>
  <x-slot name="header">
    <div class="flex justify-between items-center bg-slate-700 p-3 px-[2.5%] my-5">
      <h1 class="font-bold text-blue-200 ">create Blog</h1>
      <a href="{{ route('admin.blog.index') }}" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Back</a>
     </div>
  </x-slot>
  <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data" class=" ">
    @csrf
  <div class="flex gap-3">
    <div class="w-full md:w-[47%] flex-grow ">
      <x-forms.input label="title" name="title" class="mb-2"/>
    </div>
    <div class="w-full md:w-[47%] flex-grow ">
    <x-forms.input label="slug" name="slug" class="mb-2"/>
    </div>
  </div>
  <div class="flex gap-3 my-3">
    <div class="w-full md:w-[47%] flex-grow ">
      <x-forms.textarea id='short_description' label="short description" name="short_description" />
    </div>
    <div class="w-full md:w-[47%] flex-grow ">
      <x-forms.input label="image" name="image" type="file" class="mb-2"/>
    </div>
  </div>
    <textarea name="blog" id="blog" class="w-full"  ></textarea>

    <div class="justify-self-start col-start-1">
      <x-atoms.button type='submit'>Save</x-atoms.button>
    </div>
</form>
  @push('scripts')
       <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
        CKEDITOR.replace( 'blog' )
        </script>
  @endpush
</x-app-layout>