<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthRequest extends FormRequest
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
            'health_title' => 'required',
            'health_inform' => 'required',
            // 'health_id' => 'required',
            'health_pic_file' => 'mimes:jpeg,jpg,png',
        ];
    }
    public function messages() {
        return [
            'health_title.required' => 'กรุณากรอกชื่อบทความ',
            'health_inform.required' => 'กรุณากรอกรายละเอียดบทความ',
            // 'health_pic_id.required' => 'กรุณาเลือกหมวดหนังสือ',
            'images.mimes' => 'กรุณาเลือกไฟล์ภาพนามสกุล jpeg,jpg,png',
        ];
    }
}
