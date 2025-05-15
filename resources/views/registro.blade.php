<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Registro de Usuario</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 text-center px-4 py-2 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/registro') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label class="block text-sm">Nombre</label>
                    <input type="text" name="nombre" class="w-full border-gray-300 rounded" value="{{ old('nombre') }}" required>
                </div>
                <div class="w-1/2">
                    <label class="block text-sm">Apellido</label>
                    <input type="text" name="apellido" class="w-full border-gray-300 rounded" value="{{ old('apellido') }}" required>
                </div>
            </div>

            <div>
                <label class="block text-sm">Usuario</label>
                <input type="text" name="usuario" class="w-full border-gray-300 rounded" value="{{ old('usuario') }}" required>
            </div>

            <div>
                <label class="block text-sm">Cédula de Identidad</label>
                <input type="text" name="ci" class="w-full border-gray-300 rounded" value="{{ old('ci') }}" required>
            </div>

            <div>
                <label class="block text-sm">Dirección</label>
                <input type="text" name="direccion" class="w-full border-gray-300 rounded" value="{{ old('direccion') }}">
            </div>

            <div>
                <label class="block text-sm">Teléfono</label>
                <input type="text" name="telefono" class="w-full border-gray-300 rounded" value="{{ old('telefono') }}">
            </div>

            <div>
                <label class="block text-sm">Correo Electrónico</label>
                <input type="email" name="correo" class="w-full border-gray-300 rounded" value="{{ old('correo') }}" required>
            </div>

            <div>
                <label class="block text-sm">Contraseña</label>
                <input type="password" name="password" id="password" class="w-full border-gray-300 rounded" required>
                <div class="mt-2 flex items-center gap-2">
                    <input type="checkbox" onclick="togglePassword()" class="h-4 w-4 text-indigo-600">
                    <label class="text-sm text-gray-600">Mostrar contraseña</label>
                </div>
            </div>

            <div>
                <label class="block text-sm">Rol</label>
                <select name="rol" class="w-full border-gray-300 rounded" required>
                    <option value="cliente" {{ old('rol') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                    <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">Registrarse</button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ url('/login') }}" class="text-sm text-indigo-600 hover:underline">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const field = document.getElementById('password');
            field.type = field.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>
