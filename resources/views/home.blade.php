<x-layouts.base title="Home">

    <div class="container">
        <div class="title mb-8">
            <h2 class="font-bangers text-center text-2xl">MAIL SERVER</h2>
        </div>
        <form action="/" method="POST" class="flex flex-col gap-4 w-full justify-center items-center">
            @csrf
            <input type="text" class="w-11/12 h-12 border-none focus:border-amber-300 focus:ring focus:ring-red-600  rounded-sm" required name="title"
                placeholder="Title of the email" value="{{ old('title') }}">
            @error('title')
                <br>
                <small class="text-white font-bold">{{ $message }}</small>
            @enderror

            <input type="email" class="w-11/12 h-12 border-2 border-sky-600 rounded-sm" required name="senderEmail"
                placeholder="Your email" value="{{ old('senderEmail') }}">
            @error('senderEmail')
                <br>
                <small class="text-white font-bold">{{ $message }}</small>
            @enderror

            <textarea class="w-11/12 border-2 border-sky-600 h-1/2 rounded-sm" required name="message" placeholder='message'
                value="{{ old('message') }}"></textarea>
            @error('message')
                <br>
                <small class="text-white font-bold">{{ $message }}</small>
            @enderror
            <button
                class="text-sm sm:text-md text-white bg-purple-700 w-1/3 p-2 rounded-md hover:bg-purple-900 transition-all ease-linear duration-300">Send</button>
        </form>
    </div>

    @if (session('status'))
        <strong class="text-sm sm:text-2xl strong">{{ session('status') }}</strong>
    @else
        <strong class="text-sm sm:text-2xl strong">Welcome send your message to the admin</strong>
    @endif

</x-layouts.base>
