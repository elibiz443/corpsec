<?php
  $pdo = $GLOBALS['pdo'];
  $title = 'Contact • ' . setting('site_name', 'Corpsec');
  $description = 'Contact Corpsec for confidential investigations and professional guarding. Request a consultation or send a message.';
  $csrf = csrf_token();
?>