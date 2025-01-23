<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\QuestionsModel;
use Illuminate\Http\Request;
use Illuminate\View\View;


class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = QuestionsModel::all();
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
        ]);
        QuestionsModel::create($validated);
        return redirect(route('questions'))->with('success', 'F.A.Q. добавлен');
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
        $data = QuestionsModel::find($request->id);
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->save();
        return redirect(route('questions'))->with('info', 'Данные обновленны');
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
    public function destroy(QuestionsModel $item): RedirectResponse
    {
        $item->delete();
        return redirect()->route('questions')->with('delete', 'F.A.Q. успешно удалён');
    }
}
