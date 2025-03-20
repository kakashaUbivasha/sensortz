<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoryRequest extends FormRequest
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
            'from' => 'nullable|date',
            'to' => 'nullable|date|after_or_equal:from',
        ];
    }
    public function messages(): array
    {
     return [
         'sensor_id.required' => 'Необходимо указать идентификатор датчика.',
         'sensor_id.integer' => 'Идентификатор датчика должен быть числом.',

         'parameter.required' => 'Необходимо указать параметр мониторинга.',
         'parameter.string' => 'Параметр должен быть строкой.',
         'parameter.in' => 'Параметр должен быть одним из: T (температура), P (давление), v (скорость вращения).',

         'from.date' => 'Дата "from" должна быть в формате YYYY-MM-DD.',
         'to.date' => 'Дата "to" должна быть в формате YYYY-MM-DD.',
         'to.after_or_equal' => 'Дата "to" должна быть больше или равна "from".',
     ];
    }
}
