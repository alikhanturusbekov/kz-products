@props(['product'])

<a href="{{ $product->contact_link }}">
    <div class="mx-auto mt-11 h-120 transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-md duration-300 hover:scale-105 hover:shadow-lg">
        <img 
            class="h-48 w-full object-cover object-center" 
            src="{{
            $product->photo
            ? asset($product->photo)
            : asset('/images/no-image.png')
            }}"  
            alt="Product Image" 
        />
        <div class="p-4">
            <h2 class="mb-2 text-lg whitespace-nowrap overflow-hidden text-ellipsis font-medium dark:text-white text-gray-900">{{ $product->title }}</h2>
            <p class="mb-2 text-base whitespace-nowrap overflow-hidden text-ellipsis dark:text-gray-300 text-gray-700">{{ $product->description }}</p>
            <div class="flex space-between">
            <p class="mr-2 text-lg font-semibold text-gray-900 dark:text-white">KZT {{$product->price}}</p>
            <p class="mr-2 text-lg font-semibold text-gray-900 dark:text-white">
                <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">
                    {{$product->category}}
                </mark>
            </p>
            </div>
        </div>
    </div>
</a>
