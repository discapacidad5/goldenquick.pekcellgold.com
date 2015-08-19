<html>
<head>
<title>Formulario de Carga</title>
</head>
<body>
<?=$error;?>
<?=form_open_multipart('/upload/do_upload_presentaciones'); ?>
<input type="file" name="userfile" size="20" />
<br /><br />
<input type="submit" value="upload" />
</form>
</body>
</html>