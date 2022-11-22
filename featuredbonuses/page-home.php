<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
    <div class="page-container">
        <div class="casino-container">
            <div class="left-casino-container">
                <?php topCompanies(); ?>
                <?php bottomCompanies(); ?>
            </div>
            <div class="right-casino-container">
                <?php slider(); ?>
                <?php companies(''); ?>
            </div>
        </div>
        <?php text()?>
    </div>
<?php get_footer(); ?>