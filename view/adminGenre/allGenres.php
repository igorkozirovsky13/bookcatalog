<table border="1" width="300">
    <tr>
        <th>idgenre</th>
        <th>type_of_genre</th>
        <th>delete</th>
        <th>update</th>
    </tr>
    
<?php foreach($data as $value): ?>
    <tr align="center">
        <td><?php print $value->idgenre ?></td>
        <td><?php print $value->type_of_genre ?></td>
        <td>
            <a href="index.php?page=adminGenre&action=delGenre&id=<?php print $value->idgenre; ?>">
                remove
            </a>
        </td>
        <td> <a href = 'index.php?page=adminGenre&action=updateGenreForm&id=<?php print $value->idgenre ?>'>Update</td>
    </tr>    
<?php endforeach; ?>

</table>

<p><a href='index.php?page=adminGenre&action=addGenreForm'>AddGenre</a></p>