<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskEditRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'endDate' => ['required', 'date', 'max:255'],
            'priority' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'responsible_user' => ['required', 'string', 'max:255'],
            'creator_user' => ['required', 'string', 'max:255'],
        ];
    }
}
