<div>
    <nav
        class="w-full sm:w-3/4 lg:w-1/2 max-w-xl p-1 mx-auto bg-white dark:bg-pink-700 dark:text-white top-0 shadow-sm shadow-gray-500 dark:shadow-pink-900 flex items-center justify-end transition-all rounded ease-linear duration-300">
        {{-- *********************************************** --}}
        <ul class="flex  flex-row  justify-center gap-2 p-1  items-center">
            <li class="list-none">
                <a href="{{ route('home') }}"
                    class="text-xl no-underline  dark:hover:text-yellow-200  hover:text-orange-400 transition-all ease-linear duration-500">Home</a>
            </li>

            {{-- Dark Toggle Button --}}
            <div class="flex items-center justify-center ml-1">
                <x-layouts.togglebutton />
            </div>
            {{-- ----- --}}

        </ul>
    </nav>
</div>
