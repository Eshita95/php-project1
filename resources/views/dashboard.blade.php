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
                            <h2 class="font-semibold text-lg mb-6">Add new post</h2>

                            <form action="{{ route('add-post') }}" method="post"> @csrf

                                <p class="mb-2"><input
                                        class="w-full px-4 py-2 border
                                    @error('title') border-red-300 @else

                                 border-gray-200 @enderror "
                                        name="title" value="{{ old('title') }}" type="text"
                                        placeholder="Post title">

                                    @error('title')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </p>

                                <p class="mb-2">
                                    <textarea class="w-full px-4 py-2 border border-gray-200 " name="content" value="{{ old('content') }}" cols="30"
                                        rows="5"></textarea>
                                </p>

                                <button class="px-4 py-4 rounded bg-black text-white" type="submit">Add Post</button>
                            </form>
                        </div>
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white justify-center">
                            <h2>Posts</h2>
                            <ul>
                                @foreach ($posts as $post)
                                    <li class="px-4 mb-2 "><a href="">{{ $post->title }}</a> <span><a
                                                href="{{ route('edit-post', $post->id) }}"
                                                class="text-white inline-block text-xs bg-green-500 rounded px-4 py-2"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </a></span>

                                            <form method="post" action="{{route('delete-post',$post->id)}}">@csrf
                                                <button class="ml-2 text-white text-xs bg-red-500 rounded px-4 py-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                      </svg>
                                                </button>

                                            </form>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
