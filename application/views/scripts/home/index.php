<script type="text/javascript">
    var startCounting = document.getElementById('startCounting').value;

    $('#form-auth').submit(function(e) {
        e.preventDefault();

        let btn = document.getElementById('btn-auth');
        let message = document.getElementById('message');
        message.innerHTML = '';
        btn.disabled = true;

        fetch(initURL + 'auth/signIn', {
                method: 'POST',
                body: new FormData(this)
            })
            .then(response => response.json())
            .then(response => {
                if (response.status === false) {
                    message.innerHTML = `<label class="text-danger">${response.message}</label>`;
                } else {
                    window.location.reload();
                }
            })
            .catch(error => {
                // console.error('Error:', error);
            })
            .finally(() => {
                btn.disabled = false;
            });
    });

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

        // Close others
        $('.dropdown-row').not($dropdown).slideUp(150);

        $dropdown.slideToggle(150, function() {
            if (!$slider.hasClass('slider-initialized')) {
                const savedVal = sliderValues[id] || [0, 20];

                $slider.slider({
                    tooltip: 'show',
                    min: 0,
                    max: 100,
                    step: 1,
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
                    placeholder: 'Category'
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