<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Laranewjeans</title>
    </head>
    <body class="mb-48 bg-white dark:bg-gray-900">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
          <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"><mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">khan</mark></span>
            </a>
            <div class="md:block md:w-auto" id="navbar-default">
              <ul class="font-medium flex flex-row p-0 mt-4 rounded-lg space-x-8 bg-white dark:bg-gray-900">
                @auth
                <li>
                    <a href="/products/manage" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Мои товары</a>
                </li>
                <li>
                    <form
                    method="POST"
                    action="/logout" 
                    >
                        @csrf
                        <button class="text-red-500">
                            <i class="fa-solid fa-sign-out"></i>
                            Logout
                        </button>
                    </form></li>
                @else
                <li>
                    <a href="/register" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Регистрация</a>
                </li>
                <li>
                    <a href="/login" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Войти</a>
                </li>
                @endauth
              </ul>
            </div>
          </div>
        </nav>
        
        <main>
            @yield('content')
        </main>

        <x-flash-message />
</body>
</html>