<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StressFormRequest extends FormRequest
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

    public function rules() {
        return [
            'ch1' => 'required',
            'ch2' => 'required',
            'ch3' => 'required',
            'ch4' => 'required',
            'ch5' => 'required',
        ];
    }
    public function messages() {
        return [
            'ch1.required' => 'กรุณาตอบคำถามข้อ 1',
            'ch2.required' => 'กรุณาตอบคำถามข้อ 2',
            'ch3.required' => 'กรุณาตอบคำถามข้อ 3',
            'ch4.required' => 'กรุณาตอบคำถามข้อ 4',
            'ch5.required' => 'กรุณาตอบคำถามข้อ 5',
        ];
    }
}
