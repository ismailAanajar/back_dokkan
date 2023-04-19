@props(['label',  'name' => 'select', 'default' => '', 'value' => '', 'options' => []])

  @isset($label)
    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
  @endisset
  <select name="{{ $name }}" 
          {{ $attributes->class([
            'w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',
            'border-red-500 dark:focus:border-red-500 focus:border-red-500 dark:border-red-600' => $errors->has($name)]
          )}}
  >
    <option value=""   >{{ $default }}</option>
    @foreach ($options as $opt)
        <option value="{{ $opt['id'] }}" @selected( old('parent_id', $value) == $opt['id'] )>{{ $opt['name'] }}</option>
    @endforeach
  </select>
