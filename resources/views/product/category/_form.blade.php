@php
    $statusOptions = [
      [
        'id' => 'active',
        'label' => 'active',
        'name' => 'status',
        'value' => 'active',
        'checked' => $category->status
      ],
      [
        'id' => 'archived',
        'label' => 'archived',
        'name' => 'status',
        'value' => 'archived',
        'checked' =>  $category->status
      ] 
    ];

@endphp
<div>
  <x-forms.input label="Category name" name="name" value="{{ $category->name }}"  />
</div>
<div>
  <x-forms.input label="Category slug" name="slug" value="{{ $category->slug }}"/>
</div>
<div>
  <x-forms.textarea label="description" name="description" value="{{ $category->description }}"/>
</div>
<div>
  <x-forms.input label='image' type='file' name='image' class="justify-self-start"/>
</div>

<div class="justify-self-start col-start-1">
  <x-forms.radiobox :options="$statusOptions" />
</div>
