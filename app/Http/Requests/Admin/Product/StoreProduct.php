<?php
namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.product.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'brand_id' => ['required', 'exists:brands,id'],
            'sku' => ['required', 'string', 'min:6', 'max:10'],
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'msrp' => ['nullable', 'numeric'],
            'price' => ['required', 'numeric'],
            'wholesale_price' => ['nullable', 'numeric'],
            'discount_available' => ['required', 'boolean'],
            'discount' => ['nullable', 'numeric', 'max:100'],
            'enabled' => ['required', 'boolean'],
            'available_date' => ['nullable', 'date'],
            'units_in_stock' => ['required', 'numeric'],
            'units_on_order' => ['required', 'numeric'],
            'minimal_quantity' => ['required', 'numeric'],
            'width' => ['nullable', 'numeric'],
            'height' => ['nullable', 'numeric'],
            'depth' => ['nullable', 'numeric'],
            'weight' => ['nullable', 'numeric'],
            'description' => ['required', 'string'],
            'images' => ['nullable', 'string'],
            'note' => ['nullable', 'string'],
            
        ];
    }
}
