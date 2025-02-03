@extends('admin.layouts.app')

@section('title', 'Компания')

@section('content')
    @component('admin.components.table', ['title' => 'Информация о компании', 'headers' => ['Название', 'Адрес', 'Телефон', 'Email', 'Описание', 'Соц.сети', 'Режим работы']])
        @foreach($company as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ Str::limit($item->description, 50) }}</td>
                <td>{{ $item->social_media }}</td>
                <td>{{ $item->working_hours }}</td>
                <td>
                    @include('admin.components.actions', ['id' => $item->id])
                </td>
            </tr>
        @endforeach
    @endcomponent

    {{-- Модальное окно создания --}}
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить информацию о компании</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('company.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Название</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Телефон</label>
                                <input type="text" class="form-control" name="phone" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Адрес</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Описание</label>
                            <textarea class="form-control" name="description" rows="3" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Социальные сети</label>
                                <input type="text" class="form-control" name="social_media" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Режим работы</label>
                                <input type="text" class="form-control" name="working_hours" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Модальные окна редактирования --}}
    @foreach($company as $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Редактировать информацию</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('company.edit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Название</label>
                                    <input type="text" class="form-control" name="name" value="{{ $item->name }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $item->email }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Телефон</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $item->phone }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Адрес</label>
                                    <input type="text" class="form-control" name="address" value="{{ $item->address }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Описание</label>
                                <textarea class="form-control" name="description" rows="3" required>{{ $item->description }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Социальные сети</label>
                                    <input type="text" class="form-control" name="social_media" value="{{ $item->social_media }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Режим работы</label>
                                    <input type="text" class="form-control" name="working_hours" value="{{ $item->working_hours }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Модальное окно удаления --}}
        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Подтверждение удаления</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Вы действительно хотите удалить информацию о компании "{{ $item->name }}"?</p>
                        <div class="alert alert-warning">
                            Это действие нельзя будет отменить.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <form action="{{ route('company.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection 