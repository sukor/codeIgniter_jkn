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