<x-layout>
    <a href="{{ route('dashboard') }}" class="block mb-2 text-xs text-blue-500">&larr; Go back</a>
    <div class="card">
        <h2 class="font-bold mb-4">Update your post</h2>
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            
            {{-- Post Title --}}
            <div class="mb-4">
                <label for="email">Post Title</label>
                <input type="text" name="title" value="{{ $post->title}}" class="input  @error('title')
                !ring-red-500 
                @enderror">
                @error('title')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="body">Post Body</label>
                <textarea name="body" cols="30" rows="10">{{ $post->body }}</textarea>
                
                @error('title')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>
            
            <button class="btn" type="submit">Update</button>
        </form>
    </div>
</x-layout>