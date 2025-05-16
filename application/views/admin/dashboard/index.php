<div class="row">
    <div class="col-8 d-none d-md-block">
        <div class="card">
            <div class="card-body text-center">
                <img src="<?= base_url('assets/img/xyz.png') ?>" alt="<?= getSession('username') ?>" class="img-fluid" />
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">To Do List</h3>
            </div>
            <div class="card-body" id="to-do-list-body"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="approveRequestModal" tabindex="-1" role="dialog" aria-labelledby="approveRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="form-add-creator" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveRequestModalLabel">Approve Influencer Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" readonly />
                </div>
                <div class="form-group">
                    <label for="username_instagram">Username Instagram</label>
                    <input type="text" class="form-control" placeholder="Username Instagram" name="username_instagram" id="username_instagram" readonly />
                </div>
                <div class="form-group">
                    <label for="followers">Followers</label>
                    <input type="text" class="form-control" placeholder="Followers" name="followers" id="followers" readonly />
                </div>
                <div class="form-group">
                    <label for="engagement_rate">Engagement Rate</label>
                    <input type="text" class="form-control" placeholder="Engagement Rate" name="engagement_rate" id="engagement_rate" readonly />
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" rows="3" placeholder="Note" name="note" id="note" readonly></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn border-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="btn-approve">Approve</button>
            </div>
        </form>
    </div>
</div>