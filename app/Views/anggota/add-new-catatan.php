<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('style'); ?>
<!-- include summernote css-->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<!-- CSS for datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.bootstrap5.css">

<style>
    .note-editor .dropdown-toggle::after {
        all: unset;
    }

    .note-editor .note-dropdown-menu {
        box-sizing: content-box;
    }

    .note-editor .note-modal-footer {
        box-sizing: content-box;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex mb-4 align-items-center">
                    <h4 class="card-title mb-0"><?= $leftsubtitle; ?></h4>
                </div>
                <div class="d-flex py-3 border-bottom">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $rightsubtitle; ?></h4>
                <div>
                    <?php $errors = validation_errors(); ?>
                    <?php if (! empty($errors)): ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>

                    <?= form_open('anggota/tambah-catatan-baru', 'class="sample-form"') ?>
                    <div class="form-group row">
                        <?php
                        $useridData = [
                            'type' => 'hidden',
                            'name' => 'user_id',
                            'id' => 'user_id',
                            'value' => auth()->user()->id,
                            'class' => 'form-control form-control-sm'
                        ];
                        echo form_input($useridData);
                        ?>
                    </div>
                    <div class="form-group row">
                        <?= form_label('Tanggal Pekerjaan', 'waktu_catatan', ['class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-3">
                            <?php
                            $tanggalData = [
                                'type'  => 'date',
                                'name'  => 'waktu_catatan',
                                'id'    => 'waktu_catatan',
                                'value' => old('waktu_catatan'),
                                'class' => 'form-control form-control-sm',
                            ];
                            echo form_input($tanggalData);
                            ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?= form_label('Deskripsi Pekerjaan', 'note', ['class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="note" id="note"><?= old('note'); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?= form_label('Permasalahan', 'note_problem', ['class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="note_problem" id="note_problem"><?= old('note_problem'); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?= form_label('Solusi', 'solution', ['class' => 'col-sm-2 col-form-label']); ?>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="solution" id="solution"><?= old('solution'); ?></textarea>
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?= base_url(); ?>anggota/" class="btn btn-secondary"><i class="fa fa-times"></i> Batal</a>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<!-- include summernote js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#note').summernote({
            dialogsInBody: true,
            minHeight: 170,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear', 'italic']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['link', ['unlink']],
                ['view', ['fullscreen', 'help']],
            ],
            callbacks: {
                onImageUpload: function(image) {
                    uploadImageNote(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });

        $('#note_problem').summernote({
            dialogsInBody: true,
            minHeight: 170,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear', 'italic']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['link', ['unlink']],
                ['view', ['fullscreen', 'help']],
            ],
            callbacks: {
                onImageUpload: function(image) {
                    uploadImageProblem(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });

        $('#solution').summernote({
            dialogsInBody: true,
            minHeight: 170,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear', 'italic']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['link', ['unlink']],
                ['view', ['fullscreen', 'help']],
            ],
            callbacks: {
                onImageUpload: function(image) {
                    uploadImageSolution(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });

        function uploadImageNote(image) {
            let data = new FormData();
            data.append('img', image);

            $.ajax({
                type: "POST",
                url: "<?= base_url('anggota/upload-image-article'); ?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                success: function(url) {
                    $('#note').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function uploadImageProblem(image) {
            let data = new FormData();
            data.append('img', image);

            $.ajax({
                type: "POST",
                url: "<?= base_url('anggota/upload-image-article'); ?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                success: function(url) {
                    $('#note_problem').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function uploadImageSolution(image) {
            let data = new FormData();
            data.append('img', image);

            $.ajax({
                type: "POST",
                url: "<?= base_url('anggota/upload-image-article'); ?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                success: function(url) {
                    $('#solution').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {
                    image: src
                },
                type: "POST",
                url: "<?= base_url('anggota/delete-image-article') ?>",
                cache: false,
                success: function(rest) {
                    console.log(rest);
                }
            });
        }
    });
</script>
<?= $this->endSection(); ?>