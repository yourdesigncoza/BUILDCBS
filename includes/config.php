<?php
/**
 * BuildCBS Website Configuration
 */

// Start session for CSRF protection
session_start();

// Load environment variables
$autoloadPath = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath)) {
    require_once $autoloadPath;
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->safeLoad();
}

// Environment Detection
$isProduction = isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] === 'buildcbs.co.za';

// Site Configuration
define('SITE_NAME', 'BuildCBS');
define('SITE_TAGLINE', 'When Quality Matters');
define('SITE_URL', $isProduction ? 'https://buildcbs.co.za/' : 'http://localhost/buildcbs/');
define('SITE_EMAIL', 'support@buildcbs.co.za');
define('SITE_PHONE', '074 651 5327');
define('SITE_PHONE_INTL', '+27746515327');
define('SITE_WHATSAPP', '27746515327');
define('SITE_FACEBOOK', 'https://facebook.com/buildcbs');

// Owner
define('OWNER_NAME', 'Paulis Barnard');

// Location
define('SITE_LOCATION', 'Garden Route, South Africa');
define('SERVICE_AREAS', 'Mossel Bay, George, Glentana, Vleesbaai, Pinnacle Point, Heiderand');

// SMTP Configuration (loaded from .env)
define('SMTP_HOST', $_ENV['SMTP_HOST'] ?? 'mail.buildcbs.co.za');
define('SMTP_PORT', (int)($_ENV['SMTP_PORT'] ?? 587));
define('SMTP_USER', $_ENV['SMTP_USER'] ?? '');
define('SMTP_PASS', $_ENV['SMTP_PASS'] ?? '');
define('SMTP_FROM', $_ENV['SMTP_FROM'] ?? '');
define('SMTP_FROM_NAME', $_ENV['SMTP_FROM_NAME'] ?? 'BuildCBS Website');

// Google Analytics (Update with actual ID)
define('GA_ID', 'G-XXXXXXXXXX');

// Base path for includes
define('BASE_PATH', dirname(__DIR__));

// Base URL for asset paths (without protocol/domain)
define('BASE_URL', $isProduction ? '/' : '/buildcbs/');
