@extends('layouts.app')    

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">

            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivedLikes->count() }} likes</p>
            </div>

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        <p class="mb-2">{{ $post->body }}</p> 

                        <div>
                            {{--  @if ($post->ownedBy(auth()->user()))  --}}
                                @can('delete',$post)
                                    <form action="{{ route('posts.destroy',$post) }}" method="post" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500">
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            {{--  @endif  --}}
                        </div>

                        <div class="flex items-center">
                            @auth
                                @if (!$post->likedBy(auth()->user()))
                                    <form action="{{ route('posts.likes',$post->id) }}" method="post" class="mr-1">
                                        @csrf
                                        <button type="submit" class="text-blue-500">
                                            Like
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.likes',$post->id) }}" method="post" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500">
                                            Unlike
                                        </button>
                                    </form>
                                @endif
                            @endauth
                           

                            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>

                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            @else
                <p>There are no posts</p>
            @endif  
        </div>
    </div>
@endsection