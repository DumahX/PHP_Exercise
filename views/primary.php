<?php
$title = 'Primary View';
include 'header.php';
?>

<div class="container">
    <h1>Add New Task</h1>
    <form action="index.php" method="POST">
        <input type="text" name="task" placeholder="Enter task"><br>
        <input type="submit" name="add_task" value="Create Task">
    </form>
    <h1>Current Tasks</h1>
    <table>
    <?php while( $task = $tasks->fetch_assoc() ) { ?>
    <tr>
        <td><span class="container-fluid"><a href="index.php?page=manage&id=<?php echo $task['id']; ?>">Manage</a></span></td>
        <td><?php echo $task['task']; ?></td>
        <td><?php echo $task['date']; ?></td>
        <?php echo '<td><span class="container-fluid"><b>In Progress</b></span></td>'; ?>
    </tr>
    <?php } ?>
    </table>
    <a href="index.php?page=history">Completed Tasks</a>
</div>