<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <x-panel>
                <form action="/register" method="POST">
                    @csrf
                    
                    <x-form.input name="name"/>
                    <x-form.input name="username"/>
                    <x-form.input name="email"/>
                    <x-form.input name="password"  autocomplete="new-password" type="password"/>
    
                    <x-form.button>Register</x-form.button>
    
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>