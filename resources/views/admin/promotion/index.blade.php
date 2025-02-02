@extends('admin.layouts.app')

@section('title', 'Акции')

@section('content')
    @include('admin.components.modals.create', [
        'title' => 'Создание акции',
        'routeName' => 'promotion',
        'fields' => [
            'name' => ['type' => 'text', 'placeholder' => 'Акция'],
            'description' => ['type' => 'text', 'placeholder' => 'Описание'],
            'discount_percent' => ['type' => 'number', 'placeholder' => 'Размер скидки', 'min' => '0'],
            'start_date' => ['type' => 'date', 'placeholder' => 'Начало'],
            'end_date' => ['type' => 'date', 'placeholder' => 'Конец'],
            'status' => [
                'type' => 'select',
                'options' => [
                    'Активен' => 'Активен',
                    'Не активен' => 'Не активен'
                ]
            ]
        ]
    ])

    @include('admin.layouts.content', [
        'columns' => [
            'name' => 'Акция',
            'description' => 'Описание',
            'discount_percent' => 'Скидка %',
            'start_date' => 'Начало',
            'end_date' => 'Конец',
            'status' => 'Статус'
        ],
        'items' => $promotion,
        'itemName' => 'акцию',
        'routeName' => 'promotion',
        'editModalView' => 'admin.promotion.edit-modal'
    ])
@endsection