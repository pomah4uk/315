@extends('admin.layouts.app')

@section('title', 'Клиенты')

@section('content')
    @include('admin.components.modals.create', [
        'title' => 'Создание клиента',
        'routeName' => 'clients',
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
        'items' => $clients,
        'itemName' => 'клиента',
        'routeName' => 'clients',
        'editModalView' => 'admin.clients.edit-modal'
    ])
@endsection