<?php

namespace App\Http\Requests;

use App\Models\Medicament;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMedicamentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('medicament_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:medicaments,id',
        ];
    }
}
