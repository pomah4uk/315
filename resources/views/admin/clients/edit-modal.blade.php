<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование клиента</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('clients.edit') }}" method="POST">
                    @csrf
                    <input class="d-none" type="text" name='id' value='{{ $item->id }}'>
                    <input class="form-control mb-2" type="text" name='name' placeholder="Имя" value='{{ $item->name }}'>
                    <input class="form-control mb-2" type="number" name='phone' placeholder="Телефон" value='{{ $item->phone }}'>
                    <input class="form-control mb-2" type="email" name="email" placeholder="Email" value='{{ $item->email }}'>
                    <div class="modal-footer">
                        <button type="submit" class='btn btn-success'>Обновить</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 