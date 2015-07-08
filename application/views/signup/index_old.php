<div style="margin: 0 auto; width:900px; height:400px;">

    <?php
    foreach ($packages as $item) {
        ?>
        <div style="width: 200px; float: left;">
            <h1><?= $item->name ?></h1>
            <h3>$<?= $item->price ?></h3>
            <h3><?= $item->duration ?></h3>
            <a href="<?= base_url() . "signup/" . $item->id ?>">Select Plan</a>
        </div>
        <?php
    }
    ?>
</div>
