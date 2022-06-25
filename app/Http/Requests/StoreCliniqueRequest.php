<?php

namespace App\Http\Requests;

use App\Models\Clinique;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCliniqueRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('clinique_create');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'telephone' => [
                'string',
                'required',
            ],
            'adresse' => [
                'string',
                'required',
            ],
            'ville' => [
                'string',
                'required',
            ],
        ];
    }
}
