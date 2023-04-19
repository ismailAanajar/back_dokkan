<x-app-layout>
  <div x-data="{ openAddDesign: false,  }" >
    <div>
      <form x-cloak x-show="openAddDesign" action="{{ route('admin.app.design.add') }}" method="post" class=" m-5 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"> 
        @csrf
        <div class="mb-6">
            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">form name</label>
            <input type="text" name="property"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">form name</label>
            <input type="text" name="value"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Submit</button>
      </form>
     
    </div>
   <div class="flex">
     <button @click="openAddDesign = true" class="w-full focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">add design</button>
   </div>
  </div>
   <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-3">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="px-6 py-3">
                              property
                          </th>
                          <th scope="col" class="px-6 py-3">
                              value
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Action
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                     @foreach ($design as $item)
                       <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                          <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              {{ $item->property }}
                          </td>
                          <td class="px-6 py-4">
                              {{ $item->value }}
                          </td>
                          <td class="px-6 py-4 flex gap-1">
                              <a href="{{ route('admin.app.forms.input.edit', $item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="injected-svg" data-src="/assets/images/icons/edit.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5886 3.23702C19.2725 2.92099 18.7602 2.92099 18.4441 3.23702L17.7382 3.94295C16.8358 3.51187 15.7223 3.67005 14.9748 4.41748L6.39166 13.0007L10.9694 17.5783L19.5525 8.99517C20.2999 8.24774 20.4581 7.13419 20.027 6.2318L20.733 5.52586C21.049 5.20984 21.049 4.69746 20.733 4.38144L19.5886 3.23702ZM16.1348 10.1241L10.9694 15.2895L8.68051 13.0007L13.8459 7.83522L16.1348 10.1241ZM17.6062 8.65267L18.4081 7.85075C18.7241 7.53473 18.7241 7.02235 18.4081 6.70633L17.2637 5.5619C16.9476 5.24588 16.4353 5.24588 16.1193 5.5619L15.3173 6.36382L17.6062 8.65267Z" fill="#52ff80"></path>
                                <path d="M4 19.9535L5.71695 13.6589L10.2943 18.2369L4 19.9535Z" fill="#52ff80"></path>
                              </svg>
                              </a>
                              <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="injected-svg" data-src="/assets/images/icons/delete.svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.2222 4.83333V3.88889C16.2222 2.84568 15.3765 2 14.3333 2H8.66667C7.62346 2 6.77778 2.84568 6.77778 3.88889V4.83333H3.94444C3.42284 4.83333 3 5.25618 3 5.77778C3 6.29938 3.42284 6.72222 3.94444 6.72222H4.88889V17.1111C4.88889 18.6759 6.15742 19.9444 7.72222 19.9444H15.2778C16.8426 19.9444 18.1111 18.6759 18.1111 17.1111V6.72222H19.0556C19.5772 6.72222 20 6.29938 20 5.77778C20 5.25618 19.5772 4.83333 19.0556 4.83333H16.2222ZM14.3333 3.88889H8.66667V4.83333H14.3333V3.88889ZM16.2222 6.72222H6.77778V17.1111C6.77778 17.6327 7.20062 18.0556 7.72222 18.0556H15.2778C15.7994 18.0556 16.2222 17.6327 16.2222 17.1111V6.72222Z" fill="#ff2214"></path>
                                <path d="M8.66667 8.61111H10.5556V16.1667H8.66667V8.61111Z" fill="#ff2214"></path>
                                <path d="M12.4444 8.61111H14.3333V16.1667H12.4444V8.61111Z" fill="#ff2214"></path>
                                </svg>
                              </a>
                          </td>
                      </tr>
                     @endforeach
                  </tbody>
              </table>
          </div>
</x-app-layout>