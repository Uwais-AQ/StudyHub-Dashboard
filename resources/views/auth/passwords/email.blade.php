@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-4">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            
            <div class="bg-white px-8 pt-10 pb-6 text-center">
                <div class="mb-4 inline-flex items-center justify-center w-16 h-16 bg-gray-50 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Lupa Password?</h2>
                <p class="text-gray-500 mt-2 text-sm">Jangan khawatir, masukkan email kamu dan kami akan kirimkan link pemulihan.</p>
            </div>

            <div class="px-8 pb-10">
                @if (session('status'))
                    <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-100 text-green-700 text-sm font-medium flex items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-8">
                        <label for="email" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 ml-1">
                            {{ __('Email Address') }}
                        </label>
                        <input id="email" type="email" 
                            class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:border-gray-400 focus:bg-white focus:ring-0 outline-none transition duration-200 @error('email') border-red-500 @enderror" 
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="nama@email.com">

                        @error('email')
                            <p class="text-red-500 text-xs mt-2 ml-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" 
                        class="w-full bg-gray-800 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-gray-200 hover:bg-gray-700 hover:shadow-none transform active:scale-[0.98] transition duration-200 text-center text-sm">
                        {{ __('Kirim Link Pemulihan') }}
                    </button>
                </form>
            </div>
        </div>

        <p class="text-center mt-8 text-gray-500 text-sm">
            Tiba-tiba ingat? 
            <a href="{{ route('login') }}" class="font-bold text-gray-800 hover:underline">Kembali Login</a>
        </p>
    </div>
</div>
@endsection