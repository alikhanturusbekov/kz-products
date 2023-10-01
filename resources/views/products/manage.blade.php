@extends('layout')

@section('content')

<header>
    <h1 class="text-3xl text-black dark:text-white text-center font-bold my-6 uppercase">
        Мои товары
    </h1>
</header>

<div class="relative overflow-x-auto sm:rounded-lg flex justify-center align-center">
    <table class="w-120 text-sm text-left text-gray-500 dark:text-gray-400">
        @unless($products->isEmpty())
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Название
                </th>
                <th scope="col" class="px-6 py-3">
                    Цена
                </th>
                <th scope="col" class="px-6 py-3">
                    Изменить
                </th>
                <th scope="col" class="px-6 py-3">
                    Удалить
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $product->title }}
                </th>
                <td class="px-6 py-4">
                     {{ $product->price }}
                </td>
                <td class="px-6 py-4">
                    <a href="/products/{{ $product->id }}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Edit
                    </a>
                </td>
                <td class="px-6 py-4">
                    <form
                    method="POST"
                    action="/products/{{ $product->id }}" 
                    >
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">
                            <i class="fa-solid fa-trash"></i>
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        @else
            <p class="text-center text-black dark:text-white">У вас нет товаров. Нажмите кнопку "Создать" для создания продукта</p>              
        @endunless
    </table>
</div>

<div class="flex align-center justify-center my-8">
    <a href="/products/create">
        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Cоздать
        </button>
    </a>
</div>

@endsection