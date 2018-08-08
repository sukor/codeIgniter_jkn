<?php
$statusflash= $this->session->flashdata('statusadd');

if($statusflash){
?>

<div class="alert alert-success">
  <strong><?=$statusflash?></strong>
</div>

<?php
}
?>

<?php
print_r($staffdetail);
?>

<?php


         $datefromat= test_date('2017-09-01');

         echo $datefromat;

?>


<script type="text/javascript">
	
// $('#formadd').submit(function(){
// 	alert('hai');
// 	$(window).unload(function(){
// 			alert('hai');
// 		$('input').val('tesy');
// 	})
// })

jQuery(document).ready(function($) {

	var urllink='<?=site_url('admin/staffAdmin/add_staff')?>';

  if (window.history && window.history.pushState) {

   window.history.pushState('forward', null, '');

    $(window).on('popstate', function() {
          location.href =urllink ;

    });

  }
});

</script>