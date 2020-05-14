<?php
$title = 'History';
require 'header.php';
?>

<div class="container">
    <h1>Completed Tasks</h1>
    <table>
    <?php while( $task = $item->fetch_assoc() ) { ?>
    <tr>
        <td><a href="index.php?page=manage&id=<?php echo $task['id']; ?>">Manage</a></td>
        <td><?php echo $task['task']; ?></td>
        <td><?php echo $task['date']; ?></td>
        <?php
            echo '<td><span class="container-fluid"><b>Done</b></span></td>';
        ?>
    </tr>
    <?php } ?>
    </table>
    <a href="index.php">Go Back</a>
</div>