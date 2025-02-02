<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование вопроса</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('questions.edit') }}" method="POST">
                    @csrf
                    <input class="d-none" type="text" name='id' value='{{ $item->id }}'>
                    <input class="form-control mb-2" type="text" name='question' placeholder="Вопрос" value='{{ $item->question }}'>
                    <input class="form-control mb-2" type="text" name='answer' placeholder="Ответ" value='{{ $item->answer }}'>
                    <div class="modal-footer">
                        <button type="submit" class='btn btn-success'>Обновить</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 