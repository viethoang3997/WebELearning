<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'rating' => 'required',
            'content' => 'required|max: 500'
        ];
    }

    public function messages()
    {
        return [
            'rating.required' => 'Bạn chưa để lại đánh giá',
            'content.required' => 'Bạn chưa viết bình luận!',
            'content.max' => 'Bạn đã viết quá độ dài cho phép'
        ];
    }
}
