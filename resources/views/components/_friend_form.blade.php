@props(['method', 'action', 'friend', 'button'])

@php
    switch ($method) {
        case 'PUT':
            $blade_method = $method;
            $method = 'POST';
            break;
        default:
            $blade_method = $method;
    }
    
@endphp



<form action="{{ $action }}" method="{{ $method }}" class="fs-4" enctype="multipart/form-data">
    @csrf
    @if ($method !== $blade_method)
        @method($blade_method)
    @endif
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label class="form-label mt-1">Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control"
                    value="@if (old('name')) {{ old('name') }}
                    @elseif(isset($friend->name)){{ $friend->name }} @endif">
                <x-error>
                    @error('name')
                        {{ $message }}
                    @enderror
                </x-error>
            </div>

            <div class="form-group">
                <label class="form-label mt-1">Middle name</label>
                <input type="text" name="second_name" placeholder="Middle name" class="form-control"
                    value="@if (old('second_name')) {{ old('second_name') }}
                    @elseif(isset($friend->second_name)){{ $friend->second_name }} @endif">
                <x-error>
                    @error('second_name')
                        {{ $message }}
                    @enderror
                </x-error>
            </div>
            <div class="form-group">
                <label class="form-label mt-1">Surname</label>
                <input type="text" name="surname" placeholder="Surname" class="form-control"
                    value="@if (old('surname')) {{ old('surname') }}
                @elseif(isset($friend->surname)){{ $friend->surname }} @endif">
                <x-error>
                    @error('surname')
                        {{ $message }}
                    @enderror
                </x-error>
            </div>
        </div>

        <div class="col-md">

            <div class="form-group">
                <label class="form-label mt-1">DOB</label>
                <input type="text" name="dob" placeholder="Date of birth" class="form-control"
                    value="@php if(old('dob')){
                        echo old('dob') ;
                    }elseif(isset($friend->DOB)){
                        echo $friend->DOB;
                     } @endphp">
                <x-error>
                    @error('dob')
                        {{ $message }}
                    @enderror
                </x-error>
            </div>
            <div class="form-group">
                <label class="form-label mt-1">Email address</label>
                <input type="email" name="email" placeholder="Email" class="form-control"
                    value="@if (old('email')) {{ old('email') }}
                    @elseif(isset($friend->email)){{ $friend->email }} @endif">
                <x-error>
                    @error('email')
                        {{ $message }}
                    @enderror
                </x-error>
            </div>

            <div class="form-group">
                <label class="form-label mt-1">Number</label>
                <input type="text" name="number" placeholder="Number" class="form-control"
                    value="@php if(old('number')){ echo old('number'); }elseif(isset($friend->number)){ echo $friend->number ; } @endphp">

                <x-error>
                    @error('number')
                        {{ $message }}
                    @enderror
                </x-error>
            </div>

        </div>
    </div>
    @if (isset($friend->img))
        <img src="{{ asset('/storage/images/' . $friend->img) }}" width="50px" alt="no-image">
    @endif
    <div class="form-group">
        <label class="form-label mt-1">Pic</label>
        <input type="file" name="pic" class="form-control"
            value="@if (old('pic')) {{ old('pic') }}
        @elseif(isset($friend->pic))
        {{ $friend->pic }} @endif">
        <x-error>
            @error('pic')
                {{ $message }}
            @enderror
        </x-error>
    </div>
    <div class="form-group">
        <label class="form-label mt-1">Notes</label>
        <textarea name="notes" id="" rows="10" placeholder="Type your notes here" class="form-control">
@if (old('notes'))
{{ old('notes') }}
@elseif(isset($friend->notes))
{{ $friend->notes }}
@endif
</textarea>
        <x-error>
            @error('notes')
                {{ $message }}
            @enderror
        </x-error>
    </div>
    <button class="btn btn-success fw-bold my-3">
        @if (isset($button))
            {{ $button }}
        @else
            Create friend
        @endif
    </button>
    {{-- <input type="submit" name="submit" value="Create Friend" class="btn btn-success fw-bold my-3" /> --}}
</form>
