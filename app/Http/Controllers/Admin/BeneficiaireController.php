<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBeneficiaireRequest;
use App\Http\Requests\StoreBeneficiaireRequest;
use App\Http\Requests\UpdateBeneficiaireRequest;
use App\Models\Beneficiaire;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BeneficiaireController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('beneficiaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaires = Beneficiaire::with(['created_by', 'media'])->get();

        return view('admin.beneficiaires.index', compact('beneficiaires'));
    }

    public function create()
    {
        abort_if(Gate::denies('beneficiaire_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.beneficiaires.create');
    }

    public function store(StoreBeneficiaireRequest $request)
    {
        $beneficiaire = Beneficiaire::create($request->all());

        foreach ($request->input('document', []) as $file) {
            $beneficiaire->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('document');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $beneficiaire->id]);
        }

        return redirect()->route('admin.beneficiaires.index');
    }

    public function edit(Beneficiaire $beneficiaire)
    {
        abort_if(Gate::denies('beneficiaire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaire->load('created_by');

        return view('admin.beneficiaires.edit', compact('beneficiaire'));
    }

    public function update(UpdateBeneficiaireRequest $request, Beneficiaire $beneficiaire)
    {
        $beneficiaire->update($request->all());

        if (count($beneficiaire->document) > 0) {
            foreach ($beneficiaire->document as $media) {
                if (!in_array($media->file_name, $request->input('document', []))) {
                    $media->delete();
                }
            }
        }
        $media = $beneficiaire->document->pluck('file_name')->toArray();
        foreach ($request->input('document', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $beneficiaire->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('document');
            }
        }

        return redirect()->route('admin.beneficiaires.index');
    }

    public function show(Beneficiaire $beneficiaire)
    {
        abort_if(Gate::denies('beneficiaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaire->load('created_by');

        return view('admin.beneficiaires.show', compact('beneficiaire'));
    }

    public function destroy(Beneficiaire $beneficiaire)
    {
        abort_if(Gate::denies('beneficiaire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaire->delete();

        return back();
    }

    public function massDestroy(MassDestroyBeneficiaireRequest $request)
    {
        Beneficiaire::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('beneficiaire_create') && Gate::denies('beneficiaire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Beneficiaire();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
