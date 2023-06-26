<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Subcategory;
use App\Models\Category;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::with('category', 'subcategory')->get();

        return view('services.index', ['services' => $services]);
    }

    public function edit($id)
    {
        $services = Service::find($id);
        $subcategories = Subcategory::all();
        return view('services.edit', compact('services', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $services = Service::find($id);
        $services->name = $request->input('name');
        $services->description = $request->input('description');
        $services->price = $request->input('price');
        $services->subcategory_id = $request->input('subcategory_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/img', $imageName);
            $services->image = $imageName;
        }

        // Inne pola, które chcesz edytować
        $services->save();
        return redirect()->route('services.index')->with('success', 'Dane usługi zostały zaktualizowane.');
    }

    public function destroy($id)
    {
        $user = Service::find($id);
        $user->delete();

        return redirect()->route('services.index')->with('success', 'Usługa został usunięta.');
    }

    public function create()
    {
        $subcategories = Subcategory::all();
        $services = Service::all();
        return view('services.create', compact('subcategories', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'subcategory_id' => 'required',
            'image' => 'max:2048',
        ]);

        $service = new Service();
        $service->name = $request->input('name');
        $service->description = $request->input('description');
        $service->price = $request->input('price');
        $service->subcategory_id = $request->input('subcategory_id');

        $subcategory_id = $request->input('subcategory');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/img', $imageName);
            $service->image = $imageName;
        }

        $service->save();

        return redirect()->route('services.index')->with('success', 'Usługa została dodana.');
    }

    public function indexa()
    {
        $categories = Category::all();

        return view('services.indexa', compact('categories'));
    }

    public function show($id)
{
    $service = Service::findOrFail($id);
    return view('services.show', compact('service'));
}

}
