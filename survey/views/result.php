<div class="result">
    <?php 
        $barWidth = $percentage * 5;
        $style = "bar";
        if($survey->getOptionSelected() == $language['_option']) 
            $style = "selected";
        echo $language['_option'];
    ?>
    <div class="<?php echo $style; ?>" style="width: <?php echo $barWidth .'px'; ?>"><?php echo $percentage . '%'  ?></div>
</div>