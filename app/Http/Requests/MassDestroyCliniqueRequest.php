<?php

namespace App\Http\Requests;

use App\Models\Clinique;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCliniqueRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('clinique_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cliniques,id',
        ];
    }
}
