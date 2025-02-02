@extends('admin.layouts.app')

@section('title', 'Курсы')

@section('content')
    @include('admin.components.modals.create', [
        'title' => 'Создание курса',
        'routeName' => 'courses',
        'fields' => [
            'name' => ['type' => 'text', 'placeholder' => 'Название курса'],
            'description' => ['type' => 'text', 'placeholder' => 'Описание'],
            'duration' => ['type' => 'text', 'placeholder' => 'Продолжительность'],
            'price' => ['type' => 'text', 'placeholder' => 'Цена'],
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
            'name' => 'Курс',
            'description' => 'Описание',
            'duration' => 'Продолжительность',
            'price' => 'Цена',
            'status' => 'Статус'
        ],
        'items' => $courses,
        'itemName' => 'курс',
        'routeName' => 'courses',
        'editModalView' => 'admin.courses.edit-modal'
    ])
@endsection