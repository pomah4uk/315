@extends('admin.layouts.app')

@section('title', 'Компания')

@section('content')
    @include('admin.components.modals.create', [
        'title' => 'Создание компании',
        'routeName' => 'company',
        'fields' => [
            'name' => ['type' => 'text', 'placeholder' => 'Название'],
            'address' => ['type' => 'text', 'placeholder' => 'Адрес'],
            'phone' => ['type' => 'number', 'placeholder' => 'Телефон'],
            'description' => ['type' => 'text', 'placeholder' => 'Описание'],
            'email' => ['type' => 'email', 'placeholder' => 'Почта'],
            'social_media' => ['type' => 'text', 'placeholder' => 'Соцсети'],
            'working_hours' => ['type' => 'text', 'placeholder' => 'Время работы']
        ]
    ])

    @include('admin.layouts.content', [
        'columns' => [
            'name' => 'Название',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'description' => 'Описание',
            'email' => 'Почта',
            'social_media' => 'Соц.сети',
            'working_hours' => 'Время работы'
        ],
        'items' => $company,
        'itemName' => 'компанию',
        'routeName' => 'company',
        'editModalView' => 'admin.company.edit-modal'
    ])
@endsection