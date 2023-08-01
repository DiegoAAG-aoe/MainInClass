<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Form - PHP/MySQL Demo Code</title>
</head>

<body>
<fieldset>
<legend>Contact Form</legend>
<form name="frmListCat" method="post" action="contact.php">
<p>
<label for="cat_estado">List_Cat_Estado </label>
<input type="bit" name="catEstado" id="catEstado">
</p>
<p>
<label for="cat_nombre">List_Cat_Nombre</label>
<input type="varchar" name="catNombre" id="catNombre">
</p>
<p>
<label for="cat_id">List_Cat_Id</label>
<input type="tinyint" name="catId" id="catId">
</p>
<p>&nbsp;</p>
<p>
<input type="submit" name="Submit" id="Submit" value="Submit">
</p>
</form>
</fieldset>
</body>
</html>