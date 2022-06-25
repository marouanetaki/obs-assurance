<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPriseRequest;
use App\Http\Requests\StorePriseRequest;
use App\Http\Requests\UpdatePriseRequest;
use App\Models\Beneficiaire;
use App\Models\Clinique;
use App\Models\Prise;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PriseController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('prise_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prises = Prise::with(['beneficiaire', 'clinique', 'created_by', 'media'])->get();

        return view('admin.prises.index', compact('prises'));
    }

    public function create()
    {
        abort_if(Gate::denies('prise_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaires = Beneficiaire::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cliniques = Clinique::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.prises.create', compact('beneficiaires', 'cliniques'));
    }

    public function store(StorePriseRequest $request)
    {
        $prise = Prise::create($request->all());

        if ($request->input('document', false)) {
            $prise->addMedia(storage_path('tmp/uploads/' . basename($request->input('document'))))->toMediaCollection('document');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $prise->id]);
        }

        return redirect()->route('admin.prises.index');
    }

    public function edit(Prise $prise)
    {
        abort_if(Gate::denies('prise_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beneficiaires = Beneficiaire::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cliniques = Clinique::pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prise->load('beneficiaire', 'clinique', 'created_by');

        return view('admin.prises.edit', compact('beneficiaires', 'cliniques', 'prise'));
    }

    public function update(UpdatePriseRequest $request, Prise $prise)
    {
        $prise->update($request->all());

        if ($request->input('document', false)) {
            if (!$prise->document || $request->input('document') !== $prise->document->file_name) {
                if ($prise->document) {
                    $prise->document->delete();
                }
                $prise->addMedia(storage_path('tmp/uploads/' . basename($request->input('document'))))->toMediaCollection('document');
            }
        } elseif ($prise->document) {
            $prise->document->delete();
        }

        return redirect()->route('admin.prises.index');
    }

    public function show(Prise $prise)
    {
        abort_if(Gate::denies('prise_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prise->load('beneficiaire', 'clinique', 'created_by');

        return view('admin.prises.show', compact('prise'));
    }

    public function destroy(Prise $prise)
    {
        abort_if(Gate::denies('prise_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prise->delete();

        return back();
    }

    public function massDestroy(MassDestroyPriseRequest $request)
    {
        Prise::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('prise_create') && Gate::denies('prise_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Prise();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
