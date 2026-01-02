<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($title ?? 'Mini PHP MVC', ENT_QUOTES, 'UTF-8') ?></title>
</head>
<body>
  <nav>
    <a href="/">Home</a> |
    <a href="/contacts">Contacts</a>
  </nav>
  <h1><?= htmlspecialchars($title ?? 'Mini PHP MVC', ENT_QUOTES, 'UTF-8') ?></h1>
  <h2><?= htmlspecialchars($message ?? '', ENT_QUOTES, 'UTF-8') ?></h2>
  <?php if (isset($contacts) && is_array($contacts)): ?>
    <ul>
      <?php foreach ($contacts as $contact): ?>
        <li>
          <?= htmlspecialchars($contact['first_name'] . ' ' . $contact['last_name'], ENT_QUOTES, 'UTF-8') ?>
          - <?= htmlspecialchars($contact['phone'] ?? '', ENT_QUOTES, 'UTF-8') ?>
          - <?= htmlspecialchars($contact['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</body>
</html>
