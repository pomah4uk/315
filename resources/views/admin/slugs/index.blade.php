@extends('admin.layouts.app')

@section('title', 'Услуги')

@section('content')
    @include('admin.components.modals.create', [
        'title' => 'Создание услуги',
        'routeName' => 'slugs',
        'fields' => [
            'slug' => ['type' => 'text', 'placeholder' => 'Slug'],
            'type' => ['type' => 'text', 'placeholder' => 'Type']
        ]
    ])

    @include('admin.layouts.content', [
        'columns' => [
            'slug' => 'Slug',
            'type' => 'Type'
        ],
        'items' => $slugs,
        'itemName' => 'услугу',
        'routeName' => 'slugs',
        'editModalView' => 'admin.slugs.edit-modal'
    ])
@endsection