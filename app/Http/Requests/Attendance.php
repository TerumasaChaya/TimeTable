<?php
namespace App\Http\Requests;

class Attendance extends Request
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

        $rules = [
            'pass' => 'required',
            'number' => 'required',
        ];

        return $rules;

    }

    public function messages()
    {
        return [
            'pass.required' => '【パスワード】は必須項目です！',
            'number.required' => '【学籍番号】は必須項目です！',
        ];
    }
}