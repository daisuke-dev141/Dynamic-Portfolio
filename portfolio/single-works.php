<?php get_header(); ?>

<main>
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
      <section <?php post_class("works-detail") ?>>
        <div <?php post_class("works-detail-top") ?>>
          <div class="img-top">
            <?php $pic = get_field("pic");
            $pic_url = $pic["url"]; ?>
            <img class="img-top-content" src="<?php echo $pic_url; ?>" alt="worksのポートフォリオ写真" />
          </div>
          <div class="works-detail-top-info">
            <h1 <?php post_class("works-title") ?>><?php the_title(); ?></h1>
            <p class="works-region"><?php the_field("classification"); ?></p>
            <p class="works-detail-text">
              <?php the_field("explanation"); ?>
            </p>
            <div class="button">
              <a target="_blank" href=# class="button-link arrow-extend">
                <span class="button-text">Site View</span>
              </a>
            </div>
          </div>
        </div>

      </section>



      <!-- ここから詳細な説明 -->
      <section class="detail-section first-section">
        <h2><?php the_title(); ?></h2>
        <p><?php the_field("explanation"); ?></p>
      </section>

      <section class="detail-section">
        <h2>制作目的</h2>
        <ul>
          <?php
          $purpose_array = split_by_newline(get_field("purpose"));

          foreach ($purpose_array as $purpose) {
            echo "<li>" . esc_html($purpose) . "</li>";
          }
          ?>
        </ul>
      </section>

      <section class="detail-section">
        <h2>ページ構成</h2>
        <ul>
          <?php
          $composition_array = split_by_newline(get_field("composition"));

          foreach ($composition_array as $composition) {
            echo "<li>" . esc_html($composition) . "</li>";
          }
          ?>
        </ul>
      </section>

      <section class="detail-section">
        <h2>使用技術</h2>
        <ul>
          <?php
          $skill_array = split_by_newline(get_field("skill"));

          foreach ($skill_array as $skill) {
            echo "<li>" . esc_html($skill) . "</li>";
          }
          ?>
        </ul>
      </section>

      <section class="detail-section">
        <h2>制作期間</h2>
        <p><?php the_field("period"); ?></p>
      </section>

      <section class="detail-section">
        <h2>工夫した点</h2>
        <ul>
          <?php
          $ingenuity_array = split_by_newline(get_field("ingenuity"));

          foreach ($ingenuity_array as $ingenuity) {
            echo "<li>" . esc_html($ingenuity) . "</li>";
          }
          ?>
        </ul>
      </section>
      <section class="detail-section">
        <h2>対応デバイス</h2>
        <p><?php the_field("device"); ?></p>
      </section>

    <?php endwhile; ?>
  <?php endif; ?>


</main>
