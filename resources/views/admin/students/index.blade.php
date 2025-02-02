@extends('admin.layouts.app')

@section('title', 'Студенты')

@section('content')
    @include('admin.components.modals.create', [
        'title' => 'Создание студента',
        'routeName' => 'students',
        'fields' => [
            'name' => ['type' => 'text', 'placeholder' => 'Имя'],
            'phone' => ['type' => 'number', 'placeholder' => 'Телефон'],
            'email' => ['type' => 'email', 'placeholder' => 'Email']
        ]
    ])

    @include('admin.layouts.content', [
        'columns' => [
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'Почта'
        ],
        'items' => $students,
        'itemName' => 'студента',
        'routeName' => 'students',
        'editModalView' => 'admin.students.edit-modal'
    ])
@endsection