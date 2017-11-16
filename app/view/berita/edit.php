<form method="post">
Judul<br>
<input type="hidden" name="id" value="<?php echo $berita['id'] ?>">
<input type="text" name="judul" value="<?php echo $berita['judul'] ?>"><br>
Isi<br>
<textarea name="isi" cols="30" rows="10"><?php echo $berita['isi'] ?></textarea><br>
<button type="submit" name="edit">Edit</button>	
</form>

<?php echo $notif ?>