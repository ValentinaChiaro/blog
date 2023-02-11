<header class="max-w-4xl mx-auto mt-20 text-center">

<div class="max-w-xl mx-auto">
    <h1 class="text-4xl">Lorem <span class="text-blue-500"> ipsum dolor sit amet </span> elit.</h1>


    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">

    <!-- Category -->
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
            <x-category-dropdown/>
        </div>
        <!-- more filters -->
            <!-- <div class="bg-gray-100 inline-block rounded-xl">
                <select class="appearance-none bg-transparent py-2 px-5 text-sm font-semibold" name="" id="">
                    <option value="category" selected>More Filters</option>
                    <option value="category">ASDASDA</option>
                    <option value="category">ASDASDA</option>
                </select>
            </div> -->
            <div class="bg-gray-100 inline-flex inline-block rounded-xl py-2 px-5">
                <form action="/" method="Get">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" 
                    name="search" 
                    placeholder="Find Something" 
                    class="bg-transparent placeholder-black text-sm font-semibold" 
                    value="{{ request('search') }}">
                </form>
            </div>
    </div>
</div>
</header>