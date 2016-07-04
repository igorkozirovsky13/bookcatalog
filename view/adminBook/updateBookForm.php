<form method = "POST" name ="webForm"  action='index.php?page=adminBook&action=updateBook' >
		<p>Title:</p>
	<input type="hidden" name="id" value="<?php print $data[0]->idbook; ?>">
	<input type="text" name="title"  placeholder ="Title" value = "<?php print $data[0]->title; ?>" maxlength = "25" required/><br/>
		<p>Description:</p>
	<input type="text" name="description"  placeholder ="Description" value = "<?php print $data[0]->description; ?>" maxlength ="25" required/><br/>	
	    <p>Price:</p>
	<input type="text" name="price" placeholder="Price" value = "<?php $data[0]->price; ?>" maxlength ="25" required/></br>
	<input type="submit" value="Submit" name="Submit"/>
</form>