@extends('RolePermission::layout.app')
@section('content')
    <div class="my-3">
        <h5 class="fw-bold">User List</h5>
    </div>

    <div class="mb-3 d-flex justify-content-between align-items-center">
        {{-- @permission('user-create') --}}
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Add new</a>
        {{-- @endpermission --}}
        <div class="input-group w-25">
            <input type="text" class="form-control" placeholder="Search ..."
                onChange="location.href='{{ Request::url() }}?search='+this.value">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table " id="data11">
            <thead>
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sl = ($users->currentPage() - 1) * $users->perPage();
                @endphp
                @forelse ($users as $key => $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                <span class="badge bg-primary">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @php
                                $permissions = $user->permissions
                                    ->merge($user->roles->flatMap->permissions)
                                    ->unique('id');
                            @endphp
                            <div class="d-flex flex-wrap gap-2" style="max-height: 200px; overflow-y: auto;">
                                @foreach ($permissions as $permission)
                                    <span class="badge bg-light text-dark d-flex align-items-center">
                                        <span class="me-2"
                                            style="width: 8px; height: 8px; background: {{ $user->permissions->contains('id', $permission->id) ? 'red' : 'blue' }}; border-radius: 50%;"></span>
                                        {{ $permission->name }}
                                    </span>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-sm deleteItem"
                                        data-name="{{ $user->name }}">Delete</button>
                                </form>
                            </div>
                        </td>


                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No Data Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#data11').DataTable({
                "paging": true, // Enable pagination
                "pageLength": 10, // Default rows per page
                "lengthMenu": [10, 25, 50, 100], // Dropdown options for rows per page
                "pagingType": "full_numbers", // Pagination style
                "language": {
                    "paginate": {
                        "first": "« First",
                        "last": "Last »",
                        "next": "Next ›",
                        "previous": "‹ Prev"
                    },
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ users"
                }
            });
        });
        $(document).on('submit', '.delete-form', function(e) {
            e.preventDefault();

            const form = $(this);

            Swal.fire({
                title: 'Are you sure you want to delete?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form[0].submit();
                }
            });
        });
    </script>
@endpush
