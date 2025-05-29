<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
    public function index(Request $request)
    {
        $query = Medicine::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        $medicines = $query->orderBy('id', 'asc')->paginate(10);

        return view('admin.medicines.index', compact('medicines'));
    }

    public function create()
    {
        return view('admin.medicines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        Medicine::create($request->only('name', 'quantity', 'price'));

        return redirect()->route('admin.medicines.index')->with('success', 'Medicine added successfully.');
    }

    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('admin.medicines.show', compact('medicine'));
    }

    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('admin.medicines.edit', compact('medicine'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $medicine = Medicine::findOrFail($id);
        $medicine->update($request->only('name', 'quantity', 'price'));

        return redirect()->route('admin.medicines.index')->with('success', 'Medicine updated successfully.');
    }

    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();

        return redirect()->route('admin.medicines.index')->with('success', 'Medicine deleted successfully.');
    }
}
