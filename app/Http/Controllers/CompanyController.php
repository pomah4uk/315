<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\CompanyModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Компании';
        $company = CompanyModel::All();
        return view('admin.company.index', ['title' => $title, 'company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9]+$/|max:20',
            'description' => 'required|string|max:255',
            'email' => 'required|email|unique:company_models',
            'social_media' => 'required|string|max:255',
            'working_hours' => 'required|string|max:255',
        ]);
        CompanyModel::create($validated);
        return redirect(route('company'))->with('success', 'Клиент добавлен');
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
        $data = CompanyModel::find($request->id);
        $data->name = $request->name;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->description = $request->description;
        $data->email = $request->email;
        $data->social_media = $request->social_media;
        $data->working_hours = $request->working_hours;
        $data->save();
        return redirect(route('company'))->with('info', 'Данные обновленны');
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
    public function destroy(CompanyModel $item): RedirectResponse
    {
        $item->delete();
        return redirect()->route('company')->with('delete', 'Клиент успешно удален');
    }
}
