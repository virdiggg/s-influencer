<script type="text/javascript">
    var startCounting = document.getElementById('startCounting').value;
    let sliderValues = {};
    let states = {
        loadMore: false,
    }

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
        fetchResultsCount();
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
                // $('#authModal').modal('show');
                window.location.href = initURL + 'admin/auth';
            });
        }

        // window.addEventListener('scroll', () => {
        //     // console.log(window.scrollY) //scrolled from top
        //     // console.log(window.innerHeight) //visible part of screen
        //     if ((window.scrollY + window.innerHeight) >= document.documentElement.scrollHeight) {
        //         if (parseInt(startCounting) % 10 === 0) {
        //             states.loadMore = true;
        //             datatables();
        //         }
        //     }
        // });
    });

    datatables = () => {
        const category = $('#category').val();
        const area = $('#area').val();
        const [followers_min, followers_max] = $('#slider-follower').data('slider')?.getValue() || [followersBottom, followersTop];
        const [er_min, er_max] = $('#slider-engagement').data('slider')?.getValue() || [engagementRateBottom, engagementRateTop];

        let formBody = new FormData();

        let categoryJSON = JSON.stringify(category);
        let areaJSON = JSON.stringify(area);

        formBody.append('followers_min', followers_min);
        formBody.append('followers_max', followers_max);
        formBody.append('er_min', er_min);
        formBody.append('er_max', er_max);
        formBody.append('start', startCounting);
        formBody.append('category', categoryJSON);
        formBody.append('area', areaJSON);

        document.getElementById('loading').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
        document.getElementById('result-container').classList.add('d-none');

        fetch(initURL + 'api/master/influencers', {
                method: 'POST',
                body: formBody
            })
            .then(res => res.json())
            .then(response => {
                let html = ``;
                const resultBody = document.getElementById('result-body');

                if (response.statusCode == 200) {
                    document.getElementById('result-container').classList.remove('d-none');

                    response.data.forEach((val) => {
                        let areas = [];
                        try {
                            areas = JSON.parse(val.areas).map(a => a.area).join(', ');
                        } catch (e) {
                            areas = '';
                        }

                        html += `<div class="row align-items-center mb-2 dynamic-row">`;

                        html += `<div class="col-1"><!-- <input type="checkbox" class="icheck" /> --></div>`;
                        html += `<div class="col-4">
                            <div class="d-flex align-items-center w-100">
                                <div>
                                    <img src="<?= base_url('assets/no-image.jpg') ?>" alt="user-picture-${val.username_instagram}" loading="lazy"
                                        crossorigin="anonymous" class="rounded-circle" width="40" height="40"
                                        onerror="this.src='<?= base_url('assets/no-image.png') ?>'" />
                                </div>
                                <div class="d-flex flex-column ml-2 text-truncate">
                                    <div class="d-flex align-items-center" style="height: 20px;">
                                        <span class="mr-1">
                                            <a href="https://www.instagram.com/${val.username_instagram}" target="_blank"
                                                rel="noopener noreferrer" class="text-truncate" style="font-size: 16px;">
                                                @${val.username_instagram}</a>
                                        </span>
                                    </div>
                                    <span class="text-muted" style="font-size: 14px;">${val.name}</span>
                                </div>
                            </div>
                        </div>`;

                        html += `<div class="col-2">${formatNumber(val.followers)}</div>`;
                        html += `<div class="col-2">${val.engagement_rate}%</div>`;
                        html += `<div class="col-2">${areas}</div>`;
                        html += `<div class="col-1 text-right">
                            <button class="btn btn-sm btn-link mr-1 text-secondary" onclick="openNote(this, '${val.id}')"
                                data-username_instagram="${val.username_instagram}"
                                data-followers="${val.followers}"
                                data-engagement_rate="${val.engagement_rate}"
                                data-name="${val.name}"
                                title="Add to List"><i class="fas fa-folder-plus"></i></button>
                        </div>`;

                        html += `</div>`; // End div row
                    });

                    if (states.loadMore === false) {
                        // Purge all rows if fresh load
                        const dynamicRows = document.querySelectorAll('.dynamic-row');
                        dynamicRows.forEach(row => row.remove());
                    } else {
                        // Count only if not fresh load
                        startCounting += response.data.length;
                    }

                    const tempContainer = document.createElement('div');
                    tempContainer.innerHTML = html;

                    const fragment = document.createDocumentFragment();
                    while (tempContainer.firstChild) {
                        fragment.appendChild(tempContainer.firstChild);
                    }

                    const container = resultBody.parentNode;
                    const nextSibling = resultBody.nextSibling;
                    container.insertBefore(fragment, nextSibling);
                }

                const cardFooter = document.getElementById('card-footer');

                if (response.data.length == 10) {
                    if (!cardFooter.querySelector('#btn-load-more')) {
                        const html = `<div class="col-12 text-center">
                            <button class="btn btn-outline-success" id="btn-load-more">Load More</button>
                        </div>`;
                        cardFooter.insertAdjacentHTML('beforeend', html);
                    } else {
                        document.getElementById('btn-load-more').classList.remove('d-none');
                    }
                } else {
                    if (cardFooter.querySelector('#btn-load-more')) {
                        document.getElementById('btn-load-more').classList.add('d-none');
                    }
                }

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
                document.getElementById('btn-load-more').innerHTML = 'Load More';
                document.getElementById('btn-load-more').disabled = false;
            });
    }

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

        $('#addCreatorModal').modal('show');
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
                    $('#addCreatorModal').modal('hide');
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
    });

    function pushHistoryFromForm(formData) {
        const urlParams = new URLSearchParams();

        for (let [key, value] of formData.entries()) {
            if (value instanceof File) continue; // skip file inputs
            urlParams.append(key, value);
        }

        const newUrl = location.pathname + '?' + urlParams.toString();
        history.pushState(null, '', newUrl);
    }

    document.getElementById('btn-show').addEventListener('click', function (e) {
        e.preventDefault();
        startCounting = 0;
        states.loadMore = false;
        datatables();
    });

    document.getElementById('result-container').addEventListener('click', function (e) {
        if (e.target && e.target.id === 'btn-load-more') {
            e.preventDefault();

            e.target.disabled = true;
            e.target.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Loading...';

            states.loadMore = true;
            datatables();
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
        $('#result-header input.icheck').prop('checked', isChecked);
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

        let categoryJSON = JSON.stringify(category);
        let areaJSON = JSON.stringify(area);

        formBody.append('followers_min', followers_min);
        formBody.append('followers_max', followers_max);
        formBody.append('er_min', er_min);
        formBody.append('er_max', er_max);
        formBody.append('category', categoryJSON);
        formBody.append('area', areaJSON);

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