<x-layouts.base title="Code Confirmation">
    @csrf
    <div class="container mx-auto top-0 bottom-0 mt-10 p-4">
        <div class="flex flex-col justify-center items-center space-y-6">
            <h3 class="text-center font-bangers text-pink-700 tracking-widest text-2xl">Introduce the verification code
            </h3>
            <p class="text-black dark:text-white text-center">A confirmation code was sent to your email <strong>
                    {{ $email }} </strong></p>

            {{-- Form CODE VERIFICATION --}}
            <form action="{{ route('confirm.code') }}" method="POST"
                class="flex flex-col  animate-fade-in-down  p-4 gap-4 mx-auto bg-gray-50 dark:bg-cyan-900 transition-all duration-300 ease-linear  justify-center items-center mt-32 w-11/12 sm:w-3/4 border rounded lg:w-1/3 shadow-md shadow-gray-500 dark:shadow-pink-900  border-black dark:border-pink-700">
                @csrf
                <div class="flex flex-row items-center justify-center overflow-hidden gap-2">
                    <input type="hidden" value="{{ $email }}" name="email">
                    <input type="text" required maxlength="1" name="input1"
                        class="font-bold text-2xl w-6 h-7 text-center border border-pink-700  focus:outline-2  focus:outline-pink-700  rounded-sm">
                    <p class="dark:text-pink-700 text-black font-semibold text-3xl">-</p>
                    <input type="text" required maxlength="1" name="input2"
                        class="font-bold text-2xl w-6 h-7 text-center border border-pink-700  focus:outline-2  focus:outline-pink-700  rounded-sm">
                    <p class="dark:text-pink-700 text-black font-semibold text-3xl">-</p>
                    <input type="text" required maxlength="1" name="input3"
                        class="font-bold text-2xl w-6 h-7 text-center border border-pink-700  focus:outline-2  focus:outline-pink-700  rounded-sm">
                    <p class="dark:text-pink-700 text-black font-semibold text-3xl">-</p>
                    <input type="text" required maxlength="1" name="input4"
                        class="font-bold text-2xl w-6 h-7 text-center border border-pink-700  focus:outline-2  focus:outline-pink-700  rounded-sm">
                    <p class="dark:text-pink-700 text-black font-semibold text-3xl">-</p>
                    <input type="text" required maxlength="1" name="input5"
                        class="font-bold text-2xl w-6 h-7 text-center border border-pink-700  focus:outline-2  focus:outline-pink-700  rounded-sm">
                    <p class="dark:text-pink-700 text-black font-semibold text-3xl">-</p>
                    <input type="text" required maxlength="1" name="input6"
                        class="font-bold text-2xl w-6 h-7 text-center border border-pink-700  focus:outline-2  focus:outline-pink-700  rounded-sm">
                </div>

                <button
                    class="text-sm sm:text-md text-white bg-pink-700 hover:bg-pink-800 w-1/3 p-2 rounded-md  transition-all ease-linear duration-300">Confirm</button>
            </form>
            {{-- ---- --}}
        </div>
    </div>
</x-layouts.base>
