<article id="post-<?php the_ID(); ?>" <?php post_class("work-item fade-up"); ?>>
    <a href="<?php the_permalink(); ?>" class="work-link">
        <div class="work-image">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail("full"); ?>
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/noimage.png" alt="アイキャッチ画像なし">
            <?php endif; ?>
            <div class="work-overlay">
                <span class="view-btn">View Project</span>
            </div>
        </div>
        <div class="work-info">
            <h3><?php the_title(); ?></h3>
            <p class="work-category"><?php the_field("classification"); ?></p>
        </div>
    </a>
</article>
