<table  border="1" width="500">
    <tr>
        <th>id</th>
        <th>idbook</th>
        <th>title</th>
        <th>price</th>
        <th>surname</th>
        <th>adress</th>
        <th>order_count</th>
        <th>status</th>
        <th>delete order</th>
        
    </tr>
    <?php foreach($data as $value): ?>
    <tr align="center">
        <td><?php print $value->id ?></td>
        <td><?php print $value->idbook ?></td>
        <td><?php print $value->title ?></td>
        <td><?php print $value->price ?></td>
        <td><?php print $value->surname ?></td>
        <td><?php print $value->adress ?></td>
        <td><?php print $value->order_count ?></td>
        
        <!!>
        <?php if($value->completed == 0 and $value->delete == 0):  ?>
            <td><a href="index.php?page=adminOrders&action=completedOrder&id=<?php print $value->id; ?>">completed</a></td>
            <td><a href="index.php?page=adminOrders&action=delOrders&id=<?php print $value->id; ?>">delete</a></td> 
        <?php else: ?>
            <td>completed</td>
            <td>delete</td>
        <?php endif; ?>
    </tr>    
<?php endforeach; ?>
</table>