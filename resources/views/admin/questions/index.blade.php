@extends('admin.layouts.app')

@section('title', 'F.A.Q.')

@section('content')
    @include('admin.components.modals.create', [
        'title' => 'Создание вопроса',
        'routeName' => 'questions',
        'fields' => [
            'question' => ['type' => 'text', 'placeholder' => 'Вопрос'],
            'answer' => ['type' => 'text', 'placeholder' => 'Ответ']
        ]
    ])

    @include('admin.layouts.content', [
        'columns' => [
            'question' => 'Вопрос',
            'answer' => 'Ответ'
        ],
        'items' => $questions,
        'itemName' => 'вопрос',
        'routeName' => 'questions',
        'editModalView' => 'admin.questions.edit-modal'
    ])
@endsection