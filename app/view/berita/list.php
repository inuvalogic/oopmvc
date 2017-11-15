<p><a href="/berita/add">Tambah</a></p>

<?php if (isset($notif)){ echo $notif; } ?>

<?php
if ($berita!=false)
{
	?>
	<table border="1">
		<tr>
			<th>Judul</th>
			<th>Action</th>
		</tr>
		<?php foreach ($berita as $row) { ?>
			<tr>
				<td>
					<a href="/berita/<?= $row['id']; ?>/<?= $row['judul']; ?>">
						<?= $row['judul']; ?>
					</a>
				</td>
				<td>
					<a href="/berita/edit/<?= $row['id']; ?>">Edit</a>
					<a href="/berita/delete/<?= $row['id']; ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>
	<?php
} else {
	echo 'belum ada berita';
}