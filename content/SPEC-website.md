# BuildCBS Website Implementation Specification

**Document Version:** 1.0
**Date:** 2026-01-24
**Domain:** buildcbs.co.za
**Stack:** Tailwind CSS + PHP + PHPMailer

---

## Table of Contents
1. [Project Overview](#project-overview)
2. [Tech Stack](#tech-stack)
3. [File Structure](#file-structure)
4. [Design System](#design-system)
5. [Page Specifications](#page-specifications)
6. [Components](#components)
7. [PHP Backend](#php-backend)
8. [SEO & Analytics](#seo--analytics)
9. [Assets & Images](#assets--images)
10. [Deployment](#deployment)

---

## Project Overview

### Site Type
Hybrid website: Single landing page with separate project gallery

### Pages
| Page | File | Purpose |
|------|------|---------|
| Home | `index.php` | Landing page with hero, services, about, CTA |
| Projects | `projects.php` | Masonry gallery with lightbox |
| Contact | `contact.php` | Contact form with PHPMailer |

### Key Features
- Responsive design (mobile-first)
- Transparent → solid navbar on scroll
- Masonry project gallery
- Image lightbox/modal
- WhatsApp floating button
- PHPMailer SMTP contact form
- Full SEO implementation
- GA4 Analytics ready

---

## Tech Stack

### Frontend
| Technology | Version | Purpose |
|------------|---------|---------|
| Tailwind CSS | 3.x | Utility-first CSS framework |
| Alpine.js | 3.x | Lightweight JS for interactions |
| GLightbox | 3.x | Image lightbox library |

### Backend
| Technology | Version | Purpose |
|------------|---------|---------|
| PHP | 8.0+ | Server-side logic |
| PHPMailer | 6.x | SMTP email handling |

### CDN Links
```html
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- GLightbox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

<!-- GLightbox JS -->
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
```

---

## File Structure

```
buildcbs/
├── index.php                 # Homepage
├── projects.php              # Project gallery
├── contact.php               # Contact page
├── send-mail.php             # Form handler
├── sitemap.xml               # SEO sitemap
├── robots.txt                # SEO robots
│
├── includes/
│   ├── config.php            # Site configuration
│   ├── header.php            # Navigation header
│   ├── footer.php            # Footer component
│   ├── head.php              # HTML head (meta, CSS)
│   └── projects-data.php     # Project array data
│
├── assets/
│   ├── css/
│   │   └── custom.css        # Custom styles (minimal)
│   ├── js/
│   │   └── main.js           # Custom JavaScript
│   └── images/
│       ├── logo/
│       │   ├── web-logo.png
│       │   ├── web-logo-01.png
│       │   └── favicon.jpg
│       ├── hero/
│       │   └── hero-image.jpg
│       └── projects/
│           ├── balau-deck/
│           ├── beachfront-garapa/
│           ├── bedroom-renovation/
│           └── ... (all project folders)
│
└── vendor/
    └── phpmailer/            # PHPMailer library
```

---

## Design System

### Brand Colors

```javascript
// Tailwind Config
tailwind.config = {
  theme: {
    extend: {
      colors: {
        'brand-orange': '#F5A623',
        'brand-charcoal': '#3D4550',
        'brand-dark': '#2D3339',
        'brand-light': '#F8F9FA',
      }
    }
  }
}
```

| Color | Hex | Usage |
|-------|-----|-------|
| Primary Orange | `#F5A623` | Buttons, accents, highlights |
| Charcoal | `#3D4550` | Backgrounds, text |
| Dark | `#2D3339` | Footer, dark sections |
| Light | `#F8F9FA` | Light backgrounds |
| White | `#FFFFFF` | Text on dark, cards |

### Typography

```css
/* Font Stack */
font-family: 'Inter', system-ui, -apple-system, sans-serif;

/* Headings */
h1: text-4xl md:text-5xl lg:text-6xl font-bold
h2: text-3xl md:text-4xl font-bold
h3: text-xl md:text-2xl font-semibold
h4: text-lg font-semibold

/* Body */
body: text-base leading-relaxed
```

### Spacing Scale
- Section padding: `py-16 md:py-24`
- Container: `max-w-7xl mx-auto px-4 sm:px-6 lg:px-8`
- Card gaps: `gap-6 md:gap-8`

### Buttons

```html
<!-- Primary Button -->
<a href="#" class="inline-block bg-brand-orange text-white px-8 py-3 rounded-md font-semibold hover:bg-orange-600 transition-colors">
  Get a Free Quote
</a>

<!-- Secondary Button -->
<a href="#" class="inline-block border-2 border-brand-orange text-brand-orange px-8 py-3 rounded-md font-semibold hover:bg-brand-orange hover:text-white transition-colors">
  View Projects
</a>
```

---

## Page Specifications

### 1. Homepage (index.php)

#### Hero Section
```
┌────────────────────────────────────────────────────────────┐
│  [Transparent Navbar]              [Home] [Projects] [Contact] │
│                                                            │
│     Quality Construction &                                 │
│     Renovation in the Garden Route                         │
│                                                            │
│     Premium timber decking, renovations, and custom        │
│     builds. NHBRC registered.                              │
│                                                            │
│     [Get a Free Quote]  [View Our Work]                    │
│                                                            │
│  [Background: Project hero image with dark overlay]        │
└────────────────────────────────────────────────────────────┘
```

**Specs:**
- Full viewport height: `min-h-screen`
- Background image with overlay: `bg-cover bg-center`
- Dark overlay: `bg-black/50`
- Text: White, centered
- CTA buttons: Primary orange + Secondary outline

#### Services Section
```
┌────────────────────────────────────────────────────────────┐
│                     What We Do                             │
│                                                            │
│  ┌──────────┐  ┌──────────┐  ┌──────────┐  ┌──────────┐   │
│  │  Icon    │  │  Icon    │  │  Icon    │  │  Icon    │   │
│  │ Decking  │  │ Renos    │  │ Ceilings │  │ Custom   │   │
│  │ Desc...  │  │ Desc...  │  │ Desc...  │  │ Desc...  │   │
│  └──────────┘  └──────────┘  └──────────┘  └──────────┘   │
│                                                            │
└────────────────────────────────────────────────────────────┘
```

**Specs:**
- Grid: `grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8`
- Cards: White background, shadow, hover effect
- Icons: SVG or Font Awesome

#### About Snippet
```
┌────────────────────────────────────────────────────────────┐
│  [Image: Project photo]     Built on Local Expertise       │
│                                                            │
│                             BuildCBS was founded with      │
│                             one goal: quality construction │
│                             for the Garden Route...        │
│                                                            │
│                             ✓ NHBRC Registered             │
│                             ✓ 5-10 Years Experience        │
│                             ✓ Premium Materials            │
│                                                            │
│                             [Learn More]                   │
└────────────────────────────────────────────────────────────┘
```

**Specs:**
- Two-column layout: `grid md:grid-cols-2 gap-12 items-center`
- Image: Rounded corners, shadow
- List: Check icons in orange

#### CTA Banner
```
┌────────────────────────────────────────────────────────────┐
│  [Dark charcoal background]                                │
│                                                            │
│     Ready to Transform Your Space?                         │
│     Get in touch for a free, no-obligation quote.          │
│                                                            │
│     [Get a Free Quote]                                     │
│                                                            │
└────────────────────────────────────────────────────────────┘
```

---

### 2. Projects Page (projects.php)

#### Gallery Layout
```
┌────────────────────────────────────────────────────────────┐
│                     Our Projects                           │
│                                                            │
│  [Filter: All] [Decking] [Renovations] [Ceilings] [Custom] │
│                                                            │
│  ┌─────────┐ ┌───────────────┐ ┌─────────┐                │
│  │         │ │               │ │         │                │
│  │ Project │ │   Project     │ │ Project │                │
│  │    1    │ │      2        │ │    3    │                │
│  └─────────┘ └───────────────┘ └─────────┘                │
│  ┌───────────────┐ ┌─────────┐ ┌─────────┐                │
│  │               │ │         │ │         │                │
│  │   Project     │ │ Project │ │ Project │                │
│  │      4        │ │    5    │ │    6    │                │
│  └───────────────┘ └─────────┘ └─────────┘                │
│                                                            │
└────────────────────────────────────────────────────────────┘
```

**Specs:**
- Masonry grid: CSS columns or Masonry.js
- Lightbox: GLightbox for image viewing
- Filters: Alpine.js for filtering
- Hover: Project title overlay on hover

#### Project Card
```html
<div class="break-inside-avoid mb-6 group relative overflow-hidden rounded-lg shadow-lg">
  <a href="image-full.jpg" class="glightbox" data-gallery="projects">
    <img src="image-thumb.jpg" alt="Project Title" class="w-full">
    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
      <div class="text-white">
        <h3 class="font-bold">Project Title</h3>
        <p class="text-sm">Location • Material</p>
      </div>
    </div>
  </a>
</div>
```

---

### 3. Contact Page (contact.php)

#### Layout
```
┌────────────────────────────────────────────────────────────┐
│                     Get in Touch                           │
│                                                            │
│  ┌─────────────────────────┐  ┌─────────────────────────┐  │
│  │   Contact Form          │  │   Contact Details       │  │
│  │                         │  │                         │  │
│  │   Name: [___________]   │  │   📞 074 651 5327       │  │
│  │   Email: [__________]   │  │   ✉️ support@buildcbs   │  │
│  │   Phone: [__________]   │  │   📍 Garden Route, SA   │  │
│  │   Project Type: [▼___]  │  │                         │  │
│  │   Message:              │  │   Follow Us:            │  │
│  │   [________________]    │  │   [Facebook Icon]       │  │
│  │   [________________]    │  │                         │  │
│  │                         │  │                         │  │
│  │   [Request a Quote]     │  │                         │  │
│  └─────────────────────────┘  └─────────────────────────┘  │
│                                                            │
└────────────────────────────────────────────────────────────┘
```

**Form Fields:**
| Field | Type | Required | Options |
|-------|------|----------|---------|
| Name | text | Yes | - |
| Email | email | Yes | - |
| Phone | tel | Yes | - |
| Project Type | select | Yes | Decking, Renovation, Ceilings, Custom Build, Other |
| Message | textarea | Yes | - |

---

## Components

### Navigation (header.php)

```html
<nav x-data="{ open: false, scrolled: false }"
     @scroll.window="scrolled = window.scrollY > 50"
     :class="scrolled ? 'bg-brand-charcoal shadow-lg' : 'bg-transparent'"
     class="fixed w-full z-50 transition-all duration-300">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center py-4">
      <!-- Logo -->
      <a href="/">
        <img src="/assets/images/logo/web-logo.png" alt="BuildCBS" class="h-10">
      </a>

      <!-- Desktop Nav -->
      <div class="hidden md:flex space-x-8">
        <a href="/" class="text-white hover:text-brand-orange">Home</a>
        <a href="/projects.php" class="text-white hover:text-brand-orange">Projects</a>
        <a href="/contact.php" class="text-white hover:text-brand-orange">Contact</a>
      </div>

      <!-- Mobile Menu Button -->
      <button @click="open = !open" class="md:hidden text-white">
        <svg>...</svg>
      </button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div x-show="open" class="md:hidden bg-brand-charcoal">
    ...
  </div>
</nav>
```

### Footer (footer.php)

```html
<footer class="bg-brand-dark text-white py-12">
  <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-8">
    <!-- Logo & About -->
    <div>
      <img src="/assets/images/logo/web-logo.png" alt="BuildCBS" class="h-10 mb-4">
      <p class="text-gray-400">Quality construction and renovation services in the Garden Route.</p>
    </div>

    <!-- Quick Links -->
    <div>
      <h4 class="font-bold mb-4">Quick Links</h4>
      <ul class="space-y-2 text-gray-400">
        <li><a href="/" class="hover:text-brand-orange">Home</a></li>
        <li><a href="/projects.php" class="hover:text-brand-orange">Projects</a></li>
        <li><a href="/contact.php" class="hover:text-brand-orange">Contact</a></li>
      </ul>
    </div>

    <!-- Contact -->
    <div>
      <h4 class="font-bold mb-4">Contact Us</h4>
      <p class="text-gray-400">📞 074 651 5327</p>
      <p class="text-gray-400">✉️ support@buildcbs.co.za</p>
      <div class="mt-4">
        <a href="https://facebook.com/buildcbs" class="text-gray-400 hover:text-brand-orange">
          <svg>Facebook Icon</svg>
        </a>
      </div>
    </div>
  </div>

  <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-500">
    <p>&copy; <?= date('Y') ?> BuildCBS. All rights reserved. NHBRC Registered.</p>
  </div>
</footer>
```

### WhatsApp Button

```html
<a href="https://wa.me/27746515327?text=Hi%20BuildCBS%2C%20I%27d%20like%20to%20get%20a%20quote"
   target="_blank"
   class="fixed bottom-6 right-6 bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition-colors z-40">
  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
    <!-- WhatsApp icon SVG -->
  </svg>
</a>
```

---

## PHP Backend

### Config (includes/config.php)

```php
<?php
// Site Configuration
define('SITE_NAME', 'BuildCBS');
define('SITE_URL', 'https://buildcbs.co.za');
define('SITE_EMAIL', 'support@buildcbs.co.za');
define('SITE_PHONE', '074 651 5327');
define('SITE_WHATSAPP', '27746515327');

// SMTP Configuration
define('SMTP_HOST', 'mail.buildcbs.co.za');
define('SMTP_PORT', 587);
define('SMTP_USER', 'support@buildcbs.co.za');
define('SMTP_PASS', 'your_password_here');
define('SMTP_FROM', 'support@buildcbs.co.za');
define('SMTP_FROM_NAME', 'BuildCBS Website');

// Google Analytics
define('GA_ID', 'G-XXXXXXXXXX');
```

### Mail Handler (send-mail.php)

```php
<?php
require 'vendor/autoload.php';
require 'includes/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $project_type = filter_input(INPUT_POST, 'project_type', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Validate
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        header('Location: contact.php?status=error&msg=required');
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = SMTP_PORT;

        // Recipients
        $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
        $mail->addAddress(SITE_EMAIL);
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Quote Request: $project_type";
        $mail->Body = "
            <h2>New Quote Request from BuildCBS Website</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Project Type:</strong> $project_type</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $mail->send();
        header('Location: contact.php?status=success');
    } catch (Exception $e) {
        header('Location: contact.php?status=error&msg=send');
    }
}
```

### Projects Data (includes/projects-data.php)

```php
<?php
$projects = [
    [
        'id' => 'balau-deck',
        'title' => 'Pool Deck Expansion',
        'location' => 'Village on Sea, Mossel Bay',
        'category' => 'decking',
        'material' => 'Balau',
        'description' => 'Expanded an existing Balau deck with 40 squares of decking, stairs, and a waterproof equipment room.',
        'images' => [
            'assets/images/projects/balau-deck/after-1.jpg',
            'assets/images/projects/balau-deck/after-2.jpg',
            // ... more images
        ],
        'thumbnail' => 'assets/images/projects/balau-deck/thumb.jpg',
    ],
    [
        'id' => 'beachfront-garapa',
        'title' => 'Beachfront Deck Revival',
        'location' => 'Vleesbaai',
        'category' => 'decking',
        'material' => 'Garapa',
        'description' => 'Transformed a weathered pine deck 5m from the beach using Garapa cladding.',
        'images' => [...],
        'thumbnail' => '...',
    ],
    // ... all 11 projects
];
```

---

## SEO & Analytics

### Meta Tags (includes/head.php)

```php
<?php
$page_title = $page_title ?? 'BuildCBS - Quality Construction in the Garden Route';
$page_description = $page_description ?? 'Premium timber decking, renovations, and custom builds in Mossel Bay, George, and the Garden Route. NHBRC registered.';
$page_image = $page_image ?? SITE_URL . '/assets/images/hero/hero-image.jpg';
$page_url = SITE_URL . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title><?= $page_title ?></title>
    <meta name="description" content="<?= $page_description ?>">
    <meta name="keywords" content="decking, renovation, construction, Garden Route, Mossel Bay, timber deck, Garapa, Balau">
    <meta name="author" content="BuildCBS">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $page_url ?>">
    <meta property="og:title" content="<?= $page_title ?>">
    <meta property="og:description" content="<?= $page_description ?>">
    <meta property="og:image" content="<?= $page_image ?>">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $page_title ?>">
    <meta name="twitter:description" content="<?= $page_description ?>">
    <meta name="twitter:image" content="<?= $page_image ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="/assets/images/logo/favicon.jpg">

    <!-- Canonical -->
    <link rel="canonical" href="<?= $page_url ?>">

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= GA_ID ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?= GA_ID ?>');
    </script>

    <!-- CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-orange': '#F5A623',
                        'brand-charcoal': '#3D4550',
                        'brand-dark': '#2D3339',
                    }
                }
            }
        }
    </script>
</head>
```

### sitemap.xml

```xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>https://buildcbs.co.za/</loc>
    <lastmod>2026-01-24</lastmod>
    <changefreq>monthly</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc>https://buildcbs.co.za/projects.php</loc>
    <lastmod>2026-01-24</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>https://buildcbs.co.za/contact.php</loc>
    <lastmod>2026-01-24</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
</urlset>
```

### robots.txt

```
User-agent: *
Allow: /

Sitemap: https://buildcbs.co.za/sitemap.xml
```

---

## Assets & Images

### Image Processing Requirements

| Type | Size | Format | Quality |
|------|------|--------|---------|
| Hero | 1920x1080 | JPG | 80% |
| Project Thumbnails | 600x400 | JPG | 80% |
| Project Full | 1200x800 | JPG | 85% |
| Logo | Original | PNG | Lossless |
| Favicon | 32x32, 180x180 | ICO/PNG | Lossless |

### Image Optimization
- Use WebP format with JPG fallback
- Lazy loading: `loading="lazy"`
- Alt text for all images

---

## Deployment

### Local Development (XAMPP)

1. Copy files to `htdocs/buildcbs/`
2. Create virtual host or access via `localhost/buildcbs`
3. Test all pages and forms
4. Configure SMTP settings in config.php

### Production Deployment

1. **Pre-deployment:**
   - Update config.php with production SMTP
   - Update GA_ID with real tracking ID
   - Optimize all images
   - Test contact form

2. **Upload:**
   - FTP/cPanel file manager
   - Upload all files to public_html
   - Set file permissions (644 for files, 755 for directories)

3. **Post-deployment:**
   - Test all pages
   - Submit sitemap to Google Search Console
   - Test contact form
   - Verify WhatsApp link

### Checklist

- [ ] All pages responsive (mobile, tablet, desktop)
- [ ] Navigation works on all pages
- [ ] Contact form sends emails
- [ ] WhatsApp button opens correctly
- [ ] Images load and lightbox works
- [ ] SEO meta tags correct
- [ ] Analytics tracking
- [ ] SSL certificate active
- [ ] 404 page configured

---

## Next Steps

1. **Approve this spec**
2. **Set up XAMPP environment**
3. **Begin implementation** following file structure
4. **Copy optimized images** from extracted2 folder
5. **Configure SMTP** credentials
6. **Test locally**
7. **Deploy to production**

---

*Specification generated: 2026-01-24*
