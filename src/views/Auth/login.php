<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[url('/public/assets/img/67c7a14841e2e1e2456bae97ec293a07.jpg')] bg-cover bg-center bg-no-repeat bg-fixed min-h-screen flex items-center justify-center font-sans p-4">

    <form action="/public/index.php" method="get" class="w-full max-w-lg p-8 bg-white/50 rounded-[10px] shadow-lg hover:shadow-2xl transition-all duration-500">
        
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-900">Iniciar sesión</h1>

        <div class="mb-4">
            <label for="email" class="block mb-2 font-semibold text-gray-800">Correo electrónico</label>
            <input 
                id="email" 
                name="email"
                class="w-full p-3 border-2 border-black rounded-[5px] bg-gray-50 text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400" 
                type="email" 
                placeholder="Ingresa tu correo electrónico" 
                required
            >
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-2 font-semibold text-gray-800">Contraseña</label>
            <input 
                id="password" 
                name="password"
                class="w-full p-3 border-2 border-black rounded-[5px] bg-gray-50 text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-400" 
                type="password" 
                placeholder="Ingresa tu Contraseña" 
                required
            >
        </div>

        <p class="mb-6 text-gray-800">
            No tienes cuenta 
            <a href="Register-form.html" class="text-blue-900 italic hover:underline">Registrate</a>
        </p>

        <button type="submit" class="w-full p-3 text-xl font-bold text-black bg-[#6FCAF1] border-[3px] border-black rounded-[4px] shadow-none hover:shadow-xl transition-all duration-500 cursor-pointer">
            Iniciar sesión
        </button>

    </form>
 
</body>
</html>