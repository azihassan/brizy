<html>
<head>
</head>
<body>

<h2>Admin dashboard</h2>
<?= isset($message) ? $message : '' ?>
<p>Logged in successfully !</p>
<p><a href = "<?= site_url('admin/logout') ?>">Log out ?</a></p>
</body>
</html>

