 @props(['post', 'full' => false])
 
 <div class="card mb-3 ">
    {{-- Title --}}
    <h2 class="font-bold text-xl"> {{ $post->title }}</h2>
    
    {{-- Author and Date --}}
    <div class="text-xs font-light mb-4">
        <span class="">Posted {{ $post->created_at->diffForHumans() }} By: </span>
        <a href="{{ route('posts.user', $post->user) }}" class="text-blue-500 font-medium uppercase">{{ $post->user->username }}</a>
    </div>
    
    {{-- Body --}}
    @if ($full)
         <div class="text-sm">
            <p>{{ $post->body }}</p>
        </div>
    @else
     <div class="text-sm">
        <p>{{ Str::words($post->body, 15) }} <a href="{{ route('posts.show', $post) }}" class="ml-2 text-blue-500">Read more &rarr;</a></p>
  
    </div>
    @endif

    <div class="flex items-center justify-end gap-2 mt-5 w-full">
        {{ $slot }}
    </div>
  
</div>