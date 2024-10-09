<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('main'); ?>
<div class="row">
    <div class="col-xl-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $subtitle; ?></h4>

                <?php if (session('success') !== null) : ?>
                    <div class="alert alert-success" role="alert"><?= session('success') ?></div>
                <?php endif ?>

                <?php if (session('fail') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('fail') ?></div>
                <?php endif ?>

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-akun-tab" data-bs-toggle="tab" data-bs-target="#nav-akun" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Akun User</button>
                        <button class="nav-link" id="nav-jobdes-tab" data-bs-toggle="tab" data-bs-target="#nav-jobdes" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Jobdes User</button>
                        <button class="nav-link" id="nav-detail-tab" data-bs-toggle="tab" data-bs-target="#nav-detail" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Detail User</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-akun" role="tabpanel" aria-labelledby="nav-home-tab">
                        <?php
                        $action = 'admin/simpan-akun/' . $user->id;
                        $hidden = [
                            'user_id' => strval($user->id),
                            'oldgroup' => $group[0],
                        ];
                        echo form_open($action, 'class="sample-form"', $hidden);
                        ?>
                        <div class="form-group row">
                            <?= form_label('Username', 'username', ['class' => 'col-sm-2 col-form-label']); ?>
                            <div class="col-sm-5">
                                <?php
                                $usernameData = [
                                    'type'  => 'text',
                                    'name'  => 'username',
                                    'id'    => 'username',
                                    'value' => $user->username,
                                    'class' => 'form-control form-control',
                                    'placeholder' => 'Username',
                                    'readonly' => true,
                                    'disabled' => true,
                                ];
                                echo form_input($usernameData);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <?= form_label('Email', 'email', ['class' => 'col-sm-2 col-form-label']); ?>
                            <div class="col-sm-5">
                                <?php
                                $emailData = [
                                    'type'  => 'email',
                                    'name'  => 'email',
                                    'id'    => 'email',
                                    'value' => $user->email,
                                    'class' => 'form-control form-control',
                                    'readonly' => true,
                                    'disabled' => true,
                                ];
                                echo form_input($emailData);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <?= form_label('Nama', 'name', ['class' => 'col-sm-2 col-form-label']); ?>
                            <div class="col-sm-5">
                                <?php
                                $nameData = [
                                    'type'  => 'text',
                                    'name'  => 'name',
                                    'id'    => 'name',
                                    'value' => $user->name,
                                    'class' => 'form-control form-control',
                                    'placeholder' => 'Nama Lengkap'
                                ];
                                echo form_input($nameData);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <?= form_label('Group', 'group', ['class' => 'col-sm-2 col-form-label']); ?>
                            <div class="col-sm-5">
                                <select name="group" id="group" class="form-select form-select">
                                    <option value="" disabled <?= !old('group') ? 'selected' : ''; ?>>- Pilih -</option>
                                    <?php foreach ($lists as $key => $list) : ?>
                                        <option value="<?= $key; ?>" <?= $key == old('group') || $key == $group[0] ? 'selected' : ''; ?>><?= $list; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        <?= form_close(); ?>
                    </div>
                    <div class="tab-pane fade" id="nav-jobdes" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <?php
                        $action = 'admin/simpan-jobdes/' . $user->id;
                        $hidden = [
                            'user_id' => strval($user->id),
                        ];
                        echo form_open($action, 'class="sample-form"', $hidden);
                        ?>
                        <div class="form-group row">
                            <?= form_label('Jobdes', 'jobdes', ['class' => 'col-sm-2 col-form-label']); ?>
                            <div class="col-sm-5">
                                <select name="jobdes" id="jobdes" class="form-select form-select">
                                    <option value="" disabled <?= !old('jobdes') ? 'selected' : ''; ?>>- Pilih -</option>
                                    <?php foreach ($jobdes as $job) : ?>
                                        <?php if (!$userJobdes): ?>
                                            <option value="<?= $job['id']; ?>"><?= $job['name']; ?></option>
                                        <?php else: ?>
                                            <option value="<?= $job['id']; ?>" <?= $job['id'] == old('jobdes') || $job['id'] == $userJobdes['jobdesId'] ? 'selected' : ''; ?>><?= $job['name']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        <?= form_close(); ?>
                    </div>
                    <div class="tab-pane fade" id="nav-detail" role="tabpanel" aria-labelledby="nav-contact-tab">Detail User</div>
                </div>
            </div>
        </div>

        <?= $this->endSection(); ?>