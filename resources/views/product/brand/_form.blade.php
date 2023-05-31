@php
    $statusOptions = [
      [
        'id' => 'active',
        'label' => 'active',
        'name' => 'status',
        'value' => 'active',
        'checked' => $brand->status
      ],
      [
        'id' => 'archived',
        'label' => 'archived',
        'name' => 'status',
        'value' => 'archived',
        'checked' =>  $brand->status
      ] 
    ];

@endphp
<div>
  <x-forms.input label="brand name" name="name" value="{{ $brand->name }}"  />
</div>
{{-- <div>
  <x-forms.textarea label="description" name="description" value="{{ $brand->description }}"/>
</div> --}}
<div>
  <x-forms.input label='image' type='file' name='image' class="justify-self-start"/>
</div>

<div class="justify-self-start col-start-1">
  <x-forms.radiobox :options="$statusOptions" />
</div>
