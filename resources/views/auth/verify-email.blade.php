<x-layout>

    @if (session('message'))
    
    <x-flash-msg msg="{{ session('message') }}" bg="bg-blue-500"/>
    @endif

    <h1 class="mb-4">Please verify your email through the email we've sent you.</h1>
    <p>Didn't get the email?</p>

    <form action="{{ route('verification.send') }}" method="POST">
        @csrf
        <button class="btn">Send again</button>
    </form>
</x-layout>