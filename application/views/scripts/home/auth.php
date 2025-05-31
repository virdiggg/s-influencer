<script type="text/javascript">
    document.getElementById('form-auth').addEventListener('submit', function(e) {
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
                    if (response.role == 'ADMIN') {
                        window.location.replace(initURL + 'admin/dashboard');
                    } else {
                        window.location.reload();
                    }
                }
            })
            .catch(error => {
                // console.error('Error:', error);
            })
            .finally(() => {
                btn.disabled = false;
            });
    });
</script>