<x-app-layout>
 <div class="w-[95%] mx-auto mb-[20px] flex flex-wrap gap-6 mt-5">
    <div class="w-full sm:w-3/12 p-6  text-white bg-[#0694a2] flex-grow rounded-lg text-center">
        <svg class="text-[30px] mx-auto" stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1"
            viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M16 5l-8-4-8 4 8 4 8-4zM8 2.328l5.345 2.672-5.345 2.672-5.345-2.672 5.345-2.672zM14.398 7.199l1.602 0.801-8 4-8-4 1.602-0.801 6.398 3.199zM14.398 10.199l1.602 0.801-8 4-8-4 1.602-0.801 6.398 3.199z">
            </path>
        </svg>
        <p>Today order</p>
        <p class="font-medium text-2xl mt-2">{{ $mount_today }}$ <span class="text-xs">({{ $order_today }} item)</span>
        </p>
    </div>
    <div class="w-full sm:w-3/12 p-6  text-white bg-[#3f83f8] flex-grow rounded-lg text-center">
        <svg class="text-[30px] mx-auto" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
            stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
            <circle cx="9" cy="21" r="1"></circle>
            <circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
        <p>This month</p>
        <p class="font-medium text-2xl mt-2">{{ $mount_month}}$ <span class="text-xs">({{ $order_month }} item)</span>
        </p>
    </div>
    <div class="w-full sm:w-3/12 p-6 text-white bg-orange-500 flex-grow rounded-lg text-center">
        <svg class="text-[30px] mx-auto" stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1"
            viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M14.5 2h-13c-0.825 0-1.5 0.675-1.5 1.5v9c0 0.825 0.675 1.5 1.5 1.5h13c0.825 0 1.5-0.675 1.5-1.5v-9c0-0.825-0.675-1.5-1.5-1.5zM1.5 3h13c0.271 0 0.5 0.229 0.5 0.5v1.5h-14v-1.5c0-0.271 0.229-0.5 0.5-0.5zM14.5 13h-13c-0.271 0-0.5-0.229-0.5-0.5v-4.5h14v4.5c0 0.271-0.229 0.5-0.5 0.5zM2 10h1v2h-1zM4 10h1v2h-1zM6 10h1v2h-1z">
            </path>
        </svg>
        <p>Tota order</p>
        <p class="font-medium text-2xl mt-2">{{ $mount_year }}$ <span class="text-xs">({{ $order_year }} item)</span>
        </p>
    </div>
</div>
<div class="w-[95%] mx-auto mb-[20px] flex flex-wrap gap-3">
    <div class="w-full sm:w-5/12 lg:w-2/12 flex-grow flex bg-white border borsder-gray-50 rounded-lg  p-2">
        <div
            class="flex items-center justify-center p-3 rounded-full h-12 w-12 text-center mr-4 text-lg text-orange-600 dark:text-orange-100 bg-orange-200 dark:bg-orange-500">
            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
        </div>
        <div>
            <p class="whitespace-nowrap">Total order</p>
            <p class="font-medium text-xl">{{ $total_orders }}</p>
        </div>
    </div>
    <div class="w-full sm:w-5/12 lg:w-2/12 flex-grow flex bg-white border borsder-gray-50 rounded-lg  p-2">
        <div
            class="flex items-center justify-center p-3 rounded-full h-12 w-12 text-center mr-4 text-lg text-blue-600 dark:text-blue-100 bg-blue-200 dark:bg-blue-500">
            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <polyline points="23 4 23 10 17 10"></polyline>
                <polyline points="1 20 1 14 7 14"></polyline>
                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
            </svg>
        </div>
        <div>
            <p class="whitespace-nowrap">Order pending</p>
            <p class="font-medium text-xl">{{ $pending_orders }}</p>
        </div>
    </div>
    <div class="w-full sm:w-5/12 lg:w-2/12 flex-grow flex bg-white border borsder-gray-50 rounded-lg  p-2">
        <div
            class="flex items-center justify-center p-3 rounded-full h-12 w-12 text-center mr-4 text-lg text-teal-600 dark:text-teal-100 bg-teal-200 dark:bg-teal-500">
            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <rect x="1" y="3" width="15" height="13"></rect>
                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                <circle cx="18.5" cy="18.5" r="2.5"></circle>
            </svg>
        </div>
        <div>
            <p class="whitespace-nowrap">Order processing</p>
            <p class="font-medium text-xl">{{ $processing_orders }}</p>
        </div>
    </div>
    <div class="w-full sm:w-5/12 lg:w-2/12 flex-grow flex bg-white border borsder-gray-50 rounded-lg  p-2">
        <div
            class="flex items-center justify-center p-3 rounded-full h-12 w-12 text-center mr-4 text-lg text-green-600 dark:text-green-100 bg-green-200 dark:bg-green-500">
            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
        </div>
        <div>
            <p class="whitespace-nowrap">Order delivered</p>
            <p class="font-medium text-xl">{{ $completed_orders }}</p>
        </div>
    </div>
