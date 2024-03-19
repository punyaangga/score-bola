<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterDataClubRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_clubs' => 'required|unique:master_data_clubs,name_clubs|min:3|max:255',
            'city_clubs' => 'required|unique:master_data_clubs,city_clubs|min:3|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'name_clubs.required' => 'Name Club is required',
            'name_clubs.unique' => 'Name Club already exists',
            'city_clubs.required' => 'City Club is required',
            'city_clubs.unique' => 'City Club already exists',
            'city_clubs.min' => 'City Club must be at least 3 characters',
            'city_clubs.max' => 'City Club may not be greater than 255 characters',
            'name_clubs.min' => 'Name Club must be at least 3 characters',
            'name_clubs.max' => 'Name Club may not be greater than 255 characters',
        ];
    }
}
