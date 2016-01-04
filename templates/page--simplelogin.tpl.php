<?php 
/**
 * @file
 * Customize login page HTML structure
 */
 $path = drupal_get_path_alias();
 $variable = variable_get('simplelogin_fid', '');
   if ($variable) {
     $file = file_load($variable);
     $bgimg = file_create_url($file->uri);
     $css = "body.simplelogin {background-image: url('$bgimg') }";
     drupal_add_css($css, 'inline');
   }
?>
<div class="loginregis">  
  <?php if(($path == 'user/password') || ($path == 'user/register')): ?>
    <?php print l( 'Login-In', 'user/login', array('attributes' => array('class' => array('signup'))) ); ?>
  <?php else: ?>
    <?php if (variable_get('user_register')): ?>
      <?php print l( 'Sign-up', 'user/register', array('attributes' => array('class' => array('signup'))) ); ?>
    <?php endif; ?>
  <?php endif; ?>
  <div class="ex-center-position">
  	<?php if (isset($logo)): ?>
  	  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="login-logo">
  	  	<img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
  	  </a>
  	<?php else: ?>
  	  <h3><?php print $site_name; ?></h3>
  	<?php endif; ?>
  	<?php print $messages; ?>
  	<?php print render($page['content']); ?>
  	<?php if(($path == 'user') || ($path == 'user/login')): ?>
  	  <p>Forgot password? <?php print l('Click here', 'user/password'); ?></p>
  	<?php endif; ?>
  </div>
</div>