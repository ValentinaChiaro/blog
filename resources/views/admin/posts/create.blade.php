<x-layout>
    <x-setting heading="Publish a new post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.input name="thumbnail" type="file" required />
            <x-form.textarea name="excerpt" required />
            <x-form.textarea name="body" required />

            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <div class="flex justify-between items-center mt-4">
                {{-- How to override component class --}}
                <input type="submit" name="draft" value="Draft"
                class="bg-gray-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-gray-600">
                <input type="submit" name="draft" value="Publish"
                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
            </div>
        </form>
    </x-setting>
</x-layout>
