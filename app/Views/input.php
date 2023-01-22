<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <p class="mx-3">input</p>
    <?php if (isset($pegawai)) { ?>
        <form action="/updatePegawai/<?= $pegawai[0]['pegawai_id']; ?>" class="mx-3 formpegawai" method="POST">
            <div class="row mb-3">
                <div class="col-8">
                    <label for="nama" class="form-label">Nama</label>
                    <input name="nama" type="text" class="form-control <?= ($validation->hasError('nama') ? 'is-invalid' : ''); ?>" id="nama" value="<?= $pegawai[0]['pegawai_name']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama') ?> </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="jabatan" class="form-label ">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-select <?= ($validation->hasError('jabatan') ? 'is-invalid' : ''); ?>">
                        <option value="<?= $pegawai[0]['jabatan_id']; ?>" selected><?= $pegawai[0]['jabatan_title']; ?></option>
                        <?php foreach ($jabatan as $jabatan) : ?>
                            <option value="<?= $jabatan['jabatan_id']; ?>"><?= $jabatan['jabatan_title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('jabatan') ?> </div>
                </div>
                <div class="col-4">
                    <label for="kontrak" class="form-label">Kontrak</label>
                    <select name="kontrak" id="kontrak" class="form-select <?= ($validation->hasError('kontrak') ? 'is-invalid' : ''); ?>">
                        <option value="<?= $pegawai[0]['kontrak_id']; ?>" selected><?= $pegawai[0]['kontrak_title']; ?></option>
                        <?php foreach ($kontrak as $kontrak) : ?>
                            <option value="<?= $kontrak['kontrak_id']; ?>"><?= $kontrak['kontrak_title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('kontrak') ?> </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit" name="update">Update</button>
        </form>
    <?php } else { ?>
        <form action="/inputPegawai" class="mx-3 formpegawai" method="POST">
            <div class="row mb-3">
                <div class="col-8">
                    <label for="nama" class="form-label">Nama</label>
                    <input name="nama" type="text" class="form-control <?= ($validation->hasError('nama') ? 'is-invalid' : ''); ?>" id="nama">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama') ?> </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="jabatan" class="form-label ">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-select <?= ($validation->hasError('jabatan') ? 'is-invalid' : ''); ?>">
                        <option selected>Pilih jabatan</option>
                        <?php foreach ($jabatan as $jabatan) : ?>
                            <option value="<?= $jabatan['jabatan_id']; ?>"><?= $jabatan['jabatan_title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('jabatan') ?> </div>
                </div>
                <div class="col-4">
                    <label for="kontrak" class="form-label">Kontrak</label>
                    <select name="kontrak" id="kontrak" class="form-select <?= ($validation->hasError('kontrak') ? 'is-invalid' : ''); ?>">
                        <option selected>Pilih kontrak</option>
                        <?php foreach ($kontrak as $kontrak) : ?>
                            <option value="<?= $kontrak['kontrak_id']; ?>"><?= $kontrak['kontrak_title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('kontrak') ?> </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit" name="input">Tambah</button>
        </form>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>