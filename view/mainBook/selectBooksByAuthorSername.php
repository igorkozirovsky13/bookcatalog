<table border="1" width="720">
    <tr>
        <th>title</th>
        <th>author</th>
        <th>description</th>
        <th>price</th>
        <th>type_of_genre</th>
    </tr>
    
<?php foreach($data as $value): ?>
    <tr align="center">
        
        <td><?php print $value->title ?></td>
        <td><?php print $value->author?></td>
        <td><?php print $value->description ?></td>
        <td><?php print $value->price ?></td>
        <td><?php print $value->type_of_genre ?></td>
    </tr>    
<?php endforeach; ?>

</table>