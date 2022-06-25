<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMedicamentRequest;
use App\Http\Requests\StoreMedicamentRequest;
use App\Http\Requests\UpdateMedicamentRequest;
use App\Models\Medicament;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MedicamentController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('medicament_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicaments = Medicament::all();

        return view('admin.medicaments.index', compact('medicaments'));
    }

    public function create()
    {
        abort_if(Gate::denies('medicament_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.medicaments.create');
    }

    public function store(StoreMedicamentRequest $request)
    {
        $medicament = Medicament::create($request->all());

        return redirect()->route('admin.medicaments.index');
    }

    public function edit(Medicament $medicament)
    {
        abort_if(Gate::denies('medicament_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.medicaments.edit', compact('medicament'));
    }

    public function update(UpdateMedicamentRequest $request, Medicament $medicament)
    {
        $medicament->update($request->all());

        return redirect()->route('admin.medicaments.index');
    }

    public function show(Medicament $medicament)
    {
        abort_if(Gate::denies('medicament_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.medicaments.show', compact('medicament'));
    }

    public function destroy(Medicament $medicament)
    {
        abort_if(Gate::denies('medicament_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicament->delete();

        return back();
    }

    public function massDestroy(MassDestroyMedicamentRequest $request)
    {
        Medicament::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
