<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="main-content">
        <nav class="navbar navbar-dark bg-secondary">
            <div class="container-fluid d-flex align-items-center">
                <button class="navbar-toggler border-0" type="button">
                    <i class="fa fa-bars"></i>
                </button>
                <h2 class="text-white m-0 ms-3">@yield('title')</h2>
            </div>
        </nav>
        
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="sidebar bg-light hidden" id="sidebar">
                        @include('admin.layouts.sidebar')
                    </div>
                </div>
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>