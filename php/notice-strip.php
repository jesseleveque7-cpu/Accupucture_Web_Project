<?php
declare(strict_types=1);

$noticeStrip = is_array($S['notice_strip'] ?? null) ? $S['notice_strip'] : [];
?>

<?php if (!empty($noticeStrip)): ?>
  <section class="notice-strip" aria-labelledby="notice-strip-title">
    <div class="container notice-strip__inner">
      <div class="notice-strip__copy">
        <strong class="notice-strip__title" id="notice-strip-title">
          <?= h((string)($noticeStrip['title'] ?? 'Practice update')) ?>
        </strong>
        <p class="notice-strip__text">
          <?= h((string)($noticeStrip['text'] ?? '')) ?>
        </p>
      </div>

      <a class="btn btn--soft btn--sm notice-strip__button" href="<?= h(page_url($base_url, $lang, 'notice')) ?>">
        <?= h((string)($noticeStrip['button'] ?? 'Read the important notice')) ?>
      </a>
    </div>
  </section>
<?php endif; ?>
