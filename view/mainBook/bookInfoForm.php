<?php foreach($data as $value): ?>
	<div>  
		<p align="center"><font size="5" color="green"><?php print $value->title ?></font></p>
	    <p> Author: <font size="3" color="black"><?php print $value->author ?></font></p>
	    <p> Genre: <font size="3" color="black"><?php print $value->type_of_genre ?></font></p>
	    <p> Description: <font size="3" color="black" style="padding-top: 1px 1px 1px 1px;"><?php print $value->description ?></font></p>
	    <p> Price: <font size="3" color="green"><?php print $value->price ?> usd </font></p>
	</div>
<?php endforeach; ?>

   	<div class="window">
		<p><font size="3" color="green">Order registration: </font></p>
		 
		<form action="index.php?page=mainBook&action=addOrder" method="POST">
			<p> Your Surname: <input name="surname" type="text" size="30"></p>
			<p> Your adress: <input name="adress" type="text" size="31" ></p>
			<p> The number of copies of the book: <input name="order_count" type="text" size="10"></p>
			<input type='hidden' name = 'id' value = '<?php print $value->idbook; ?>'>
			<p><input type="submit" value="Заказать"></p>
		</form>
	</div>



