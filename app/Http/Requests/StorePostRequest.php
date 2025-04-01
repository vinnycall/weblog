<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePostRequest extends FormRequest
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
            'title' => 'required|max:255',
            'body' => 'required|max:255',
            'user_id' => 'exists:users,id'
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => Auth::id(), // Voeg automatisch de ingelogde gebruiker toe
        ]);
    }
}
