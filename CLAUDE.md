# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

BuildCBS is a PHP portfolio website for a construction company (buildcbs.co.za). Server-rendered with no database, no build step, and no SPA framework.

## Commands

```bash
composer install     # Install PHPMailer dependency
```

No build, lint, or test commands exist. Frontend uses CDN-based Tailwind CSS and Alpine.js.

## Architecture

### Include-Based Component Pattern
Every page follows: `config.php` → `head.php` → `header.php` → page content → `footer.php`

### Feature Data Pattern
Feature-specific data goes in separate includes: `includes/{feature}-data.php`

```php
// Standard page structure
$page_title = "Page Name";
$page_description = "Meta description";
require_once 'includes/config.php';
require_once 'includes/head.php';
require_once 'includes/header.php';
// Page content here
require_once 'includes/footer.php';
```

### Key Files

| File | Purpose |
|------|---------|
| `includes/config.php` | All site constants (contact, SMTP, colors, paths) + environment detection |
| `includes/projects-data.php` | Project data as PHP array (`$projects`, `$categories`) |
| `includes/before-after-data.php` | Before/After transformation showcase data |
| `send-mail.php` | Contact form handler (PHPMailer → mail() fallback) |

### Frontend Stack
- **Tailwind CSS 3.x** (CDN, configured in `head.php`)
- **Alpine.js 3.x** (CDN, reactive UI)
- **GLightbox** (CDN, image lightbox)
- **Inter** font family

### Form Handling
Contact form submits POST to `send-mail.php` → redirects with `?status=success|error`

## Design System

**Brand Colors (Tailwind config in head.php):**
- Orange primary: `#F5A623`
- Charcoal: `#3D4550`
- Dark: `#2D3339`

## Documentation

Complete specs live in `/content/`:
- `SPEC-website.md` - Technical implementation details
- `SPEC-buildcbs.md` - All copy and business info
- `SPEC-before-after.md` - Before & After section spec
- `CLAUDE.md` - Content library reference

## Configuration

All config is in `includes/config.php` as PHP constants:
- `SITE_*` for contact/social info
- `SMTP_*` for email (password needs to be set)
- `GA_ID` for Google Analytics (needs real ID)

### Environment Detection
Auto-detects local vs production based on `$_SERVER['HTTP_HOST']`:

| Environment | HOST | BASE_URL | SITE_URL |
|-------------|------|----------|----------|
| Local | localhost | `/buildcbs/` | `http://localhost/buildcbs/` |
| Production | buildcbs.co.za | `/` | `https://buildcbs.co.za/` |

## Git Repository

```
git@github.com:yourdesigncoza/BUILDCBS.git
```

**Ignored files** (see `.gitignore`):
- `.env` - contains SMTP credentials
- `vendor/` - composer dependencies
- `console.txt` - debug output

## Gotchas

- **PHP `use` statements** - Must be at file top level, NOT inside functions or conditionals (causes fatal error)
- **PHPMailer** - Run `composer install` if vendor/ missing; `use` statements go after config include
- **Production deploy** - Must upload `vendor/` and create `.env` with SMTP credentials
