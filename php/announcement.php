<?php
declare(strict_types=1);

$announcement = is_array($S['announcement'] ?? null) ? $S['announcement'] : [];
$announcementParagraphs = is_array($announcement['paragraphs'] ?? null)
  ? $announcement['paragraphs']
  : [];
$announcementSignature = is_array($announcement['signature'] ?? null)
  ? $announcement['signature']
  : [];
$announcementSummaryItems = is_array($announcement['summary_items'] ?? null)
  ? $announcement['summary_items']
  : [];
$nav = is_array($S['nav'] ?? null) ? $S['nav'] : [];
$isHomepageAnnouncement = ($page ?? '') === 'home';
?>

<?php if (!empty($announcement)): ?>
  <section class="transition-announcement<?= $isHomepageAnnouncement ? ' transition-announcement--homepage' : '' ?>" aria-labelledby="transition-announcement-title">
    <div class="container transition-announcement__shell">
      <?php if (!$isHomepageAnnouncement): ?>
        <nav class="transition-announcement__breadcrumb" aria-label="<?= h((string)($announcement['breadcrumb_label'] ?? 'Breadcrumb')) ?>">
          <a href="<?= h(page_url($base_url, $lang, 'home')) ?>"><?= h((string)($nav['home_label'] ?? 'Home')) ?></a>
          <span aria-hidden="true">/</span>
          <span aria-current="page"><?= h((string)($announcement['eyebrow'] ?? 'Important notice')) ?></span>
        </nav>
      <?php endif; ?>

      <div class="transition-announcement__card">
        <div class="transition-announcement__heading">
          <span class="transition-announcement__eyebrow"><?= h((string)($announcement['eyebrow'] ?? 'Important notice')) ?></span>
          <h1 class="transition-announcement__title" id="transition-announcement-title">
            <?= h((string)($announcement['title'] ?? '')) ?>
          </h1>
        </div>

        <div class="transition-announcement__grid">
          <div class="transition-announcement__copy">
            <p><strong><?= h((string)($announcement['greeting'] ?? '')) ?></strong></p>
            <?php foreach ($announcementParagraphs as $paragraph): ?>
              <p><?= h((string)$paragraph) ?></p>
            <?php endforeach; ?>

            <div class="transition-announcement__impact">
              <h2><?= h((string)($announcement['impact_title'] ?? '')) ?></h2>
              <p><?= h((string)($announcement['impact'] ?? '')) ?></p>
            </div>

            <div class="transition-announcement__closing">
              <p class="transition-announcement__thanks"><?= h((string)($announcement['thanks'] ?? '')) ?></p>
              <p class="transition-announcement__signature">
                <?= h((string)($announcement['signoff'] ?? '')) ?>
                <?php foreach ($announcementSignature as $line): ?>
                  <br><?= h((string)$line) ?>
                <?php endforeach; ?>
              </p>
            </div>
          </div>

          <aside class="transition-announcement__details" aria-label="<?= h((string)($announcement['details_label'] ?? 'Transition details')) ?>">
            <div class="transition-announcement__date">
              <span><?= h((string)($announcement['effective_label'] ?? 'Effective from')) ?></span>
              <time datetime="2026-11-01"><?= h((string)($announcement['effective_date'] ?? '1 November 2026')) ?></time>
            </div>

            <h2><?= h((string)($announcement['summary_title'] ?? $announcement['impact_title'] ?? 'At a glance')) ?></h2>
            <?php if (!empty($announcementSummaryItems)): ?>
              <ul class="transition-announcement__facts">
                <?php foreach ($announcementSummaryItems as $item): ?>
                  <li><?= h((string)$item) ?></li>
                <?php endforeach; ?>
              </ul>
            <?php else: ?>
              <p><?= h((string)($announcement['impact'] ?? '')) ?></p>
            <?php endif; ?>

            <p class="transition-announcement__more-info"><?= h((string)($announcement['more_info'] ?? '')) ?></p>

            <div class="transition-announcement__links">
              <a class="btn btn--ghost" href="<?= h($greenleaf_website_url) ?>" target="_blank" rel="noopener">
                <?= h((string)($announcement['website_button'] ?? 'Greenleaf Acupuncture website')) ?>
                <span aria-hidden="true">&#8599;</span>
                <span class="sr-only"><?= h((string)($announcement['new_tab_label'] ?? 'opens in a new tab')) ?></span>
              </a>
              <a class="btn btn--primary" href="<?= h($greenleaf_appointment_url) ?>" target="_blank" rel="noopener">
                <?= h((string)($announcement['new_booking_button'] ?? 'Book with Paz from 1 November')) ?>
                <span aria-hidden="true">&#8599;</span>
                <span class="sr-only"><?= h((string)($announcement['new_tab_label'] ?? 'opens in a new tab')) ?></span>
              </a>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
