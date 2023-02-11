@if (session()->has('success'))
        <div x-data="{ show:true }"
        x-init="setTimeout(()=> show = false, 4000)"
        x-show="show"
        class="fixed right-0 bg-blue-500 px-4 rounded-xl bottom-2 right-2 text-white p-2">
            <p>{{ session('success') }}</p>
        </div>
        @endif  