<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLendInfoRequest extends FormRequest
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
            //
            'lend_to'=>'required',
            'lend_contact'=>'required',
            'lend_from'=>'required',
            'lend_from_contact'=>'required',
            'lend_num'=>'required|integer|max:$material->available',
            'should_return_time'=>'required|date|after:today',

        ];
    }
}
