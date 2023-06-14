<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <link rel="icon" href="images/favicon.ico" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}


    <style>
        .form-control:focus {
            box-shadow: 0px 0px 8px #198754 !important;
        }

        .form-control:disabled {
            background: white !important;
        }

        .accordion-button:focus {
            /* color: var(--bs-green) !important; */
            /* border-color: var(--bs-green) !important; */
        }

        .accordion-button:not(.collapsed) {
            color: var(--bs-green) !important;
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>InfoKeeper</title>
</head>

<body class="mb-5 bg-white">
    <div class="px-4 px-md-5">
        <nav class="d-flex bg-white justify-content-between align-items-center py-3">
            <figure class="m-0 ms-s-4">
                <figcaption>
                    <a href="/" class="navbar-brand text-black text-decoration-none">
                        InfoKeeper
                    </a>
                </figcaption>
            </figure>


            <ul class="d-flex mb-0 aign-items-center">
                @auth

                    <li class="list-unstyled mx-2">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn  ">
                                <i class="d-none d-ms-block fa-solid fa-door-closed"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="list-unstyled mx-2">
                        <a href="{{ route('register') }}"
                            class="text-decoration-none text-black fw-bold hover:text-laravel">
                            <i class="fa-solid fa-user-plus "></i>
                            <span class="d-none d-sm-inline">
                                Register
                            </span>
                        </a>
                    </li>
                    <li class="list-unstyled mx-2">
                        <a href="{{ route('login') }}" class="text-decoration-none  text-black fw-bold hover:text-laravel">
                            <i class="fa-solid fa-arrow-right-to-bracket "></i>
                            <span class="d-none d-sm-inline">
                                Login
                            </span>
                        </a>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
    @if (session()->has('success'))
        <div class="postion-fixed top-0 mx-auto bg-success p-2">
            <p class="m-0 p-0 text-white ms-5 fs-5">
                {{ session('success') }}
            </p>
        </div>
    @elseif(session()->has('error'))
        <div class="postion-fixed top-0 mx-auto bg-danger p-2">
            <p class="m-0 p-0 text-white ms-5 fs-5">
                {{ session('error') }}
            </p>
        </div>
    @endif
    <main class="pb-5 pt-4 bg-white">
        {{ $slot }}
    </main>
    <footer
        class="position-fixed bg-dark  bottom-0 left-0 w-100 d-flex align-items-center  
               font-bold text-white py-3 mt-22 justify-content-md-center"
        style="z-index:5;">

        <p class="ms-2 m-0 text-center">Copyright &copy; 2022, All Rights reserved</p>

    </footer>
    <x-flash-message />
</body>

</html>
