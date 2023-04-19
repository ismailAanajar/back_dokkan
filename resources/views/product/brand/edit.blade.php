@extends('admin.layout.base')



@section('title')
    update brand | admin
@endsection


@section('content')
<div x-data="updateBrand()" class="relative p-1">
    
    <form @submit.prevent="saveBrand" class="flex flex-wrap w-11/12 mt-14 mx-auto gap-5">
        <div class="flex-grow w-full sm:w-5/12">
            <label for="area_name" class="mb-2 text-sm font-medium text-gray-500">Brand name</label>
            <input type="text" name="name" value="{{ $brand->name }}" id="area_name" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-300" placeholder="area name">
        </div>    
        <div class="flex-grow w-full sm:w-5/12">
            <label for="area_style" class="mb-2 text-sm font-medium text-gray-500">description</label>
            <textarea name="style" id="area_style" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 placeholder-slate-300" placeholder='{"color": "#f00"}'>
              {{ $brand->description }}  
            </textarea>    
        </div>
        <div class="w-full sm:w-5/12">
            <label for="image" class="block mb-2 text-stone-500 text-sm">Image</label>
            <img class="max-w-[100%] h-auto max-h-56 p-1" :class="{' ring-2 ring-gray-300' : image}" :src="image" alt="">
            <input @change="fileChosen" x-ref="image" type="file" name="image" id="image" class="w-/12 bg-slate-100 hidden">
            <button class="bg-slate-300 py-2 px-4 my-2 rounded-md" type="button" @click="$refs.image.click() ">upload</button>
        </div>
        <div class="w-full">
            <button type="submit" class="inline-block text-white shadow-xl bg-primary hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                <span x-show="!loading">Create</span>
                <svg x-cloak x-show="loading" role="status" class="inline mr-2 w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>    
            </button>  
            <a href="{{ route('admin.product.brand.index') }}" type="submit" class="inline-block text-white bg-slate-900 hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                Back  
            </a>  
        </div>
    </form>
</div>


@endsection

@section('scripts')
    <script>
     const updateBrand = () => {
            return {
                loading: false,
                showMessage: false,
                message: '',
                image: '{{ $brand->image }}', 
                fileChosen(event) {
                    this.fileToDataUrl(event, src => this[event.target.name] = src)
                },

                fileToDataUrl(event, callback) {
                    console.log(event.target.name);
                    if (! event.target.files.length) return

                    let file = event.target.files[0],
                        reader = new FileReader()
                    this.photoToSend = file;
                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                },
                saveBrand (e) {
                    e.preventDefault();
                    this.loading = true;
                    const formData = new FormData(document.querySelector('form'));
                    formData.append('image', this.image);
                    formData.append('id', '{{ $brand->id }}');
                     axios.post('/admin/product/brand/update', formData)
                        .then(res => {
                            console.log(res);
                            this.loading = false;
                            Toastify({
                            text: res.data.message,
                            duration: 5000,
                            newWindow: true,
                            close: true,
                            className: " bg-gradient-to-r from-[#96c93d] to-primary min-w-[200px] flex justify-between",
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            offset: {
                                x: '0px', // offset right/left
                                    y: '0px',
                                },
                        }).showToast();
                        })
                        .catch(err => {
                            console.log(err);
                            this.loading = false;
                            Toastify({
                                text: err.message,
                                duration: 5000,
                                newWindow: true,
                                close: true,
                                className: " bg-gradient-to-r from-red-400 to-red-200 min-w-[200px] flex justify-between",
                                gravity: "top", // `top` or `bottom`
                                position: "center", // `left`, `center` or `right`
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                                offset: {
                                    y: '100px',
                                },
                            }).showToast();
                        })
                }
            }
        }
</script>
@endsection