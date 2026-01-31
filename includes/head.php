<?php
/**
 * HTML Head - Meta tags, CSS, Tailwind config
 */
$page_title = $page_title ?? SITE_NAME . ' - Quality Construction in the Garden Route';
$page_description = $page_description ?? 'Premium timber decking, renovations, and custom builds in Mossel Bay, George, and the Garden Route. NHBRC registered.';
$page_image = $page_image ?? SITE_URL . 'assets/images/hero/hero.jpg';
$page_url = SITE_URL . ($_SERVER['REQUEST_URI'] ?? '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
    <meta name="keywords" content="decking, renovation, construction, Garden Route, Mossel Bay, George, timber deck, Garapa, Balau, NHBRC, BuildCBS">
    <meta name="author" content="<?= SITE_NAME ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= htmlspecialchars($page_url) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($page_description) ?>">
    <meta property="og:image" content="<?= htmlspecialchars($page_image) ?>">
    <meta property="og:site_name" content="<?= SITE_NAME ?>">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($page_description) ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($page_image) ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="<?= BASE_URL ?>assets/images/logo/favicon.jpg">
    <link rel="apple-touch-icon" href="<?= BASE_URL ?>assets/images/logo/favicon.jpg">

    <!-- Canonical -->
    <link rel="canonical" href="<?= htmlspecialchars($page_url) ?>">

    <!-- Google Analytics -->
    <?php if (GA_ID !== 'G-XXXXXXXXXX'): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= GA_ID ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?= GA_ID ?>');
    </script>
    <?php endif; ?>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-orange': '#F5A623',
                        'brand-charcoal': '#3D4550',
                        'brand-dark': '#2D3339',
                        'brand-light': '#F8F9FA',
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- GLightbox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

    <!-- Custom Styles -->
    <style>
        [x-cloak] { display: none !important; }

        /* Smooth scroll */
        html { scroll-behavior: smooth; }

        /* GLightbox font fix */
        .gslide-title, .gslide-desc, .glightbox-container { font-family: 'Inter', sans-serif; }

        /* Masonry layout */
        .masonry {
            column-count: 1;
            column-gap: 1.5rem;
        }
        @media (min-width: 640px) {
            .masonry { column-count: 2; }
        }
        @media (min-width: 1024px) {
            .masonry { column-count: 3; }
        }
        .masonry-item {
            break-inside: avoid;
            margin-bottom: 1.5rem;
        }

        /* Honeypot spam trap - hidden from humans */
        .hp-field { position: absolute; left: -9999px; }
    </style>
</head>
