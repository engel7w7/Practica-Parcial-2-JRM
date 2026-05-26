<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Citas Médicas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; padding: 20px; }
        nav { background: white; border-bottom: 1px solid #eee; padding: 15px 0; }
        nav a { text-decoration: none; color: #333; padding: 0 15px; }
        nav a:hover { color: #0066cc; }
        .container { max-width: 900px; margin: 0 auto; }
        .navbar-brand { font-size: 1.1rem; font-weight: 500; color: #333; }
        h1 { font-size: 1.8rem; margin-bottom: 20px; color: #333; font-weight: 600; }
        .card { border: none; background: white; }
        .btn { border-radius: 4px; font-weight: 500; }
        .btn-primary { background-color: #0066cc; border: none; }
        .btn-primary:hover { background-color: #0052a3; }
        table { font-size: 0.95rem; }
        .alert { border: none; border-radius: 4px; }
    </style>
</head>
<body style="background-color: #fafafa;">
    <nav>
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <a class="navbar-brand" href="/">Citas Médicas</a>
            </div>
            <div style="display: flex; gap: 20px; align-items: center;">
                <a href="{{ route('medicos.index') }}" style="font-size: 0.9rem;">Médicos</a>
                <a href="{{ route('especialidades.index') }}" style="font-size: 0.9rem;">Especialidades</a>
                <a href="{{ route('pacientes.index') }}" style="font-size: 0.9rem;">Pacientes</a>
                @auth
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0; display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #0066cc; cursor: pointer; font-size: 0.9rem; padding: 0;">Salir</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 30px;">
        @if ($message = session('success'))
            <div style="background: #d4edda; border: 1px solid #c3e6cb; padding: 12px 15px; border-radius: 4px; margin-bottom: 20px; color: #155724;">
                {{ $message }}
            </div>
        @endif

        @if ($errors->any())
            <div style="background: #f8d7da; border: 1px solid #f5c6cb; padding: 12px 15px; border-radius: 4px; margin-bottom: 20px; color: #721c24;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="text-center py-5">
        <p class="mb-0">xd</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
