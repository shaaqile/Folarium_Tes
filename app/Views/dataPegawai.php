<table class="table">
    <thead>
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Kontrak</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pegawai as $pegawai) : ?>
            <tr>
                <td><?= $pegawai['pegawai_name']; ?></td>
                <td><?= $pegawai['jabatan_title']; ?></td>
                <td><?= $pegawai['kontrak_title']; ?></td>
                <td><a href="/update/<?= $pegawai['pegawai_id']; ?>">Update</a>
                    <a href="/delete/<?= $pegawai['pegawai_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>