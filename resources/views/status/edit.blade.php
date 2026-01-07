@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Update Currently</h2>
        
        <form action="{{ route('status.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Reading</label>
                    <input type="text" name="reading" value="{{ $status->reading }}" class="w-full px-4 py-2 rounded-xl bg-gray-50 border border-gray-200 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Studying</label>
                    <input type="text" name="studying" value="{{ $status->studying }}" class="w-full px-4 py-2 rounded-xl bg-gray-50 border border-gray-200 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">Watching</label>
                    <input type="text" name="watching" value="{{ $status->watching }}" class="w-full px-4 py-2 rounded-xl bg-gray-50 border border-gray-200 outline-none">
                </div>
            </div>

            <button type="submit" class="w-full mt-8 bg-gray-800 text-white font-bold py-3 rounded-xl hover:bg-gray-700 transition">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection