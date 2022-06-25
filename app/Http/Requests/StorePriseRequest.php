<?php

namespace App\Http\Requests;

use App\Models\Prise;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePriseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('prise_create');
    }

    public function rules()
    {
        return [
            'beneficiaire_id' => [
                'required',
                'integer',
            ],
            'clinique_id' => [
                'required',
                'integer',
            ],
            'type_operation' => [
                'string',
                'required',
            ],
            'document' => [
                'required',
            ],
        ];
    }
}
