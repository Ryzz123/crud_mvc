<a href="create/mahasiswa">TAMBAH</a><br><br>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NPM</th>
        <th>Prodi</th>
        <th>Aksi</th>
    </tr>
    </thead>

    <tbody>
    <?php $id = 1; ?>
    <?php foreach ($data as $datas) : ?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $datas['nama'] ?></td>
            <td><?= $datas['npm'] ?></td>
            <td><?= $datas['prodi'] ?></td>
            <td>
                <a href="delete/mahasiswa?id=<?= $datas['id'] ?>">hapus</a>
                <a href="update/mahasiswa?id=<?= $datas['id'] ?>">update</a>
            </td>
        </tr>
    <?php $id++ ?>
    <?php endforeach; ?>
    </tbody>
</table>