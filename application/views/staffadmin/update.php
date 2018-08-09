
<?php

dprint($staffdetail);

?>

<img src="<?=base_url().'/'.$staffdetail->picture?>" alt="Italian Trulli">



<?php echo form_open_multipart('admin/staffAdmin/update',['id'=>'formadd']); ?>

<?php
echo form_upload('picture');
?>
<?php
echo form_hidden('staff_id', $staffdetail->staff_id);
?>

<div class="form-group">
    <label for="email">first name:</label>
    <?php


    $datafirst_name = array(
        'type'  => 'text',
        'name'  => 'first_name',
        'id'    => 'first_name',
        'class' => 'form-control',
        'value'=>$staffdetail->first_name
);

echo form_input($datafirst_name);
echo form_error('first_name');


    ?>
  </div>
  <div class="form-group">
    <label for="email">last name:</label>
    <?php


    $datalast_name = array(
        'type'  => 'text',
        'name'  => 'last_name',
        'id'    => 'last_name',
        'class' => 'form-control',
        'value'=>$staffdetail->last_name
);

echo form_input($datalast_name);
echo form_error('last_name');


    ?>
  </div>

  <div class="form-group">
    <label for="email">Email address:</label>
    <?php


    $dataemail = array(
        'type'  => 'text',
        'name'  => 'emailuser',
        'id'    => 'emailuser',
        'class' => 'form-control',
        'value'=>$staffdetail->email
);

echo form_input($dataemail);
echo form_error('emailuser');


    ?>
  </div>
  <div class="form-group">
    <label for="username">Usernama:</label>
    <?php


    $datausername = array(
        'type'  => 'text',
        'name'  => 'username',
        'id'    => 'username',
        'class' => 'form-control',
        'value'=>$staffdetail->username
);

echo form_input($datausername);
echo form_error('username');


    ?>
  </div>
   <div class="form-group">
    <label for="username">Password:</label>
    <?php


    $datapassword = array(
        'type'  => 'password',
        'name'  => 'password',
        'id'    => 'password',
        'class' => 'form-control',
        'value'=>$staffdetail->password
);

echo form_input($datapassword);
echo form_error('password');


    ?>
  </div>
<!--   <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

