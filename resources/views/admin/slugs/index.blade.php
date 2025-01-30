@extends('admin.layouts.app')

@section('title', 'Услуги')

@section('content')
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#create">Добавить</button>
        <!-- Добавление услуг -->
<div class="modal fade" id="create" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Создание услуги</h5>
            </div>
            <div class="modal-body">
                <form class="slug-form" action="{{ route('slugs.create') }}" method="POST">
                    @csrf
                    <input class="form-control mb-2" type="text" name='slug' placeholder="Slug">
                    <input class="form-control mb-2" type="text" name='type' placeholder="Type">
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
                <th>Slug</th>
                <th>Type</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($slugs as $slug)
                <tr>
                    <td>{{ $slug->slug }}</td>
                    <td>{{ $slug->type }}</td>
                    <td>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit{{ $slug->id }}">Редактировать</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $slug->id }}">Удалить</button>
                    </td>
                </tr>
                            <!-- Редоктирование услуг -->
                <div class="modal fade" id="edit{{ $slug->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Редактирование</h5>
                            </div>
                            <div class="modal-body">
                                <form class="slug-form" action="{{ route('slugs.edit') }}" method="POST">
                                    @csrf
                                    <input class="d-none" type="text" name='id' value='{{ $slug->id }}'>
                                    <input class="form-control mb-2" type="text" name='slug' placeholder="Slug" Value='{{ $slug->slug }}'>
                                    <input class="form-control mb-2" type="text" name='type' placeholder="Type" Value='{{ $slug->type }}'>
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
                <div class="modal fade" id="delete{{ $slug->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Подтвердить удаление</h5>
                            </div>
                            <div class="modal-body">
                                <p>Вы уверены, что хотите удалить услугу {{ $slug->slug }}?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('slugs.destroy', $slug->id) }}" method="POST">
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