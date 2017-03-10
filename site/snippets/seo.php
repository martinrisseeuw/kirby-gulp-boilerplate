<?php $meta = getMeta($site, $page); ?>
<title><?= $meta['title'] ?></title>
<meta name="description" content="<?= $meta['desc'] ?>">
<meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
<meta property="og:title" content="<?= $meta['title'] ?>" />
<meta property="og:image" content="<?= $meta['image'] ?>" />
<meta property="og:type" content="<?= $meta['type'] ?>" />
<meta property="og:description" content="<?= $meta['desc'] ?>">
<meta itemprop="name" content="<?= $meta['title'] ?>">
<meta itemprop="description" content="<?= $meta['desc'] ?>">


<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="<?= $meta['title'] ?>">
<meta itemprop="description" content="<?= $meta['desc'] ?>">
<meta itemprop="image" content="<?= $meta['image'] ?>">

<!-- Twitter Card data -->
<meta name="twitter:card" content="<?= $meta['image'] ?>">
<meta name="twitter:site" content="@martinrisseeuw">
<meta name="twitter:title" content="<?= $meta['title'] ?>">
<meta name="twitter:description" content="<?= $meta['desc'] ?>">
<meta name="twitter:creator" content="@martinrisseeuw">
<!-- Twitter summary card with large image must be at least 280x150px -->
<meta name="twitter:image:src" content="<?= $meta['image'] ?>">

<!-- Open Graph data -->
<meta property="og:title" content="<?= $meta['title'] ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?= $page->url() ?>" />
<meta property="og:image" content="<?= $meta['image'] ?>" />
<meta property="og:description" content="<?= $meta['desc'] ?>" />
<meta property="og:site_name" content="<?= $site->title() ?>" />

<?php foreach($site->languages() as $language): ?>
  <?php if($language == $site->language()) continue; ?>
  <link rel="alternate" hreflang="<?php echo html($language->code()) ?>" href="<?php echo $page->url($language->code()) ?>" />
<?php endforeach ?>
