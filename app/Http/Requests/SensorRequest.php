<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SensorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sensor_id' => 'required|integer',
            'parameter' => 'required|string|in:T,P,v',
            'value' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'sensor_id.required' => 'Параметр sensor_id обязателен.',
            'sensor_id.integer' => 'Параметр sensor_id должен быть целым числом.',
            'parameter.required' => 'Параметр parameter обязателен.',
            'parameter.in' => 'Параметр должен быть одним из: T, P, v.',
            'value.required' => 'Параметр value обязателен.',
            'value.numeric' => 'Параметр value должен быть числом.',
        ];
    }
}
