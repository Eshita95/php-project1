<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white justify-center">
        <h2>Posts</h2>
        <ul>
            @foreach ($posts as $post)
                <li class="px-4 mb-2 "><a href="">{{ $post->title }}</a> <span><a href="{{route('edit-post',$post->id)}}"
                            class="text-white text-xs bg-green-500 rounded px-4 mx-2">Edit</a></span></li>
            @endforeach
        </ul>
    </div>

    </div>
</x-app-layout>
