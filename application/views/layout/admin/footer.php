<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom.js') ?>" async></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
    });
</script>
<?php if (isset($js) && count((array) $js) > 0) :
    foreach ((array) $js as $j) :
        require_once(SCRIPT_PATH . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $j));
    endforeach;
endif; ?>
</body>
</html>