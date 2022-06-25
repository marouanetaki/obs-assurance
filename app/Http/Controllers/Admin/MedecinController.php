<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMedecinRequest;
use App\Http\Requests\StoreMedecinRequest;
use App\Http\Requests\UpdateMedecinRequest;
use App\Models\Medecin;
use App\Models\Specialite;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MedecinController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('medecin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medecins = Medecin::with(['specialite'])->get();

        return view('admin.medecins.index', compact('medecins'));
    }

    public function create()
    {
        abort_if(Gate::denies('medecin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialites = Specialite::pluck('libelle', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.medecins.create', compact('specialites'));
    }

    public function store(StoreMedecinRequest $request)
    {
        $medecin = Medecin::create($request->all());

        return redirect()->route('admin.medecins.index');
    }

    public function edit(Medecin $medecin)
    {
        abort_if(Gate::denies('medecin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialites = Specialite::pluck('libelle', 'id')->prepend(trans('global.pleaseSelect'), '');

        $medecin->load('specialite');

        return view('admin.medecins.edit', compact('medecin', 'specialites'));
    }

    public function update(UpdateMedecinRequest $request, Medecin $medecin)
    {
        $medecin->update($request->all());

        return redirect()->route('admin.medecins.index');
    }

    public function show(Medecin $medecin)
    {
        abort_if(Gate::denies('medecin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medecin->load('specialite');

        return view('admin.medecins.show', compact('medecin'));
    }

    public function destroy(Medecin $medecin)
    {
        abort_if(Gate::denies('medecin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medecin->delete();

        return back();
    }

    public function massDestroy(MassDestroyMedecinRequest $request)
    {
        Medecin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
