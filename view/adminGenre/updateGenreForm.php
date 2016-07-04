<form method = "POST" name ="webForm"  action='index.php?page=adminGenre&action=updateGenre' >
		<p>Type_of_genre:</p>
	<input type="hidden" name="id" value="<?php print $data[0]->idgenre; ?>">
	<input type="text" name="type_of_genre"  placeholder ="Type_of_genre" value = "<?php print $data[0]->type_of_genre; ?>" maxlength = "25" required/><br/>
	<input type="submit" value="Submit" name="Submit"/>
</form>