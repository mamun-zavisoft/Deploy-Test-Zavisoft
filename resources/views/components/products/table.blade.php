@foreach ($entity as $product)
    <tr>
        <td>
            {{ $loop->iteration + $products->firstItem() - 1 }}
        </td>
        <td>{{ $product->name }}</td>
        <td><span class="d-flex"><img src="{{ URL::asset('/build/img/product/product-icon-01.png') }}" alt=""></span>
        </td>
        <td>{{ $product->created_at->format('d M Y') }}</td>
        <td><span
                class="badge rounded-pill bg-outline-{{ $product->status == 1 ? 'success' : 'warning' }}">{{ $product->status == 1 ? 'Active' : 'Inactive' }}</span>
        </td>
        <td class="action-table-data">
            <div class="edit-delete-action">
                <a class="me-2 p-2" href="#" data-bs-toggle="modal" data-bs-target="#edit-product-{{ $product->id }}">
                    <i data-feather="edit" class="feather-edit"></i>
                </a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <a class="confirm-text2 p-2" href="javascript:void(0);">
                        <i data-feather="trash-2" class="feather-trash-2"></i>
                    </a>
                </form>
            </div>

        </td>
    </tr>

    <!-- Edit product -->
    <div class="modal fade" id="edit-product-{{ $product->id }}">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header">
                            <div class="page-title">
                                <h4>Edit product</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body new-employee-field">
                            <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">product</label>
                                    <input type="text" class="form-control" value="{{ $product->name }}"
                                        name="name">
                                </div>
                                <label class="form-label">Logo</label>
                                <div class="profile-pic-upload mb-3">
                                    <div class="profile-pic product-pic">
                                        <span><img src="{{ URL::asset('/build/img/product/product-icon-02.png') }}"
                                                alt=""></span>
                                        <a href="javascript:void(0);" class="remove-photo"><i data-feather="x"
                                                class="x-square-add"></i></a>
                                    </div>
                                    <div class="image-upload mb-0">
                                        <input type="file">
                                        <div class="image-uploads">
                                            <h4>Change Image</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-cancel me-2"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-submit">Save
                                        Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit product -->
@endforeach
