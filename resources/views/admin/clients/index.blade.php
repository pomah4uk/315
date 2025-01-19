@extends('admin.layouts.app')

@section('title', 'Клиенты')

@section('content')
<div class="container-fluid bg-secondary">
    <h2 class='p-4'>Клиенты</h2>
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
                            <form class="client-form" action="{{ route('clients.create') }}" method="POST">
                                @csrf
                                <input class="form-control mb-2" type="text" name='name' placeholder="Имя">
                                <input class="form-control mb-2" type="number" name='phone' placeholder="Телефон">
                                <input class="form-control mb-2" type="email" name="email" placeholder="Email">
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
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Почта</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}">Редактировать</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $user->id }}">Удалить</button>
                            </tr>
                                        <!-- Редоктирование клиентов -->
                            <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Редактирование</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form class="client-form" action="{{ route('clients.edit') }}" method="POST">
                                                @csrf
                                                <input class="d-none" type="text" name='id' value='{{ $user->id }}'>
                                                <input class="form-control mb-2" type="text" name='name' placeholder="Имя" Value='{{ $user->name }}'>
                                                <input class="form-control mb-2" type="number" name='phone' placeholder="Телефон" Value='{{ $user->phone }}'>
                                                <input class="form-control mb-2" type="email" name="email" placeholder="Email" Value='{{ $user->email }}'>
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
                            <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Подтвердить удаление</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>Вы уверены, что хотите удалить клиента {{ $user->name }}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('clients.destroy', $user->id) }}" method="POST">
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