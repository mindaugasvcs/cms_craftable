<?php
namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.product.edit', $this->product);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'brand_id' => ['sometimes', 'exists:brands,id'],
            'sku' => ['sometimes', 'string', 'min:6', 'max:10'],
            'name' => ['sometimes', 'string', 'min:5', 'max:255'],
            'msrp' => ['nullable', 'numeric'],
            'price' => ['sometimes', 'numeric'],
            'wholesale_price' => ['nullable', 'numeric'],
            'discount_available' => ['sometimes', 'boolean'],
            'discount' => ['nullable', 'numeric', 'max:100'],
            'enabled' => ['sometimes', 'boolean'],
            'available_date' => ['nullable', 'date'],
            'units_in_stock' => ['sometimes', 'numeric'],
            'units_on_order' => ['sometimes', 'numeric'],
            'minimal_quantity' => ['sometimes', 'numeric'],
            'width' => ['nullable', 'numeric'],
            'height' => ['nullable', 'numeric'],
            'depth' => ['nullable', 'numeric'],
            'weight' => ['nullable', 'numeric'],
            'description' => ['sometimes', 'string'],
            'images' => ['nullable', 'string'],
            'note' => ['nullable', 'string'],
            
        ];
    }
}
