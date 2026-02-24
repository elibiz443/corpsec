<?php
require __DIR__ . '/../connector.php';
unset($_SESSION['admin_id']);
flash_set('success', 'Logged out.');
redirect_to(ROOT_URL . '/admin/login');
