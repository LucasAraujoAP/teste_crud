<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f8fafc; /* Fundo claro */
            }
            .dark body {
                background-color: #1a202c; /* Fundo escuro */
            }
        </style>
    </head>
    <body class="antialiased min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            <div class="text-center">
                @auth
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Bem-vindo de volta!</h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Você já está logado. Acesse seus produtos abaixo.</p>
                @else
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Bem-vindo</h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Faça login ou registre-se para continuar.</p>
                @endauth
            </div>

            <div class="mt-6">
                @if (Route::has('login'))
                    <div class="space-y-4">
                        @auth
                            <!-- Botão de Produtos (apenas para usuários logados) -->
                            <a href="{{ url('/products') }}" class="block w-full text-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Produtos
                            </a>
                        @else
                            <!-- Botão de Login (apenas para usuários não logados) -->
                            <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Login
                            </a>

                            <!-- Botão de Registrar (apenas para usuários não logados) -->
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block w-full text-center px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                                    Registrar
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>