@extends('layouts.app')

@section('judul', 'Login')

@section('konten')
    <div class="max-w-md mx-auto bg-white rounded-xl shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Login</h1>

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block font-medium mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full rounded-lg border px-3 py-2 @error('email') border-red-500 @else border-slate-300 @enderror">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block font-medium mb-1">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full rounded-lg border px-3 py-2 @error('password') border-red-500 @else border-slate-300 @enderror">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button class="w-full bg-indigo-600 text-white px-5 py-2