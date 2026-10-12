<?php
declare(strict_types=1);

$announcement = is_array($S['announcement'] ?? null) ? $S['announcement'] : [];
$announcementParagraphs = is_array($announcement['paragraphs'] ?? null)
  ? $announcement['paragraphs']
  : [];
$announcementSignature = is_array($announcement['signature'] ?? null)
  ? $announcement['signature']
  : [];
?>

<?php if (!empty($announcement)): ?>
  <section class="transition-announcement" aria-labelledby="transition-announcement-title">
    <div class="container">
      <div class="transition-announcement__card">
        <div class="transition-announcement__heading">
          <span class="transition-announcement__eyebrow"><?= h((string)($announcement['eyebrow'] ?? 'Important notice')) ?></span>
          <h2 class="transition-announcement__title" id="transition-announcement-title">
            <?= h((string)($announcement['title'] ?? '')) ?>
          </h2>
        </div>

        <div class="transition-announcement__grid">
          <div class="transition-announcement__copy">
            <p><strong><?= h((string)($announcement['greeting'] ?? '')) ?></strong></p>
            <?php foreach ($announcementParagraphs as $paragraph): ?>
              <p><?= h((string)$paragraph) ?></p>
            <?php endforeach; ?>

          </div>

          <aside class="transition-announcement__details" aria-label="<?= h((string)($announcement['details_label'] ?? 'Transition details')) ?>">
            <h3><?= h((string)($announcement['impact_title'] ?? '')) ?></h3>
            <p><?= h((string)($announcement['impact'] ?? '')) ?></p>
            <p><?= h((string)($announcement['more_info'] ?? '')) ?></p>

            <div class="transition-announcement__links">
              <a class="btn btn--ghost" href="<?= h($greenleaf_website_url) ?>" target="_blank" rel="noopener">
                <?= h((string)($announcement['website_button'] ?? 'Greenleaf Acupuncture website')) ?>
              </a>
              <a class="btn btn--primary" href="<?= h($greenleaf_appointment_url) ?>" target="_blank" rel="noopener">
                <?= h((string)($announcement['new_booking_button'] ?? 'Book with Paz from 1 November')) ?>
              </a>
            </div>
          </aside>

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
      </div>
    </div>
  </section>
<?php endif; ?>
