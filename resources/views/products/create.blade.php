<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-6">
                    <a href="{{ route('products.index') }}" class="text-gray-800 hover:text-blue-500 transition duration-300">
                        Lista de Produtos
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-800 hover:text-red-500 transition duration-300">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Container Principal -->
    <div class="container mx-auto px-4 py-8">
        <!-- Título -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Criar Novo Produto</h1>

        <!-- Mensagens de Feedback -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulário -->
        <form action="{{ route('products.store') }}" method="POST" class="bg-white rounded-lg shadow p-6">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nome</label>
                <input type="text" id="name" name="name" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Digite o nome do produto">
            </div>
            <div class="mb-6">
                <label for="sku" class="block text-sm font-medium text-gray-700 mb-2">SKU</label>
                <input type="number" id="sku" name="sku" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Digite o SKU do produto">
            </div>
            <div class="mb-6">
                <label for="value" class="block text-sm font-medium text-gray-700 mb-2">Valor</label>
                <input type="number" step="0.01" id="value" name="value" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Digite o valor do produto">
            </div>
            <div class="flex justify-end space-x-4">
                <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition duration-300">
                    Voltar
                </a>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</body>
</html>