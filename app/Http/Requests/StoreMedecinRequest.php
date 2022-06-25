<?php

namespace App\Http\Requests;

use App\Models\Medecin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMedecinRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('medecin_create');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
            ],
            'prenom' => [
                'string',
                'required',
            ],
            'specialite_id' => [
                'required',
                'integer',
            ],
            'ville' => [
                'string',
                'required',
            ],
        ];
    }
}
