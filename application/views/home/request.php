<section class="content">
    <div class="container">
        <div class="card card-success">
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
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="text-center"><label id="loading"></label></div>
    </div>
</section>

<div class="modal fade" id="logsModal" tabindex="-1" role="dialog" aria-labelledby="logsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="form-add-creator" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logsModalLabel">Add creators</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="note">Note <span class="text-danger">*</span></label>
                    <textarea class="form-control form-input" rows="3" placeholder="Note" name="note" id="note" required></textarea>
                    <input type="hidden" class="form-input" name="influencer_id" id="influencer_id" required />
                    <input type="hidden" class="form-input" name="username_instagram" id="submit-username_instagram" required />
                    <input type="hidden" class="form-input" name="followers" id="submit-followers" required />
                    <input type="hidden" class="form-input" name="engagement_rate" id="submit-engagement_rate" required />
                    <input type="hidden" class="form-input" name="name" id="submit-name" required />
                </div>
                <div class="text-danger" id="message"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn border-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" id="btn-submit">Add Creator</button>
            </div>
        </form>
    </div>
</div>