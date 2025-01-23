@extends('admin.layouts.app')

@section('title', 'F.A.Q.')

@section('content')
<div class="container-fluid bg-secondary">
    <h2 class='p-4'>F.A.Q.</h2>
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
                            <h5 class="modal-title">Создание Вопрос-Ответа</h5>
                        </div>
                        <div class="modal-body">
                            <form class="client-form" action="{{ route('questions.create') }}" method="POST">
                                @csrf
                                <input class="form-control mb-2" type="text" name='question' placeholder="Вопрос">
                                <input class="form-control mb-2" type="text" name='answer' placeholder="Ответ">
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
                            <th>Вопрос</th>
                            <th>Ответ</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $item)
                            <tr>
                                <td>{{ $item->question }}</td>
                                <td>{{ $item->answer }}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">Редактировать</button>
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
                                            <form class="form" action="{{ route('questions.edit') }}" method="POST">
                                                @csrf
                                                <input class="d-none" type="text" name='id' value='{{ $item->id }}'>
                                                <input class="form-control mb-2" type="text" name='question' placeholder="Имя" Value='{{ $item->question }}'>
                                                <input class="form-control mb-2" type="text" name='answer' placeholder="Телефон" Value='{{ $item->answer }}'>
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
                                            <p>Вы уверены, что хотите удалить FAQ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('questions.destroy', $item->id) }}" method="POST">
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