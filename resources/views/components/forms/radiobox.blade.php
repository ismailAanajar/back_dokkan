@props(['options' => []])
{{-- {{ dd($options) }} --}}
@empty(!$options)
  @foreach ($options as $op)
    
    <div class="flex items-center mb-4">
      <input id="{{ $op['id'] }}" type="radio" name="{{ $op['name'] }}" value="{{ $op['value'] }}" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-yellow-700 dark:focus:ring-yellow-600 dark:focus:bg-yellow-600 dark:bg-gray-700 dark:border-gray-600" @checked(old($op['name'], $op['checked']) ===  $op['value'])>
      <label for="{{ $op['id'] }}" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
        {{ $op['label'] }}
      </label>
    </div>
    @endforeach
    {{ old('status') }}
  <x-atoms.validation_message :name="$options[0]['name']"/>
    
@endisset
