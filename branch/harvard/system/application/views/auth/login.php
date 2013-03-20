<div class='mainInfo'>
	<p>Please login with your email/username and password below.</p>
	
    <?php echo form_open("auth/login");?>
    	
      <p>
      	<label for="identity">Email/Username:</label>
        <?php
        if (isset($identity)) { 
            echo form_input($identity);
        } else {
            echo form_input();
        }
        ?>
      </p>
      
      <p>
      	<label for="password">Password:</label>
        <?php
        if (isset($identity)) { 
            echo form_input($password);
        } else {
            echo form_input();
        }
        ?>
      </p>
      
      <p>
	      <label for="remember">Remember Me:</label>
	      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
	  </p>
      
      
      <p><?php echo form_submit('submit', 'Login');?></p>

      
    <?php echo form_close();?>

    <p><a href="forgot_password">Forgot your password?</a></p>

</div>
