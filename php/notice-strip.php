<?php
declare(strict_types=1);

$noticeStrip = is_array($S['notice_strip'] ?? null) ? $S['notice_strip'] : [];
?>

<?php if (!empty($noticeStrip)): ?>
  <section class="notice-strip" aria-labelledby="notice-strip-title">
    <div class="container notice-strip__inner">
      <div class="notice-strip__message">
        <span class="notice-strip__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" focusable="false">
            <path d="M7 3v3m10-3v3M4.5 9.5h15M6.5 5h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2h-11a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" />
          </svg>
        </span>

        <div class="notice-strip__copy">
          <h2 class="notice-strip__title" id="notice-strip-title">
            <?= h((string)($noticeStrip['title'] ?? 'Practice update')) ?>
            <span class="notice-strip__separator" aria-hidden="true">&middot;</span>
            <time datetime="2026-11-01"><?= h((string)($noticeStrip['date'] ?? '1 November 2026')) ?></time>
          </h2>
          <p class="notice-strip__text">
            <?= h((string)($noticeStrip['text'] ?? '')) ?>
          </p>
        </div>
      </div>

      <a class="btn notice-strip__button" href="<?= h(page_url($base_url, $lang, 'notice')) ?>">
        <?= h((string)($noticeStrip['button'] ?? 'Read the important notice')) ?>
      </a>
    </div>
  </section>
<?php endif; ?>
