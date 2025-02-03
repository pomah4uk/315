@extends('admin.layouts.app')

@section('title', 'Курсы')

@section('content')
    @component('admin.components.table', ['title' => 'Список курсов', 'headers' => ['Название', 'Описание', 'Длительность', 'Цена', 'Статус']])
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->name }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->duration }}</td>
                <td>{{ $course->price }}</td>
                <td>{{ $course->status }}</td>
                <td>
                    @include('admin.components.actions', ['id' => $course->id])
                </td>
            </tr>
        @endforeach
    @endcomponent

    {{-- Модальное окно создания --}}
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить курс</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('courses.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Название</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Описание</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Длительность</label>
                            <input type="text" class="form-control" name="duration" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Цена</label>
                            <input type="number" class="form-control" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Статус</label>
                            <select class="form-select" name="status" required>
                                <option value="Активен">Активен</option>
                                <option value="Не активен">Не активен</option>
                            </select>
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
    @foreach($courses as $course)
        <div class="modal fade" id="editModal{{ $course->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Редактировать курс</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('courses.edit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $course->id }}">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Название</label>
                                <input type="text" class="form-control" name="name" value="{{ $course->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Описание</label>
                                <textarea class="form-control" name="description" required>{{ $course->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Длительность</label>
                                <input type="text" class="form-control" name="duration" value="{{ $course->duration }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Цена</label>
                                <input type="number" class="form-control" name="price" value="{{ $course->price }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Статус</label>
                                <select class="form-select" name="status" required>
                                    <option value="Активен" {{ $course->status == 'Активен' ? 'selected' : '' }}>Активен</option>
                                    <option value="Не активен" {{ $course->status == 'Не активен' ? 'selected' : '' }}>Не активен</option>
                                </select>
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
        <div class="modal fade" id="deleteModal{{ $course->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Подтверждение удаления</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Вы действительно хотите удалить курс "{{ $course->name }}"?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
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