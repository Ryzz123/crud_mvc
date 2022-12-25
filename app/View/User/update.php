<?php if(isset($model['error'])) : ?>
    <p><?= $model['error'] ?></p>
<?php endif; ?>
<br>
<form action="/update/mahasiswa" method="post">
    <input type="hidden" name="id" value="<?= $model['user']['id'] ?? '' ?>">
    <label for="nama">Nama</label><br>
    <input type="text" id="nama" value="<?= $model['user']['nama'] ?>" name="nama"><br>
    <label for="npm">NPM</label><br>
    <input type="text" id="npm" value="<?= $model['user']['npm'] ?>" name="npm"><br>
    <label for="prodi">Prodi</label><br>
    <input type="text" id="nama" value="<?= $model['user']['prodi'] ?>" name="prodi"><br><br>
    <button type="submit">GANTI</button>
</form>
