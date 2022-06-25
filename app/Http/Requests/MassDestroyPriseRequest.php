<?php

namespace App\Http\Requests;

use App\Models\Prise;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPriseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('prise_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:prises,id',
        ];
    }
}
