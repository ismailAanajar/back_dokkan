<div
x-cloak
class="fixed top-0 left-0 w-full h-full bg-yellow-600/20 backdrop-blur-md z-40"
x-show="isModalOpen">
  <div
    x-cloak
    x-show="isModalOpen"
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0 transform translate-y-1/2"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0  transform translate-y-1/2"
    @click.away="closeModal"
    @keydown.escape="closeModal"
    class="max-h-screen absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 w-[90vw]"
    role="dialog"
    id="modal"
    >
<!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
<header x-cloak class="flex justify-end">
  <button
    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
    aria-label="close"
    @click="closeModal"
  >
    <svg
      class="w-4 h-4"
      fill="currentColor"
      viewBox="0 0 20 20"
      role="img"
      aria-hidden="true"
    >
      <path
        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
        clip-rule="evenodd"
        fill-rule="evenodd"
      ></path>
    </svg>
  </button>
</header>
<!-- Modal body -->
<div>
  {{ $slot }}
</div>
</div>
</div>