<form action="" method="post">
	<div class="row">
		<label>Nama</label>
		<input type="text" name="nama" value="<?=isset($_POST['nama']) ? $_POST['nama'] : ''?>"/>
	</div>
	<div class="row">
		<label>Email</label>
		<input type="text" name="email" value="<?=isset($_POST['email']) ? $_POST['email'] : ''?>"/>
	</div>
	<div class="row">
		<label>Jenis Kelamin</label>
		<div class="options">
			<?php
			$jenis_kelamin = array('L' => 'Laki Laki', 'P' => 'Perempuan');
			foreach ($jenis_kelamin as $kode => $detail) {
				$checked = @$_POST['jenis_kelamin'] == $kode ? ' checked="checked"' : '';
				echo '<label class="radio">
						<input name="jenis_kelamin" type="radio" value="' . $kode . '"' . $checked . '>' . $detail . '</option>
					</label>';
			}
			?>
		</div>

	</div>
	<div class="row">
		<input type="submit" name="submit" value="Simpan"/>
	</div>
</form>
<?php
if (isset($_POST['submit'])) {
	echo '<h1>Hasil Input</h1>';
	echo '<ul>';
	echo '<li>Nama: ' . $_POST['nama'] . '</li>';
	echo '<li>Email: ' . $_POST['email'] . '</li>';
	echo '<li>Jenis Kelamin: ' . (isset($_POST['jenis_kelamin']) ? $jenis_kelamin[$_POST['jenis_kelamin']] : '-') . '</li>';

    if (! isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
    }
    
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        // POST data is valid.
    }
	
}?>