</div>
<div class="w-[95%] mx-auto flex flex-wrap flex-gap gap-5 pb-11">
    <div class="w-full sm:w-4/12 p-2 border-gray-800 shadow-xl rounded-xl overflow-hidden bg-white">
        <div class="p-2 flex items-center gap-1 mb-2">

            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px"
                viewBox="0 0 96.000000 96.000000" class="fill-primary" preserveAspectRatio="xMidYMid meet">
                <g transform="translate(0.000000,96.000000) scale(0.100000,-0.100000)" stroke="none">
                    <path d="M392 820 c-48 -30 -72 -75 -72 -140 0 -100 60 -160 160 -160 100 0
              160 60 160 160 0 65 -24 110 -72 140 -45 27 -131 27 -176 0z m138 -90 c43 -43
              11 -120 -50 -120 -38 0 -70 32 -70 70 0 38 32 70 70 70 17 0 39 -9 50 -20z" />
                        <path d="M335 386 c-74 -18 -146 -53 -182 -88 -31 -30 -33 -36 -33 -105 l0
              -73 360 0 360 0 0 69 c0 60 -3 74 -26 101 -33 39 -105 76 -186 95 -75 18 -224
              18 -293 1z m287 -96 c67 -20 128 -56 136 -77 3 -10 -57 -13 -278 -13 -302 0
              -309 1 -240 48 90 61 261 80 382 42z" />
                    </g>
            </svg>
            <span class="text-[18px] font-medium text-gray-700 ml-4">
                total customers {{ $total_users }}
            </span>
        </div>
        <div class="h-[200px]">
            <canvas id="myChart"></canvas>
        </div>
    </div>
     <div class="flex-grow w-full  sm:w-5/12 shadow-xl bg-white ">
        <span class="block text-[18px] font-medium text-gray-700 ml-4 p-2">
            Category's product
        </span>
        <div class=" h-[230px]">
            <canvas id="product_category" class="!h-full"></canvas>
        </div>
    </div>
     <div x-data="alpineData()" class="mt-4 w-full">
        <div class=" mb-2">
            <h4
                class="text-xl before:content-[''] before:inline-block before:w-2 before:h-2 before:bg-primary before:mr-2 before:rounded-full font-medium">
                Customers Information</h4>
        </div>

        <div

            class="relative scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-300 overflow-x-scroll shadow-md sm:rounded-lg mb-1">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer
                        </th>
                        <th scope="col" class="px-6 py-3">
                            register date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            mail
                        </th>
                        <th scope="col" class="px-6 py-3">
                            phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            country
                        </th>
                        <th scope="col" class="px-6 py-3">
                            orders
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $item)
                    <tr id="{{ $item->id }}"
                        class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                        <th scope="row" class="px-6 py-4 text-sm text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $item->id }}
                        </th>
                        <td scope="row"
                            >
                            <a class="flex items-center px-6 py[15px]4 font-medium text-gray-900 dark:text-white whitespace-nowrap" target="_blank" href="http://localhost:3000/externalLogin?id={{ $item->id }}&email={{ $item->email }}" >
                            <img class="mr-3 w-[40px] h-[40px] rounded-full" src="{{ $item->image_url }}" alt="">
                            <span>{{ $item->first_name }} {{ $item->last_name }}</span></a>
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $item->created_at->format('d-m-Y') }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $item->email }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $item->phone }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $item->country }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $item->orders->count() }}
                        </td>
                        <td class="px-6 py-4 w-fit flex items-center gap-2">
                            <button @click="modalIsOpen = !modalIsOpen; show({{ $item->id }})">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="15px" height="15px"
                                    viewBox="0 0 64.000000 64.000000" preserveAspectRatio="xMidYMid meet">

                                    <g transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)" fill="#009"
                                        stroke="none">
                                        <path d="M304 587 c-11 -29 0 -92 16 -92 11 0 15 12 15 49 0 49 -19 74 -31 43z" />
                                        <path d="M436 557 c-9 -13 -19 -38 -22 -56 -10 -50 15 -36 37 22 20 50 10 73
                                        -15 34z" />
                                        <path d="M180 556 c0 -23 30 -86 40 -86 14 0 12 25 -4 65 -15 35 -36 47 -36
                                        21z" />
                                        <path d="M80 468 c0 -15 39 -42 48 -33 9 9 -13 40 -32 43 -9 2 -16 -3 -16 -10z" />
                                        <path d="M516 461 c-12 -13 -14 -21 -6 -26 11 -7 50 21 50 37 0 15 -27 8 -44
                                        -11z" />
                                        <path d="M233 426 c-23 -7 -57 -23 -76 -35 -42 -25 -123 -111 -139 -146 -17
                                        -37 1 -45 26 -10 73 104 186 175 276 175 90 0 203 -71 276 -175 29 -40 43 -24
                                        19 20 -26 50 -117 133 -172 157 -58 26 -154 32 -210 14z" />
                                        <path d="M272 300 c-30 -28 -30 -82 0 -110 47 -43 118 -10 118 55 0 41 -32 75
                                        -70 75 -14 0 -36 -9 -48 -20z" />
                                        <path d="M86 231 c-10 -16 28 -74 79 -119 97 -85 228 -81 323 11 45 44 77 96
                                        65 108 -6 6 -26 -12 -55 -49 -75 -97 -172 -126 -265 -81 -39 19 -63 42 -121
                                        118 -13 17 -21 21 -26 12z" />
                                    </g>
                                </svg>
                            </button>
                            <button class=" py-1  hover:bg-gray-50">
                                <svg fill="#D00" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="15px"
                                    height="15px">
                                    <path
                                        d="M 20.5 4 A 1.50015 1.50015 0 0 0 19.066406 6 L 14.640625 6 C 12.803372 6 11.082924 6.9194511 10.064453 8.4492188 L 7.6972656 12 L 7.5 12 A 1.50015 1.50015 0 1 0 7.5 15 L 8.2636719 15 A 1.50015 1.50015 0 0 0 8.6523438 15.007812 L 11.125 38.085938 C 11.423352 40.868277 13.795836 43 16.59375 43 L 31.404297 43 C 34.202211 43 36.574695 40.868277 36.873047 38.085938 L 39.347656 15.007812 A 1.50015 1.50015 0 0 0 39.728516 15 L 40.5 15 A 1.50015 1.50015 0 1 0 40.5 12 L 40.302734 12 L 37.935547 8.4492188 C 36.916254 6.9202798 35.196001 6 33.359375 6 L 28.933594 6 A 1.50015 1.50015 0 0 0 27.5 4 L 20.5 4 z M 14.640625 9 L 33.359375 9 C 34.196749 9 34.974746 9.4162203 35.439453 10.113281 L 36.697266 12 L 11.302734 12 L 12.560547 10.113281 A 1.50015 1.50015 0 0 0 12.5625 10.111328 C 13.025982 9.4151428 13.801878 9 14.640625 9 z M 11.669922 15 L 36.330078 15 L 33.890625 37.765625 C 33.752977 39.049286 32.694383 40 31.404297 40 L 16.59375 40 C 15.303664 40 14.247023 39.049286 14.109375 37.765625 L 11.669922 15 z" />
                                    </svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $customers->links('pagination::tailwind') }}
       
        <div class="flex flex-wrap flex-gap gap-5 mt-6">
            <div class="w-full sm:w-4/12 p-2 shadow-xl rounded-xl overflow-hidden bg-white">
                <span class="block text-[18px] font-medium text-gray-700 ml-4 p-2">
                    orders status
                </span>
                <div class="h-[200px]">
                    <canvas id="orders"></canvas>
                </div>
            </div>
           <div class="w-full flex-grow sm:w-5/12 p-2 shadow-xl rounded-xl  bg-white">
            <span class="block text-[18px] font-medium text-gray-700 ml-4 p-2">
                year converions
            </span>
                <div class="h-[200px]">
                    <canvas id="year_conversions"></canvas>
                </div>
           </div>
        </div>

           <div x-cloak x-show="modalIsOpen" class="fixed top-0 left-0 w-full h-screen bg-[rgba(0,0,0,.8)] z-[9999]">
              <div x-cloak x-show="modalIsOpen" x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                  x-transition:leave="transition ease-in duration-300"
                  x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2"
                  @click.away="closeModal()"
                  class="absolute scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-300 overflow-x-scroll max-w-[95%] w-[90%]  overflow-auto top-2/4 left-2/4 bottom-0 h-[95vh] -translate-x-2/4 -translate-y-2/4 bg-gray-50 shadow-xl rounded-xl">
                  <div @click="closeModal()"
                      class="absolute top-0 right-0 px-1 border border-solid border-black rounded-tr-xl cursor-pointer">X
                  </div>
                  <div class="p-2 py-5">
                      <div x-show="loading">
                          loading...
                      </div>
                      <div x-cloak x-show="!loading && content">
                          <h2 class="text-xl font-medium pb-2 border-b border-gray-300 border-solid">Customer Detail</h2>
                          <div class="w-full sm:w-6/12 mt-3 flex gap-2 bg-white border border-gray-300 border-solid p-3">
                              <P class="w-5/12 flex-grow">User Points:</P>
                              <p x-text="content?.orders_total" class="w-5/12 flex-grow font-medium text-xl"></p>
                          </div>
                          <div class="flex flex-wrap gap-3 mt-2">
                              <div class="w-full sm:w-5/12 flex-grow bg-white border border-gray-300 border-solid p-3">
                                  <h3 class="font-medium">Delivery Address</h3>
                                  <div class="flex gap-2">
                                      <p class="w-5/12 flex-grow">Block Number:</p>
                                      <p class="w-5/12 flex-grow"><strong>A-1215</strong></p>
                                  </div>
                                  <div class="flex gap-2">
                                      <p class="w-5/12 flex-grow">Address:</p>
                                      <p class="w-5/12 flex-grow"><strong>81 Fulton Morocco</strong></p>
                                  </div>
                                  <div class="flex gap-2">
                                      <p class="w-5/12 flex-grow">Pincode:</p>
                                      <p class="w-5/12 flex-grow"><strong>125468</strong></p>
                                  </div>
                                  <div class="flex gap-2">
                                      <p class="w-5/12 flex-grow">Phone:</p>
                                      <p class="w-5/12 flex-grow"><strong>125468145</strong></p>
                                  </div>
                              </div>
                              <div class="w-full sm:w-5/12 flex-grow bg-white border border-gray-300 border-solid p-3">
                                  <h3 class="font-medium">Billing Address</h3>
                                  <div class="flex gap-2">
                                      <p class="w-5/12 flex-grow">Block Number:</p>
                                      <p class="w-5/12 flex-grow"><strong>A-1215</strong></p>
                                  </div>
                                  <div class="flex gap-2">
                                      <p class="w-5/12 flex-grow">Address:</p>
                                      <p class="w-5/12 flex-grow"><strong>81 Fulton Morocco</strong></p>
                                  </div>
                                  <div class="flex gap-2">
                                      <p class="w-5/12 flex-grow">Pincode:</p>
                                      <p class="w-5/12 flex-grow"><strong>125468</strong></p>
                                  </div>
                                  <div class="flex gap-2">
                                      <p class="w-5/12 flex-grow">Phone:</p>
                                      <p class="w-5/12 flex-grow"><strong>125468145</strong></p>
                                  </div>
                              </div>

                          </div>
                          <div
                              class="relative scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-300 overflow-x-scroll bg-white border border-gray-300 border-solid p-3 mt-2">
                              <h3 class="font-medium mb-3">Customer Orders</h3>
                              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                  <thead
                                      class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                      <tr>
                                          <th scope="col" class="px-6 py-3">
                                              ID
                                          </th>
                                          <th scope="col" class="px-6 py-3">
                                              status
                                          </th>
                                          <th scope="col" class="px-6 py-3">
                                              order date
                                          </th>
                                          <th scope="col" class="px-6 py-3">
                                              quantity
                                          </th>
                                          <th scope="col" class="px-6 py-3">
                                              total
                                          </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <template x-for="(order, index) in content?.user.orders">
                                          <tr :id="order.id"
                                              class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                              <th x-text="order.number" scope="row"
                                                  class="px-6 py-4 text-sm text-gray-900 dark:text-white whitespace-nowrap">

                                              </th>
                                              <td scope="row"
                                                  class="flex items-center px-6 py[15px] font-medium text-gray-900 dark:text-white whitespace-nowrap" x-text=" order.status  ">
                                                                                             </td>
                                              <td x-text="new Intl.DateTimeFormat('en-US').format(new Date(order.created_at))"
                                                  class="px-6 py-4 ">
                                              </td>
                                              <td x-text="order.quantity" class="px-6 py-4 ">
                                              </td>
                                              <td x-text="order.total" class="px-6 py-4 ">
                                              </td>
                                          </tr>
                                      </template>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      <div x-show="!loading && orderContent">
                        <h2 x-text="'Order detail: Order-' + orderContent?.order.order_number " class="text-2xl font-medium"></h2>
                        <div class="flex flex-wrap gap-3 mt-5">
                          <div class="w-full sm:w-5/12 lg:w-2/12 flex-grow flex items-center gap-3 p-5 bg-[#a5d9bf] rounded-md">
                            <div class="w-[40px] h-[40px] flex items-center justify-center text-white bg-primary rounded-sm">
                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                  class="w-[20px] h-[20px] fill-white"
                                  width="20px" height="20px" viewBox="0 0 331.099 331.1" style="enable-background:new 0 0 331.099 331.1;"
                                          xml:space="preserve">
                                  <g>
                                      <g>
                                          <path d="M139.396,267.518c-15.261,0-27.67,12.411-27.67,27.67c0,15.265,12.409,27.67,27.67,27.67
                                              c15.252,0,27.67-12.405,27.67-27.67C167.066,279.929,154.647,267.518,139.396,267.518z"/>
                                          <path d="M262.986,267.518c-15.252,0-27.67,12.411-27.67,27.67c0,15.265,12.418,27.67,27.67,27.67
                                              c15.259,0,27.671-12.405,27.671-27.67C290.657,279.929,278.25,267.518,262.986,267.518z"/>
                                          <path d="M298.054,94.805l-0.606-0.123l-33.603,0.192c-2.606-0.24-5.819-0.204-7.345,0.012l-49.671,0.24l-49.135-0.21
                                              c-2.693-0.276-5.993-0.252-7.358-0.066l-34.194-0.168l-0.604,0.123c-12.586,2.492-22.677,10.541-28.259,21.08L63.39,13.001
                                              c-0.646-2.786-3.134-4.759-5.996-4.759H6.149C2.756,8.242,0,10.996,0,14.392c0,3.398,2.756,6.148,6.149,6.148h46.357
                                              l44.351,190.994c0,0.03,0.027,0.055,0.039,0.091c3.387,16.519,16.27,29.104,32.858,32.096c0.732,0.198,1.471,0.39,2.228,0.546
                                              l0.619,0.133l3.918-0.024l-0.036-6.149l0.817,6.149l69.463-0.349l69.529,0.349l0.024-6.149l0.757,6.149l3.915,0.024l0.624-0.133
                                              c0.757-0.156,1.489-0.348,2.156-0.553c16.753-2.996,29.705-15.708,33.008-32.365l13.535-68.329
                                              C334.708,120.826,320.236,99.203,298.054,94.805z"/>
                                      </g>
                                  </g>
                        
                              </svg>
                            </div>
                            <div>
                              <p class="font-medium">Order created at</p>
                              <p x-text="orderContent?.order?.time"></p>
                            </div>
                          </div>
                          <div class="w-full sm:w-5/12 lg:w-2/12 flex-grow flex items-center gap-3 p-5 bg-red-100 rounded-md">
                            <div class="w-[40px] h-[40px] flex items-center justify-center text-white bg-red-400 rounded-sm">
                              <svg class="w-[20px] h-[20px] fill-white" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 110.44"><title>user</title><path d="M46.07,68.62a19.25,19.25,0,0,1-1.63-2c-1.2-1.65-2.33-3.37-3.42-5.1L35.6,52.89c-2.06-3-3.14-5.74-3.14-7.91s1.23-5,3.68-5.63a149.33,149.33,0,0,1-.21-15.61,19.7,19.7,0,0,1,.65-3.58,20.63,20.63,0,0,1,9.21-11.7,23.65,23.65,0,0,1,5-2.39c3.15-1.19,1.63-6,5.1-6.07C64-.21,77.33,6.73,82.53,12.36a20.56,20.56,0,0,1,5.31,13.33l-.33,14.2a4,4,0,0,1,2.93,2.92c.43,1.74,0,4.12-1.52,7.48h0c0,.11-.11.11-.11.22L82.63,60.7c-1.4,2.3-2.85,4.65-4.48,6.81-1.93,2.58-3.52,2.12-1.87,4.59,11.83,16.26,46.6,6,46.6,38.34H0C0,78.08,34.78,88.36,46.6,72.1c1.36-2,1-1.85-.53-3.48Z"/></svg>
                            </div>
                            <div>
                              <p class="font-medium">Name</p>
                              <p x-text="orderContent?.user?.first_name"></p>
                            </div>
                          </div>
                          <div class="w-full sm:w-5/12 lg:w-2/12 flex-grow flex items-center gap-3 p-5 bg-[#fdecb8] rounded-md">
                            <div class="w-[40px] h-[40px] flex items-center justify-center text-white bg-[#ffc107] rounded-sm">
                              <?xml version="1.0" encoding="utf-8"?><svg class="w-[20px] h-[20px] fill-white" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.88px" height="78.607px" viewBox="0 0 122.88 78.607" enable-background="new 0 0 122.88 78.607" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M61.058,65.992l24.224-24.221l36.837,36.836H73.673h-25.23H0l36.836-36.836 L61.058,65.992L61.058,65.992z M1.401,0l59.656,59.654L120.714,0H1.401L1.401,0z M0,69.673l31.625-31.628L0,6.42V69.673L0,69.673z M122.88,72.698L88.227,38.045L122.88,3.393V72.698L122.88,72.698z"/></g></svg>
                            </div>
                            <div>
                              <p class="font-medium">Email</p>
                              <p x-text="orderContent?.user?.email"></p>
                            </div>
                          </div>
                          <div class="w-full sm:w-5/12 lg:w-2/12 flex-grow flex items-center gap-3 p-5 bg-blue-100 rounded-md">
                            <div class="w-[40px] h-[40px] flex items-center justify-center text-white bg-blue-400 rounded-sm">
                              <svg class="w-[20px] h-[20px] fill-white"  id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 112.92"><title>headset</title><path d="M15.31,87.55a20.54,20.54,0,0,0,1.23,4.65,12.43,12.43,0,0,0,2.75,4.26c3.88,3.85,8.92,3.84,14.44,3.84v0h2.62c2.27-3.27,7.6-5.56,13.8-5.56,8.27,0,15,4.07,15,9.1s-6.71,9.1-15,9.1c-6.07,0-11.3-2.2-13.65-5.36H33.73c-7.08,0-13.55,0-19.55-5.94A19.78,19.78,0,0,1,9.8,94.93,28.6,28.6,0,0,1,8,87.55a8.2,8.2,0,0,1-8-8.18V49.87a8.2,8.2,0,0,1,8.18-8.18h.58c1.48-15.15,11-27,23.87-34.09A61.85,61.85,0,0,1,57.37.2,58.06,58.06,0,0,1,83.32,3.87c14.45,5.71,26.56,17.84,31.25,37.82h.13a8.2,8.2,0,0,1,8.18,8.18v29.5a8.2,8.2,0,0,1-8.18,8.18h-8.18V42.41C102.33,26,92.29,16,80.38,11.32A50,50,0,0,0,58,8.18a53.66,53.66,0,0,0-21.49,6.39C25.37,20.75,17.24,31,16.58,44.05a4,4,0,0,1-.22,1.15V87.55Z"/></svg>
                            </div>
                            <div>
                              <p class="font-medium">Phone</p>
                              <p x-text="orderContent?.user?.phone"></p>
                            </div>
                          </div>
                        </div>
                        <div class="flex flex-wrap gap-3 mt-5">
                          <div class="w-full sm:w-5/12 md:w-3/12 flex-grow bg-white border border-gray-300 border-solid p-3">
                              <h3 class="font-medium text-xl mb-3">Delivery Address</h3>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow">Block Number:</p>
                                  <p class="w-5/12 flex-grow"><strong>A-1215</strong></p>
                              </div>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow">Address:</p>
                                  <p class="w-5/12 flex-grow"><strong>81 Fulton Morocco</strong></p>
                              </div>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow">Pincode:</p>
                                  <p class="w-5/12 flex-grow"><strong>125468</strong></p>
                              </div>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow">Phone:</p>
                                  <p class="w-5/12 flex-grow"><strong>125468145</strong></p>
                              </div>
                          </div>
                          <div class="w-full sm:w-5/12 md:w-3/12 flex-grow bg-white border border-gray-300 border-solid p-3">
                              <h3 class="font-medium text-xl mb-3">Billing Address</h3>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow whitespace-nowrap">Block Number:</p>
                                  <p class="w-5/12 flex-grow"><strong>A-1215</strong></p>
                              </div>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow">Address:</p>
                                  <p class="w-5/12 flex-grow"><strong>81 Fulton Morocco</strong></p>
                              </div>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow">Pincode:</p>
                                  <p class="w-5/12 flex-grow"><strong>125468</strong></p>
                              </div>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow">Phone:</p>
                                  <p class="w-5/12 flex-grow"><strong>125468145</strong></p>
                              </div>
                          </div>
                          <div class="w-full sm:w-5/12 md:w-3/12 flex-grow bg-white border border-gray-300 border-solid p-3">
                              <h3 class="font-medium text-xl mb-3">Invoice detial</h3>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow whitespace-nowrap">Transection id:</p>
                                  <p class="w-5/12 flex-grow"><strong x-text="orderContent?.order.order_number"></strong></p>
                              </div>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow whitespace-nowrap">From Address:</p>
                                  <p class="w-5/12 flex-grow"><strong>111 city morocco</strong></p>
                              </div>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow">Emsil</p>
                                  <p class="w-5/12 flex-grow"><strong>ismailanajar@gmail.com</strong></p>
                              </div>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow">Phone:</p>
                                  <p class="w-5/12 flex-grow"><strong>125468145</strong></p>
                              </div>
                          </div>
                        </div>
                        <div class="flex flex-wrap gap-3 mt-5">
                          <div class="w-full md:w-7/12 flex-grow">
                          <div
                              class="relative scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-300 overflow-x-scroll bg-white border border-gray-300 border-solid p-3 ">
                              <h3 class="font-medium mb-3">Order summary</h3>
                              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                  <thead
                                      class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                      <tr>
                                          <th scope="col" class="px-6 py-3">
                                              image
                                          </th>
                                          <th scope="col" class="px-6 py-3">
                                              name
                                          </th>
                                          <th scope="col" class="px-6 py-3">
                                              quantity
                                          </th>
                                          <th scope="col" class="px-6 py-3">
                                              points
                                          </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <template x-for="(order, index) in orderContent?.orders">
                                          <tr :id="order.id"
                                              class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                              <th scope="row"
                                                  class="px-6 py-4 text-sm text-gray-900 dark:text-white whitespace-nowrap">
                                                  <img class="w-[50px] max-h-[60px] rounded-md" :src="order.product.image" alt="">
                                              </th>
                                              <td scope="row"
                                                  class="flex items-center px-6 py-[20px] font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                  <span x-text="order.product.title.substring(1,30)"></span>
                                              </td>
                                              <td x-text="order.quantity"
                                                  class="px-6 py-4 ">
                                              </td>
                                              <td x-text="order.total" class="px-6 py-4 ">
                                              </td>
                                          </tr>
                                      </template>
                                  </tbody>
                              </table>
                          </div>
                          </div>
                          <div class="w-full md:w-3/12 flex-grow bg-white border border-gray-300 border-solid p-3">
                              <h3 class="font-medium mb-3">Status order</h3>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow">Order id:</p>
                                  <p class="w-5/12 flex-grow"><strong x-text="orderContent?.order.order_number"></strong></p>
                              </div>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow">Order status:</p>
                                  <p class="w-5/12 flex-grow"><strong x-text="orderContent?.order.status"></strong></p>
                              </div>
                              <div class="flex gap-2">
                                  <p class="w-5/12 flex-grow">Quantity:</p>
                                  <p class="w-5/12 flex-grow"><strong x-text="orderContent?.order_quantity"></strong></p>
                              </div>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div> 
    </div>
