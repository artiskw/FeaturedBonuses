<?php /* Template Name: Contact Us */ ?>
<?php get_header(); ?>
    <div class="page-container">
        <div class="contact-us-container">
            <div class="title">
                <h1><?php echo $post->post_title; ?></h1>
                <?php echo nl2br($post->post_content); ?>
            </div>
            <form method="post" action="#">
                <div class="your-name">
                    <label for="name"></label>
                    <input type="text" placeholder="Your name" name="name" id="name">
                </div>
                <div class="your-email">
                    <label for="name"></label>
                    <input type="text" placeholder="Your Email" name="email" id="email">
                </div>
                <div class="subject">
                    <label for="name"></label>
                    <input type="text" placeholder="Subject" name="subject" id="subject">
                </div>
                <div class="your-message">
                    <label for="message"></label>
                    <textarea name="message" id="message" rows="10" placeholder="Your Message"></textarea>
                </div>
                <div class="notifications"></div>
                <div class="send-button">
                    <input type="submit" value="send message" class="contact-send">
                </div>
            </form>
        </div>
    </div>
<?php get_footer(); ?>