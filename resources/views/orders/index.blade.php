<x-app-layout>
  <div class="w-[90%] mx-auto mt-7">
      
        <form action="{{ route('admin.orders.index') }}" method="get" class="flex gap-3 my-3">
          <x-forms.input name='name' holder='product name' class="mt-0 flex-1" :value="request('name')"/>
          <x-forms.input type='number' name='price' holder='product price' class="mt-0 flex-1" :value="request('price')"/>
          {{-- <x-forms.select name="status" default='All' :options="$options" class="flex-1" :value="request('status')"/> --}}
          <x-atoms.button class="px-2 py-1 mx-0 my-0 bg-red-500 hover:bg-red-400" type='submit'>Filter</x-atoms.button>
        </form>
        <div class="scrollbar-thin scrollbar-thumb-yellow-700 scrollbar-track-yellow-100  overflow-y-auto relative shadow-md sm:rounded-lg">
          <table class="h-full w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="py-3 px-6">
                          Number
                        </th>
                        <th scope="col" class="py-3 px-6">
                            status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            payment methode
                        </th>
                        <th scope="col" class="py-3 px-6">
                            payment status
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
                @forelse ($orders as $order)
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-700 dark:hover:bg-gray-700">
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $order->number }}</td>
                        {{-- <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="{{ asset($product->image) }}" alt="" class="w-8 max-h-9">
                        </td> --}}
                        <td>
                          <select class="p-2 bg-slate-500 text-gray-100 rounded-md" id="order_status" data-id="{{ $order->id }}">
                            <option value="pending" @selected($order->status === 'pending')>pending</option>
                            <option value="processing" @selected($order->status === 'processing')>processing</option>
                            <option value="completed" @selected($order->status === 'completed')>completed</option>
                            <option value="canceled" @selected($order->status === 'canceled')>canceled</option>
                            <option value="refund" @selected($order->status === 'refund')>refund</option>
                          </select>
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $order->payment_method }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $order->payment_status }}</td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $order->created_at }}</td>
                        <td class="flex items-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="!bg-transparent text-green-700 border border-green-700 hover:!bg-green-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-1.5 py-1   text-center inline-flex items-center mr-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:focus:ring-green-800">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="!bg-transparent text-green-700 border border-green-700 hover:!bg-green-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-1.5 py-1   text-center inline-flex items-center mr-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:focus:ring-green-800">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <p class="text-xl text-center py-2 text-red-400">There is no product to show</p>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-2">
            {{ $orders->withQueryString()->links() }}
        </div>
    </div>
@vite(['resources/js/order.js',])
</x-app-layout>