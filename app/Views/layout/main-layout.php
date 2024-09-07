<!DOCTYPE html>
<html lang="en">

<?= $this->include('layout/head'); ?>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <?= $this->include('layout/navbar'); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <?= $this->include('layout/sidebar'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <?= $this->renderSection('main'); ?>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <?= $this->include('layout/footer'); ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?= $this->include('layout/script'); ?>
</body>

</html>