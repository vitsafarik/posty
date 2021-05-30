@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 p-6 bg-white rounded-lg">
            @if (session('status')) 
            <div class="p-4 mb-6 text-center text-white bg-red-500 rounded-lg">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email" class="w-full p-4 bg-gray-100 border-2 rounded-lg @error('email') border-red-500 
                    @enderror" value="{{ old('email') }}">
                    @error('email')
                    <div class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" class="w-full p-4 bg-gray-100 border-2 rounded-lg @error('password') border-red-500 
                    @enderror" value="">
                    @error('password')
                    <div class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="w-full px-4 py-3 text-white bg-blue-500 rounded cursor-pointer hover:bg-green-500 font-medim">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection