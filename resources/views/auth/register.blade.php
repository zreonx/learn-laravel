<x-layout>

  
  <div class="mx-auto max-w-screen-sm card">
      <h1 class="title">Register new account</h1>
        <form action="{{ route('register') }}" method="post" x-data="formSubmit" @submit.prevent="submit">
            @csrf
            {{-- Username --}}
            <div class="mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" class="input 
                @error('username')
                 !ring-red-500 
                @enderror ">

                @error('username')
                  <p class="error">{{ $message }}</p>
                @enderror
            </div>
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
            {{-- Password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="input  @error('password')
                 !ring-red-500 
                @enderror ">
                @error('password')
                  <p class="error">{{ $message }}</p>
                @enderror
            </div>
            {{-- Confirm Password --}}
            <div class="mb-4">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="input @error('password_confirmation')
                 !ring-red-500 
                @enderror ">
                @error('password_confirmation')
                  <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 flex gap-2">
              <input type="checkbox" name="subscribe" id="subscribe">
              <label for="subscribe">Subscribe to our newsletter</label>
            </div>

            <button x-ref="btn" class="btn" type="submit">Register</button>
        </form>

    </div>
</x-layout>