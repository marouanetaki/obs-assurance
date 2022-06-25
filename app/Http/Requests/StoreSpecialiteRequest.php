<?php

namespace App\Http\Requests;

use App\Models\Specialite;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSpecialiteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('specialite_create');
    }

    public function rules()
    {
        return [
            'libelle' => [
                'string',
                'required',
            ],
        ];
    }
}
