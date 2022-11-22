<?php /* Template Name: Terms and Conditions */ ?>
<?php get_header(); ?>
    <div class="page-container">
        <div class="paragraf-container-large terms-conditions">
            <h1><?php echo $post->post_title; ?></h1>
	        <?php echo nl2br($post->post_content); ?>
        </div>
    </div>
<?php get_footer(); ?>