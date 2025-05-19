
<script type="text/javascript">
    var urlEndpoint = initURL + 'dip/formula/';
    var states = {
        datatableLoaded: false
    }

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
                    data: 'status',
                    render: function (data, type, row) {
                        return '<span class="badge badge-info">' + data + '</span>';
                    }
                },
                {
                    data: 'actions',
                    className: "text-center"
                },
            ],
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        datatables();
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