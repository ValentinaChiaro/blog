<x-layout>
    <x-setting heading="All posts">
        <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="text-sm font-medium text-gray-900">
                                    <a href="/posts/{{ $post->slug }}">
                                        {{ $post->title }}
                                    </a>
                                </div>
                            </div>
                        </td>
                        @if ($post->status == 'publish')
                        <td class="text-sm font-medium text-green-500">
                                {{ucwords( $post->status )}}
                        </td>

                        @else

                        <td class="text-sm font-medium text-gray-400">
                            {{ucwords( $post->status )}}
                        </td>
                        @endif

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <form method="POST" action="/admin/posts/{{ $post->id }}">
                                @csrf
                                @method('DELETE')

                                <button class="text-xs text-gray-400">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-setting>
</x-layout>
