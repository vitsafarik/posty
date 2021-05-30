@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 p-6 bg-gray-200 rounded-lg">
            <form action="{{ route('posts') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only"></label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500                        
                    @enderror" placeholder="Post something!"></textarea>
                    @error('body')
                        <div class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="px-4 py-2 font-medium text-white bg-blue-500 rounded">Post</button>
                </div>
            </form>

            @if ($posts->count())

                @foreach ($posts as $post )
                    <div class="mb-4">
                        <a href="" class="font-bold">{{ $post->user->name }}</a>
                        <span class="text-sm text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                        <p class="mb-2">{{ $post->body }}</p>
                    </div>
                @endforeach

            {{ $posts->links() }}
            
            @else
            <p>NO POST</p>
            @endif

        </div>
    </div>
@endsection