<?php if(isset($model['error'])) : ?>
    <p><?= $model['error'] ?></p>
<?php endif; ?>
<br>
<form action="/create/mahasiswa" method="post">
    <label for="nama">Nama</label><br>
    <input type="text" id="nama" name="nama"><br>
    <label for="npm">NPM</label><br>
    <input type="text" id="npm" name="npm"><br>
    <label for="prodi">Prodi</label><br>
    <input type="text" id="nama" name="prodi"><br><br>
    <button type="submit">ADD</button>
</form>