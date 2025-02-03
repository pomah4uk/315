@extends('admin.layouts.app')

@section('title', 'Акции')

@section('content')
    @component('admin.components.table', ['title' => 'Список акций', 'headers' => ['Название', 'Описание', 'Скидка %', 'Начало', 'Конец', 'Статус']])
        @foreach($promotion as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->discount_percent }}</td>
                <td>{{ $item->start_date }}</td>
                <td>{{ $item->end_date }}</td>
                <td>{{ $item->status }}</td>
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
                    <h5 class="modal-title">Добавить акцию</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('promotion.create') }}" method="POST">
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
                            <label class="form-label">Скидка %</label>
                            <input type="number" min="0" max="99" class="form-control" name="discount_percent" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Дата начала</label>
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Дата окончания</label>
                            <input type="date" class="form-control" name="end_date" required>
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
    @foreach($promotion as $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Редактировать акцию</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('promotion.edit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Название</label>
                                <input type="text" class="form-control" name="name" value="{{ $item->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Описание</label>
                                <textarea class="form-control" name="description" required>{{ $item->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Скидка %</label>
                                <input type="number" min="0" max="99" class="form-control" name="discount_percent" value="{{ $item->discount_percent }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Дата начала</label>
                                <input type="date" class="form-control" name="start_date" value="{{ $item->start_date }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Дата окончания</label>
                                <input type="date" class="form-control" name="end_date" value="{{ $item->end_date }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Статус</label>
                                <select class="form-select" name="status" required>
                                    <option value="Активен" {{ $item->status == 'Активен' ? 'selected' : '' }}>Активен</option>
                                    <option value="Не активен" {{ $item->status == 'Не активен' ? 'selected' : '' }}>Не активен</option>
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
                        <p>Вы действительно хотите удалить акцию "{{ $item->name }}"?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <form action="{{ route('promotion.destroy', $item->id) }}" method="POST" class="d-inline">
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