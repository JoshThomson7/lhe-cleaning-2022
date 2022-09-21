<?php
/*
-----------------------------
  ______                        ______           __
 /_  __/__  ____ _____ ___     / ____/_  _______/ /_____  ____ ___
  / / / _ \/ __ `/ __ `__ \   / /   / / / / ___/ __/ __ \/ __ `__ \
 / / /  __/ /_/ / / / / / /  / /___/ /_/ (__  ) /_/ /_/ / / / / / /
/_/  \___/\__,_/_/ /_/ /_/   \____/\__,_/____/\__/\____/_/ /_/ /_/

-----------------------------
Team (Custom)
*/
?>
<div class="team__wrap">
    <?php
        $team_members = get_sub_field('team_members');
        foreach( $team_members as $post ):

            setup_postdata($post);

            $attachment_id = get_post_thumbnail_id();
            $team_img = vt_resize($attachment_id,'' , 900, 900, true);

            $member_id = strtolower(preg_replace("#[^A-Za-z0-9]#", "", get_the_title()));

            $first_name = explode(' ', get_the_title());
            $first_name = $first_name[0];
    ?>
        <article data-image-list="<?php echo $team_img['url']; ?>">
            <a href="#<?php echo $member_id; ?>" title="<?php the_title(); ?>" class="team__modal">
                <span class="team__overlay">
                    <?php/* <h3><?php echo get_the_title(); ?><span><?php the_field('team_job_title'); ?></span></h3> */?>
                    <span class="team__more">Meet <?php echo $first_name; ?></span>
                </span><!-- team__overlay -->
                <img src="<?php echo $team_img['url']; ?>" alt="<?php the_title(); ?>" />
            </a>
            <h5><?php echo get_the_title(); ?><span><?php the_field('team_job_title'); ?></span></h5>
        </article>
    <?php endforeach; wp_reset_postdata(); ?>
</div><!-- team__wrap -->

<div class="team__popup__holder">
    <?php
        $team_count = 1;
        $team_total = count($team_members);

        foreach($team_members as $post):

            setup_postdata($post);

            $attachment_id = get_post_thumbnail_id();
            $team_img = vt_resize($attachment_id,'' , 900, 900, true);

            $member_id = strtolower(preg_replace("#[^A-Za-z0-9]#", "", get_the_title()));
    ?>
        <div id="<?php echo $member_id; ?>" class="team__popup">

            <div class="team__popup__img">
                <?php if(get_field('team_video_id')): ?>
                    <a href="http://www.youtube.com/watch?v=<?php the_field('team_video_id'); ?>" class="team__video"><span class="ion-play"></span> Watch video</a>
                <?php endif; ?>

                <img src="<?php echo $team_img['url']; ?>" alt="<?php the_title(); ?>" />
            </div><!-- team__popup__img -->

            <div class="team__popup__content">
                <div class="team__popup__nav">
                    <ul>
                        <li<?php if($team_count == 1): ?> class="inactive"<?php endif; ?>><a href="#" class="team__switch team__prev"><i class="ion-ios-arrow-left"></i></a></li>
                        <li<?php if($team_count == $team_total): ?> class="inactive"<?php endif; ?>><a href="#" class="team__switch team__next"><i class="ion-ios-arrow-right"></i></a></li>
                        <li><a href="#" class="team__close"><i class="ion-android-close"></i></a></li>
                    </ul>
                </div><!-- team__popup__nav -->

                <h3><?php the_title(); ?> <span><?php the_field('team_job_title'); ?></span></h3>

                <?php if(get_field('team_email')): ?>
                    <div class="team__popup__icon">
                        <span class="icon ion-ios-paperplane-outline"></span>
                        <?php echo hide_email(get_field('team_email')); ?>
                    </div>
                <?php endif; ?>

                <?php if(get_field('team_phone')): ?>
                    <div class="team__popup__icon">
                        <span class="icon ion-ios-telephone-outline"></span>
                        <a href="tel:<?php the_field('team_phone'); ?>" target="_blank"><?php the_field('team_phone'); ?></a>
                    </div>
                <?php endif; ?>

                <?php the_content(); ?>
            </div><!-- team__popup__content -->
        </div><!-- team__popup -->
    <?php $team_count++; endforeach; wp_reset_postdata(); ?>
</div><!-- team__popup__holder -->
