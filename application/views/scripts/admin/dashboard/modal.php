<div class="modal fade" id="approveRequestModal" tabindex="-1" role="dialog" aria-labelledby="approveRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="form-request" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveRequestModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" readonly />
                    <input type="hidden" name="id" id="row_id" required />
                    <input type="hidden" name="type_action" id="type_action" required />
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
                <div class="form-group" id="reject-row"></div>
                <div class="form-group">
                    <label for="request_by">Requested By</label>
                    <textarea class="form-control" rows="3" placeholder="Requested By" name="request_by" id="request_by" readonly></textarea>
                </div>
                <div class="text-danger" id="message"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn border-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="btn-approve">Approve</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    openApprove = (e, id) => {
        const usernameInstagram = e.dataset.username_instagram;
        const followers = e.dataset.followers;
        const engagementRate = e.dataset.engagement_rate;
        const name = e.dataset.name;
        const note = e.dataset.note;
        const requested_by = e.dataset.requested_by;

        document.getElementById('row_id').value = id;
        document.getElementById('username_instagram').value = usernameInstagram;
        document.getElementById('followers').value = followers;
        document.getElementById('engagement_rate').value = engagementRate;
        document.getElementById('name').value = name;
        document.getElementById('note').value = note;
        document.getElementById('requested_by').value = requested_by;
        document.getElementById('type_action').value = 'approve';
        document.getElementById('approveRequestModalLabel').textContent ='Approve Influencer Request';
        document.getElementById('reject-row').innerHTML = '';

        $('#approveRequestModal').modal('show');
    }

    openReject = (e, id) => {
        const usernameInstagram = e.dataset.username_instagram;
        const followers = e.dataset.followers;
        const engagementRate = e.dataset.engagement_rate;
        const name = e.dataset.name;
        const note = e.dataset.note;
        const requested_by = e.dataset.requested_by;

        document.getElementById('row_id').value = id;
        document.getElementById('username_instagram').value = usernameInstagram;
        document.getElementById('followers').value = followers;
        document.getElementById('engagement_rate').value = engagementRate;
        document.getElementById('name').value = name;
        document.getElementById('note').value = note;
        document.getElementById('requested_by').value = requested_by;
        document.getElementById('type_action').value = 'reject';
        document.getElementById('approveRequestModalLabel').textContent ='Reject Influencer Request';
        document.getElementById('reject-row').innerHTML = `<label for="reject_note">Reason</label><textarea class="form-control" rows="3" placeholder="Reason" name="reject_note" id="reject_note" required></textarea>`;

        $('#approveRequestModal').modal('show');
    }
</script>