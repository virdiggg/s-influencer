<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        fetchCategories();
        fetchAreas();
    });

    document.getElementById('form-create').addEventListener('submit', function(e) {
        e.preventDefault();

        const btnBack = document.getElementById('btn-back').href;
        let btn = document.getElementById('btn-submit');
        btn.disabled = true;

        fetch(initURL + 'admin/master/influencers/store', {
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
                console.error('Error:', error);
            })
            .finally(() => {});
    }
</script>