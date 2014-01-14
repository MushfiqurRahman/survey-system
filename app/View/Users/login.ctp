<?php
	echo $this->Form->create('User', array('type' => 'POST', 'action'=>'login'));
?>

<div id="dialog">
	  <div style="text-align:center; padding-bottom: 10px;">

	  	Site<?php //echo $settings_var['app_name'];?> Login

	  </div>
	  <table cellspacing="10" id="standard">
	  <tr><td width="100" align="right">Email</td><td>
	  <?php
	  		echo $this->Form->input('email', array('label' =>false, 'div'=>false, 'type'=>'email', 'autofocus'=>true));
	  ?>
	  </td></tr>

	  <tr><td align="right">Password</td><td>

	  <?php
	  		echo $this->Form->input('password', array('label' =>false, 'div'=>false, 'required'=>true));
	  ?>

	  </td></tr>

	  <tr>
	  <td align="right">
	  &nbsp;
	  </td>
	  <td>
	  	<span class="loginBtn"><input name="login" type="submit" value="Login" /></span>
	  	<span class="remember"><input name="data[User][remember_me]" type="checkbox" value="0"/>Remember Me</span>	  	
	  </td>
	  </tr>

	  </table>

</div>

  <div style="text-align: center; font-size: 12px; padding: 10px;">
  	<?php echo $this->Html->link('Forgot password?','/recover');?>
  </div>

<?php
	echo $this->Form->end();
?>

<!-- File:// nrbdesk/app/views/users/login.ctp -->