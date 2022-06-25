<?php

namespace App\Http\Requests;

use App\Models\Accident;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAccidentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('accident_edit');
    }

    public function rules()
    {
        return [
            'lieu' => [
                'string',
                'required',
            ],
            'heure' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'cause' => [
                'required',
            ],
        ];
    }
}
