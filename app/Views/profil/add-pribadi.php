<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $subtitle; ?></h4>

                <?php $errors = validation_errors(); ?>
                <?php if (! empty($errors)): ?>
                    <div class="alert alert-danger col-sm-7" role="alert">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <?php
                $action = 'profil/tambah-informasi-pribadi';
                $hidden = [
                    'user_id' => strval(auth()->user()->id),
                ];
                echo form_open($action, 'class="sample-form"', $hidden);
                ?>
                <div class="form-group row">
                    <?= form_label('Tempat Lahir', 'tempat_lahir', ['class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-5">
                        <?php
                        $tempatData = [
                            'type'  => 'text',
                            'name'  => 'tempat_lahir',
                            'id'    => 'tempat_lahir',
                            'value' => old('tempat_catatan'),
                            'class' => 'form-control',
                            'placeholder' => 'Kota/Kabupaten Tempat Lahir',
                        ];
                        echo form_input($tempatData);
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <?= form_label('Tanggal Lahir', 'tanggal_lahir', ['class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-5">
                        <?php
                        $tglData = [
                            'type'  => 'date',
                            'name'  => 'tanggal_lahir',
                            'id'    => 'tanggal_lahir',
                            'value' => old('waktu_catatan'),
                            'class' => 'form-control',
                        ];
                        echo form_input($tglData);
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <?= form_label('Alamat Domisili', 'alamat', ['class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-5">
                        <textarea class="form-control" name="alamat" id="alamat" style="height: 150px"><?= old('alamat'); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <?= form_label('No. HP Aktif', 'no_hp', ['class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-5">
                        <?php
                        $nohpData = [
                            'type'  => 'phone',
                            'name'  => 'no_hp',
                            'id'    => 'no_hp',
                            'value' => old('no_hp'),
                            'class' => 'form-control',
                            'placeholder' => 'Nomor HP Aktif',
                        ];
                        echo form_input($nohpData);
                        ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-icon-text"><i class="icon-notebook btn-icon-prepend"></i> Simpan</button>
                <?= form_close(); ?>
            </div>
        </div>

        <?= $this->endSection(); ?>