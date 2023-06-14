<x-layout>
    <div class="mx-3 mx-md-5 px-md-4 ">
        <div class="bg-white border rounded mt-24 p-4">
            <header class="text-center">
                <h2 class=" fw-bold text-uppercase mb-1">
                    Login
                </h2>
                <p class="mb-4">Log into your account</p>
            </header>

            <form action="{{ route('authenticate') }}" method="post">
                @csrf

                <div class="mb-6">
                    <label for="email" class="d-inline-block text-lg mb-2">Email</label>
                    <input type="email" class="border border-gray-200 rounded p-2 w-100"
                        name="email"value="{{ old('email') }}" />

                    <x-error>
                        @error('email')
                            {{ $message }}
                        @enderror
                    </x-error>
                </div>

                <div class="mb-6">
                    <label for="password" class="d-inline-block text-lg mb-2">
                        Password
                    </label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-100" name="password" />

                    <x-error>
                        @error('password')
                            {{ $message }}
                        @enderror
                    </x-error>
                </div>

                <div class="mb-6 d-flex align-items-center">
                    <input type="checkbox" class="border border-gray-200 rounded mb-2 mx-2" name="remember" />
                    <label for="password" class="d-inline-block text-lg mb-2">
                        Remember me
                    </label>
                </div>


                <div class="mb-6">
                    <button type="submit" class="btn btn-success text-white fw-bold my-3 rounded py-2 px-4 ">
                        Sign In
                    </button>
                </div>

                <div class="mt-8">
                    <p>
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-success text-decoration-none">Register</a>
                    </p>
                </div>
            </form>

        </div>
    </div>
</x-layout>
