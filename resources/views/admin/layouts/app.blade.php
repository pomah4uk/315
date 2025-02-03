<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Админ панель</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <div class="main-content">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="btn btn-link text-white" id="sidebarToggle">
                    <i class="fa fa-bars"></i>
                </button>
                <span class="navbar-brand">@yield('title')</span>
            </div>
        </nav>

        <div class="sidebar" id="sidebar">
            @include('admin.layouts.sidebar')
        </div>

        <div class="content p-4">
            @include('admin.components.alerts')
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html> 