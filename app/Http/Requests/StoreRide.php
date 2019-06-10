<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRide extends FormRequest
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
            'transport_id' => 'required',
            'venue_start_id' => 'required',
            'venue_destination_id' => 'required',
            'date' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'transport_id',
            'venue_start_id',
            'venue_destination_id',
            'date',
        ];
    }
}
