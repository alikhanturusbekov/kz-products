@extends('layout')


@section('content')

<div
    class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Вход
        </h2>
        <p class="mb-4">Войти в свой аккаунт для продажи KZ продукции</p>
    </header>

    <form method="POST" action="/users/authenticate">
        @csrf
        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >Email</label
            >
            <input
                type="email"
                class="border border-gray-200 rounded p-2 w-full"
                name="email"
                value="{{ old('email') }}"
            />
            
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="password"
                class="inline-block text-lg mb-2"
            >
                Пароль
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password"
                value="{{ old('password') }}"
            />

            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                type="submit"
                class="bg-black text-white rounded py-2 px-4 hover:bg-gray-900"
            >
                Войти
            </button>
        </div>

        <div class="mt-8">
            <p>
                Нет аккаунта?
                <a href="/register" class="text-laravel">
                    Регистрация
                </a>
            </p>
        </div>
    </form>
</div>

@endsection