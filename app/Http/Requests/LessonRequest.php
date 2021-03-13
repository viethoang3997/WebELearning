<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'image',
            'description' => 'required|max:900',
            'requirement' => 'required',
            // 'time' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được để trống',
            'image.image' => 'Đây phải là hình ảnh',
            'description.required' => 'Không được để trống, tối đa 900 ký tự',
            'requirement.required' => 'Không được để trống',
            //'time.required' => 'Không được để trống và phải là số'
        ];
    }
}
