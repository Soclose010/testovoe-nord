<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntryCreateRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            "username" => "required|alpha_num:ascii|max:255",
            "email" => "required|email|max:255",
            "body" => "required|string|not_regex:/<[^>]*>/",
            "captcha" => "required|captcha"
        ];
    }

    public function messages() : array 
    {
        return [
            "required" => "Поле обязательно для заполнения.",
            "email" => "Поле должно быть валидным адресом электронной почты.",
            "max" => "Поле должно быть не более :max символов.",
            "alpha_num" => "Поле должно содержать только символы латинского алфавита и цифры.",
            "captcha" => "Поле заполнено неверно.",
            "not_regex" => "Поле не должно содержать html тэги.",
        ];    
    }
}
