<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySpecialiteRequest;
use App\Http\Requests\StoreSpecialiteRequest;
use App\Http\Requests\UpdateSpecialiteRequest;
use App\Models\Specialite;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpecialiteController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('specialite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialites = Specialite::all();

        return view('admin.specialites.index', compact('specialites'));
    }

    public function create()
    {
        abort_if(Gate::denies('specialite_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.specialites.create');
    }

    public function store(StoreSpecialiteRequest $request)
    {
        $specialite = Specialite::create($request->all());

        return redirect()->route('admin.specialites.index');
    }

    public function edit(Specialite $specialite)
    {
        abort_if(Gate::denies('specialite_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.specialites.edit', compact('specialite'));
    }

    public function update(UpdateSpecialiteRequest $request, Specialite $specialite)
    {
        $specialite->update($request->all());

        return redirect()->route('admin.specialites.index');
    }

    public function show(Specialite $specialite)
    {
        abort_if(Gate::denies('specialite_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.specialites.show', compact('specialite'));
    }

    public function destroy(Specialite $specialite)
    {
        abort_if(Gate::denies('specialite_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialite->delete();

        return back();
    }

    public function massDestroy(MassDestroySpecialiteRequest $request)
    {
        Specialite::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
