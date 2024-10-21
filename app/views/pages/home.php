<form action="/process.php" method="POST" enctype="multipart/form-data" novalidate>
    <label for="file">Upload photos</label>
    <div class="form-row">
        <input type="file" name="photo[]" accept="image/*" id="file" required multiple>
        <button type="submit">Upload</button>
    </div>
</form>
<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $key => $error):
            if (!empty($error)): ?>
                <li><?=  ERROR_NAME[$key]; ?></li>
                <ul>
                    <?php foreach ($error as $item): ?>
                        <li><?= $item; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php if(!empty($dataSource)) : ?>
    <div class="pswp-gallery pswp-gallery--single-column" id="mygallery">
        <?php if (count($dataSource) > 0) :?>
            <?php foreach ($dataSource as $source) : ?>
                <a href="<?= $source['src']?>"
                   data-pswp-width="<?= $source['width']?>"
                   data-pswp-height="<?= $source['height']?>"
                   target="_blank">
                    <img src="<?= $source['src']?>" alt="<?= $source['alt']?>" />
                </a>
            <?php endforeach;?>
        <?php endif;?>
    </div>
<?php endif;?>
