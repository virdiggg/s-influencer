<script type="text/javascript">
    openNote = (e, id) => {
        const usernameInstagram = e.dataset.username_instagram;
        const followers = e.dataset.followers;
        const engagementRate = e.dataset.engagement_rate;
        const name = e.dataset.name;

        document.getElementById('influencer_id').value = id;
        document.getElementById('submit-username_instagram').value = usernameInstagram;
        document.getElementById('submit-followers').value = followers;
        document.getElementById('submit-engagement_rate').value = engagementRate;
        document.getElementById('submit-name').value = name;
        document.getElementById('note').value = '';

        $('#approveRequestModal').modal('show');
    }

    document.getElementById('form-add-creator').addEventListener('submit', function(e) {
        e.preventDefault();

        let btn = document.getElementById('btn-submit');
        let message = document.getElementById('message');
        message.innerHTML = '';
        btn.disabled = true;

        fetch(initURL + 'api/influencer/store', {
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
                    states.loadMore = false;
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

</script>