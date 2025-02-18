<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Links à Esquerda -->
                <div class="flex items-center space-x-6">
                    <a href="{{ route('products.index') }}" class="text-gray-800 hover:text-blue-500 transition duration-300">
                        Lista de Produtos
                    </a>
                </div>

                <!-- Logout à Direita -->
                <div class="flex items-center">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center text-gray-800 hover:text-red-500 transition duration-300">
                            <span class="mr-2">Sair</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Container Principal -->
    <div class="container mx-auto px-4 py-8">
        <!-- Título -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Detalhes do Produto</h1>

        <!-- Mensagens de Feedback -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <!-- Card de Detalhes do Produto -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Informações do Produto -->
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $product->name }}</h2>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <span class="text-gray-600 font-medium w-24">SKU:</span>
                            <span class="text-gray-800">{{ $product->sku }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-gray-600 font-medium w-24">Valor:</span>
                            <span class="text-gray-800">R$ {{ number_format($product->value, 2, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Ações -->
                <div class="flex items-center justify-end space-x-4">
                    <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">
                        Editar
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition duration-300">
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Botão Voltar -->
        <div class="mt-8">
            <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition duration-300">
                Voltar para Lista de Produtos
            </a>
        </div>
    </div>
</body>
</html>