<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SortEntriesRequest extends FormRequest
{
    protected $redirect = "/";

    public function rules(): array
    {
        return [
            "username" =>["sometimes", Rule::in(["no", "asc", "desc"])],
            "email" =>["sometimes", Rule::in(["no", "asc", "desc"])],
            "created_at" =>["sometimes", Rule::in(["no", "asc", "desc"])],
        ];
    }

    public function messages(): array
    {
        return [
            "in" => "Некорректный тип сортировки"
        ];
    }
}
