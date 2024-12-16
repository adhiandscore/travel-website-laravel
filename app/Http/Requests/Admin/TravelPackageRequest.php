<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TravelPackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
{
    return [
        'type' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'destination' => 'required|string',
        'facility' => 'required|string', // atau bisa 'required|string' jika dalam bentuk string JSON
        'acomodation' => 'required|string', // sesuai dengan format yang diharapkan (JSON atau array)
        'consumption' => 'required|string',
        'souvenir' => 'nullable|string',
        'documentation' => 'nullable|string',
        'price' => 'required|numeric',
        'duration' => 'required|string',
        'seat_capacity' => 'required|string',
        'bonus' => 'nullable|string',
        'description' => 'nullable|string',
        'rating' => 'nullable|numeric',
    ];
}

}
