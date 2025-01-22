@extends('admin.layouts.app')

@section('title', 'Компания')

@section('content')
<div class="container-fluid bg-info">
    <h2 class='p-4'>Компания</h2>
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
                    <!-- Добавление компании -->
            <div class="modal fade" id="create" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Создание компании</h5>
                        </div>
                        <div class="modal-body">
                            <form class="client-form" action="{{ route('company.create') }}" method="POST">
                                @csrf
                                <input class="form-control mb-2" type="text" name='name' placeholder="Имя">
                                <input class="form-control mb-2" type="text" name='address' placeholder="Адрес">
                                <input class="form-control mb-2" type="number" name="phone" placeholder="Телефон">
                                <input class="form-control mb-2" type="text" name="description" placeholder="Описание">
                                <input class="form-control mb-2" type="email" name="email" placeholder="Почта">
                                <input class="form-control mb-2" type="text" name="social_media" placeholder="Соцюсети">
                                <input class="form-control mb-2" type="text" name="working_hours" placeholder="Время работы">
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
                            <th>Название</th>
                            <th>Адрес</th>
                            <th>Телефон</th>
                            <th>Описание</th>
                            <th>Почта</th>
                            <th>Соц.сети</th>
                            <th>Время работы</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($company as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->social_media }}</td>
                                <td>{{ $item->working_hours }}</td> 
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
                                            <form class="client-form" action="{{ route('company.edit') }}" method="POST">
                                                @csrf
                                                <input class="d-none" type="text" name='id' value='{{ $item->id }}'>
                                                <input class="form-control mb-2" type="text" name='name' placeholder="Имя" value="{{ $item->name }}">
                                                <input class="form-control mb-2" type="text" name='address' placeholder="Адрес" value="{{ $item->address }}">
                                                <input class="form-control mb-2" type="number" name="phone" placeholder="Телефон" value="{{ $item->phone }}">
                                                <input class="form-control mb-2" type="text" name="description" placeholder="Описание" value="{{ $item->description }}">
                                                <input class="form-control mb-2" type="email" name="email" placeholder="Почта" value="{{ $item->email }}">
                                                <input class="form-control mb-2" type="text" name="social_media" placeholder="Соцюсети" value="{{ $item->social_media }}">
                                                <input class="form-control mb-2" type="text" name="working_hours" placeholder="Время работы" value="{{ $item->working_hours }}">
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
                                            <p>Вы уверены, что хотите удалить клиента {{ $item->name }}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('company.destroy', $item->id) }}" method="POST">
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