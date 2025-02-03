@extends('admin.layouts.app')

@section('title', 'Услуги')

@section('content')
    @component('admin.components.table', ['title' => 'Список услуг', 'headers' => ['Slug', 'Тип']])
        @foreach($slugs as $item)
            <tr>
                <td>{{ $item->slug }}</td>
                <td>{{ $item->type }}</td>
                <td>
                    @include('admin.components.actions', ['id' => $item->id])
                </td>
            </tr>
        @endforeach
    @endcomponent

    {{-- Модальное окно создания --}}
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить услугу</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('slugs.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" required 
                                   pattern="[a-z0-9-]+" title="Только строчные буквы, цифры и дефис">
                            <div class="form-text">Например: online-course-1</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Тип</label>
                            <select class="form-select" name="type" required>
                                <option value="course">Курс</option>
                                <option value="promotion">Акция</option>
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
    @foreach($slugs as $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Редактировать услугу</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('slugs.edit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ $item->slug }}" required
                                       pattern="[a-z0-9-]+" title="Только строчные буквы, цифры и дефис">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Тип</label>
                                <select class="form-select" name="type" required>
                                    <option value="course" {{ $item->type == 'course' ? 'selected' : '' }}>Курс</option>
                                    <option value="promotion" {{ $item->type == 'promotion' ? 'selected' : '' }}>Акция</option>
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
        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Подтверждение удаления</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Вы действительно хотите удалить услугу?</p>
                        <div class="alert alert-info">
                            <strong>Slug:</strong> {{ $item->slug }}<br>
                            <strong>Тип:</strong> {{ $item->type }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <form action="{{ route('slugs.destroy', $item->id) }}" method="POST" class="d-inline">
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