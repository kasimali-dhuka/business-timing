<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ env('APP_NAME') }}</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        @vite('resources/css/app.css')
        
    </head>
    <body class="relative min-h-screen">
        <header class="h-20">
            <nav class="top-navbar fixed top-0 left-0 z-50 right-0 bg-white">
                <div class="nav-wrapper px-5 bg-slate-200">
                    <div class="nav-container py-3 flex justify-between items-center">
                        <div class="nav-brand">
                            <h1 class="text-blue-700 font-bold text-4xl">
                                <a href="{{ route('index') }}" class="no-underline">
                                    Business Timing
                                </a>
                            </h1>
                        </div>
                        <div class="nav-action">
                            <a href="{{ route('business.add') }}" class="no-underline text-white bg-sky-400 py-2 px-3 rounded-lg border-2 border-sky-400 hover:bg-transparent hover:!text-sky-700 transition-colors">
                                Add Business
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>

        <footer class="h-20">
            <div class="footer-wrapper absolute bottom-0 left-0 right-0 bg-slate-700">
                <div class="text-center flex justify-center items-center py-3">
                    <span class="text-white text-sm font-light">Business Timing@2024 | Developed by Kasimali</span>
                </div>
            </div>
        </footer>

        
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        
        @stack('extra-scripts')
    </body>
</html>