<?php
namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateBrand extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.brand.edit', $this->brand);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'name' => ['sometimes', 'string', 'min:3', 'max:100', Rule::unique('brands', 'name')->ignore($this->brand->getKey(), $this->brand->getKeyName())],
            
        ];
    }
}
