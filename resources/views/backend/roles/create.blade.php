@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            

            <x-breadcrumb title="New Role" sub-title="Add New Role" />

            <div class="card">
                <div class="card-body">
                    <form id="saveButton" action="{{ route('roles.store') }}" method="POST" class="needs-validation" novalidate="">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="name">Name<span class="manitory">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter role name" required>
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="guard_name">Guard Name<span class="manitory">*</span></label>
                                    <select id="guard_name" name="guard_name" class="select">
                                        <option value="admin" selected>Admin</option>
                                        {{-- <option value="web">Web</option> --}}
                                    </select>
                                    @error('guard_name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-header">
                                <h5 class="card-title">Permissions</h5>
                                <div class="form-check float-start mt-1">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultAll">
                                    <label class="form-check-label" for="flexCheckDefaultAll">Select All</label>
                                </div>
                            </div>
                            <div class="card-body pb-0">
                                <div class="row">
                                    @foreach ($groupedPermissions as $groupName => $permissions)
                                        @php
                                            $groupLoopId = $loop->iteration;
                                        @endphp
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="card permission-card mb-4">
                                                <div class="card-header permission-header">
                                                    <div class="form-check">
                                                        <input class="form-check-input group-checkbox" type="checkbox"
                                                            value="{{ $groupLoopId }}" id="groupID{{ $groupLoopId }}">
                                                        <label class="form-check-label fw-bold" for="groupID{{ $groupLoopId }}">
                                                            {{ $groupName }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    @foreach ($permissions as $permission)
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input substituted group_id{{ $groupLoopId }}"
                                                                name="permissions[]" type="checkbox"
                                                                value="{{ $permission->name }}"
                                                                id="flexCheckDefault{{ $permission->id }}">
                                                            <label class="form-check-label" for="flexCheckDefault{{ $permission->id }}">
                                                                {{ $permission->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Save</button>
                                <a href="{{ route('roles.index') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .permission-card {
        border: 1px solid #e9ecef;
        border-radius: 5px;
    }
    .permission-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }
    .manitory {
        color: red;
        margin-left: 2px;
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize select2
    $('.select').select2({
        width: '100%'
    });

    // Group checkbox handler
    $('.group-checkbox').change(function() {
        var groupName = $(this).val();
        var isChecked = $(this).prop('checked');
        $('.group_id' + groupName).prop('checked', isChecked);
    });

    // Select all checkbox handler
    $('#flexCheckDefaultAll').click(function() {
        $('input[type=checkbox]').prop('checked', $(this).is(':checked'));
    });
});
</script>
@endpush