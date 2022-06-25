<?php

namespace App\Http\Requests;

use App\Models\Facture;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFactureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('facture_edit');
    }

    public function rules()
    {
        return [
            'dossier_id' => [
                'required',
                'integer',
            ],
            'frais_rembourse' => [
                'required',
            ],
            'created_by_id' => [
                'required',
                'integer',
            ],
            'mode_paiement' => [
                'required',
            ],
        ];
    }
}
