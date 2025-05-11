<script type="text/javascript">
    $(function() {
        $('.select2').select2()
        fetchMerk = () => {
            fetch(initURL + 'master/api/merek/fetch', {
                    method: 'GET',
                })
                .then(response => response.json())
                .then(response => {
                    let data = response.data;
                    let html = '<option value="all">Semua</option>';
                    data.forEach((val, key) => {
                        html += `<option value="${val}">${val}</option>`;
                    });

                    document.getElementById('merk').innerHTML = html;
                    $('#merk').select2();
                })
                .catch(error => {
                    // console.error('Error:', error);
                })
                .finally(() => {
                    const merk = document.getElementById('merk');
                    merk.disabled = false;
                });
        }

    });
</script>