<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar - Citas Médicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; }
        .login-container { max-width: 400px; margin: 100px auto; padding: 30px; }
        h1 { font-size: 1.6rem; margin-bottom: 30px; color: #333; text-align: center; font-weight: 600; }
        input { font-size: 0.95rem; }
        label { font-size: 0.9rem; color: #555; font-weight: 500; }
        button { font-size: 0.95rem; font-weight: 500; }
        .info { font-size: 0.85rem; color: #666; margin-top: 20px; line-height: 1.6; }
    </style>
</head>
<body style="background-color: #fafafa;">
    <div class="login-container">
        <h1>Citas Médicas</h1>
        
        @if ($errors->any())
            <div style="background: #f8d7da; border: 1px solid #f5c6cb; padding: 10px 12px; border-radius: 4px; margin-bottom: 20px; color: #721c24; font-size: 0.9rem;">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            
            <div class="mb-3">
                <label>Tu correo</label>
                <input type="email" class="form-control" name="email" value="admin@citas-medicas.com" required>
            </div>

            <div class="mb-3">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="password" value="password123" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>

        <div class="info">
            <strong>Usuario de prueba:</strong><br>
            admin@citas-medicas.com<br>
            password123
        </div>
    </div>
</body>
</html>
