<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAccidentRequest;
use App\Http\Requests\StoreAccidentRequest;
use App\Http\Requests\UpdateAccidentRequest;
use App\Models\Accident;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccidentController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('accident_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accidents = Accident::with(['created_by'])->get();

        return view('admin.accidents.index', compact('accidents'));
    }

    public function create()
    {
        abort_if(Gate::denies('accident_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.accidents.create');
    }

    public function store(StoreAccidentRequest $request)
    {
        $accident = Accident::create($request->all());

        return redirect()->route('admin.accidents.index');
    }

    public function edit(Accident $accident)
    {
        abort_if(Gate::denies('accident_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accident->load('created_by');

        return view('admin.accidents.edit', compact('accident'));
    }

    public function update(UpdateAccidentRequest $request, Accident $accident)
    {
        $accident->update($request->all());

        return redirect()->route('admin.accidents.index');
    }

    public function show(Accident $accident)
    {
        abort_if(Gate::denies('accident_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accident->load('created_by');

        return view('admin.accidents.show', compact('accident'));
    }

    public function destroy(Accident $accident)
    {
        abort_if(Gate::denies('accident_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accident->delete();

        return back();
    }

    public function massDestroy(MassDestroyAccidentRequest $request)
    {
        Accident::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
