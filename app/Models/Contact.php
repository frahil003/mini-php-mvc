<?php
declare(strict_types=1);

final class Contact
{
  public static function all(Database $db): array
  {
    $stmt = $db->pdo()->query(
      "SELECT id, first_name, last_name, phone, email
       FROM contacts
       ORDER BY last_name, first_name"
    );

    return $stmt->fetchAll();
  }
}
