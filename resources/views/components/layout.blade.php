<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.0.1/dist/tailwind.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
    html {
        scroll-behavior: smooth;
    }
    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .clamp.one-line {
        -webkit-line-clamp: 1;
    }
</style>
  </head>
    <title>Blog</title>
</head>
<body style="font-family: Open Sans, sans serif;">
    <section class="px-6 py-4">
    <nav class="flex justify-between items-center">
            <div>
                <a href="/" >
                    <img src="https://www.kadencewp.com/wp-content/uploads/2020/10/alogo-1.png" alt="Logo" width="100">
                </a>

            </div>
            <div class="mt-8 md:mt-0 flex items-center">
                @auth

                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-xs font-bold uppercase">Welcome, {{auth()->user()->name }}</button>
                    </x-slot>

                    @admin
                    <x-dropdown-item href="/admin/posts/{{ 'publish' }}" :active="request()->is('admin/posts/publish')">Dashboard</x-dropdown-item>

                    <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">Create post</x-dropdown-item>
                    @endadmin

                    <x-dropdown-item
                            href="#"
                            x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()"
                        >
                            Log Out
                    </x-dropdown-item>

                    <form action="/logout" method="post" id="logout-form" class="text-s font-semibold text-blue-500 ml-6" hidden>
                        @csrf
                    </form>

                </x-dropdown>

                @else

                <a href="/register" class="text-xs font-bold uppercase">Register</a>

                <a href="/login" class="text-xs font-bold uppercase p-3">Log In</a>

                @endauth

                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-4 px-3">Subscribe for updates</a>
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter"
                class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16"
        >
            <img src="" alt="" class="mx-auto -mb-6" style="width: 145px;">

            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf

                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <div>
                                <input id="email"
                                       name="email"
                                       type="text"
                                       placeholder="Your email address"
                                       class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                                @error('email')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
        <x-flash></x-flash>
</body>
</html>
