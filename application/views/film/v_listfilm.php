<table class='table table-striped'>
<tr>
	<th>Film</th>
	<th>Nama Pelakon</th>
	<th>Jumlah</th>

</tr>

<?php
foreach ($listfilm as $row) {
?>
<tr>
<td><?php
$titlegroup=$row->title;
$titlearray=explode(',', $titlegroup);

// echo "<pre>";
// print_r($titlearray);
// echo "</pre>";

foreach ($titlearray as $row2) {

	$film=explode('|', $row2);

	?>
	<a href="<?=site_url('test/test/detailfilm/'.$film[1])?>"><?=$film[0]?></a><br>

	<?php
}



?></td>
<td><?=$row->first_name?></td>
<td><?=$row->totalfilm?></td>
</tr>
<?php
}

?>
</table>