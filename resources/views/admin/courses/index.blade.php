@extends('admin.layouts.app')

@section('title', 'Курсы')

@section('content')
<div class="container-fluid bg-info">
    <h2 class='p-4'>Курсы</h2>
</div>
<div class="container-fluid">
    <div class='row'>
        <div class="col-2">
            @include('admin.layouts.sidebar')
        </div>
        <div class="col-10 pt-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        @if(session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#create">Добавить</button>
                        
                        <!-- Добавление клиентов -->
        <div class="modal fade" id="create" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Создание клиента</h5>
                        </div>
                        <div class="modal-body">
                            <form class="form" action="{{ route('courses.create') }}" method="POST">
                                @csrf
                                <input class="form-control mb-2" type="text" name='name' placeholder="Название курса">
                                <input class="form-control mb-2" type="text" name='description' placeholder="Описание">
                                <input class="form-control mb-2" type="text" name='duration' placeholder="Продолжительность">
                                <input class="form-control mb-2" type="text" name='price' placeholder="Цена">
                                <select class="form-select" type="select" name="status">
                                    <option value="Active">Активен</option>
                                    <option value="inactive">Не активен</option>
                                </select>
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
                            <th>Опписание</th>
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

                                        <!-- Редоктирование клиентов -->
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
                                                <input class="form-control mb-2" type="text" name='name' placeholder="Название" value='{{ $item->name }}'>
                                                <input class="form-control mb-2" type="text" name='description' placeholder="Описание" Value='{{ $item->description }}'>
                                                <input class="form-control mb-2" type="text" name='duration' placeholder="Продолжительность" Value='{{ $item->duration }}'>
                                                <input class="form-control mb-2" type="text" name='price' placeholder="Цена" Value='{{ $item->price }}'>
                                                <select class="form-select" type="select" name="status" Value='{{ $item->status }}'>
                                                    <option>Статус...</option>
                                                    <option value="Active">Активен</option>
                                                    <option value="inactive">Не активен</option>
                                                </select>
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
        </div>
    </div>    
</div>
@endsection