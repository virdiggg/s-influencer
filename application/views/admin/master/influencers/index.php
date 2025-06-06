<div class="card">
    <div class="card-header">
        <h3 class="card-title">Master Influencer</h3>
        <div class="card-tools">
            <a class="btn btn-primary" href="<?= base_url('admin/master/influencers/create') ?>"><i class="fas fa-plus"></i> New</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="master-influencer-table" class="table table-bordered table-sm table-striped" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>Influencer</th>
                        <th>Followers</th>
                        <th>Engagement Rate</th>
                        <th>Area</th>
                        <th>Category</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="logsModal" tabindex="-1" role="dialog" aria-labelledby="logsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form id="form-add-creator" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logsModalLabel">Requests Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="log-wrapper"></div>
            <div class="modal-footer">
                <button type="button" class="btn border-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>