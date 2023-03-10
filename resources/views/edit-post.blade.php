<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit post</h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="bg-white p-6 my-6">
            <form action="{{route('update-post', $post->id)}}" method="post"> @csrf
                <p class="mb-4">
                    <input type="text" value="{{$post->title}}" name="title">
                </p>
                <div class="mb-4">
                    <textarea name="content"cols="30" rows="10">{{$post->content}}</textarea>
                </div>
                <button class="px-4 py-4 rounded bg-black text-white" type="submit">Update</button>

            </form>
        </div>

    </div>



</x-app-layout>
