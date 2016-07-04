<form method = "POST" name ="webForm"  action='index.php?page=adminAuthor&action=updateAuthor' >
		<p>Name:</p>
	<input type="hidden" name="id" value="<?php print $data[0]->idauthor; ?>">
	<input type="text" name="name"  placeholder ="Name" value = "<?php print $data[0]->name; ?>" maxlength = "25" required/><br/>
		<p>Sername:</p>
	<input type="text" name="sername"  placeholder ="Sername" value = "<?php print $data[0]->sername; ?>" maxlength ="25" required/><br/>	
	<input type="submit" value="Submit" name="Submit"/>
</form>