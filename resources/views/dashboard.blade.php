<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <div class="flex-1">
                            <h2>Add new post</h2>
                            <form action="{{ route('add-post') }}" method="post"> @csrf

                                <p><input name="title" value="{{ old('title') }}" type="text"
                                        placeholder="Post title"></p>
                                <p>
                                    <textarea name="content" value="{{ old('content') }}" cols="30" rows="10"></textarea>
                                </p>
                                <button type="submit">Add Post</button>
                            </form>
                        </div>
                        <div class="flex-1">
                            <h2>Posts</h2>
                            <ul>
                                <li><a href=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>