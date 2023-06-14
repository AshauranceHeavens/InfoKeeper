<x-layout>
    <div class="w-50 mx-auto bg-gray-50 shadow border fs-4  p-5 mx-3 rounded mt-24">
        <header class="text-center">
            <h2 class="text-2xl fw-bold text-uppercase mb-1">
                Register
            </h2>
            <p class="mb-4">Create an account</p>
        </header>

        <form action="{{ route('create') }}" method="post" class="">
            @csrf
            <div class="mb-6">
                <label for="name" class="d-inline-block text-lg mb-2">
                    Name
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-100" name="name"
                    value="{{ old('name') }}" />

                <x-error>
                    @error('name')
                        {{ $message }}
                    @enderror
                </x-error>
            </div>

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

            <div class="mb-6">
                <label for="password2" class="d-inline-block text-lg mb-2">
                    Confirm Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-100" name="password_confirmation" />


            </div>

            <div class="mb-6">
                <button type="submit" class="btn btn-success text-white fw-bold my-3 rounded py-2 px-4 ">
                    Sign Up
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-success text-decoration-none">Login</a>
                </p>
            </div>
        </form>
    </div>
</x-layout>
