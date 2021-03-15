<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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
            'name' => 'required|min: 5|max: 50',
            // kiem tra id cua nguoi dung xac thuc
            // 'email' => 'required|email|unique:users,email,'. Auth::user()->id . ',id',
            'birth_day' => 'date',
            'phone' => 'required|numeric',
            'address' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif'
        ];
    }
}
