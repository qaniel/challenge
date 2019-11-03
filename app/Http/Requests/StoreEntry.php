<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntry extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'content' => 'required',
        ];
    }
}
