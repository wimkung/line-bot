<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ADLFormRequest extends FormRequest
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
            'ch6' => 'required',
            'ch7' => 'required',
            'ch8' => 'required',
            'ch9' => 'required',
            'ch10' => 'required',
        ];
    }
    public function messages() {
        return [
            'ch1.required' => 'กรุณาตอบคำถามข้อ 1',
            'ch2.required' => 'กรุณาตอบคำถามข้อ 2',
            'ch3.required' => 'กรุณาตอบคำถามข้อ 3',
            'ch4.required' => 'กรุณาตอบคำถามข้อ 4',
            'ch5.required' => 'กรุณาตอบคำถามข้อ 5',
            'ch6.required' => 'กรุณาตอบคำถามข้อ 6',
            'ch7.required' => 'กรุณาตอบคำถามข้อ 7',
            'ch8.required' => 'กรุณาตอบคำถามข้อ 8',
            'ch9.required' => 'กรุณาตอบคำถามข้อ 9',
            'ch10.required' => 'กรุณาตอบคำถามข้อ 10',
        ];
    }
}
