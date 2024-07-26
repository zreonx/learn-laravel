<x-layout>

    <h1 class="title">Login</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('login') }}" method="post">
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


            {{-- Rememer Checkbox --}}
            <div class="mb-4 flex gap-1">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>

              @error('failed')
                  <p class="error">{{ $message }}</p>
              @enderror


            <button class="btn" type="submit">Login</button>
        </form>

    </div>
</x-layout>