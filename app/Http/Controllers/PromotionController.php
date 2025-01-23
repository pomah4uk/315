<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\PromotionModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotion = PromotionModel::all();
        return view('admin.promotion.index', compact('promotion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'discount_percent' => 'required|string|max:2',
            'start_date' => 'required|string|max:255',
            'end_date' => 'required|string|max:255',
            'status'=>'required|string|max:20',
        ]);
        PromotionModel::create($validated);
        return redirect(route('promotion'))->with('success', 'Акция добавлена');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request): RedirectResponse
    {
        $data = PromotionModel::find($request->id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->discount_percent = $request->discount_percent;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->status = $request->status;
        $data->save();
        return redirect(route('promotion'))->with('info', 'Данные обновленны');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PromotionModel $item): RedirectResponse
    {
        $item->delete();
        return redirect()->route('promotion')->with('delete', 'Акция успешно удалена');
    }
}
