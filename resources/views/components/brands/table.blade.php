<table class="table ">
    <thead>
        <tr>
            <th class="no-sort">SL</th>
            <th>Brand</th>
            <th>Logo</th>
            <th>Created On</th>
            <th>Status</th>
            @permission(['brand-update', 'brand-delete'])
            <th class="no-sort">Action</th>
            @endpermission
        </tr>
    </thead>
    <tbody >
        @forelse ($brands as $brand)
            @php
                $image = $brand->image;
            @endphp
            <tr>
                <td>
                    {{ $loop->iteration + $brands->firstItem() - 1 }}
                </td>
                <td>{{ $brand->name }}</td>
                <td><span class="d-flex"><img src="{{ $image ?: asset('build/img/no-image.svg') }}"
                            style="width: 50px; height: 50px;" alt=""></span></td>
                <td>{{ $brand->created_at->format('d M Y') }}</td>
                <td>
                    <form class="status-form" action="{{ route('admin.brands.status', $brand->id) }}" method="POST" data-id="{{ $brand->id }}">
                        @csrf
                        @method('PATCH')
                        <label class="toggle-switch">
                            <input type="checkbox" class="status-checkbox" {{ $brand->status == '1' ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                        <input type="hidden" name="status" value="{{ $brand->status }}">
                    </form>
                </td>
                <td class="action-table-data">
                    <div class="edit-delete-action">
                        @permission('brand-update')
                        <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                            data-bs-target="#edit-brand-{{ $brand->id }}">
                            <i data-feather="edit" class="feather-edit"></i>
                        </a>
                        @endpermission
                        @permission('brand-delete')
                        <form action="{{ route('admin.brands.destroy', $brand->id) }}"
                            method="post" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <a class="confirm-text2 p-2" href="javascript:void(0);">
                                <i data-feather="trash-2" class="feather-trash-2"></i>
                            </a>
                        </form>
                        @endpermission
                    </div>

                </td>
            </tr>

            <!-- Edit Brand -->
            <div class="modal fade" id="edit-brand-{{ $brand->id }}">
                <div class="modal-dialog modal-dialog-centered custom-modal-two">
                    <div class="modal-content">
                        <div class="page-wrapper-new p-0">
                            <div class="content">
                                <div
                                    class="modal-header border-0 custom-modal-header justify-content-between">
                                    <div class="page-title">
                                        <h4>Edit Brand</h4>
                                    </div>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body custom-modal-body new-employee-field">
                                    <form class="editForm" data-id="{{ $brand->id }}"
                                        action="{{ route('admin.brands.update', $brand->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">Brand*</label>
                                            <input type="text" class="form-control"
                                                value="{{ $brand->name }}" name="name">
                                        </div>
                                        <label class="form-label">Logo</label>
                                        <div class="profile-pic-upload mb-3 image-container">
                                            <div class="profile-pic brand-pic">
                                                <span>
                                                    <img src="{{ $image ?: asset('build/img/icons/upload.svg') }}"
                                                        class="image-preview" alt="">
                                                </span>
                                                <a href="javascript:void(0);"
                                                    class="remove-photo d-none">
                                                    <i data-feather="x" class="x-square-add"></i>
                                                </a>
                                            </div>
                                            <div class="image-upload mb-0">
                                                <input class="image-input" type="file"
                                                    name="image">
                                                <div class="image-uploads">
                                                    <h4>Change Image</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer-btn">
                                            <button type="button" class="btn btn-cancel me-2"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit Brand -->
        @empty
            <tr class="text-center">
                <td colspan="7">No Brand Found</td>
            </tr>
        @endforelse

    </tbody>
</table>
<x-pagination :paginator="$brands" />