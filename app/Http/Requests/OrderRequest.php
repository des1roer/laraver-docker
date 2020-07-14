<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
    public function rules(): array
    {
        if ('POST' === $this->getMethod()) {
            return [
                'name' => 'required|string',
                'email' => 'required|string',
                'phone' => 'required|string',
                'items' => 'required|array',
            ];
        }

        return [];
    }
}
