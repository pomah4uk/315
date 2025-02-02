<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование курса</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('courses.edit') }}" method="POST">
                    @csrf
                    <input class="d-none" type="text" name='id' value='{{ $item->id }}'>
                    <input class="form-control mb-2" type="text" name='name' placeholder="Название" value='{{ $item->name }}'>
                    <input class="form-control mb-2" type="text" name='description' placeholder="Описание" value='{{ $item->description }}'>
                    <input class="form-control mb-2" type="text" name='duration' placeholder="Продолжительность" value='{{ $item->duration }}'>
                    <input class="form-control mb-2" type="text" name='price' placeholder="Цена" value='{{ $item->price }}'>
                    <select class="form-select" name="status">
                        <option value="Активен" @if($item->status == 'Активен') selected @endif>Активен</option>
                        <option value="Не активен" @if($item->status == 'Не активен') selected @endif>Не активен</option>
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