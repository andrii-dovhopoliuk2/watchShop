<!doctype html>
<html lang="en">
<head>
    <?php echo $this->getMeta(); ?>
</head>
<body>
    <h1>template default</h1>

    <?php echo $content;?>
<?php
    $logs = \R::getDatabaseAdapter()
        ->getDatabase()
        ->getLogger();
    debug($logs->grep('SELECT'));

?>
</body>
</html>
