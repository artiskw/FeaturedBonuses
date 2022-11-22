<footer>
    <?php $footer_group = get_field('footer_group', 11); ?>
    <div class="footer-top-container">
    <div class="sign-up-container">
        <div class="text">
            <h2><?php echo $footer_group['contact_us']['title']; ?></h2>
            <p><?php echo $footer_group['contact_us']['text']; ?></p>
        </div>
        <form method="post" action="#">
            <div class="your-email">
                <label for="name"></label>
                <input type="text" placeholder="Enter your email here" name="email" id="email">
                <div class="send-button">
                    <input type="submit" value="subscribe" class="contact-send-footer">
                </div>
            </div>
            <div class="notifications-footer"></div>
        </form>
        <p><?php echo $footer_group['contact_us']['notification']; ?></p>
    </div>
</div>
    <div class="footer-bootom-container">
        <div class="left-right-container">
            <div class="left-container">
                <div class="text">
                    <h2><?php echo $footer_group['about_us']['title']; ?></h2>
                    <p><?php echo $footer_group['about_us']['text']; ?></p>
                </div>
                <div class="icons-container">
                    <?php foreach ($footer_group['footer_icons'] as $icons) : ?>
                        <a href="<?php echo $icons['link']; ?>" target="_blank">
                            <?php echo $icons['svg']; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="terms-text">
                    <p><?php echo $footer_group['terms_text']; ?></p>
                </div>
            </div>
            <div class="right-container">
                <div class="menu-footer-container">
                    <div class="title">
                        <h2><?php echo $footer_group['menu_title']; ?></h2>
                    </div>
                    <div class="menu-footer">
                        <?php echo wp_nav_menu(array('menu' => 'Footer menu')); ?>
                    </div>
                </div>
            </div>
            <div class="medium-container">
                <div class="icons-container-medium">
                    <?php foreach ($footer_group['footer_icons'] as $icons) : ?>
                        <a href="<?php echo $icons['link']; ?>" target="_blank">
                            <?php echo $icons['svg']; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="terms-text-medium">
                    <p><?php echo $footer_group['terms_text']; ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>





