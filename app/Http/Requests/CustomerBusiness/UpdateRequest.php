<?php

namespace App\Http\Requests\CustomerBusiness;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() :bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = Crypt::decrypt($this->customer_business);

        return [
            'customer_business_name' => ['required', 'max:255', 'not_regex:/<\/?[^>]*>/', 'unique:customer_businesses,name,' . $id],
        ];
    }
}
