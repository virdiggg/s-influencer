
<script type="text/javascript">
    var dataTable;
    var datatables = function(finish) {
        dataTable = $('#request-table').DataTable({
            'responsive': true,
            'autoWidth': true,
            'bDestroy': true,
            // 'stateSave': true,
            'processing': true,
            'serverSide': true,
            'searching': true,
            'ordering': false,
            'bInfo': false,
            'language': {
                processing: ''
            },
            'ajax': {
                'url': initURL + 'api/influencer/datatables',
                'type': 'POST',
                'data': function(d) {
                    let search = $('input[type="search"]').val();
                    // Append to data
                    d.search = search;
                },
                'beforeSend': function() {
                    $.when($('.loading').remove()).then($('body').prepend('<div class="loading"></div>'));
                },
            },
            'footerCallback': function(row, data, start, end, display) {
                let api = this.api();
            },
            "drawCallback": function(settings) {
                $('.loading').remove();
                if (settings.iDraw == 1) {
                    if (finish) {
                        finish();
                    }
                }
            },
            'initComplete': function(settings, json) {
                // console.log(settings);
                // console.log(json);
            },
            'columns': [
                {
                    data: 'no',
                    className: "text-center"
                },
                {
                    data: 'influencer',
                },
                {
                    data: 'followers',
                    render: function (data, type, row) {
                        return formatNumber(data);
                    }
                },
                {
                    data: 'engagement_rate',
                    render: function (data, type, row) {
                        return data + '%';
                    }
                },
                {
                    data: 'areas',
                },
                {
                    data: 'note',
                },
                {
                    data: 'status',
                    render: function (data, type, row) {
                        return '<span class="badge badge-'+(data == 'Approved' ? 'success' : 'danger')+'">' + data + '</span>';
                    }
                },
                {
                    data: 'created_by_name',
                },
                {
                    data: 'actions',
                    className: "text-center"
                },
            ],
        });
    }

    openLog = (e, id, username) => {
        document.getElementById('logsModalLabel').textContent = 'Requests Log - ' + username;

        let formBody = new FormData();
        formBody.append('id', id);

        fetch(initURL + 'api/influencer/logs', {
                method: 'POST',
                body: formBody,
            })
            .then(response => response.json())
            .then(response => {
                // console.log(response);
                let logWrapper = document.getElementById('log-wrapper');
                logWrapper.innerHTML = '<div class="row"><div class="col-12 text-center">Loading...</div></div>';

                let html = `<div class="row border-bottom">
                    <div class="col-3 text-center"><strong>ACTION BY</strong></div>
                    <div class="col-2 text-center"><strong>ACTION</strong></div>
                    <div class="col-2 text-center"><strong>DATE</strong></div>
                    <div class="col-5 text-center"><strong>NOTE</strong></div>
                </div>`;
                response.data.forEach((val, key) => {
                    html += `<div class="row">`;
                    html += `<div class="col-3 border">${val.created_by}</div>`;
                    html += `<div class="col-2 border">${val.label}</div>`;
                    html += `<div class="col-2 border">${val.created_at}</div>`;
                    html += `<div class="col-5 border">${val.note}</div>`;
                    html += `</div>`;
                });
                logWrapper.innerHTML = html;

                $('#logsModal').modal('show');
            })
            .catch(error => {
                // console.error('Error:', error);
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        datatables();
    });

    document.getElementById('form-request').addEventListener('submit', function(e) {
        e.preventDefault();

        let typeAction = document.getElementById('type_action').value;
        let btn = document.getElementById('btn-approve');
        let message = document.getElementById('message');
        message.innerHTML = '';
        btn.disabled = true;

        fetch(initURL + 'api/influencer/' + typeAction, {
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
                    dataTable.draw();
                }
            })
            .catch(error => {
                message.innerHTML = `<label class="text-danger">${error.message}</label>`;
            })
            .finally(() => {
                btn.disabled = false;
            });
    });

    openDelete = (id) => {
        Swal.fire({
            title: 'Delete Influencer Request?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                let formBody = new FormData();
                formBody.append('id', id);

                fetch(initURL + 'api/influencer/destroy', {
                        method: 'POST',
                        body: formBody,
                    })
                    .then(response => response.json())
                    .then(response => {
                        // console.log(response);
                        showToast(response.message);
                        dataTable.draw();
                    })
                    .catch(error => {
                        // console.error('Error:', error);
                        showToast(error.message);
                    });
            }
        });
    }
</script>