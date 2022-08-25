<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class MessageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'min:4|max:100|required',
            'senderEmail' => 'min:7|max:50|required|email',
            'message' => 'min:10|required'
        ];
    }
}
