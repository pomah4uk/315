<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\CoursesModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Курсы';
        $courses = CoursesModel::all();
        return view('admin.courses.index', ['title' => $title, 'courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'status'=>'required|string|max:255',
        ]);
        CoursesModel::create($validated);
        return redirect(route('courses'))->with('success', 'Курс добавлен');
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
        $data = CoursesModel::find($request->id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->duration = $request->duration;
        $data->price = $request->price;
        $data->status = $request->status;
        $data->save();
        return redirect(route('courses'))->with('info', 'Данные обновленны');
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
    public function destroy(CoursesModel $item): RedirectResponse
    {
        $item->delete();
        return redirect()->route('courses')->with('delete', 'Курс успешно удален');
    }
}
