@extends('layout')


@section('content')
<div
    class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Изменить товар
        </h2>
        <p class="mb-4">Изменить {{ $product->title }}</p>
    </header>

    <form 
        method="POST" 
        action="/products/{{$product->id}}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label
                for="title"
                class="inline-block text-lg mb-2"
            >
                Название продукта
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="title"
                value={{ $product->title }}
            />

            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="price" class="inline-block text-lg mb-2"
                >Цена продукта</label
            >
            <input
                type="number"
                class="border border-gray-200 rounded p-2 w-full"
                name="price"
                placeholder="Например: 20000, 30000 и т.д."
                value={{ $product->price }}
            />

            @error('price')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="location"
                class="inline-block text-lg mb-2"
                >Доступные локации</label
            >
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="location"
                placeholder="Например: Весь мир, Казахстан и т.д."
                value={{ $product->location }}
            />

            @error('location')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="contact_link"
                class="inline-block text-lg mb-2"
            >
                Ccылка для связи
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="contact_link"
                value={{ $product->contact_link }}
                placeholder="Ссылка для связи. Сайт/WhatsApp/Instagram/Telegram"
            />

            @error('contact_link')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="category" class="inline-block text-lg mb-2">
                Введите категорию
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="category"
                placeholder="Например: одежда, техника и т.д."
                value={{ $product->contact_link }}
            />

            @error('category')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="photo" class="inline-block text-lg mb-2">
                Фото продукта
            </label>
            <input
                type="file"
                class="border border-gray-200 rounded p-2 w-full"
                name="photo"
            />

            <img
                    class="w-48 mr-6 mb-6"
                    src="{{
                        $product->photo
                        ? asset( $product->photo)
                        : asset('/images/no-image.png')
                    }}"
                    alt=""
                />

            @error('photo')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="description"
                class="inline-block text-lg mb-2"
            >
                Описание продукта
            </label>
            <textarea
                class="border border-gray-200 rounded p-2 w-full"
                name="description"
                rows="10"
                placeholder="Напишите максимум о продукте"
            >{{ $product->description }}</textarea>

            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button
                class="bg-black text-white rounded py-2 px-4 hover:bg-blue-900"
            >
                Сохранить
            </button>

            <a href="/" class="text-black ml-4"> Отмена </a>
        </div>
    </form>
</div>
@endsection