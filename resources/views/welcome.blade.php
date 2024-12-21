<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
           
                <div>
                    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 mt-4 mb-4 text-end">
                        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                            <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                                @if (Route::has('login'))
                                    <nav class="-mx-3 flex flex-1 justify-end">
                                        @auth
                                            <a
                                                href="{{ url('/dashboard') }}"
                                                class="btn btn-primary rounded-md px-3 py-2 me-3 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                                Dashboard
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('login') }}"
                                                class="btn btn-primary rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                                Log in
                                            </a>
        
                                            @if (Route::has('register'))
                                                <a
                                                    href="{{ route('register') }}"
                                                    class="btn btn-primary rounded-md px-3 py-2 me-3 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                                    Register
                                                </a>
                                            @endif
                                        @endauth
                                    </nav>
                                @endif
                            </header>
                        </div>
                    </nav>
                </div>
            
            <main>
                <div class="text-center .img-fluid mt-4 mb-4">
                    <img  src="/img/image.png"  width="800" alt="">
                </div>
                
            </main>

            <footer class="mx-auto text-center">
                <h5 class="text-center">JMKV Hardware | credit @ TCC-ICT</h5>
            </footer>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
         integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
    </body>
</html>
