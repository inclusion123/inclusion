<a title="View" class=" btn btn-info btn-table btn-icon" href="{{ route('admin.childservices.indexpage', $row->id) }}">
    <i class='far '>Child</i>
</a>


<a title="Edit" class="btn btn-info btn-table btn-icon" href="{{ route('admin.service.edit', $row->id) }}">
    <i class='far fa-edit'></i>
</a>


<button title="Delete" onclick="OpenDeleteBox({{ $row->id }})" class="btn btn-danger btn-table btn-icon">
    <i class="fa fa-trash" aria-hidden="true"></i>
</button>



<div class="modal fade" id="delete-service-modal">
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
                Are you sure you want to delete this Service ?
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="deleteModalConfirm" onclick="deleteItem()"
                    class="btn btn-primary">Delete</button>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
