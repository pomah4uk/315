<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\ClientsModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $clients = ClientsModel::all();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients_models',
            'phone' => 'required|string|regex:/^[0-9]+$/|max:20',
        ]);

        ClientsModel::create($validated);
        return redirect(route('clients'))->with('success', 'Клиент добавлен');
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
        $data = ClientsModel::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();
        return redirect(route('clients'))->with('info', 'Данные обновленны');
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

    public function destroy(ClientsModel $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('clients')->with('delete', 'Клиент успешно удален');
    }
}
