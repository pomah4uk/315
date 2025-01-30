@extends('admin.layouts.app')

@section('title', 'Акции')

@section('content')
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#create">Добавить</button>

    <!-- Добавление акций -->
<div class="modal fade" id="create" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Создание акции</h5>
            </div>
            <div class="modal-body">
                <form class="form" action="{{ route('promotion.create') }}" method="POST">
                @csrf
                    <input class="form-control mb-2" type="text" name='name' placeholder="Акция">
                    <input class="form-control mb-2" type="text" name='description' placeholder="Описание">
                    <input class="form-control mb-2" type="number" min="0" name='discount_percent' placeholder="Размер скидки">
                    <input class="form-control mb-2" type="date" name='start_date' placeholder="Начало">
                    <input class="form-control mb-2" type="date" name='end_date' placeholder="Конец">
                    <select class="form-select" name="status">
                        <option value="Active">Активен</option>
                        <option value="inactive">Не активен</option>
                    </select>
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
                <th>Акция</th>
                <th>Описание</th>
                <th>Скидка %</th>
                <th>Начало</th>
                <th>Конец</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotion as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->discount_percent }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>{{ $item->end_date }}</td>
                    <td>{{ $item->status }}</td>
                    <td class="d-flex">
                        <button type="button" class="btn btn-info mx-1" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">Редактировать</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $item->id }}">Удалить</button>
                    </td>
                </tr>

                <!-- Редактирование акций -->
                <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Редактирование</h5>
                            </div>
                            <div class="modal-body">
                                <form class="form" action="{{ route('promotion.edit') }}" method="POST">
                                    @csrf
                                    <input class="d-none" type="text" name='id' value='{{ $item->id }}'>
                                    <input class="form-control mb-2" type="text" name='name' placeholder="Акция" value="{{ $item->name}}">
                                    <input class="form-control mb-2" type="text" name='description' placeholder="Описание" value="{{ $item->description}}">
                                    <input class="form-control mb-2" type="number" min="0" name='discount_percent' placeholder="Размер скидки" value="{{ $item->discount_percent}}">
                                    <input class="form-control mb-2" type="date" name='start_date' value="{{ $item->start_date }}">
                                    <input class="form-control mb-2" type="date" name='end_date' value="{{ $item->end_date}}">
                                    <select class="form-select" name="status" value="{{ $item->status}}">
                                        <option>Статус...</option>
                                        <option value="Active">Активен</option>
                                        <option value="inactive">Не активен</option>
                                    </select>
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
                                <p>Вы уверены, что хотите удалить акцию {{ $item->name }}?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('promotion.destroy', $item->id) }}" method="POST">
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
@endsection