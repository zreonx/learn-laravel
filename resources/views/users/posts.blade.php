<x-layout>

    <h1 class="title">{{ $user->username }}'s Posts - {{ $posts->total() }}</h1>

    {{-- Users Post --}}
   <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @foreach ($posts as $post )
           <x-post-card :post="$post" />
        @endforeach
    </div>

</x-layout>