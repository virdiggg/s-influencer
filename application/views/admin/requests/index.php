<div class="card">
    <div class="card-header">
        <h3 class="card-title">Influencer Requests</h3>
        <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exportModal">
                        <i class="fas fa-file-export"></i> Export
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="request-table" class="table table-bordered table-sm table-striped" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th></th>
                        <th>Influencer</th>
                        <th>Followers</th>
                        <th>Engagement Rate</th>
                        <th>Area</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Requested By</th>
                        <th>Requested At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="GET" action="<?= base_url('api/influencer/export') ?>" target="_blank" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportModalLabel">Export Requests by Date</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" name="start" id="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" name="end" id="end_date" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-download"></i> Export
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
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