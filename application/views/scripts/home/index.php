<script type="text/javascript">
    var startCounting = document.getElementById('startCounting').value;

    const followersTop = 10000;
    const followersBottom = 5000;
    const engagementRateTop = 20;
    const engagementRateBottom = 0;

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('loading').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
        if (isLoggedIn) {
            fetchCategories();
            fetchAreas();
        } else {
            $('.authorized-only').on('click', function(e) {
                e.preventDefault();
                $('#authModal').modal('show');
            });
        }

        window.addEventListener('scroll', () => {
            // console.log(window.scrollY) //scrolled from top
            // console.log(window.innerHeight) //visible part of screen
            if ((window.scrollY + window.innerHeight) >= document.documentElement.scrollHeight) {
                if (parseInt(startCounting) % 10 === 0) {
                    // document.getElementById('loading').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
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

    let sliderValues = {};

    $('.show-slider').on('click', function(e) {
        e.stopPropagation();

        const id = $(this).attr('id');
        const $dropdown = $(this).siblings('.dropdown-row');
        const $slider = $dropdown.find('.slider');
        const sliderId = $slider.attr('id');

        // Close others
        $('.dropdown-row').not($dropdown).slideUp(150);

        $dropdown.slideToggle(150, function() {
            if (!$slider.hasClass('slider-initialized')) {
                let min = 0;
                let max = 100;
                let step = 1;
                let savedVal = sliderId === 'slider-follower' ? [followersBottom, followersTop] : [engagementRateBottom, engagementRateTop];

                if (sliderValues[id]) {
                    savedVal = sliderValues[id];
                }

                if (sliderId === 'slider-follower') {
                    min = followersBottom;
                    max = 1000000;
                    step = followersBottom;
                }

                $slider.slider({
                    tooltip: 'show',
                    min: min,
                    max: max,
                    step: step,
                    value: savedVal
                }).addClass('slider-initialized');

                $slider.on('slideStop', function(e) {
                    sliderValues[id] = e.value;
                });
            }
        });
    });

    $(document).on('click', function(e) {
        const $target = $(e.target);
        const isInsideDropdown = $target.closest('.dropdown-row, .show-slider').length > 0;

        if (!isInsideDropdown) {
            $('.dropdown-row:visible').slideUp(150);
        }
    });

    $('#category, #area').on('change', fetchResultsCount);

    $('#slider-follower, #slider-engagement').on('slideStop', fetchResultsCount);

    function fetchResultsCount() {
        const category = $('#category').val();
        const area = $('#area').val();
        const [followers_min, followers_max] = $('#slider-follower').data('slider')?.getValue() || [followersBottom, followersTop];
        const [er_min, er_max] = $('#slider-engagement').data('slider')?.getValue() || [engagementRateBottom, engagementRateTop];

        let formBody = new FormData();

        category?.forEach(cat => formBody.append('category[]', cat));
        area?.forEach(a => formBody.append('area[]', a));

        formBody.append('followers_min', followers_min);
        formBody.append('followers_max', followers_max);
        formBody.append('er_min', er_min);
        formBody.append('er_max', er_max);

        fetch(initURL + 'api/master/counter', {
                method: 'POST',
                body: formBody
            })
            .then(res => res.json())
            .then(response => {
                const count = response.count || 0;
                $('#btn-show').text(`Show ${count.toLocaleString()} Results`);
            })
            .catch(err => {
                console.error(err);
                $('#btn-show').text(`Show 0 Results`);
            });
    }

    $('.view-password').on('click', function() {
        if ($(this).is(':checked')) {
            $(this).closest('.modal-body').find('#password').attr('type', 'text');
        } else {
            $(this).closest('.modal-body').find('#password').attr('type', 'password');
        }
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

                if ($('#category').hasClass("select2-hidden-accessible")) {
                    $('#category').select2('destroy');
                }
                $('#category').html(html);
                $('#category').select2({
                    theme: 'bootstrap4',
                    placeholder: 'Select a category or enter keywords'
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

                if ($('#area').hasClass("select2-hidden-accessible")) {
                    $('#area').select2('destroy');
                }
                $('#area').html(html);
                $('#area').select2({
                    theme: 'bootstrap4',
                    placeholder: 'Area'
                });
            })
            .catch(error => {
                // console.error('Error:', error);
            })
            .finally(() => {});
    }
</script>