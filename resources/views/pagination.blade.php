<?php if(isset($limit) && is_array($limit)) { ?>
    <div style="padding:10px;margin-left:41%;">
        <?php foreach ($limit as $link)  {?>
            <a href="<?php echo $link[1] ?>">
            <button class="btn <?php echo $link[2] ? 'btn-primary':''; ?>" > <?php echo $link[0] ?></button>
            </a>
            <?php } ?>
    </div>
        <?php } ?>