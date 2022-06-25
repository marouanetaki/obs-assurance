<?php

namespace App\Http\Requests;

use App\Models\Medicament;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMedicamentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('medicament_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
            ],
            'nom' => [
                'string',
                'required',
            ],
            'taux' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
