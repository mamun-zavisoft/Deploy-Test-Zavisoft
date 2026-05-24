@extends('RolePermission::layout.app')
@section('content')
    <div class="page-title my-3">
        <div>
            <h5 class="fw-600">New Admin </h5>
        </div>
    </div>

    <div class="page-wrapper mt-3">
        <form id="saveButton" action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST"
            class="needs-validation " novalidate="">
            @csrf
            <div class="row add-custom-form">
                <div class="col-sm-12">
                    <div class="form-group position-relative mb-3">
                        <label for="name" class="form-label">Name*</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name...">
                    </div>
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-12">
                    <div class="form-group position-relative mb-3">
                        <label for="phone" class="form-label">Phone*</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="phone...">
                    </div>
                    @error('phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-12">
                    <div class="form-group position-relative mb-3">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email...">
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-12">
                    <div class="form-group position-relative mb-3">
                        <label for="password" class="form-label">Password*</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password...">
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-12 mt-3">
                    <label for="role">Role</label>
                    <select id="role" name="role_id" class="custom-select2">
                        @foreach ($roles as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('role_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                {{-- <div class="col-sm-12 mt-3">
                    <label for="">Status</label>
                    <select id="status" name="status" class="custom-select2">
                        <option @selected(isset($data) && ($data->status == 'active')) value="active">Active</option>
                        <option @selected(isset($data) && ($data->status == 'inactive')) value="inactive">InActive</option>
                    </select>  
                </div> --}}
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary btn-sm w-100 mt-3">Save</button>
                </div>
            </div>
            <div class="permission-details">
                <div class="groupRow mt-4">
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
                            <div class="col-lg-4 col-md-6 col-sm-6">
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
                                                    value="{{ $permission->name }}"
                                                    id="flexCheckDefault{{ $permission->id }}">
                                                <label class="form-check-label"
                                                    for="flexCheckDefault{{ $permission->id }}">{{ $permission->name }}
                                                </label>
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
