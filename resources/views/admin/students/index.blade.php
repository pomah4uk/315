@extends('admin.layouts.app')

@section('title', 'Студенты')

@section('content')
    @component('admin.components.table', ['title' => 'Список студентов', 'headers' => ['Имя', 'Email', 'Телефон']])
        @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>
                    @include('admin.components.actions', ['id' => $student->id])
                </td>
            </tr>
        @endforeach
    @endcomponent

    {{-- Модальное окно создания --}}
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавить студента</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('students.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Имя</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Телефон</label>
                            <input type="text" class="form-control" name="phone" required>
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
    @foreach($students as $student)
        <div class="modal fade" id="editModal{{ $student->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Редактировать студента</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('students.edit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $student->id }}">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Имя</label>
                                <input type="text" class="form-control" name="name" value="{{ $student->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $student->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Телефон</label>
                                <input type="text" class="form-control" name="phone" value="{{ $student->phone }}" required>
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
        <div class="modal fade" id="deleteModal{{ $student->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Подтверждение удаления</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Вы действительно хотите удалить студента "{{ $student->name }}"?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
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