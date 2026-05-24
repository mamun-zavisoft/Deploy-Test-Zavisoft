@extends('RolePermission::layout.app')
@section('content')

<div class="page-title my-3">
    <div>
        <h5 class="fw-600">Roles</h5>
    </div>
</div>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="page-wrapper mt-3">
    <div class="page-title mb-3">
        <a href="{{ route('roles.create') }}"
            class="btn btn-primary btn-sm justify-content-center d-flex align-items-center"
            style="width: fit-content">Add new</a>
    </div>


    <div class="table-wrapper">
        <div class="table">
            <div class="thead">
                <div class="row">
                    <div class="cell" data-width="54px" style="width: 54px"> SL </div>
                    <div class="cell" data-width="150px" style="width: 150px"> Name </div>
                    <div class="cell" data-width="450px" style="width: 450px"> Permissions </div>
                    <div class="cell" data-width="100px" style="width: 100px"> Guard Name </div>
                    <div class="cell" data-width="150px" style="width: 150px;"> Action</div>
                </div>
            </div>
            <div id="table" class="tbody">
                @foreach ($roles as $role)
                <div class="row">
                    <div class="cell" data-width="54px" style="width: 54px"> {{ $loop->iteration }} </div>
                    <div class="cell" data-width="150px" style="width: 150px"> {{ $role->name }} </div>
                    <div class="cell" data-width="450px" style="width: 450px">

                        <div class="d-flex flex-wrap align-items-center gap-3">
                            @foreach ($role->permissions as $value)
                            <span>
                                <span
                                    style="width: 10px;background: red;display: inline-block;height: 10px;border-radius: 6px;"></span>
                                {{ $value->name }}
                            </span>
                            @endforeach
                        </div>

                    </div>
                    <div class="cell" data-width="100px" style="width: 100px"> {{ $role->guard_name }} </div>
                    <div class="cell" data-width="150px" style="width: 150px;">
                        <div class="btn-group">
                            <a href="{{ route('roles.edit', $role->id) }}"
                                class="btn btn-primary btn-sm justify-content-center align-items-center d-flex">Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$('form').submit(function(e) {
    e.preventDefault();
    if (confirm('Are you sure you want to delete this role?')) {
        this.submit();
    }
});
</script>

@endpush