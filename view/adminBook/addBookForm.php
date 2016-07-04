<form method = "POST" name ="webForm"  action='index.php?page=adminBook&action=AddBook' >
		<p>Title:</p>
	<input type="text" name="title"  placeholder ="Title" maxlength = "25" required/><br/>
		<p>Description:</p>
	<p><textarea name='description' rows='10' cols='50'></textarea></p>	
	    <p>Price:</p>
	<input type="text" name="price"  placeholder ="Price" maxlength = "25" required/><br/>
	    
	    <p>choise the author of the book</p>

	<?php foreach($data['authors'] as $author): ?>
    	<p><input type='checkbox' name='author[]' value='<?php print $author->idauthor ?>'> <?php print $author->author ?></p>
	<?php endforeach; ?>


    	<p>choise the genre of the book</p>
 	
	<?php foreach($data['genres'] as $genre): ?>   
		<p><input type='checkbox' name='type_of_genre[]' value='<?php print $genre->idgenre ?>'><?php print $genre->type_of_genre ?></p>
	<?php endforeach; ?>
	
	<p><input type="submit" value="Submit" name="Submit"/></p>
</form>