<?php

namespace App\Http\Requests;

use App\Models\Beneficiaire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBeneficiaireRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiaire_create');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'min:1',
                'max:50',
                'required',
            ],
            'date_naissance' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'lien_parente' => [
                'required',
            ],
            'document' => [
                'array',
            ],
        ];
    }
}
