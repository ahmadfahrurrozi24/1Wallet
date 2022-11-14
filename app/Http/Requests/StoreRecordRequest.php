<?php

namespace App\Http\Requests;

use App\Rules\IsNotNegative;
use App\Rules\MaxNumberAmount;
use App\Rules\MinNumberAmount;
use Illuminate\Foundation\Http\FormRequest;

class StoreRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            "category_id.required" => "Category must be selected."
        ];
    }

    public function rules()
    {
        return [
            "category_id" => "required|numeric",
            "amount" => ["required", new IsNotNegative, new MaxNumberAmount, new MinNumberAmount],
        ];
    }
}
