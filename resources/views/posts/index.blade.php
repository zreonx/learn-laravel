<x-layout> 

    <h1 class="title">Latest Post</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        @foreach ($posts as $post )
           <x-post-card :post="$post" />
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>

</x-layout>