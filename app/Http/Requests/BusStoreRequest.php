<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function atributes(): array
    {
        return [
            'licence_plate' => 'Licence Plate',
            'brand' => 'Brand',
            'model' => 'Model',
            'company' => 'Company',
            'prod_year' => 'Production Year',
            'engine' => 'Engine',
            'engine_num' => 'Engine Number',
            'fuel' => 'Fuel',
            'chassis' => 'Chassis',
            'chassis_num' => 'Chassis Number',
            'capacity' => 'Capacity',
            'width' => 'Width',
            'height' => 'Height',
            'length_btw_axis' => 'Length between Axis',
            'weight' => 'Weight',
            'description' => 'Description',
            'body_work' => 'Body Work',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'licence_plate' => 'required|min:3|max:150',
            'brand' => 'required',
            'company' => 'required',
            'image' => ['image', 'file', 'mimes:jpeg,jpg', 'max:'.config('app.image_max_size_kb'), 'required_without:event_images'],
            'event_images' => 'array|required_without:image',
        ];
    }
}
