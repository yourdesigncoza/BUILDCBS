# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Repository Purpose

This is a **content library** (not a codebase) containing all source materials used to build buildcbs.co.za - a construction company portfolio website. No build/test commands exist.

## Key Reference Files

| File | Purpose |
|------|---------|
| `SPEC-website.md` | Technical implementation spec (tech stack, components, PHP backend) |
| `SPEC-buildcbs.md` | All website copy, service descriptions, 11 project descriptions |
| `README.md` | How content maps to website |

## Content Structure

- **11 project folders** with Before/After images + PDF descriptions
- **logo-design/** contains brand assets (logos, favicon, hero image)
- **88 total images** (35 before, 53 after)

## Website Architecture (from SPEC-website.md)

**Tech Stack:** Tailwind CSS 3.x + PHP 8.0+ + PHPMailer 6.x + Alpine.js + GLightbox

**Pages:**
- `index.php` - Landing page (hero, services, about, CTA)
- `projects.php` - Masonry gallery with lightbox
- `contact.php` - Form with PHPMailer SMTP

## Design System

**Brand Colors:**
- Orange (Primary): `#F5A623`
- Charcoal: `#3D4550`
- Dark: `#2D3339`
- Light: `#F8F9FA`

**Typography:** Inter font family

## Business Details (from SPEC-buildcbs.md)

- Owner: Paulis Barnard
- Phone: 074 651 5327
- Email: support@buildcbs.co.za
- Service Area: Mossel Bay, George, Glentana, Vleesbaai, Pinnacle Point, Heiderand
- NHBRC Registered

## Image Naming

Project images use mixed naming conventions:
- UUID filenames (from Google Drive/cloud export)
- iPhone exports (IMG_XXXX format)

All project folders follow: `ProjectName/After/` and `ProjectName/Before/`
