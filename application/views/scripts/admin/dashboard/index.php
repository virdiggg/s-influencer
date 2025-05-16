<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        datatables();
    });

    openNote = (e, id) => {
        const usernameInstagram = e.dataset.username_instagram;
        const followers = e.dataset.followers;
        const engagementRate = e.dataset.engagement_rate;
        const name = e.dataset.name;
        const note = e.dataset.note;

        document.getElementById('row_id').value = id;
        document.getElementById('username_instagram').value = usernameInstagram;
        document.getElementById('followers').value = followers;
        document.getElementById('engagement_rate').value = engagementRate;
        document.getElementById('name').value = name;
        document.getElementById('note').value = note;

        $('#approveRequestModal').modal('show');
    }

    document.getElementById('form-add-creator').addEventListener('submit', function(e) {
        e.preventDefault();

        let btn = document.getElementById('btn-approve');
        let message = document.getElementById('message');
        message.innerHTML = '';
        btn.disabled = true;

        fetch(initURL + 'api/influencer/approve', {
                method: 'POST',
                body: new FormData(this)
            })
            .then(response => response.json())
            .then(response => {
                if (response.status === false) {
                    message.innerHTML = `<label class="text-danger">${response.message}</label>`;
                } else {
                    $('#approveRequestModal').modal('hide');
                    showToast(response.message);
                    datatables();
                }
            })
            .catch(error => {
                message.innerHTML = `<label class="text-danger">${error.message}</label>`;
            })
            .finally(() => {
                btn.disabled = false;
            });
    })

    datatables = () => {
        const resultBody = document.getElementById('to-do-list-body');
        resultBody.innerHTML = '<div class="row"><div class="col-12 text-center">Loading...</div></div>';

        fetch(initURL + 'api/influencer/requests', {
                method: 'GET',
            })
            .then(res => res.json())
            .then(response => {
                let html = ``;
                if (response.statusCode == 200) {
                    if (response.data.length == 0) {
                        html += `<div class="row"><div class="col-12 text-center">No data found.</div></div>`;
                    } else {
                        response.data.forEach((val, index) => {
                            html += `<div class="row">`;

                            html += `<div class="col-2">${index + 1}</div>`;
                            html += `<div class="col-8"><strong>${val.username_instagram}</strong> - Approve Influencer Request</div>`;
                            html += `<div class="col-2"><button class="btn btn-sm btn-link text-success" title="Approve"
                                onclick="openNote(this, ${val.id})"
                                data-note="${val.note}"
                                data-username_instagram="${val.username_instagram}"
                                data-followers="${val.followers}"
                                data-engagement_rate="${val.engagement_rate}"
                                data-name="${val.name}">
                                <i class="fas fa-check"></i>
                            </button></div>`;

                            html += `</div>`; // End div row
                        });
                    }

                    resultBody.innerHTML = html;
                }
            }).catch(err => {
                // console.log(err);
                // Swal.fire({
                //     type: 'error',
                //     title: 'Error',
                //     text: 'Something went wrong. Please try again.'
                // });
            }).finally(() => {
            });
    }
</script>