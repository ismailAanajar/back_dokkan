@props(['type' => 'button', 'label' => 'Click me'])

<button
  type="{{ $type }}"
  {{ 
    $attributes->class([
      ' focus:outline-none text-white bg-yellow-700 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:focus:ring-yellow-900'
    ])
  }}
>
  {{ $slot }}
</button>