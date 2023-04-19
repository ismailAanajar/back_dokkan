@props(['label' => 'label', 'name' => 'name', 'type' => 'text', 'value' => '', 'holder' => "$label"])

<div>
  <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $label }}</label>
  <textarea
    id="{{ $name }}" 
    name="{{ $name }}" 
    placeholder="{{ $holder }}" 
    {{ $attributes->class([
      "bg-gray-500 col-start-1 col-end-3 border border-gray-300  border-solid text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",
      "border-red-500 dark:focus:border-red-500 focus:border-red-500 dark:border-red-600" => $errors->has($name)
    ]) }}  
  >{{ old($name, $value) }}</textarea>
</div>