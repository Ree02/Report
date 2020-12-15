<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Report;

class EditReport extends CreateReport
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
        //親クラスCreateReport の rules メソッドの属性名リストを取得
        $rule = parent::rules();

        $status_rule = Rule::in(array_keys(Report::STATUS));

        return $rule + [
            'status' => 'required|' . $status_rule //'status' => 'required|in(1, 2, 3)' と同じ意味
        ];
    }

    public function attributes()
    {
        //親クラスCreateReport の attributes メソッドの属性名リストを取得
        $attributes = parent::attributes();

        return $attributes + [
            'status' => '状態'
        ];
    }

    public function messages()
    {
        //親クラスcreateReport の messages メソッドの属性値を取得
        $messages = parent::messages();

        $status_labels = array_map(function($item) {
            return $item['label'];
        }, Report::STATUS);

        $status_labels = implode('、', $status_labels);

        return $messages + [
            'status.in' => ':attribute には ' . $status_labels. ' のいずれかを指定してください。',
        ];
    }

}
