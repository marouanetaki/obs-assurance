<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDossierRequest;
use App\Http\Requests\StoreDossierRequest;
use App\Http\Requests\UpdateDossierRequest;
use App\Models\Beneficiaire;
use App\Models\Dossier;
use App\Models\Medicament;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DossierController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('dossier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dossiers = Dossier::with(['beneficiaire', 'medicaments', 'created_by', 'media'])->get();

        return view('admin.dossiers.index', compact('dossiers'));
    }

    public function create()
    {
        abort_if(Gate::denies('dossier_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaires = Beneficiaire::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $medicaments = Medicament::pluck('nom', 'id');

        return view('admin.dossiers.create', compact('beneficiaires', 'medicaments'));
    }

    public function store(StoreDossierRequest $request)
    {
        $dossier = Dossier::create($request->all());
        $dossier->medicaments()->sync($request->input('medicaments', []));
        foreach ($request->input('documents', []) as $file) {
            $dossier->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $dossier->id]);
        }

        return redirect()->route('admin.dossiers.index');
    }

    public function edit(Dossier $dossier)
    {
        abort_if(Gate::denies('dossier_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaires = Beneficiaire::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $medicaments = Medicament::pluck('nom', 'id');

        $dossier->load('beneficiaire', 'medicaments', 'created_by');

        return view('admin.dossiers.edit', compact('beneficiaires', 'dossier', 'medicaments'));
    }

    public function update(UpdateDossierRequest $request, Dossier $dossier)
    {
        $dossier->update($request->all());
        $dossier->medicaments()->sync($request->input('medicaments', []));
        if (count($dossier->documents) > 0) {
            foreach ($dossier->documents as $media) {
                if (!in_array($media->file_name, $request->input('documents', []))) {
                    $media->delete();
                }
            }
        }
        $media = $dossier->documents->pluck('file_name')->toArray();
        foreach ($request->input('documents', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $dossier->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
            }
        }

        return redirect()->route('admin.dossiers.index');
    }

    public function show(Dossier $dossier)
    {
        abort_if(Gate::denies('dossier_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dossier->load('beneficiaire', 'medicaments', 'created_by');

        return view('admin.dossiers.show', compact('dossier'));
    }

    public function destroy(Dossier $dossier)
    {
        abort_if(Gate::denies('dossier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dossier->delete();

        return back();
    }

    public function massDestroy(MassDestroyDossierRequest $request)
    {
        Dossier::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('dossier_create') && Gate::denies('dossier_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Dossier();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
