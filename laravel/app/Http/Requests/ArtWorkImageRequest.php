<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtWorkImageRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
    }
}
