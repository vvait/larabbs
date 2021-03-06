<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
//        return [
//            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
//            'email' => 'required|email',
//            'introduction' => 'max:80',
//            'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
//        ];
//        return [
//            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name',
//            'password' => 'required|string|min:6',
//            'verification_key' => 'required|string',
//            'verification_code' => 'required|string',
//        ];
        switch($this->method()) {
            case 'POST':
                return [
                    'name' => 'between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name',
                    'password' => 'required|string|min:6',
                    'verification_key' => 'required|string',
                    'verification_code' => 'required|string',
                ];
                break;
            case 'PATCH':
                $userId = \Auth::guard('api')->id();
                return [
                    'name' => 'between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' .$userId,
                    'email' => 'email',
                    'introduction' => 'max:80',
                    'avatar_image_id' => 'exists:images,id,type,avatar,user_id,'.$userId,
                ];
                break;
        }
    }

    public function attributes()
    {
        return [
            'verification_key' => '短信验证码 key',
            'verification_code' => '短信验证码',
            'introduction' => '个人简介',
        ];
    }

    public function messages()
    {
//        return [
//            'avatar.dimensions' => '图片的清晰度不够，宽和高需要 200px 以上',
//            'name.unique' => '用户名已被占用，请重新填写',
//            'name.regex' => '用户名只支持中英文、数字、横杆和下划线。',
//            'name.between' => '用户名必须介于 3 - 25 个字符之间。',
//            'name.required' => '用户名不能为空。',
//        ];
//        return [
//            'verification_key' => '短信验证码 key',
//            'verification_code' => '短信验证码',
//        ];
        return [
            'name.unique' => '用户名已被占用，请重新填写',
            'name.regex' => '用户名只支持英文、数字、横杆和下划线。',
            'name.between' => '用户名必须介于 3 - 25 个字符之间。',
            'name.required' => '用户名不能为空。',
        ];
    }
}
