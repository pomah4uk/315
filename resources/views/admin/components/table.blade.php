<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $title }}</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fas fa-plus"></i> Добавить
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        @foreach($headers as $header)
                            <th>{{ $header }}</th>
                        @endforeach
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    {{ $slot }}
                </tbody>
            </table>
        </div>
    </div>
</div> 