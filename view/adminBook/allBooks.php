<table border="1" width="720">
    <tr>
        
        <th>title</th>
        <th>description</th>
        <th>price</th>
        <th>type_of_genre</th>
       
        <th>author</th>
        <th>delete</th>
        <th>update</th>
    </tr>
    
<?php foreach($data as $value): ?>
    <tr align="center">
        
        <td><?php print $value->title ?></td>
        <td><?php print $value->description ?></td>
        <td><?php print $value->price ?></td>
        <td><?php print $value->type_of_genre ?></td>
        
        <td><?php print $value->author ?></td>
        <td>
            <a href="index.php?page=adminBook&action=delBook&id=<?php print $value->idbook; ?>">
                remove
            </a>
        </td>
        <td> <a href = 'index.php?page=adminBook&action=updateBookForm&id=<?php print $value->idbook; ?>'>Update</td>
    </tr>    
<?php endforeach; ?>

</table>

<p><a href='index.php?page=adminBook&action=addBookForm'>AddBook</a></p>


