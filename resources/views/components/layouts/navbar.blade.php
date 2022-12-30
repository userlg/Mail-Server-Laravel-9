<div>
    <nav class="p-5 bg-white dark:bg-night dark:ring-1 dark:ring-sred shadow md:flex md:items-center md:justify-between transition-all rounded ease-linear duration-300"
        {{-- *********************************************** --}} <ul
        class="md:flex md:items-center z-[5] md:z-auto md:static absolute dark:md:ring-transparent md:ring-transparent ring-1 ring-black bg-white dark:bg-night dark:ring-1 dark:ring-sred dark:text-white w-full gap-4 left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-300">
        <li class=" my-1 md:my-0">
            <a href="{{ route('home') }}"
                class="text-xl  dark:hover:text-yellow-200  hover:text-orange-400 transition-all ease-linear duration-500 {{ request()->routeIs('home') ? ' text-sred underline' : 'text-black dark:text-white' }}">Inicio</a>
        </li>

        {{-- Dark Toggle Button --}}
        <div class="my-1">
            <x-layouts.togglebutton />
        </div>

        <h2 class=""></h2>
        </ul>
    </nav>

    <script>
        const menubtn = document.getElementById("menubar");

        const burgerIcon = document.getElementById("burgerIcon");

        const exIcon = document.getElementById("exIcon");

        var sw = false;


        function menu() {
            let list = document.querySelector('ul');

            if (!sw) {
                sw = true;
                list.classList.add('top-[80px]');
                list.classList.add('opacity-100');
                burgerIcon.classList.remove("visible");
                burgerIcon.classList.add("hidden");
                exIcon.classList.remove("hidden");
                exIcon.classList.add("visible");
            } else {
                sw = false;
                list.classList.remove('top-[80px]');
                list.classList.remove('opacity-100');
                burgerIcon.classList.remove("hidden");
                burgerIcon.classList.add("visible");
                exIcon.classList.remove("visible");
                exIcon.classList.add("hidden");
            }
        }

        menubtn.addEventListener("click", () => {
            menu();
        })
    </script>

</div>
