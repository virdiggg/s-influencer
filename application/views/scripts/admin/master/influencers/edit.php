<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        fetchCategories();
        fetchAreas();
    });

    function inArray(needle, haystack) {
        let length = haystack.length;
        for (let i = 0; i < length; i++) {
            if (haystack[i] == needle) {
                return true;
            }
        }
        return false;
    }

    document.getElementById('form-edit').addEventListener('submit', function(e) {
        e.preventDefault();

        const btnBack = document.getElementById('btn-back').href;
        let btn = document.getElementById('btn-submit');
        btn.disabled = true;

        fetch(initURL + 'admin/master/influencers/update', {
                method: 'POST',
                body: new FormData(this)
            })
            .then(response => response.json())
            .then(response => {
                if (response.status === false) {
                    showToast(response.message);
                } else {
                    showToast(response.message);
                    setTimeout(() => {
                        window.location.replace(btnBack);
                    }, 500);
                    // datatables();
                }
            })
            .catch(error => {
                showToast(error.message);
            })
            .finally(() => {
                btn.disabled = false;
            });
    });

    fetchCategories = () => {
        let initialCategoryId = "<?= $data->category_id ?>";
        fetch(initURL + 'api/master/categories', {
                method: 'GET',
            })
            .then(response => response.json())
            .then(response => {
                let data = response.data;
                let html = '';
                data.forEach((val, key) => {
                    let selected = '';
                    if (val.id == initialCategoryId) {
                        selected = 'selected';
                    }
                    html += `<option value="${val.id}" ${selected}>${val.name}</option>`;
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
        let initialAreasJSON = '<?= $data->areas ?>';
        let initialAreas = JSON.parse(initialAreasJSON);

        let areas = [];
        initialAreas.forEach((val, key) => {
            areas.push(val.area_id);
        });

        fetch(initURL + 'api/master/areas', {
                method: 'GET',
            })
            .then(response => response.json())
            .then(response => {
                let data = response.data;
                let html = '';
                data.forEach((val, key) => {
                    let selected = '';
                    if (inArray(val.id, areas)) {
                        selected = 'selected';
                    }
                    html += `<option value="${val.id}" ${selected}>${val.name}</option>`;
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
                console.error('Error:', error);
            })
            .finally(() => {});
    }
</script>