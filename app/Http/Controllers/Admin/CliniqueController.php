<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCliniqueRequest;
use App\Http\Requests\StoreCliniqueRequest;
use App\Http\Requests\UpdateCliniqueRequest;
use App\Models\Clinique;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CliniqueController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('clinique_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cliniques = Clinique::with(['media'])->get();

        return view('admin.cliniques.index', compact('cliniques'));
    }

    public function create()
    {
        abort_if(Gate::denies('clinique_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cliniques.create');
    }

    public function store(StoreCliniqueRequest $request)
    {
        $clinique = Clinique::create($request->all());

        if ($request->input('photo', false)) {
            $clinique->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $clinique->id]);
        }

        return redirect()->route('admin.cliniques.index');
    }

    public function edit(Clinique $clinique)
    {
        abort_if(Gate::denies('clinique_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cliniques.edit', compact('clinique'));
    }

    public function update(UpdateCliniqueRequest $request, Clinique $clinique)
    {
        $clinique->update($request->all());

        if ($request->input('photo', false)) {
            if (!$clinique->photo || $request->input('photo') !== $clinique->photo->file_name) {
                if ($clinique->photo) {
                    $clinique->photo->delete();
                }
                $clinique->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($clinique->photo) {
            $clinique->photo->delete();
        }

        return redirect()->route('admin.cliniques.index');
    }

    public function show(Clinique $clinique)
    {
        abort_if(Gate::denies('clinique_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cliniques.show', compact('clinique'));
    }

    public function destroy(Clinique $clinique)
    {
        abort_if(Gate::denies('clinique_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinique->delete();

        return back();
    }

    public function massDestroy(MassDestroyCliniqueRequest $request)
    {
        Clinique::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('clinique_create') && Gate::denies('clinique_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Clinique();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
