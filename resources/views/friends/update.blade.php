<x-layout>
    <div class="px-5">
        <h1>
            Update
        </h1>

        <p>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Friends</a>
        </p>
        <x-_friend_form method="PUT" action="{{ route('edit_friend', $friend->id) }}" button="Update friend"
            :friend="$friend" />
    </div>
</x-layout>
