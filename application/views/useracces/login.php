
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Floating labels example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
       <link href="<?=base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>/assets/css/floating-labels.css" rel="stylesheet">
  </head>

  <body>

    
<?php echo form_open('useracces/login',['id'=>'formlogin','class'=>'form-signin']); ?>

      <div class="text-center mb-4">
       JKN LOGIN
      </div>

      <div class="form-label-group">
        <input type="text" id="username" class="form-control" placeholder="username" required autofocus name='username'>
        <label for="usernama">Username</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name='password'>
        <label for="inputPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
   <?php echo form_close();?>
  </body>
</html>