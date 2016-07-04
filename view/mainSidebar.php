<div class='menu_sidebar'>
    <div class='up_part_of_menu_sidebar' align='center' style="color: red;">
		<strong>Navigation</strong>
	</div>

	<div class='middle_part_of_menu_sidebar' align='center'>
		<div>
			<a href="index.php?page=MainBook">List All Authors</a>
			
		</div>
	</div>

	<div align='center' style="color: red; padding: 30px 0 5px 0px;">
		<strong>Search for Author</strong>
	</div>
	<div class='middle_part_of_menu_sidebar' align='center' >
		<form name ="webForm" style="color: red; padding: 5px 0 5px 0px;" align='center' style="margin-left: 10px; " action="index.php?page=mainBook&action=selectBooksByAuthorSername" method="POST">
			<input size="15" name="sername"  placeholder ="Sername" type="text"  required/>
			
			<input type="submit" value="Search" style="margin: 5px 0 10px 0;">
		</form>
	</div>
	
	<div class='menu_sidebar'>
		<div class='up_part_of_menu_sidebar' align='center' style="color: red;" >
			<strong>Search for Genre</strong>
		</div>
		
		<div align='center' class='middle_part_of_menu_sidebar'>
			
			<?php foreach($data['genres'] as $genre): ?>   
				<tr align="center">
					<td>
						<a href="index.php?page=mainBook&action=selectBooksByGenreId&id=<?php print $genre->idgenre; ?>"><?php print $genre->type_of_genre ?></a><br>
					</td>
				</tr> 
			<?php endforeach; ?>
		
		</div>
	</div>
</div>