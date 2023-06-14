<x-layout>
    <x-card>
        <h2 class="fw-bold">
            Friends
        </h2>
        <p>
            <a href="{{ route('create_friend') }}" class="btn btn-sm btn-outline-success">Add A Friend</a>
        </p>
        <form action="{{ route('home') }}" method="get">
            @csrf
            <div class="input-group">
                <input type="text" name="name" value="{{ request()->name }}" placeholder="find a friend"
                    class="form-control">
                <input type="submit" value="Search" class="btn btn-sm btn-success">
            </div>
        </form>
        {{-- table --}}
        <div class="mt-4 table-responsive d-none d-md-block">
            <table class="table table-hover table-md">
                <thead>
                    <tr>
                        <th class="fw-bold" scope="col">#</th>
                        <th class="fw-bold" scope="col">Image</th>
                        <th class="fw-bold" scope="col">Name</th>
                        <th class="fw-bold" scope="col">Middle_Name</th>
                        <th class="fw-bold" scope="col">Surname</th>
                        <th class="fw-bold" scope="col">Number</th>
                        <th class="fw-bold" scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($friends as $key => $friend)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td>
                                <img src="{{ asset('/storage/images/' . $friend->img) }}" height="70px" alt="no image">
                            </td>
                            <td>
                                <a href="{{ route('show_friend', $friend->id) }}"
                                    class="text-black text-decoration-none name">
                                    {{ $friend->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('show_friend', $friend->id) }}"
                                    class="text-black text-decoration-none name">
                                    {{ $friend->second_name }}
                                </a>
                            </td>
                            <td>
                                <a href="/friend/{{ $friend->id }}" class="text-black text-decoration-none name">
                                    {{ $friend->surname }}
                                </a>
                            </td>
                            <td>
                                <a href="tel:{{ $friend->number }}" class="text-decoration-none text-dark">
                                    {{ $friend->number }}
                                </a>
                            </td>
                            <td>
                                <a href="mailto:{{ $friend->email }}" class="text-decoration-none text-dark">
                                    {{ $friend->email }}

                                </a>
                            </td>
                            <td>
                                <div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- accordion --}}
        <div class="shadow px-4 py-1 d-md-none mt-4">
            @foreach ($friends as $key => $friend)
                @php
                    $key = $key + 1;
                @endphp
                <div class="accordion accordion-flush"
                    id="{{ $friend->name }}{{ $key }}{{ $friend->name }}">
                    <div class="accordion-item border-bottom-0">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button
                                class="accordion-button @unless ($key == 1) {{ 'collapsed' }} @endif "
                                data-bs-toggle="collapse" type="button"
                                data-bs-target="#{{ $friend->name }}{{ $key }}"
                                aria-expanded="@if ($key == 1) {{ 'true' }}@else{{ 'false' }} @endif"
                                aria-control="{{ $friend->name }}{{ $key }}">

                                {{ $friend->name }} {{ $friend->surname }}

                            </button>
                        </h2>
                        <div id="{{ $friend->name }}{{ $key }}" class="accordion-collapse @if ($key == 1) {{ 'collapse show' }}@else{{ 'collapse' }} @endif "
                                aria-labelledby="panelsStayOpen-collapseOne"
                                data-bs-parent="#{{ $friend->name }}{{ $key }}{{ $friend->name }}">
                                <div class="accordion-body">
                                    <div class="mb-2">
                                        <img src="{{ asset('/storage/images/' . $friend->img) }}" class="w-25 my-2"
                                            alt="no-image">

                                        <ul class="mx-0 list-unstyled">
                                            <li class="mxy-1">
                                                <span>Name:</span>
                                                <span>
                                                    <a href="{{ route('show_friend', $friend->id) }}"
                                                        class="text-black text-decoration-none name">
                                                        {{ $friend->name }}
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="mxy-1">
                                                <span>Middle name:</span>
                                                <span>
                                                    <a href="{{ route('show_friend', $friend->id) }}"
                                                        class="text-black text-decoration-none name">
                                                        {{ $friend->second_name }}
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="mxy-1">
                                                <span>Surname:</span>
                                                <span>{{ $friend->surname }}</span>
                                            </li>
                                            <li class="mxy-1">
                                                <span>Number:</span>
                                                <span>{{ $friend->number }}</span>
                                            </li>
                                            <li class="mxy-1">
                                                <span>Email:</span>
                                                <span>{{ $friend->email }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                    </div>
                </div>
        </div>
        @endforeach
        </div>
        <div class="mt-3">
            {{ $friends->links() }}

        </div>
    </x-card>
</x-layout>
