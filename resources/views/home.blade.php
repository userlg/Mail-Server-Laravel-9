<x-layouts.base title="Home">

    <div class="container mx-auto ">

        <form action="{{ route('email.form') }}" method="POST"
            class="flex flex-col  animate-fade-in-down  p-4 gap-4 mx-auto bg-gray-50 dark:bg-cyan-900 transition-all duration-300 ease-linear  justify-center items-center mt-28 w-11/12 sm:w-3/4 border rounded lg:w-1/3 shadow-md shadow-gray-500 dark:shadow-pink-900  border-black dark:border-pink-700">
            @csrf
            <div>
                <h2 class="font-bangers text-center text-2xl tracking-widest dark:text-pink-700">MAIL SERVER</h2>
            </div>

            <input type="text"
                class="w-11/12 h-12 border border-pink-700  focus:outline-2  focus:outline-pink-700  rounded-sm" required
                name="title" placeholder="type the subject" value="{{ old('title') }}">
            @error('title')
                <br>
                <small class="text-white font-bold">{{ $message }}</small>
            @enderror

            <input type="email"
                class="w-11/12 h-12 border border-pink-700  focus:outline-2  focus:outline-pink-700  rounded-sm"
                required name="senderEmail" placeholder="type your email" value="{{ old('senderEmail') }}">
            @error('senderEmail')
                <br>
                <small class="text-white font-bold">{{ $message }}</small>
            @enderror

            <textarea class="w-11/12 h-40 border border-pink-700  focus:outline-2 focus:outline-pink-700  rounded-sm" required
                name="message" placeholder="type your message" value="{{ old('message') }}"></textarea>
            @error('message')
                <br>
                <small class="text-white font-bold">{{ $message }}</small>
            @enderror
            <button
                class="text-sm sm:text-md text-white bg-pink-700 hover:bg-pink-800 w-1/3 p-2 rounded-md  transition-all ease-linear duration-300">Send</button>
        </form>


    </div>

</x-layouts.base>
