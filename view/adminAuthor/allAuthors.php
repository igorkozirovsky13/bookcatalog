<table border="1" width="300">
    <tr>
        <th>idauthor</th>
        <th>author name</th>
        <th>delete</th>
        <th>update</th>
    </tr>
    
<?php foreach($data as $value): ?>
    <tr align="center">
        <td><?php print $value->idauthor ?></td>
        <td><?php print $value->author ?></td>
        <td>
            <a href="index.php?page=adminAuthor&action=delAuthor&id=<?php print $value->idauthor; ?>">
                remove
            </a>
        </td>
        <td> <a href = 'index.php?page=adminAuthor&action=updateAuthorForm&id=<?php print $value->idauthor ?>'>Update</td>
    </tr>    
<?php endforeach; ?>

</table>

<p><a href='index.php?page=adminAuthor&action=addAuthorForm'>AddAuthor</a></p>
