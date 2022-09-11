<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
{
    public function rules()
    {
        return [
            'work.title' => 'required|string|max:100',
            'work.sentence' => 'required|string|max:100',
        ];
    }
}