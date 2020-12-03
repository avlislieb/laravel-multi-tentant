<?php

namespace App\Http\Requests;

use App\Model\Post;
use App\Rules\Tenant\TenantUnique;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePostFormRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                new TenantUnique(app(Post::class))
            ],
            'body' => ['required', 'string']
        ];
    }
}
