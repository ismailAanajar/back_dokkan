@php
    $statusOptions = [
      [
        'id' => 'active',
        'label' => 'active',
        'name' => 'status',
        'value' => 'active',
        'checked' => $product->status
      ],
      [
        'id' => 'archived',
        'label' => 'archived',
        'name' => 'status',
        'value' => 'archived',
        'checked' =>  $product->status
      ] 
    ];

@endphp
<div>
  <x-forms.input label="Product name" name="name" value="{{ $product->name }}"  />
</div>
<div>
  <x-forms.input type="number" label="Product price" name="price" value="{{ $product->price }}"  />
</div>
<div>
  <x-forms.input label="product slug" name="slug" value="{{ $product->slug }}"/>
</div>
<div>
  <x-forms.textarea id='long_description' label="description" name="description" value="{{ $product->description }}"/>
</div>
<div>
  <x-forms.input label='image' type='file' name='image' class="justify-self-start"/>
</div>
<div>
  <x-forms.input label='images' type='file' multiple name='images[]' class="justify-self-start"/>
</div>
<div>
  <x-forms.select label='Select category' name='category_id' default='select' :options="$categories" :value="$product->category_id"/>
</div>
<div>
  <x-forms.select label='Select brand' name='brand_id' default='select' :options="$brands" :value="$product->brand_id"/>
</div>
<div class="justify-self-start col-start-1">
  <x-forms.radiobox :options="$statusOptions" />
</div>
