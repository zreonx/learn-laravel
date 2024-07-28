<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body>

    <header class="bg-slate-800 text-slate-900">
        <nav>
            <a href="{{ route("posts.index") }}" class="nav-link">Home</a>

            @auth
                <div class="relative grid place-items-center" x-data="{ open: false }">
                    {{-- Dropdown menu button --}}
                    <button @click="open = !open" type="button" class="round-btn">
                        <img src="https://avatar.iran.liara.run/public" alt="">
                    </button>

                    {{-- Dropdown menu --}}
                    <div x-show="open" @click.outside="open = false" class="bg-white shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden font-light">
                        <p class="pl-4 py-2 border-b border-slate-200">{{ auth()->user()->username }}</p>
                        <a href="{{ route('dashboard') }}" class="block hover:bg-slate-100 pl-4 pr-8 py-2 mb-1">Dashboard</a>
                            <form class="py-0 mb-0" action="{{ route('logout') }}" method="POST">

                            @csrf
                            <button type="submit" class="hover:bg-slate-100 pl-4 pt-2 pb-3    block w-full text-left">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
           @guest
                <div class="flex items-center gap-4">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </div>
           @endguest
        </nav>
    </header>
   <main class="py-8 px-4 mx-auto max-w-screen-lg">
    {{ $slot }}
   </main>

    <script>
        // Set form: x-data="formSubmit" @submit.prevent="submit" and button: x-ref="btn"
        document.addEventListener('alpine:init', () => {
            Alpine.data('formSubmit', () => ({
                submit() {
                    this.$refs.btn.disabled = true;
                    // this.$refs.btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
                    // this.$refs.btn.classList.add('bg-indigo-400');
                    this.$refs.btn.innerHTML =
                        `<span class="absolute left-2 top-1/2 -translate-y-1/2 transform">
                        <i class="fa-solid fa-spinner animate-spin"></i>
                        </span>Please wait...`;

                    this.$el.submit()
                }
            }))
        })
    </script>
</body>
</html>