</div>
@push('scripts')
    <script>
       const alpineData = () => {
        return {
            isActive: {},
            modalIsOpen: false,
            content: null,
            orderContent: null,
            loading: false,
            closeModal () {
              this.modalIsOpen = false; 
              this.content = null; 
              this.dorderContent= null
            },
             order: function (id) {
                console.log({
                    id
                });
                this.loading = true;
                axios.post('{{ route("admin.orders.dashboard.show") }}', {
                        id
                    })
                    .then(res => {
                        this.loading = false;
                        this.orderContent = res.data;
                        this.modalIsOpen = true;
                      console.log(res);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },
            remove: function (id) {
                console.log({
                    id
                });

                axios.post('{{ route("admin.products.category.delete") }}', {
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
            show: function (id) {
                this.loading = true;
                axios.post('{{ route("admin.users.show") }}', {
                        id
                    })
                    .then(res => {
                        console.log(res);
                        this.content = res.data;
                        this.loading = false;
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
            
        }
    }
       const usersData = {
        labels: [
            'Verified',
            'Unverified',
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [{{$verified_users}}, {{$unverified_users}}],
            backgroundColor: [
                '#00ab55',
                'rgb(200, 42, 83)',
            ],
            hoverOffset: 4,
            borderWidth: 0,
            options: {
                response: true,
                maintainAspectRatio: false,
            }
        }]
    };
    const config = {
        type: 'pie',
        data: usersData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
     const productdata = {
        labels: {!!$categories!!},
        datasets: [{
            label: 'product in category',
            data: {!!$products_on_category!!},
            backgroundColor: [
                'rgba(75, 192, 192)',
            ]
        }]
    };
    const productConfig = {
        type: 'bar',
        data: productdata,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        },
    };
    const prpductChart = new Chart(
        document.getElementById('product_category'),
        productConfig
    );

     const ordersData = {
        labels: ['Pending', 'Processing', 'Completed', 'Cancelled'],
        datasets: [{
            label: 'order status',
            data: [{{ $pending_orders }}, {{ $processing_orders }}, {{  $completed_orders }}, 0],
            backgroundColor: [
                'rgba(75, 192, 192)',
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',

            ]
        }]
    };
    const orderConfig = {
        type: 'doughnut',
        data: ordersData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        },
    };
    const orderChart = new Chart(
        document.getElementById('orders'),
        orderConfig
    );


     const orders = @json($orders);

            const labels = orders.map(item => item.month + '/' + item.year);
            const values = orders.map(item => item.count);
     const conversionsData = {
        labels: labels,
        datasets:[{
                        label: 'Orders by Month',
                        data: values,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
    };
    const conversionsConfig = {
        type: 'bar',
        data: conversionsData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        },
    };
    const conversionsChart = new Chart(
        document.getElementById('year_conversions'),
        conversionsConfig
    );
    </script>
@endpush
</x-app-layout>