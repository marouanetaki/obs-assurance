<?php

namespace App\Http\Requests;

use App\Models\Dossier;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDossierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dossier_edit');
    }

    public function rules()
    {
        return [
            'num_dossier' => [
                'string',
                'required',
                'unique:dossiers,num_dossier,' . request()->route('dossier')->id,
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
