<?php
header('Content-Type: application/json; charset=utf-8');
$dir = trim($_GET['dir'] ?? '', '/\\.');
if (!$dir || str_contains($dir, '..') || !str_starts_with($dir, 'chapters/')) { echo '[]'; exit; }
$full = __DIR__ . '/' . $dir;
if (!is_dir($full)) { echo '[]'; exit; }
$files = glob($full . '/*.json') ?: [];
natsort($files);
echo json_encode(array_values(array_map('basename', $files)));
