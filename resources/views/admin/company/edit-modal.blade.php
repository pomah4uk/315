<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование компании</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('company.edit') }}" method="POST">
                    @csrf
                    <input class="d-none" type="text" name='id' value='{{ $item->id }}'>
                    <input class="form-control mb-2" type="text" name='name' placeholder="Название" value='{{ $item->name }}'>
                    <input class="form-control mb-2" type="text" name='address' placeholder="Адрес" value='{{ $item->address }}'>
                    <input class="form-control mb-2" type="number" name='phone' placeholder="Телефон" value='{{ $item->phone }}'>
                    <input class="form-control mb-2" type="text" name='description' placeholder="Описание" value='{{ $item->description }}'>
                    <input class="form-control mb-2" type="email" name='email' placeholder="Почта" value='{{ $item->email }}'>
                    <input class="form-control mb-2" type="text" name='social_media' placeholder="Соцсети" value='{{ $item->social_media }}'>
                    <input class="form-control mb-2" type="text" name='working_hours' placeholder="Время работы" value='{{ $item->working_hours }}'>
                    <div class="modal-footer">
                        <button type="submit" class='btn btn-success'>Обновить</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 