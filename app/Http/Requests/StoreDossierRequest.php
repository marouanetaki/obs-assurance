<?php

namespace App\Http\Requests;

use App\Models\Dossier;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDossierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dossier_create');
    }

    public function rules()
    {
        return [
            'num_dossier' => [
                'string',
                'required',
                'unique:dossiers',
            ],
            'beneficiaire_id' => [
                'required',
                'integer',
            ],
            'date_soins' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'medicaments.*' => [
                'integer',
            ],
            'medicaments' => [
                'array',
            ],
            'documents' => [
                'array',
            ],
        ];
    }
}
