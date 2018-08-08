<table class='table table-striped'>
<tr>
	<th>Name</th>
	<th>Email</th>
	<th>Username</th>
	<th>Action</th>

</tr>

<?php
foreach ($stafflist as $row) {
?>
<tr>
<td><?=$row->first_name .' '.$row->last_name ?></td>
<td><?=$row->email?></td>
<td><?=$row->username?></td>
<td>

<a type="button" href="<?=site_url('admin/staffAdmin/update/'.$row->staff_id)?>" class="btn btn-info" ></i> Edit</a>
<button type="button" class="btn btn-light" >Light</button>
<button type="button" class="btn btn-dark" >Dark</button>

</td>

</tr>
<?php
}

?>
</table>