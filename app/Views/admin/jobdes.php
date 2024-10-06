<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-0"><?= $leftsubtitle; ?></h4>
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

                    <?php if (session('success') !== null) : ?>
                        <div class="alert alert-success" role="alert"><?= session('success') ?></div>
                    <?php endif ?>

                    <?= form_open('admin/jobdes', 'class="sample-form"') ?>
                    <div class="form-group">
                        <?= form_label('Nama Jobdes', 'name', ['class' => 'col-sm-12 col-form-label']); ?>
                        <div class="col-sm-12">
                            <?php
                            $name = [
                                'type'  => 'text',
                                'name'  => 'name',
                                'id'    => 'name',
                                'value' => old('name'),
                                'class' => 'form-control form-control-sm',
                                'placeholder' => 'Nama Jobdes'
                            ];
                            echo form_input($name);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= form_label('Deskripsi Jobdes', 'deskripsi', ['class' => 'col-sm-12 col-form-label']); ?>
                        <div class="col-sm-12">
                            <?php
                            $deskripsi = [
                                'type'  => 'text',
                                'name'  => 'deskripsi',
                                'id'    => 'deskripsi',
                                'value' => old('deskripsi'),
                                'class' => 'form-control form-control-sm',
                                'placeholder' => 'Deskripsi Jobdes'
                            ];
                            echo form_textarea($deskripsi);
                            ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Add Jobdes</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $rightsubtitle; ?></h4>
                <div class="table-responsive">
                    <table id="jobdes" class="table table-hover">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Nama Jobdes</th>
                                <th class="text-center">Deskripsi Jobdes</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($jobdes as $item): ?>
                                <tr>
                                    <td class="text-center"><?= $i; ?></td>
                                    <td class="text-center"><?= $item['name']; ?></td>
                                    <td class="text-center"><?= ringkasKalimat($item['deskripsi'], 5); ?>...</td>
                                    <td>
                                        <div class="edit-user" style="display: inline;">
                                            <a href="<?= base_url(); ?>admin/edit-jobdes/<?= $item['id']; ?>" class="btn btn-sm btn-info" title="Edit jobdes"><i class="fa fa-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>