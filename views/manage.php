<?php
$title = 'Manage';
require 'header.php';
?>

<div class="container">
    <form action="" method="POST">
    <?php while( $task = $item->fetch_assoc() ) { ?>
        <div class="form-group">
            <label for="task">Task:</label>
            <input type="text" class="form-control" name="task" value="<?php echo htmlspecialchars( $task['task'] ); ?>">
        </div>
        <div class="form-group">
            <label for="done">Done?</label>
            <input type="checkbox" class="form-control" name="done" value="<?php echo $task['done']; ?>" <?php if( $task['done'] == 0 ) echo 'checked'; ?>>
        </div>
        <div class="form-group">
            <label for="delete">Delete?</label>
            <input type="checkbox" class="form-control" name="delete">
        </div>
    <?php } ?>
    <input type="submit" value="Edit" name="edit">
    </form>
    <a href="index.php">Go Back</a>
</div>