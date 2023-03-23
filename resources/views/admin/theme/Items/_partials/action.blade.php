{{-- <a title="Edit" class="btn btn-outline-primary" href="{{ url('admin/theme/1/edit') }}">
    <i class='far fa-edit'></i>
</a> --}}
<a title="Edit" class="btn btn-outline-primary" href="{{ route('admin.theme.items.edit',$items->slug) }}">
    <i class='far fa-edit'></i>
</a>
<button title="Delete" onclick="OpenCategoryDeleteBox({{ $items->id }})" class="btn btn-outline-danger">
    <i class="fa fa-trash" aria-hidden="true"></i>
</button>



<div class="modal fade" id="delete-theme-category-modal">
    <input id="item_id" type="hidden">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirm action</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>

                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Category ?
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="deleteModalConfirm" onclick="deleteCategory()"
                    class="btn btn-primary">Delete</button>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>