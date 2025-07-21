<?php
require './config/config.php';

$sql = "SELECT id_article, titre, image, date_article FROM articles WHERE status = 'active' ORDER BY date_article DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<?php
setlocale(LC_TIME, 'fr_FR.UTF-8');

while ($article = $result->fetch_assoc()):
  $timestamp = strtotime($article['date_article']);
  $day = date('d', $timestamp);
  $monthYear = date('F Y', $timestamp); // Remplace strftime (voir erreur 2)
?>
  <div class="col-lg-4">
    <article class="position-relative h-100">
      <div class="post-img position-relative overflow-hidden">
        <img src="/dashboard/<?= htmlspecialchars($article['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($article['titre']) ?>">
      </div>
      <div class="meta d-flex align-items-end">
        <span class="post-date"><span><?= $day ?></span><?= ucfirst($monthYear) ?></span>
      </div>
      <div class="post-content d-flex flex-column">
        <h3 class="post-title"><?= htmlspecialchars($article['titre']) ?></h3>
        <a href="/blog-details.php?id_article=<?=$article['id_article'] ?>" class="readmore stretched-link">
          <span>En savoir plus</span><i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </article>
  </div>
<?php endwhile; ?>
