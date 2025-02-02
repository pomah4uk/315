<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование акции</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('promotion.edit') }}" method="POST">
                    @csrf
                    <input class="d-none" type="text" name='id' value='{{ $item->id }}'>
                    <input class="form-control mb-2" type="text" name='name' placeholder="Акция" value='{{ $item->name }}'>
                    <input class="form-control mb-2" type="text" name='description' placeholder="Описание" value='{{ $item->description }}'>
                    <input class="form-control mb-2" type="number" min="0" name='discount_percent' placeholder="Размер скидки" value='{{ $item->discount_percent }}'>
                    <input class="form-control mb-2" type="date" name='start_date' value='{{ $item->start_date }}'>
                    <input class="form-control mb-2" type="date" name='end_date' value='{{ $item->end_date }}'>
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