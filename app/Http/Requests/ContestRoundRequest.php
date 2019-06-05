<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContestRoundRequest extends FormRequest
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
            'title' => 'required',
            'quantity_questions' => 'numeric|required',
            'quantity_easys' => 'numeric|required',
            'quantity_normals' => 'numeric|required',
            'quantity_hards' => 'numeric|required',
            'quantity_correct' => 'numeric|required',
            'sequence' => 'required'
        ];
    }
}
