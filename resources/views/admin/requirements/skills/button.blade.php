<button title="Skills" onclick="openSkillsModal(2)" class="btn btn-success btn-table btn-icon">
    <i class="fa fa-eye" aria-hidden="true"></i>
</button>

<div class="modal fade" id="show-skills">
    <input id="item_id" type="hidden">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{$row->name}} Skills</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>

                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete requirement ?
            </div>
            {{-- <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="deleteModalConfirm" onclick="deleterequirement()"
                    class="btn btn-primary">Delete</button>

            </div> --}}

        </div>
        <!-- /.modal-content -->
    </div>

</div>
