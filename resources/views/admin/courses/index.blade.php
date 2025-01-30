@extends('admin.layouts.app')

@section('title', 'Курсы')

@section('content')
<div class="mb-4">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">Добавить</button>
</div>

<!-- Добавление курса -->
<div class="modal fade" id="create" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Создание курса</h5>
            </div>
            <div class="modal-body">
                <form class="form" action="{{ route('courses.create') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <input class="form-control" type="text" name='name' placeholder="Название курса">
                    </div>
                    <div class="mb-2">
                        <input class="form-control" type="text" name='description' placeholder="Описание">
                    </div>
                    <div class="mb-2">
                        <input class="form-control" type="text" name='duration' placeholder="Продолжительность">
                    </div>
                    <div class="mb-2">
                        <input class="form-control" type="text" name='price' placeholder="Цена">
                    </div>
                    <div class="mb-2">
                        <select class="form-select" name="status">
                            <option value="Active">Активен</option>
                            <option value="inactive">Не активен</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class='btn btn-success'>Добавить</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Курс</th>
                <th>Описание</th>
                <th>Продолжительность</th>
                <th>Цена</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->duration }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->status }}</td>
                    <td class="d-flex">
                        <button type="button" class="btn btn-info mx-1" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">Редактировать</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $item->id }}">Удалить</button>
                    </td>
                </tr>
                <!-- Редактирование курса -->
                <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Редактирование</h5>
                            </div>
                            <div class="modal-body">
                                <form class="form" action="{{ route('courses.edit') }}" method="POST">
                                    @csrf
                                    <input class="d-none" type="text" name='id' value='{{ $item->id }}'>
                                    <div class="mb-2">
                                        <input class="form-control" type="text" name='name' placeholder="Название" value='{{ $item->name }}'>
                                    </div>
                                    <div class="mb-2">
                                        <input class="form-control" type="text" name='description' placeholder="Описание" Value='{{ $item->description }}'>
                                    </div>
                                    <div class="mb-2">
                                        <input class="form-control" type="text" name='duration' placeholder="Продолжительность" Value='{{ $item->duration }}'>
                                    </div>
                                    <div class="mb-2">
                                        <input class="form-control" type="text" name='price' placeholder="Цена" Value='{{ $item->price }}'>
                                    </div>
                                    <div class="mb-2">
                                        <select class="form-select" name="status" Value='{{ $item->status }}'>
                                            <option>Статус...</option>
                                            <option value="Active">Активен</option>
                                            <option value="inactive">Не активен</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class='btn btn-success'>Обновить</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Подтверждение удаления -->
                <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Подтвердить удаление</h5>
                            </div>
                            <div class="modal-body">
                                <p>Вы уверены, что хотите удалить курс {{ $item->name }}?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('courses.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class='btn btn-danger'>Удалить</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection