<html>
<head>
</head>
<body>

<?= isset($message) ? $message : '' ?>
<?= isset($login_error) ? $login_error : '' ?>

<?= form_open('admin/login') ?>
<p><label>Username : <input type = "text" name = "username" value = "<?= set_value('username') ?>" /></label></p>
<p><label>Password : <input type = "password" name = "password" value = "<?= set_value('password') ?>" /></label></p>
<p><input type = "submit" value = "Login" /></p>
<?= form_close() ?>

<?= validation_errors() ?>
</body>
</html>
