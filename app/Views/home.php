<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 
    - htmlspecialchars(): converts special characters to HTML entities (prevents code injection)
    - ENT_QUOTES: converts both double (") and single (') quotes to prevent attribute injection
    - UTF-8: character encoding that handles international characters correctly
    - $title ?? 'Mini PHP MVC': null coalescing operator - uses $title if set, otherwise default text
  -->
  <title><?= htmlspecialchars($title ?? 'Mini PHP MVC', ENT_QUOTES, 'UTF-8') ?></title>
</head>
<body>
  <h1><?= htmlspecialchars($title ?? 'Mini PHP MVC', ENT_QUOTES, 'UTF-8') ?></h1>
  <p><?= htmlspecialchars($message ?? '', ENT_QUOTES, 'UTF-8') ?></p>
  <?php if (isset($contacts) && is_array($contacts)): ?>
    <h2>Contact List</h2>
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
