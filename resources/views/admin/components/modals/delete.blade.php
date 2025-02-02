<div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Подтвердить удаление</h5>
            </div>
            <div class="modal-body">
                <p>Вы уверены, что хотите удалить {{ $itemName }} {{ $item->name }}?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route($routeName.'.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class='btn btn-danger'>Удалить</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                </form>
            </div>
        </div>
    </div>
</div> 