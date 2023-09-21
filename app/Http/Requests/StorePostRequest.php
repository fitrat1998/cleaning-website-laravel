<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    public function messages(): array
    {
        return [
            'title.required' => 'Sarlavhani to\'ldirish majburiy',
            'short_content.required' => 'Qisqacha mazmunni to\'ldirish majburiy',
            'content.required' => 'Maqolani to\'ldirish majburiy',
            'photo.required' => 'Fayl yuklash majburiy'
        ];
    }

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'short_content' => 'required',
            'content' => 'required',
            // 'photo' => 'nullable|image|max:2048'
        ];
    }
}
