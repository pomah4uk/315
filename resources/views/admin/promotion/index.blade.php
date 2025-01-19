@extends('admin.layouts.app')

@section('title', 'Акции')

@section('content')
<div class="container-fluid bg-secondary">
    <h2 class='p-4'>Акции</h2>
</div>
<div class="container-fluid">
    <div class='row'>
        <div class="col-2">
            @include('admin.layouts.sidebar')
        </div>
        <div class="col-10 pt-3">
            <button class="btn btn-primary mb-4">Добавить</button>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Акция</th>
                            <th>Опписание</th>
                            <th>Скидка</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($promotion as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->discount_percent }}</td>
                                <td>
                                    <a href="" class="btn btn-info">Редактировать</a>
                                    <form action="" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class='btn btn-danger'>Удалить</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection