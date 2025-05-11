<script type="text/javascript">
    var startCounting = document.getElementById('startCounting').value;

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('loading').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
        // datatables();
        if (isLoggedIn) {
            fetchCategories();
            fetchAreas();
        } else {
            // $('#category').select2({
            //     theme: 'bootstrap4',
            // });
            // $('#area').select2({
            //     theme: 'bootstrap4',
            // });
        }

        $('.authorized-only').on('click', function(e) {
            e.preventDefault();
            $('#authModal').modal('show');
        });

        window.addEventListener('scroll', () => {
            // console.log(window.scrollY) //scrolled from top
            // console.log(window.innerHeight) //visible part of screen
            if ((window.scrollY + window.innerHeight) >= document.documentElement.scrollHeight) {
                if (parseInt(startCounting) % 10 === 0) {
                    document.getElementById('loading').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
                    datatables();
                }
            }
        })
    });

    datatables = () => {
        return;
        let initHTML = $("#show-logs-body").html();
        $.ajax({
            url: "<?= base_url('api/release-notes/timeline') ?>",
            type: "POST",
            data: {
                start: startCounting
            },
            cache: false,
            dataType: "JSON",
            success: function(response) {
                let data = response.data;
                let tm = initHTML;

                data.forEach((val, key) => {
                    tm += header(val.version);
                    tm += description(val.childrens, val.date);
                })

                // $("#show-logs-body").html(tm);
                document.getElementById('show-logs-body').appendChild(tm);
                document.getElementById('startCounting').value = response.next;
                document.getElementById('loading').innerHTML = '';
            },
        });
    }

    $('#show-slider-follower').on('click', function() {
        const $row = $(this).siblings('.dropdown-row');

        // Slide down the row if hidden, up if shown
        $row.slideToggle(150, function() {
            // Only initialize slider if it hasn't been initialized yet
            const $slider = $row.find('#slider-follower');
            if (!$slider.hasClass('slider-initialized')) {
                $slider.slider({
                    tooltip: 'show',
                    min: 0,
                    max: 100,
                    step: 1,
                    value: [0, 20]
                }).addClass('slider-initialized');
            }
        });
    });

    $('#show-slider-engagement').on('click', function() {
        const $row = $(this).siblings('.dropdown-row');

        // Slide down the row if hidden, up if shown
        $row.slideToggle(150, function() {
            // Only initialize slider if it hasn't been initialized yet
            const $slider = $row.find('#slider-engagement');
            if (!$slider.hasClass('slider-initialized')) {
                $slider.slider({
                    tooltip: 'show',
                    min: 0,
                    max: 100,
                    step: 1,
                    value: [0, 20]
                }).addClass('slider-initialized');
            }
        });
    });

    fetchCategories = () => {
        fetch(initURL + 'api/master/categories', {
                method: 'GET',
            })
            .then(response => response.json())
            .then(response => {
                let data = response.data;
                let html = '';
                data.forEach((val, key) => {
                    html += `<option value="${val.id}">${val.name}</option>`;
                });

                const selector = document.getElementById('category');
                if (selector.hasClass("select2-hidden-accessible")) {
                    selector.select2('destroy');
                }
                selector.innerHTML = html;
                selector.attr('multiple', 'multiple');
                selector.select2({
                    theme: 'bootstrap4',
                });
            })
            .catch(error => {
                // console.error('Error:', error);
            })
            .finally(() => {});
    }

    fetchAreas = () => {
        fetch(initURL + 'api/master/areas', {
                method: 'GET',
            })
            .then(response => response.json())
            .then(response => {
                let data = response.data;
                let html = '';
                data.forEach((val, key) => {
                    html += `<option value="${val.id}">${val.name}</option>`;
                });

                const selector = document.getElementById('area');
                if (selector.hasClass("select2-hidden-accessible")) {
                    selector.select2('destroy');
                }
                selector.innerHTML = html;
                selector.attr('multiple', 'multiple');
                selector.select2({
                    theme: 'bootstrap4',
                });
            })
            .catch(error => {
                // console.error('Error:', error);
            })
            .finally(() => {});
    }
</script>