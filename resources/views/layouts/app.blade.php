<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Assessment Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content-wrapper {
            flex: 1 0 auto;
        }
        .footer {
            flex-shrink: 0;
            background-color: #f8f9fa;
            padding: 1rem 0;
            margin-top: auto;
        }
        .navbar-brand {
            font-weight: 600;
            font-size: 1.5rem;
        }
        .assessment-header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 1rem;
        }
        .nav-link {
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 4px;
        }
        .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
        }
        .nav-link.active {
            background-color: rgba(255,255,255,0.2);
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <header class="assessment-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1>Laravel Developer Assessment</h1>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <span class="badge bg-light text-primary fs-6">Laravel Version 10</span>
                    </div>
                </div>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('dashboard') }}">Assessment Portal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('assessment1*') ? 'active' : '' }}" href="{{ route('assessment1.index') }}">Assessment 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('assessment2*') ? 'active' : '' }}" href="{{ route('assessment2.index') }}">Assessment 2</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container py-4">
            @yield('content')
        </div>
    </div>

    <footer class="footer bg-light border-top">
        <div class="container text-center">
            <p class="mb-0 py-3">© {{ date('Y') }} Laravel Assessment Portal. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>