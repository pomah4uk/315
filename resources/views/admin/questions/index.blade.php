@extends('admin.layouts.app')

@section('title', 'Вопрос-ответ')

@section('content')
    @component('admin.components.table', ['title' => 'Список вопросов', 'headers' => ['Вопрос', 'Ответ']])
        @foreach($questions as $item)
            <tr>
                <td>{{ $item->question }}</td>
                <td>{{ $item->answer }}</td>
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
                    <h5 class="modal-title">Добавить вопрос</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('questions.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Вопрос</label>
                            <textarea class="form-control" name="question" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ответ</label>
                            <textarea class="form-control" name="answer" rows="5" required></textarea>
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
    @foreach($questions as $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Редактировать вопрос</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('questions.edit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Вопрос</label>
                                <textarea class="form-control" name="question" rows="3" required>{{ $item->question }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ответ</label>
                                <textarea class="form-control" name="answer" rows="5" required>{{ $item->answer }}</textarea>
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
                        <p>Вы действительно хотите удалить этот вопрос?</p>
                        <div class="alert alert-info">
                            <strong>Вопрос:</strong> {{ $item->question }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <form action="{{ route('questions.destroy', $item->id) }}" method="POST" class="d-inline">
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