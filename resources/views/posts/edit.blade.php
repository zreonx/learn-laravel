<x-layout>
    <a href="{{ route('dashboard') }}" class="block mb-2 text-xs text-blue-500">&larr; Go back</a>
    <div class="card">
        <h2 class="font-bold mb-4">Update your post</h2>
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
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

            {{-- Current Image --}}
            <label for="image">Current Cover Photo</label>
            
             @if ($post->image)
    
            <div class="h-50 overflow-hidden rounded-md p-0 my-2">
                <img class=" object-cover h-[200px] w-1/4 transition-all shadow-md hover:scale-105 duration-200" src="{{ asset("storage/" . $post->image) }}" alt="">
            </div>
            @else
            <div class="h-50 overflow-hidden rounded-md p-0 my-2">
                <img class=" object-cover h-[200px] w-1/4 transition-all shadow-md hover:scale-105 duration-200" src="https://liftlearning.com/wp-content/uploads/2020/09/default-image.png" alt="">
            </div>

            @endif

             {{-- Post Image --}}
            <div class="mb-4">
              <label for="image">Cover Photo</label>
              <input type="file" name="image" id="image">
              @error('image')
                  <p class="error">{{ $message }}</p>
               @enderror
            </div>

            <button class="btn" type="submit">Update</button>
        </form>
    </div>
</x-layout>