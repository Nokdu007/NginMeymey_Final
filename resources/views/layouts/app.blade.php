<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Student Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #eef2f7; }
        .hero { background: linear-gradient(120deg, #4361ee, #3a0ca3); color: #fff; border-radius: 1rem 1rem 0 0; padding: 2rem 1.5rem; text-align: center; }
        .hero p { opacity: .85; margin: 0; }
        .stat { background: rgba(255,255,255,.15); border: 1px solid rgba(255,255,255,.25); border-radius: .75rem; padding: .75rem 1.25rem; min-width: 120px; }
        .stat strong { font-size: 1.6rem; display: block; }
        .panel { background: #fff; border-radius: 1rem; box-shadow: 0 10px 30px rgba(31, 41, 82, .08); overflow: hidden; }
        .badge-dept { background: #e8edff; color: #3a0ca3; font-weight: 600; }
        .table thead th { font-weight: 700; white-space: nowrap; }
        .section-title { color: #4361ee; font-weight: 600; border-bottom: 1px solid #e5e7eb; padding-bottom: .5rem; margin-bottom: 1rem; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark" style="background:#3a0ca3">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('students.index') }}"><i class="bi bi-mortarboard-fill"></i> SMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}" href="{{ route('students.index') }}">Students</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}" href="{{ route('departments.index') }}">Departments</a></li>
            </ul>
            <span class="navbar-text me-3"><i class="bi bi-person-circle"></i> {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-sm btn-outline-light"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
        </div>
    </div>
</nav>

<main class="container py-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
    @endif

    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
