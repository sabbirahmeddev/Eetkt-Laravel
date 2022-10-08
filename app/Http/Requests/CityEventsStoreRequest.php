<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityEventsStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'description' => ['required', 'max:255', 'string'],
            'event_type_id' => ['required', 'exists:event_types,id'],
            'city_id' => ['required', 'exists:cities,id'],
        ];
    }
}
