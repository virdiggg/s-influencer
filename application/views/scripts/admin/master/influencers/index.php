
<script type="text/javascript">
    var endpoint = initURL + 'admin/master/influencers/';
    var dataTable;
    var datatables = function(finish) {
        dataTable = $('#master-influencer-table').DataTable({
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
                'url': endpoint + 'datatables',
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
                    render: function (data, type, row) {
                        let areas = [];
                        try {
                            areas = JSON.parse(data).map(a => a.area).join(', ');
                        } catch (e) {
                            areas = '';
                        }
                        return areas;
                    }
                },
                {
                    data: 'category',
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

</script>