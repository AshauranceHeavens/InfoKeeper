<x-layout>
    <div class="px-5 ">
        <h1>
            {{ $friend->name }}
        </h1>
        <div>
            <a href="{{ route('update_friend', $friend->id) }}" class="btn btn-sm my-1 btn-outline-success">Update</a>
            <form method="post" action="{{ route('delete_friend') }}" class="d-inline-block m-0">
                @csrf
                <input type="hidden" name="id" value="{{ $friend->id }}">
                <button class="btn my-1 ms-md-2 btn-sm btn-outline-danger">Delete</button>
            </form>
        </div>
        <div class="row  mt-4 align-items-center">
            <img src="{{ asset('/storage/images/' . $friend->img) }}" class="col-md-4 w-25" alt="no image">

            <div class="col-md-8  mx-0 d-flex align-items-center justify-content-start">
                <div class="row w-100">
                    <div class="col-md">

                        <div class="form-group">
                            <label class="form-label my-1">Name</label>
                            <input type="text" class="form-control " disabled="true" value="{{ $friend->name }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label my-1">Middle name</label>
                            <input type="text" class="form-control" disabled value="{{ $friend->second_name }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label my-1">Surname</label>
                            <input type="text" class="form-control" disabled value="{{ $friend->surname }}">
                        </div>
                    </div>
                    <div class="col-md">

                        <div class="form-group">
                            <label class="form-label my-1">DOB</label>
                            <input type="text" class="form-control" disabled value="{{ $friend->DOB }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label my-1">Number</label>
                            <input type="text" class="form-control" disabled value="{{ $friend->number }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label my-1">Email</label>
                            <input type="text" class="form-control" disabled value="{{ $friend->email }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class=" my-5">
            @if ($friend->notes)
                {{ $friend->notes }}
            @else
                No Notes
            @endif
        </p>
    </div>
</x-layout>
