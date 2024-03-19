<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'id_clubs_1' => 'required|array',
            'id_clubs_1.*' => 'required',
            'club_scores_1' => 'required|array',
            'club_scores_1.*' => 'required',
            'id_clubs_2' => 'required|array',
            'id_clubs_2.*' => 'required',
            'club_scores_2' => 'required|array',
            'club_scores_2.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_clubs_1.required' => 'Club 1 is required',
            'id_clubs_1.*.required' => 'Club 1 is required',
            'club_scores_1.required' => 'Club 1 score is required',
            'club_scores_1.*.required' => 'Club 1 score is required',
            'id_clubs_2.required' => 'Club 2 is required',
            'id_clubs_2.*.required' => 'Club 2 is required',
            'club_scores_2.required' => 'Club 2 score is required',
            'club_scores_2.*.required' => 'Club 2 score is required',
        ];
    }

}
