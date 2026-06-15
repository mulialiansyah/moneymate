<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMate</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white">

            <div class="p-6 text-2xl font-bold">
                Tabungan
            </div>

            <nav class="mt-6">

                <a href="#" class="block px-6 py-3 hover:bg-gray-800">
                    📊 Dashboard
                </a>

                <a href="{{ route('categories.index') }}" class="block px-6 py-3 hover:bg-gray-800">
                    📁 Categories
                </a>

                <a href="{{ route('transactions.index') }}" class="block px-6 py-3 hover:bg-gray-800">
                    💸 Transactions
                </a>

                <a href="#" class="block px-6 py-3 hover:bg-gray-800">
                    🎯 Saving Goals
                </a>

                <a href="#" class="block px-6 py-3 hover:bg-gray-800">
                    📈 Reports
                </a>

            </nav>

        </aside>


        <!-- Main Content -->
        <main class="flex-1">

            <!-- Navbar -->
            <header class="bg-white shadow px-6 py-4 flex justify-between">

                <h1 class="font-semibold">
                    MoneyMate
                </h1>


                <div>
                    👤 {{ auth()->user()->name }}
                </div>

            </header>


            <!-- Content -->
            <section class="p-6">

                @yield('content')

            </section>

        </main>

    </div>

</body>

</html>
