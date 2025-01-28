<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SlugsModel;
use Illuminate\View\View;

class SlugsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slugs = SlugsModel::all();
        return view('admin.slugs.index', compact('slugs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        SlugsModel::create($validated);
        return redirect(route('slugs'))->with('success', 'Услуга добавлена');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        SlugsModel::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $slug = SlugsModel::find($id);
        if (!$slug) {
            abort(404);
        }
        return view('admin.slugs.show', compact('slug'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request): RedirectResponse
    {
        $slug = SlugsModel::find($request->id);
        if (!$slug) {
            abort(404);
        }

        $validated = $request->validate([
            'slug' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        $slug->update($validated);
        return redirect(route('slugs'))->with('info', 'Данные обновлены');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slug = SlugsModel::find($id);
        if (!$slug) {
            abort(404);
        }

        $validated = $request->validate([
            'slug' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        $slug->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SlugsModel $slug): RedirectResponse
    {
        $slug->delete();
        return redirect()->route('slugs')->with('delete', 'Услуга успешно удалена');
    }
}
