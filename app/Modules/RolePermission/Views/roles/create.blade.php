@extends('RolePermission::layout.app')
@section('content')

<div class="page-title mb-3">
    <div>
        <h5 class="fw-600">Add New Role</h5>
    </div>
</div>

<div class="page-wrapper mt-3">

    <form id="saveButton" action="{{ route('roles.store') }}" method="POST" class="needs-validation add-custom-form"
        novalidate="">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group position-relative mb-3">
                    <label for="name" class="form-label">Name*</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name..." required>
                    @error('name')
                    <div class="invalid-feedback d-block"> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-12">
                <label for="guard_name" class="form-label">Guard Name*</label>
                <select id="guard_name" name="guard_name" class="custom-select2">
                    <option value="admin" selected>Admin</option>
                    {{-- <option value="web">Web</option> --}}
                </select>
                @error('guard_name')
                <div class="invalid-feedback d-block"> {{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-sm w-100 mt-3">Save</button>
            </div>
        </div>
        <div class="permission-details">
            <div class="content-area">
                <div class="groupRow mt-4">
                    @error('permissions')
                    <div class="invalid-feedback d-block"> {{ $message }}</div>
                    <div class="content-area">
                    @enderror
                    <div class="form-check mb-3" style="margin-left: -12px">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultAll">
                        <label class="form-check-label" for="flexCheckDefaultAll">Permission All</label>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach ($groupedPermissions as $groupName => $permissions)
                        @php
                        $groupLoopId = $loop->iteration;
                        @endphp
                        <div class="col-sm-6">
                            <div class="row ">
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input   group-checkbox" type="checkbox"
                                            value="{{ $groupLoopId }}" id="groupID{{ $groupLoopId }}">
                                        <label class="form-check-label" for="groupID{{ $groupLoopId }}">
                                            {{ $groupName }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    @foreach ($permissions as $permission)
                                    <div class="form-check mb-2">
                                        <input class=" form-check-input substituted group_id{{ $groupLoopId }}"
                                            aria-hidden="true" name="permissions[]" type="checkbox"
                                            value="{{ $permission->name  }}" id="flexCheckDefault{{ $permission->id }}">
                                        <label class="form-check-label"
                                            for="flexCheckDefault{{ $permission->id }}">{{ $permission->name }} </label>
                                    </div>
                                    @endforeach
                                    <br>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('.group-checkbox').change(function() {
        var groupName = $(this).val();
        var isChecked = $(this).prop('checked');
        if (isChecked) {
            $('.group_id' + groupName).prop('checked', true);
        } else {
            $('.group_id' + groupName).prop('checked', false);
        }
    });
});
</script>
<script type="text/javascript">
    $('#flexCheckDefaultAll').click(function() {
        if ($(this).is(':checked')) {
            $('input[type = checkbox]').prop('checked', true);
        } else {
            $('input[type = checkbox]').prop('checked', false);
        }
    });
</script>
@endpush