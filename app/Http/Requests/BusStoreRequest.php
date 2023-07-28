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
        return false;
    }

    public function atributes(): array
    {
        return [
            'licence_plate' => 'Licence Plate',
            'brand' => 'bus description',
            'company' => 'bus description',
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
            'event_name' => 'required|min:3|max:150',
            'image' => ['image', 'file', 'mimes:jpeg,jpg', 'max:'.config('app.image_max_size_kb'), 'required_without:event_images'],
            'event_images' => 'array|required_without:image',
        ];
    }
}
