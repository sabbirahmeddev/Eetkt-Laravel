<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'car_brand_id' => ['required', 'exists:car_brands,id'],
            'number' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'max:1024'],
            'video' => ['required', 'max:255', 'string'],
            'car_driver_id' => ['required', 'exists:car_drivers,id'],
            'seat_count' => ['required', 'numeric'],
            'cost' => ['required', 'numeric'],
        ];
    }
}
