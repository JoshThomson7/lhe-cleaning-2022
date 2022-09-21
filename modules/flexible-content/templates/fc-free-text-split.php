<?php
/*
----------------------------------------------------
    ______                  ______          __
   / ____/_______  ___     /_  __/__  _  __/ /_
  / /_  / ___/ _ \/ _ \     / / / _ \| |/_/ __/
 / __/ / /  /  __/  __/    / / /  __/>  </ /_
/_/   /_/   \___/\___/    /_/  \___/_/|_|\__/   SPLIT

----------------------------------------------------
Free Text
*/

$max_width = '';
if(get_sub_field('max_width')) {
    $percentage = (get_sub_field('max_width') * 1400) / 100;
    $max_width = 'style="max-width:'.$percentage.'px; margin:0 auto;"';
}

// Feature text width
$left_column_width = get_sub_field('left_column_width').'%';
$right_column_width = (100 - (get_sub_field('left_column_width'))).'%';

?>

<div class="split-container" <?php echo $max_width; ?>>
    <div class="left-col" style="width: <?php echo $left_column_width; ?>">
        <?php echo apply_filters('the_content', get_sub_field('free_text_one', false, false)); ?>
    </div>

    <div class="right-col" style="width: <?php echo $right_column_width; ?>">
        <?php echo apply_filters('the_content', get_sub_field('free_text_two', false, false)); ?>
    </div>
</div>
