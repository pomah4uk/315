<div class="container-fluid">
    <div class="row">
        <div class="col">
            @include('admin.components.alerts')
            
            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#create">
                Добавить
            </button>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            @foreach($columns as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                @foreach($columns as $key => $column)
                                    <td>{{ $item->$key }}</td>
                                @endforeach
                                <td class="d-flex">
                                    <button type="button" class="btn btn-info mx-1" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">
                                        Редактировать
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $item->id }}">
                                        Удалить
                                    </button>
                                </td>
                            </tr>
                            
                            @include($editModalView, ['item' => $item])
                            @include('admin.components.modals.delete', [
                                'item' => $item,
                                'itemName' => $itemName,
                                'routeName' => $routeName
                            ])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 