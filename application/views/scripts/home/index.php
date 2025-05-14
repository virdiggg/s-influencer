<script type="text/javascript">
    var startCounting = document.getElementById('startCounting').value;
    let sliderValues = {};

    const followersTop = 10000;
    const followersBottom = 5000;
    const engagementRateTop = 20;
    const engagementRateBottom = 0;

    $(document).on('click', function(e) {
        const $target = $(e.target);
        const isInsideDropdown = $target.closest('.dropdown-row, .show-slider').length > 0;

        if (!isInsideDropdown) {
            $('.dropdown-row:visible').slideUp(150);
        }
    });
    window.onpopstate = function(event) {
        const params = new URLSearchParams(location.search);

        $('#category').val(params.getAll('category[]')).trigger('change');
        $('#area').val(params.getAll('area[]')).trigger('change');

        const followers_min = parseInt(params.get('followers_min') || followersBottom);
        const followers_max = parseInt(params.get('followers_max') || followersTop);
        const er_min = parseFloat(params.get('er_min') || engagementRateBottom);
        const er_max = parseFloat(params.get('er_max') || engagementRateTop);

        const $followerSlider = $('#slider-follower');
        const $erSlider = $('#slider-engagement');

        // Ensure sliders are initialized before setting
        ensureSliderInitialized($followerSlider, 'slider-follower', [followers_min, followers_max]);
        ensureSliderInitialized($erSlider, 'slider-engagement', [er_min, er_max]);

        // Now it's safe to set the value
        $followerSlider.slider('setValue', [followers_min, followers_max]);
        $erSlider.slider('setValue', [er_min, er_max]);

        startCounting = 0;
        datatables();
    };

    document.addEventListener('DOMContentLoaded', function() {
        if (isLoggedIn) {
            fetchCategories();
            fetchAreas();
            if (location.search) {
                window.onpopstate();
            }
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
        formBody.append('start', startCounting);

        document.getElementById('loading').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
        document.getElementById('result-container').classList.add('d-none');

        fetch(initURL + 'api/master/influencers', {
                method: 'POST',
                body: formBody
            })
            .then(res => res.json())
            .then(response => {
                let html = `<div class="row align-items-center mb-2 border-bottom">
                    <div class="col-1"><input type="checkbox" id="check-all" class="icheck" /></div>
                    <div class="col-4">Influencer</div>
                    <div class="col-2">Followers</div>
                    <div class="col-2">Engagement Rate</div>
                    <div class="col-2">Area</div>
                    <div class="col-1"></div>
                </div>`;

                if (response.statusCode == 200) {
                    document.getElementById('result-container').classList.remove('d-none');
                    response.data.forEach((val) => {
                        let areas = [];
                        try {
                            areas = JSON.parse(val.areas).map(a => a.area).join(', ');
                        } catch (e) {
                            areas = '';
                        }

                        html += `<div class="row align-items-center mb-2">`;

                        html += `<div class="col-1"><input type="checkbox" class="icheck" /></div>`;
                        html += `<div class="col-4">
                            <div class="d-flex align-items-center w-100">
                                <div>
                                    <img src="<?= base_url('assets/no-image.jpg') ?>" alt="user-picture-${val.username_instagram}" loading="lazy"
                                        crossorigin="anonymous" class="rounded-circle" width="40" height="40"
                                        onerror="this.src='<?= base_url('assets/no-image.png') ?>'" />
                                </div>
                                <div class="d-flex flex-column ml-2 text-truncate">
                                    <div class="d-flex align-items-center" style="height: 20px;">
                                        <span class="mr-1">@${val.username_instagram}</span>
                                    </div>
                                    <span class="text-muted" style="font-size: 14px;">${val.name}</span>
                                </div>
                            </div>
                        </div>`;

                        html += `<div class="col-2">${formatNumber(val.followers)}</div>`;
                        html += `<div class="col-2">${val.engagement_rate}%</div>`;
                        html += `<div class="col-2">${areas}</div>`;
                        html += `<div class="col-1 text-right">
                            <button class="btn btn-sm btn-outline-secondary mr-1" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </div>`;

                        html += `</div>`; // End row
                    });

                    startCounting += response.data.length;

                    if (response.data.length == 10) {
                        html += `<div class="col-12 text-center">
                            <button class="btn btn-primary" id="btn-load-more">Load More</button>
                        </div>`;
                    }
                }

                document.getElementById('result-placeholder').innerHTML = html;
                pushHistoryFromForm(formBody);
            }).catch(err => {
                // console.log(err);
                // Swal.fire({
                //     type: 'error',
                //     title: 'Error',
                //     text: 'Something went wrong. Please try again.'
                // });
            }).finally(() => {
                document.getElementById('loading').innerHTML = '';
            });
    }

    function formatNumber(num) {
        if (num >= 1_000_000_000) return (num / 1_000_000_000).toFixed(1).replace(/\.0$/, '') + 'b';
        if (num >= 1_000_000) return (num / 1_000_000).toFixed(1).replace(/\.0$/, '') + 'm';
        if (num >= 1_000) return (num / 1_000).toFixed(1).replace(/\.0$/, '') + 'k';
        return num;
    }

    function pushHistoryFromForm(formData) {
        const urlParams = new URLSearchParams();

        for (let [key, value] of formData.entries()) {
            if (value instanceof File) continue; // skip file inputs
            urlParams.append(key, value);
        }

        const newUrl = location.pathname + '?' + urlParams.toString();
        history.pushState(null, '', newUrl);
    }

    $('#btn-show').on('click', function(e) {
        e.preventDefault();
        startCounting = 0;
        datatables();
    });

    document.getElementById('result-placeholder').addEventListener('click', function (e) {
        if (e.target && e.target.id === 'btn-load-more') {
            e.preventDefault();

            // Optional: disable button during fetch
            e.target.disabled = true;
            e.target.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Loading...';

            datatables(); // Call your data fetching function again
        }
    });

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

    $('#category, #area').on('change', fetchResultsCount);
    $('#slider-follower, #slider-engagement').on('slideStop', fetchResultsCount);
    $('#check-all').on('change', function() {
        const isChecked = $(this).is(':checked');
        $('#result-placeholder input.icheck').prop('checked', isChecked);
    });

    function ensureSliderInitialized($slider, id, defaultValue) {
        if (!$slider.hasClass('slider-initialized')) {
            let min = 0;
            let max = 100;
            let step = 1;
            let savedVal = defaultValue;

            if (sliderValues[id]) {
                savedVal = sliderValues[id];
            }

            if ($slider.attr('id') === 'slider-follower') {
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
    }

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