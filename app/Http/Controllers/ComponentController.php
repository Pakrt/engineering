<?php

namespace App\Http\Controllers;

use App\Position;
use App\Component;
use Illuminate\Http\Request;
use App\Http\Controllers;
use phpDocumentor\Reflection\Types\This;

use function GuzzleHttp\Promise\all;

class ComponentController extends Controller
{
    public function index()
    {
        $position = Position::all();
        $components = Component::all();
        return view('component.index', compact('components'), compact('position'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'id_komponen' => 'unique:components'
        ]);
        Component::create($request->all());
        return redirect('/component')->with('status', 'Data berhasil ditambahkan');
    }

    public function store(Request $request)
    {

    }

    public function show($id_komponen)
    {
        $komponen = Component::find($id_komponen);
        return view('component.show', compact('komponen'));
    }

    public function edit($id)
    {
        $position = Position::all();
        $component = Component::find($id);
        return view('component.edit', compact('component', 'position'));
    }

    public function update(Request $request, $id)
    {
        $component = Component::find($id);
        $component->update($request->all());

        return redirect("/component/$id/detail")->with('status', 'Data berhasil di update !!');
    }

    public function destroy($id)
    {
        $component = Component::find($id);
        $component->delete();
        // Component::destroy($component->id);
        return redirect('/component')->with('status', 'Data Berhasil dihapus !!');
    }
}
