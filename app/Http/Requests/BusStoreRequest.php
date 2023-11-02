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
            'old_licence_plate' => 'Old Licence Plate',
            'brand_select' => 'Brand',
            'model' => 'Model',
            'bus_state' => 'State',
            'company_select' => 'Company',
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
            'old_licence_plate' => 'nullable|min:3|max:150',
            'brand_select' => 'required',
            'company_select' => 'required',
            'bus_state' => 'required',
            'model' => 'nullable|min:3|max:150',
            'prod_year' => 'required|date',
            'engine' => 'nullable|min:3|max:150',
            'engine_num' => 'nullable|min:3|max:150',
            'fuel' => 'nullable|min:3|max:150',
            'chassis' => 'nullable|min:3|max:150',
            'chassis_num' => 'nullable|min:3|max:150',
            'capacity' => 'nullable|min:3|max:150',
            'width' => 'nullable|min:3|max:150',
            'height' => 'nullable|min:3|max:150',
            'length_btw_axis' => 'nullable|min:3|max:150',
            'weight' => 'nullable|min:3|max:150',
            'description' => 'nullable|min:3|max:150',
            'body_work' => 'nullable|min:3|max:150',
//            'image' => ['image', 'file', 'mimes:jpeg,jpg', 'max:'.config('app.image_max_size_kb'), 'required_without:event_images'],
//            'event_images' => 'array|required_without:image',
        ];
    }
}
