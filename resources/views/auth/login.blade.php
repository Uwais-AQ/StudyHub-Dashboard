@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-4">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            
            <div class="bg-white px-8 pt-10 pb-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Login</h2>
                <p class="text-gray-500 mt-2 text-sm">Selamat datang kembali, Tuan. Siap untuk belajar?</p>
            </div>

            <div class="px-8 pb-10">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-5">
                        <label for="email" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 ml-1">
                            {{ __('Email Address') }}
                        </label>
                        <input id="email" type="email" 
                            class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:border-gray-400 focus:bg-white focus:ring-0 outline-none transition duration-200 @error('email') border-red-500 @enderror" 
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <p class="text-red-500 text-xs mt-2 ml-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="password" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 ml-1">
                            {{ __('Password') }}
                        </label>
                        <input id="password" type="password" 
                            class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:border-gray-400 focus:bg-white focus:ring-0 outline-none transition duration-200 @error('password') border-red-500 @enderror" 
                            name="password" required autocomplete="current-password">

                        @error('password')
                            <p class="text-red-500 text-xs mt-2 ml-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mb-8 px-1">
                        <div class="flex items-center">
                            <input class="w-4 h-4 text-gray-800 border-gray-300 rounded focus:ring-0" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="ml-2 text-sm text-gray-500 cursor-pointer" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="text-sm font-medium text-gray-400 hover:text-gray-800 transition shadow-none" href="{{ route('password.request') }}">
                                {{ __('Lupa Password?') }}
                            </a>
                        @endif
                    </div>

                    <button type="submit" 
                        class="w-full bg-gray-800 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-gray-200 hover:bg-gray-700 hover:shadow-none transform active:scale-[0.98] transition duration-200">
                        {{ __('Login') }}
                    </button>
                </form>
            </div>
        </div>

        @if (Route::has('register'))
            <p class="text-center mt-8 text-gray-500 text-sm">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="font-bold text-gray-800 hover:underline">Daftar Sekarang</a>
            </p>
        @endif
    </div>
</div>
@endsection