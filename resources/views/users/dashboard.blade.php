<x-layout> 

   <h1 class="title">Hello {{ auth()->user()->username }}, you have {{ $posts->total() }} posts.</h1>

   
   {{-- Session messages --}}
   @if (session('success'))
    <x-flash-msg msg="{{ session('success') }}"/>
   @elseif (session('delete'))
    <x-flash-msg msg="{{ session('delete') }}" bg="bg-red-500"/>
   @endif

   {{-- Create Post Form --}}
   <div class="card mb-4">
      <h2 class="font-bold mb-4">Create New Post</h2>
      <form action="{{ route('posts.store') }}" method="POST">
         @csrf

         {{-- Post Title --}}
          <div class="mb-4">
                <label for="email">Post Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="input  @error('title')
                 !ring-red-500 
                @enderror">
                @error('title')
                  <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="body">Post Body</label>
                <textarea name="body" cols="30" rows="10">{{ old('title') }}</textarea>
                
                @error('title')
                  <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button class="btn" type="submit">Create</button>
      </form>
   </div>

   <h2 class="font-bold mb-4">Your Latest Post</h2>
   <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        @foreach ($posts as $post )
            <x-post-card :post="$post">
              {{-- UPDATE POST --}}
               <a href="{{ route('posts.edit', $post) }}" class="bg-blue-500 text-white px-2 py-1 text-xs rounded-md">Edit</a>
              {{-- Delete POST --}}
              <form action="{{ route("posts.destroy", $post) }}" method="POST" class="m-0">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-2 py-1 text-xs rounded-md">Delete</button>
              </form>
            </x-post-card>
        @endforeach
    </div>

    <div>
      {{ $posts->links() }}
    </div>

</x-layout>