<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFactureRequest;
use App\Http\Requests\StoreFactureRequest;
use App\Http\Requests\UpdateFactureRequest;
use App\Models\Dossier;
use App\Models\Facture;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FactureController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('facture_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $factures = Facture::with(['dossier', 'created_by'])->get();

        return view('admin.factures.index', compact('factures'));
    }

    public function create()
    {
        abort_if(Gate::denies('facture_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dossiers = Dossier::pluck('num_dossier', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.factures.create', compact('created_bies', 'dossiers'));
    }

    public function store(StoreFactureRequest $request)
    {
        $facture = Facture::create($request->all());

        return redirect()->route('admin.factures.index');
    }

    public function edit(Facture $facture)
    {
        abort_if(Gate::denies('facture_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dossiers = Dossier::pluck('num_dossier', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $facture->load('dossier', 'created_by');

        return view('admin.factures.edit', compact('created_bies', 'dossiers', 'facture'));
    }

    public function update(UpdateFactureRequest $request, Facture $facture)
    {
        $facture->update($request->all());

        return redirect()->route('admin.factures.index');
    }

    public function show(Facture $facture)
    {
        abort_if(Gate::denies('facture_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facture->load('dossier', 'created_by');

        return view('admin.factures.show', compact('facture'));
    }

    public function destroy(Facture $facture)
    {
        abort_if(Gate::denies('facture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facture->delete();

        return back();
    }

    public function massDestroy(MassDestroyFactureRequest $request)
    {
        Facture::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
