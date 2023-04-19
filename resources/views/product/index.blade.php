
    @php
    $options = [
                [
                    'id' => 'active', 
                    'name' => 'avtive', 
                    'value' => 'active'
                ],
                [
                    'id' => 'draft', 
                    'name' => 'draft', 
                    'value' => 'draft'
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
    <h1 class="font-bold text-blue-200 ">Products</h1>
    {{-- <a href="{{ route('admin.categories.trash') }}" class="text-white  focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center border border-yellow-500  ml-auto mr-5 hover:bg-yellow-600">Trash</a> --}}
    <a href="{{ route('admin.products.create') }}" class="text-white  focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center border border-yellow-500 hover:bg-yellow-600">Create</a>
   </div>
  </x-slot>

    <div class="w-[90%] mx-auto mt-7">
      
        <form action="{{ route('admin.products.index') }}" method="get" class="flex gap-3 my-3">
          <x-forms.input name='name' holder='product name' class="mt-0 flex-1" :value="request('name')"/>
          <x-forms.input type='number' name='price' holder='product price' class="mt-0 flex-1" :value="request('price')"/>
          <x-forms.select name="status" default='All' :options="$options" class="flex-1" :value="request('status')"/>
          <x-atoms.button class="px-2 py-1 mx-0 my-0 bg-red-500 hover:bg-red-400" type='submit'>Filter</x-atoms.button>
        </form>
        <div class="scrollbar-thin scrollbar-thumb-yellow-700 scrollbar-track-yellow-100  overflow-y-auto relative shadow-md sm:rounded-lg">
          <table class="h-full w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
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
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($products as $product)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-700 dark:hover:bg-gray-700">
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->name }}</td>
                        {{-- <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="{{ asset($product->image) }}" alt="" class="w-8 max-h-9">
                        </td> --}}
                        <td>
                          {{ $product->category->name ?? '' }}
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->price }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->created_at }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $product->status }}</td>
                        <td class="flex items-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="!bg-transparent text-green-700 border border-green-700 hover:!bg-green-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-1.5 py-1   text-center inline-flex items-center mr-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:focus:ring-green-800">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.products.delete', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-atoms.button type='submit' class="!bg-transparent text-red-700 border border-red-700 hover:!bg-red-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-1.5 py-1 !m-0  text-center inline-flex items-center  dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </x-atoms.button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <p class="text-xl text-center py-2 text-red-400">There is no product to show</p>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-2">
            {{ $products->withQueryString()->links() }}
        </div>
    </div>


    @push('scripts')
        {{-- <script src="{{ asset('starRating/index.js') }}"></script>
        <script>
            let r = null;
        
            const data = () => {
                return  {
                    selectedProduct: [],
                    modalIsOpen: false,
                    content: null,
                    reviews: [],
                    loading: false,
                    lengthStar (val) {
                        return this.reviews.filter(({rating}) => rating === val).length;
                    },
                    userRating (container, holder, rating) {
                        var settings =[{
                                // initial rating value
                                "rating":`${rating}`,   
                                // max rating value
                                "maxRating":"5", 
                                // min rating value
                                "minRating":"0.5", 
                                // readonly mode?
                                "readOnly":"yes", 
                                // custom rating symbols here
                                "starImage":"{{ asset('starRating/star.png') }}", 
                                "emptyStarImage":"{{ asset('starRating/starbackground.png') }}", 
                                // symbol size
                                "starSize":"16", 
                                // step size for fractional rating
                                "step":"0.2"
                            }];
                            console.log({container, holder, rating});
                            rateSystem(container, settings, function(rating, ratingTargetElement){
                                console.log({rating});
                            ratingTargetElement.parentElement.parentElement.getElementsByClassName(holder)[0].innerHTML = rating;
                            });
                    },
                    remove ()  {
                        if(!confirm('Are you sure?')) return;
                        axios.post('{{ route("admin.product.delete") }}', {
                            ids: this.selectedProduct
                        })
                        .then(res => {
                            console.log(res);
                            res.data.ids.forEach(id => {
                                console.log(document.getElementById(id));
                                document.getElementById(`${id}`).remove();
                            })
                            this.selectedProduct = [];
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
                        });
                    },
                    show: function(id) {
                        console.log(id);
                        this.loading =true;
                            axios.get('{{ route("admin.product.show") }}', {
                            params: {
                                id
                            }
                        })
                        .then(res => {
                            console.log(res);
                            this.content = res.data.product;
                            this.reviews = res.data.reviews;
                            this.loading = false;    
                            var settings =[{
                                // initial rating value
                                "rating":`${this.content.average_rating}`,   
                                // max rating value
                                "maxRating":"5", 
                                // min rating value
                                "minRating":"0.5", 
                                // readonly mode?
                                "readOnly":"yes", 
                                // custom rating symbols here
                                "starImage":"{{ asset('starRating/star.png') }}", 
                                "emptyStarImage":"{{ asset('starRating/starbackground.png') }}", 
                                // symbol size
                                "starSize":"16", 
                                // step size for fractional rating
                                "step":"0.2"
                            }];
                            console.log(settings);
                            rateSystem("starRatingContainer", settings, function(rating, ratingTargetElement){
                                console.log({rating});
                            ratingTargetElement.parentElement.parentElement.getElementsByClassName("ratingHolder")[0].innerHTML = rating;
                            });
                        const fiveStar = this.lengthStar(5);
                        const fourStar = this.lengthStar(4);
                        const threeStar = this.lengthStar(3);
                        const towStar = this.lengthStar(2);
                        const oneStar = this.lengthStar(1);

                        document.querySelector('.star5').style.width = `${fiveStar * 100 / this.reviews.length}%`;
                            document.querySelector('.star4').style.width = `${fourStar * 100 / this.reviews.length}%`;
                            document.querySelector('.star3').style.width = `${threeStar * 100 / this.reviews.length}%`;
                            document.querySelector('.star2').style.width = `${towStar * 100 / this.reviews.length}%`;
                            document.querySelector('.star1').style.width = `${oneStar * 100 / this.reviews.length}%`;
                        })
                        .catch(err => {
                            console.log(err);
                        });
                    }, 
                    checkAll (e) {
                        const checkboxs = document.querySelectorAll('input[name=product]')
                        console.log(e );
                        checkboxs.forEach(checkbox => {
                            checkbox.checked = e.target.checked;
                            const id = this.selectedProduct.find(id => id ==checkbox.value);

                            if(id && checkbox.checked) return;
                            if (checkbox.checked) {
                                document.getElementById(`${checkbox.value}`).classList.add('bg-gray-50');
                                this.selectedProduct.push(checkbox.value);
                            }
                            else {
                                this.selectedProduct.forEach(id => {
                                    document.getElementById(`${id}`).classList.remove('bg-gray-50');
                                })
                                this.selectedProduct = []
                            }
                            // checkbox.checked ? this.selectedProduct.push(checkbox.value) : this.selectedProduct = [];
                        });
                    },
                    
                    changeHandler(e) {
                        console.log('hdfhh');
                        if (e.target.checked) {
                            this.selectedProduct.push(e.target.value)  
                            document.getElementById(`${e.target.value}`).classList.add('bg-gray-50');
                        }
                        else {
                            this.selectedProduct.splice(this.selectedProduct.indexOf(e.target.value), 1);
                            document.getElementById(`${e.target.value}`).classList.remove('bg-gray-50');
                        }
                        // e.target.checked ? this.selectedProduct.push(e.target.value) : this.selectedProduct.splice(this.selectedProduct.indexOf(e.target.value), 1);
                    },
                    allIds ()  {
                        console.log(document.querySelectorAll('input:checked'));
                        console.log(this.selectedProduct);
                    }
                }
            }
        </script> --}}
    @endpush
</x-app-layout>

