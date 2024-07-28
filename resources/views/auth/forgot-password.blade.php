<x-layout>

    
    <h1 class="title">Request password reset email</h1>

     {{-- Session messages --}}
    @if (session('status'))
        <x-flash-msg msg="{{ session('status') }}"/>
    @endif

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('password.request') }}" method="post"  x-data="formSubmit" @submit.prevent="submit">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="input  @error('email')
                 !ring-red-500 
                @enderror">
                @error('email')
                  <p class="error">{{ $message }}</p>
                @enderror
            </div>
           
            <button x-ref="btn" class="btn" type="submit">Request</button>
        </form>

    </div>
</x-layout>