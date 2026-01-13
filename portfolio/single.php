<?php get_header(); ?>

<main>
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
      <section <?php post_class("works-detail") ?>>
        <div <?php post_class("works-detail-top") ?>>
          <!-- <div class="img-top">
            <img class="img-top-content" src="img/works-portfolio.png" alt="worksのポートフォリオ写真" />
          </div> -->
          <div class="works-detail-top-info">
            <h1 <?php post_class("works-title") ?>><?php the_title(); ?></h1>
            <p class="works-region">Design/Coding</p>
            <p class="works-detail-text">
              <?php the_content(); ?>
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
      <!-- <section class="detail-section first-section">
        <h2>ポートフォリオサイト</h2>
        <p>自身のプロフィールや制作物を紹介するためのwebページ</p>
      </section>

      <section class="detail-section">
        <h2>制作目的</h2>
        <ul>
          <li>
            <p>就職活動において内定獲得すること（最終ゴール）</p>
          </li>
          <li>
            <p>「面接でさらに詳しく話を聞いてみたい」「一度会ってみたい」と採用担当の方に思っていただくこと</p>
          </li>
        </ul>
      </section>

      <section class="detail-section">
        <h2>ページ構成</h2>
        <ul>
          <li>
            <p>トップページ</p>
          </li>
          <li>
            <p>Aboutページ</p>
          </li>
          <li>
            <p>Worksページ</p>
            <ul>
              <li>
                <p>各Worksの詳細ページ</p>
              </li>
            </ul>
          </li>
        </ul>
      </section>

      <section class="detail-section">
        <h2>使用技術</h2>
        <ul>
          <li>
            <p>HTML</p>
          </li>
          <li>
            <p>CSS</p>
          </li>
          <li>
            <p>JavaScript</p>
          </li>
        </ul>
      </section>

      <section class="detail-section">
        <h2>制作期間</h2>
        <p>約3週間</p>
      </section>

      <section class="detail-section">
        <h2>工夫した点</h2>
        <ul>
          <li>
            <p>読み手の負担（認知負荷）を最小限に抑えるため、情報の優先順位を整理し、極めてシンプルな構成に徹しました。必要な情報へ3クリック以内で着ける設計にすることで、ストレスのない閲覧体験を追求しています。</p>
          </li>
          <li>
            <p>全体をシンプルにまとめる一方で、キービジュアルには動きのある演出を取り入れ、視覚的な楽しさを創出しました。</p>
          </li>
          <li>
            <p>自分自身の経歴やスキルを、Tree構造やスライダーを用いて表現。文字だけで説明するのではなく、直感的に把握できるインターフェースを意識しました。またユーザーが自ら操作（スクロールやスライド）することで情報を得られる仕組みにし、能動的に楽しんでいただける設計にしています。</p>
          </li>
        </ul>
      </section>
      <section class="detail-section">
        <h2>対応デバイス</h2>
        <p>PC・スマートフォン</p>
      </section> -->

    <?php endwhile; ?>
  <?php endif; ?>


</main>
