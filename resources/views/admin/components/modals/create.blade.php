<div class="modal fade" id="create" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route($routeName.'.create') }}" method="POST">
                    @csrf
                    @foreach($fields as $name => $field)
                        @if($field['type'] === 'select')
                            <select class="form-select mb-2" name="{{ $name }}">
                                @foreach($field['options'] as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        @else
                            <input 
                                class="form-control mb-2" 
                                type="{{ $field['type'] }}" 
                                name="{{ $name }}" 
                                placeholder="{{ $field['placeholder'] }}"
                                @if(isset($field['min'])) min="{{ $field['min'] }}" @endif
                                @if(isset($field['value'])) value="{{ $field['value'] }}" @endif
                            >
                        @endif
                    @endforeach
                    <div class="modal-footer">
                        <button type="submit" class='btn btn-success'>Добавить</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 