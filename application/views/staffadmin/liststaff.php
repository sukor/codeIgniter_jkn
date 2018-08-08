<table class='table table-striped'>
<tr>
	<th>Name</th>
	<th>Email</th>
	<th>Username</th>

</tr>

<?php
foreach ($stafflist as $row) {
?>
<tr>
<td><?=$row->first_name .' '.$row->last_name ?></td>
<td><?=$row->email?></td>
<td><?=$row->username?></td>

</tr>
<?php
}

?>
</table>