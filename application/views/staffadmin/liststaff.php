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

<a aria-pressed="true" type="button" href="<?=site_url('admin/staffAdmin/update/'.encryptInUrl($row->staff_id))?>" class="btn btn-info" ></i> View</a>
<a aria-pressed="true" type="button" href="<?=site_url('admin/staffAdmin/update/'.encryptInUrl($row->staff_id))?>" class="btn btn-info" ></i> Edit</a>
<a aria-pressed="true" type="button" href="<?=site_url('admin/staffAdmin/delete/'.encryptInUrl($row->staff_id))?>" class="btn btn-info btndelete" ></i> Delete</a>

</td>

</tr>
<?php
}

?>
</table>

<script type="text/javascript">
	
$(document).ready(function(){


    $(".btndelete").click(function(e){

        e.preventDefault();

swal({
  title: "Anda Pasti?",
  text: "sekali delete tiada lagi",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {



        window.location=$(this).attr('href');
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });


  } else {
    swal("Your imaginary file is safe!");
  }
});



       


    });


});

</script>

