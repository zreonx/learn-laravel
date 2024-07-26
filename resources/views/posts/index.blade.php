<x-layout> 

    <h1 class="title">Latest Post</h1>

    
    @foreach ($posts as $post )
        <div class="card mb-5">
            {{-- Title --}}
            <h2 class="font-bold text-xl"> {{ $post->title }}</h2>

            {{-- Author and Date --}}
           <div class="text-xs font-light mb-4">
             <span class="">Post Date By: </span>
             <a href="" class="text-blue-500 font-medium">Username</a>
           </div>

           {{-- Body --}}
            <p class="text-sm">{{ $post->body }}</p>
        </div>
    @endforeach

</x-layout>