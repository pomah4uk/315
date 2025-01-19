@extends('admin.layouts.app')

@section('title', 'Студенты')

@section('content')
<div class="container-fluid bg-secondary">
    <h2 class='p-4'>Студенты</h2>
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
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Почта</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
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