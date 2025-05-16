<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php require_once(LAYOUT_PATH . 'admin' . DIRECTORY_SEPARATOR . 'title.php'); ?>
    <!-- Main content -->
    <section class="content">
        <?php if (isset($view)): $this->load->view($view); endif; ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->