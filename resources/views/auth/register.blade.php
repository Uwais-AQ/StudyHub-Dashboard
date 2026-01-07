@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-4">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            
            <div class="bg-white px-8 pt-10 pb-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Daftar Akun</h2>
                <p class="text-gray-500 mt-2 text-sm">Mulai kelola datamu secara personal dan teratur.</p>
            </div>

            <div class="px-8 pb-10">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-5">
                        <label for="name" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 ml-1">
                            {{ __('Nama Lengkap') }}
                        </label>
                        <input id="name" type="text" 
                            class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:border-gray-400 focus:bg-white focus:ring-0 outline-none transition duration-200 @error('name') border-red-500 @enderror" 
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <p class="text-red-500 text-xs mt-2 ml-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="email" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 ml-1">
                            {{ __('Email Address') }}
                        </label>
                        <input id="email" type="email" 
                            class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:border-gray-400 focus:bg-white focus:ring-0 outline-none transition duration-200 @error('email') border-red-500 @enderror" 
                            name="email" value="{{ old('email') }}" required autocomplete="email">

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
                            name="password" required autocomplete="new-password">

                        @error('password')
                            <p class="text-red-500 text-xs mt-2 ml-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <label for="password-confirm" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 ml-1">
                            {{ __('Konfirmasi Password') }}
                        </label>
                        <input id="password-confirm" type="password" 
                            class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:border-gray-400 focus:bg-white focus:ring-0 outline-none transition duration-200" 
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <button type="submit" 
                        class="w-full bg-gray-800 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-gray-200 hover:bg-gray-700 hover:shadow-none transform active:scale-[0.98] transition duration-200 text-center">
                        {{ __('Daftar Sekarang') }}
                    </button>
                </form>
            </div>
        </div>

        <p class="text-center mt-8 text-gray-500 text-sm">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="font-bold text-gray-800 hover:underline">Masuk di sini</a>
        </p>
    </div>
</div>
@endsection