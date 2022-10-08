<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusRouteStoreRequest extends FormRequest
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
            'bus_id' => ['required', 'exists:buses,id'],
            'from' => ['required', 'exists:cities,id'],
            'to' => ['required', 'exists:cities,id'],
            'start_time' => ['required', 'date'],
            'end_time' => ['required', 'date'],
            'seat_cost' => ['required', 'numeric'],
        ];
    }
}
