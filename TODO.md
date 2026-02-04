# BuildCBS - Remaining Tasks

Last updated: 2026-02-04

---

## Critical (Production Blockers)

### Google Analytics ID
- **File:** `includes/config.php:46`
- **Current:** `'G-XXXXXXXXXX'` (placeholder)
- **Action:** Replace with real GA4 tracking ID
- **Note:** Analytics code in `head.php` is skipped while placeholder value exists

### SMTP Configuration (.env file)
- **File:** `.env` (does not exist - must create in root)
- **Action:** Create `.env` with the following variables:
  ```
  SMTP_HOST=
  SMTP_PORT=
  SMTP_USER=
  SMTP_PASS=
  SMTP_FROM=
  SMTP_FROM_NAME=
  ```
- **Note:** Required for contact form email functionality via PHPMailer

---

## High Priority (Missing Features)

### Testimonials Section
- **Spec:** `content/SPEC-buildcbs.md` (lines 98-112)
- **Location:** Add to `index.php` after About section
- **Requirements:**
  - "What Our Clients Say" heading
  - 3-5 client testimonial cards
  - Client name, project type, quote
  - Responsive grid layout
- **Status:** NOT IMPLEMENTED
- **Dependency:** Need to collect real client testimonials

### Before/After Data File
- **File:** `includes/before-after-data.php` (does not exist)
- **Spec:** `content/SPEC-before-after.md` (line 210)
- **Action:** Create PHP array with structure:
  ```php
  $beforeAfterProjects = [
      [
          'id' => 'project-id',
          'title' => 'Project Name',
          'category' => 'renovation|decking|ceilings|custom',
          'before_images' => [...],
          'after_images' => [...],
      ]
  ];
  ```
- **Status:** NOT IMPLEMENTED

### Before/After Interactive Section
- **Spec:** `content/SPEC-before-after.md` (full spec, 321 lines)
- **Location:** Add to `projects.php` after "Like What You See?" CTA
- **Requirements:**
  - Interactive tab toggle (Before/After buttons)
  - Grid layout with 3-4 project cards
  - 2-column image galleries per project
  - GLightbox integration for full-size viewing
  - Fade transitions on tab switch
  - Responsive: 1 col mobile, 2 col tablet, 3-4 col desktop
- **Status:** NOT IMPLEMENTED

### Before/After Images Directory
- **Path:** `assets/images/projects/before-after/`
- **Structure needed:**
  ```
  before-after/
  ├── project-1/
  │   ├── before-1.jpg
  │   ├── before-2.jpg
  │   ├── after-1.jpg
  │   └── after-2.jpg
  ├── project-2/
  └── project-3/
  ```
- **Status:** Directory does not exist

---

## Medium Priority (Content Gaps)

### Incomplete Project Data
**File:** `includes/projects-data.php`

#### mb-golf-estate
- Missing: `scope` field
- Missing: `materials_detail` field
- Missing: `challenges` field

#### pizza-braai
- Missing: `scope` field
- Missing: `materials_detail` field
- Missing: `challenges` field

### Client Testimonials Content
- **Need:** 3-5 testimonials from past clients
- **Required info per testimonial:**
  - Client name
  - Project type/description
  - Quote text
  - Optional: Location, date

---

## Low Priority (Finalization)

### Tagline Selection
- **Spec:** `content/SPEC-buildcbs.md` (lines 519-525)
- **Options provided:**
  1. "Quality Craftsmanship, Built to Last"
  2. "Building Excellence in Every Detail"
  3. "Your Vision, Our Craftsmanship"
  4. "Where Quality Meets Craftsmanship"
- **Action:** Select final tagline

### Pre-Deployment Checklist
- [ ] Optimize all images (compression, proper sizing)
- [ ] Test contact form end-to-end
- [ ] Verify responsive design on mobile/tablet/desktop
- [ ] Test WhatsApp button functionality
- [ ] Submit sitemap to Google Search Console
- [ ] Verify SSL certificate is active on production

---

## Summary

| Priority | Count | Items |
|----------|-------|-------|
| Critical | 2 | GA_ID, .env/SMTP |
| High | 4 | Testimonials, Before/After data, Before/After UI, Image directory |
| Medium | 3 | 2 project details, Collect testimonials |
| Low | 2 | Tagline, Deployment checklist |

---

## Reference Files

- Technical Spec: `content/SPEC-website.md`
- Business/Copy Spec: `content/SPEC-buildcbs.md`
- Before/After Spec: `content/SPEC-before-after.md`
- Content Library: `content/CLAUDE.md`
