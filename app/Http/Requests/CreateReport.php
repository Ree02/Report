<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReport extends FormRequest
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
            'title' => 'required|max:20',
            'detail' => 'max:100',
            'due_date' => 'required|date|after_or_equal:"now"',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'detail' => '詳細',
            'due_date' => '期限日',
        ];
    }

    public function messages()
    {
        return [
            'due_date.after_or_equal' => ':attributeには現在以降の日付を入力してください',
        ];
    }
}
