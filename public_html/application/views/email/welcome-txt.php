Bienvenido a <?php echo $site_name; ?>,

Gracias por afiliarte a <?php echo $site_name; ?>.

A continuación te mostramos los detalles de tu cuenta y el link para que inicies sesión

<?php echo site_url('/auth/login/'); ?>

<?php if (strlen($username) > 0) { ?>

Tu nombre de usuario: <?php echo $username; ?>
<?php } ?>

Tu correo: <?php echo $email; ?>

<?php /* Your password: <?php echo $password; ?>

*/ ?>

Divertete
El equipo de <?php echo $site_name; ?>