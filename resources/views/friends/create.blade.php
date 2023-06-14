<x-layout>
    <div class="px-5">

        <h1>
            Create A New Friend
        </h1>
        <p>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Friends</a>
        </p>
        <x-_friend_form method="POST" action="{{ route('store_friend') }}" />
    </div>
</x-layout>
