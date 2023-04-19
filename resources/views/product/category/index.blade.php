@extends('admin.layout.base')


@section('title')
    categories | admin
@endsection


@section('content')
<div x-data="data()" class="mt-4 w-full sm:w-10/12 mx-auto">
   <div class="flex justify-between items-center mb-2">
       <h4 class="text-xl before:content-[''] before:inline-block before:w-2 before:h-2 before:bg-primary before:mr-2 before:rounded-full font-medium">Category List</h4>
       <a href="{{ route('admin.product.category.create') }}"
            class="inline-block text-white bg-primary shadow-xl hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 "> + Create
            category
        </a>
   </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        active
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                <tr id="{{ $item->id }}"
                    class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                    <th scope="row" class="px-6 py-4 text-sm text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $item->name }}
                    </th>
                    <td scope="row" class="px-6 py[15px]4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <img class="max-w-[100px] max-h-[50px]" src="{{ $item->image }}" alt="">
                    </td>
                    <td class="px-6 py-4 ">
                        <button @click="activate({{ $item->id }});" x-init="isActive['{{ $item->name }}'] = {{ $item->active ? 1 : 0 }}" :class="isActive['{{ $item->name }}']  ? 'bg-primary' : 'bg-red-500'" class="text-white p-1  rounded-md">
                            <span x-text="isActive['{{ $item->name }}']  ? 'yes' : 'no'"></span>
                        </button>
                    </td>
                    <td class="px-6 py-4 w-fit flex items-center">
                        <button @click="modalIsOpen = !modalIsOpen; show('{{ $item->type }}', {{ $item->id }})"  class="bg-blue-700  p-1 rounded-sm">
                            <svg class="w-3 h-3  fill-white" version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" width="442.04px" height="442.04px" viewBox="0 0 442.04 442.04"
                                style="enable-background:new 0 0 442.04 442.04;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path
                                            d="M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203
                                                c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219
                                                c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367
                                                c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021
                                                c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212
                                                c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071
                                                c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z" />
                                    </g>
                                    <g>
                                        <path
                                            d="M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188
                                                c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993
                                                c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5
                                                s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z" />
                                    </g>
                                    <g>
                                        <path
                                            d="M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z" />
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                        </button>
                        <a href="{{ route('admin.product.category.edit',['id' => $item->id]) }}" class="inline-block bg-primary mx-1  p-1 rounded-sm">
                            <svg class="w-3 h-3 fill-white rounded-sm" version="1.1" id="Capa_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 59.985 59.985" style="enable-background:new 0 0 59.985 59.985;"
                                xml:space="preserve">
                                <g>
                                    <path d="M5.243,44.844L42.378,7.708l9.899,9.899L15.141,54.742L5.243,44.844z" />
                                    <path d="M56.521,13.364l1.414-1.414c1.322-1.322,2.05-3.079,2.05-4.949s-0.728-3.627-2.05-4.949S54.855,0,52.985,0
                                            s-3.627,0.729-4.95,2.051l-1.414,1.414L56.521,13.364z" />
                                    <path d="M4.099,46.527L0.051,58.669c-0.12,0.359-0.026,0.756,0.242,1.023c0.19,0.19,0.446,0.293,0.707,0.293
                                            c0.106,0,0.212-0.017,0.316-0.052l12.141-4.047L4.099,46.527z" />
                                    <path d="M43.793,6.294l1.415-1.415l9.899,9.899l-1.415,1.415L43.793,6.294z" />
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                        </a>
                        <button @click="if(confirm('sure you wan to delete this content')) remove({{ $item->id }});" class=" bg-red-600  p-1 rounded-sm">
                            <svg class="pointer-events-none w-3 h-3 fill-white rounded-sm" width="36px" height="36px" viewBox="0 0 36 36"
                                version="1.1" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>times-line</title>
                                <path class="clr-i-outline clr-i-outline-path-1"
                                    d="M19.41,18l8.29-8.29a1,1,0,0,0-1.41-1.41L18,16.59,9.71,8.29A1,1,0,0,0,8.29,9.71L16.59,18,8.29,26.29a1,1,0,1,0,1.41,1.41L18,19.41l8.29,8.29a1,1,0,0,0,1.41-1.41Z">
                                </path>
                                <rect x="0" y="0" width="36" height="36" fill-opacity="0" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div x-cloak x-show="modalIsOpen" class="fixed top-0 left-0 w-full h-screen bg-[rgba(0,0,0,.8)] z-[9999]">
        <div x-cloak x-show="modalIsOpen" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-2"
            @click.away="modalIsOpen = false"    
            class="absolute max-w-2xl  overflow-auto top-2/4 left-2/4 -translate-x-2/4 -translate-y-2/4 bg-white shadow-xl rounded-xl">
           <div @click="modalIsOpen = false" class="absolute top-0 right-0 px-1 border border-solid border-black rounded-tr-xl cursor-pointer">X</div>
           <div class="p-2 py-5">
               <div x-show="loading">
                   loading...
               </div>
               <div x-cloak x-show="!loading">
                <img :src="content?.image" alt="">
                <div x-show="content?.description" x-html="content?.description"></div>
                <div x-show="content?.content" x-html="content?.content"></div>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        const data = () => {
            return {
                isActive: {},
                modalIsOpen: false,
                content: null,
                loading: false,
                activate: function (id)  {
                    
                    axios.post('{{ route("admin.product.category.activate") }}', {
                        id
                    })
                    .then(res => {
                        
                        this.isActive[res.data.name] = res.data.activate;
                        console.log(res);
                        console.log(this.isActive);
                    })
                    .catch(err => {
                        console.log(err);
                    });
                }, 
                remove: function (id)  {
                    console.log({id });
                    
                    axios.post('{{ route("admin.product.category.delete") }}', {
                        id
                    })
                    .then(res => {
                        console.log(res);
                        console.log(document.getElementById(res.data.id));
                        document.getElementById(`${res.data.id}`).remove();
                    })
                    .catch(err => {
                        console.log(err);
                    });
                },
                show: function(type,id) {
                    this.loading =true;
                    axios.post('{{ route("admin.product.category.show") }}', {
                        type,
                        id
                    })
                    .then(res => {
                        console.log(res);
                        this.content = res.data.content;
                        this.loading = false;    
                    })
                    .catch(err => {
                        console.log(err);
                    });
                } 
            }
    }
    </script>
@endsection