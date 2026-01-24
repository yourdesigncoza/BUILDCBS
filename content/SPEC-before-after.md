# SPEC: Before & After Section

## Overview
Interactive transformation gallery section for the projects page, allowing users to toggle between before and after photo collections for each showcase project.

**Location:** `projects.php` — inserted after "Like What You See?" CTA section
**Section Title:** "Our Work in Action"
**Subtitle:** "See the remarkable transformations we've achieved for our clients"

---

## Data Structure

### File: `includes/before-after-data.php`

```php
<?php
/**
 * Before & After Project Data
 * Each project has multiple before AND multiple after images
 */

$beforeAfterProjects = [
    [
        'id' => 'ba-project-1',
        'title' => 'Kitchen Renovation',
        'category' => 'renovation',
        'before_images' => [
            BASE_URL . 'assets/images/projects/before-after/project-1/before-1.jpg',
            BASE_URL . 'assets/images/projects/before-after/project-1/before-2.jpg',
            BASE_URL . 'assets/images/projects/before-after/project-1/before-3.jpg',
        ],
        'after_images' => [
            BASE_URL . 'assets/images/projects/before-after/project-1/after-1.jpg',
            BASE_URL . 'assets/images/projects/before-after/project-1/after-2.jpg',
            BASE_URL . 'assets/images/projects/before-after/project-1/after-3.jpg',
        ],
    ],
    // ... 2-3 more entries
];
```

### Data Fields
| Field | Type | Description |
|-------|------|-------------|
| `id` | string | Unique identifier for lightbox gallery grouping |
| `title` | string | Project name displayed below gallery |
| `category` | string | One of: renovation, decking, ceilings, custom |
| `before_images` | array | Array of image paths for "before" state |
| `after_images` | array | Array of image paths for "after" state |

---

## UI Components

### Section Container
```html
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <!-- Grid -->
    </div>
</section>
```

### Section Header
```html
<div class="text-center mb-12">
    <h2 class="text-3xl font-bold text-brand-charcoal mb-4">Our Work in Action</h2>
    <p class="text-gray-600 max-w-2xl mx-auto">
        See the remarkable transformations we've achieved for our clients
    </p>
</div>
```

### Project Card (per showcase)
```html
<div class="bg-white rounded-lg shadow-lg overflow-hidden" x-data="{ activeTab: 'before' }">

    <!-- Tab Toggle -->
    <div class="flex border-b border-gray-200">
        <button
            @click="activeTab = 'before'"
            :class="activeTab === 'before' ? 'bg-brand-orange text-white' : 'bg-gray-100 text-gray-700'"
            class="flex-1 py-3 px-4 font-semibold transition-colors">
            Before
        </button>
        <button
            @click="activeTab = 'after'"
            :class="activeTab === 'after' ? 'bg-brand-orange text-white' : 'bg-gray-100 text-gray-700'"
            class="flex-1 py-3 px-4 font-semibold transition-colors">
            After
        </button>
    </div>

    <!-- Before Gallery -->
    <div x-show="activeTab === 'before'"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="grid grid-cols-2 gap-2 p-4">
        <!-- Loop: before_images -->
        <a href="{image_path}"
           class="glightbox"
           data-gallery="{id}-before"
           data-title="{title} - Before">
            <img src="{image_path}" alt="{title} before"
                 class="w-full h-32 object-cover rounded">
        </a>
    </div>

    <!-- After Gallery -->
    <div x-show="activeTab === 'after'"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="grid grid-cols-2 gap-2 p-4">
        <!-- Loop: after_images -->
        <a href="{image_path}"
           class="glightbox"
           data-gallery="{id}-after"
           data-title="{title} - After">
            <img src="{image_path}" alt="{title} after"
                 class="w-full h-32 object-cover rounded">
        </a>
    </div>

    <!-- Title -->
    <div class="p-4 pt-0">
        <h3 class="text-lg font-semibold text-brand-charcoal">{title}</h3>
    </div>
</div>
```

---

## Responsive Grid Layout

```html
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
    <!-- Project cards -->
</div>
```

| Breakpoint | Columns | Behavior |
|------------|---------|----------|
| Mobile (<640px) | 1 | Full width cards, stacked |
| Tablet (md: 768px) | 2 | Two-column grid |
| Desktop (lg: 1024px) | 3 | Three-column grid |
| Large (xl: 1280px) | 4 | Four-column grid (if 4 items) |

---

## Interactions

### Tab Toggle
- **Default state:** "Before" tab active
- **Click behavior:** Switch active tab, trigger fade transition
- **Visual feedback:** Active tab has `bg-brand-orange text-white`, inactive has `bg-gray-100 text-gray-700`

### Fade Transition
- **Duration:** 300ms enter, 200ms leave
- **Easing:** ease-out enter, ease-in leave
- **Effect:** Opacity 0 → 1 (enter), 1 → 0 (leave)

### Lightbox
- **Trigger:** Click any gallery image
- **Grouping:** Separate galleries per project per state (`{id}-before`, `{id}-after`)
- **Title:** "{Project Title} - Before" or "{Project Title} - After"
- **Navigation:** GLightbox arrows within gallery group

---

## Image Specifications

### Thumbnails (in grid)
- **Display size:** `h-32` (128px height), `object-cover`
- **Aspect ratio:** Flexible width, cropped to fit
- **Format:** JPG recommended

### Lightbox (full view)
- **Recommended size:** 1200×800px or larger
- **Format:** JPG optimized

### Directory Structure
```
assets/images/projects/before-after/
├── project-1/
│   ├── before-1.jpg
│   ├── before-2.jpg
│   ├── after-1.jpg
│   └── after-2.jpg
├── project-2/
│   └── ...
└── project-3/
    └── ...
```

---

## PHP Implementation

### Include Data
```php
<?php require_once 'includes/before-after-data.php'; ?>
```

### Render Loop
```php
<?php foreach ($beforeAfterProjects as $project): ?>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden"
         x-data="{ activeTab: 'before' }">

        <!-- Tab Toggle -->
        <div class="flex border-b border-gray-200">
            <button @click="activeTab = 'before'"
                :class="activeTab === 'before' ? 'bg-brand-orange text-white' : 'bg-gray-100 text-gray-700'"
                class="flex-1 py-3 px-4 font-semibold transition-colors">
                Before
            </button>
            <button @click="activeTab = 'after'"
                :class="activeTab === 'after' ? 'bg-brand-orange text-white' : 'bg-gray-100 text-gray-700'"
                class="flex-1 py-3 px-4 font-semibold transition-colors">
                After
            </button>
        </div>

        <!-- Before Images -->
        <div x-show="activeTab === 'before'"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="grid grid-cols-2 gap-2 p-4">
            <?php foreach ($project['before_images'] as $image): ?>
                <a href="<?= $image ?>"
                   class="glightbox"
                   data-gallery="<?= $project['id'] ?>-before"
                   data-title="<?= htmlspecialchars($project['title']) ?> - Before">
                    <img src="<?= $image ?>"
                         alt="<?= htmlspecialchars($project['title']) ?> before"
                         class="w-full h-32 object-cover rounded hover:opacity-90 transition-opacity">
                </a>
            <?php endforeach; ?>
        </div>

        <!-- After Images -->
        <div x-show="activeTab === 'after'"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="grid grid-cols-2 gap-2 p-4">
            <?php foreach ($project['after_images'] as $image): ?>
                <a href="<?= $image ?>"
                   class="glightbox"
                   data-gallery="<?= $project['id'] ?>-after"
                   data-title="<?= htmlspecialchars($project['title']) ?> - After">
                    <img src="<?= $image ?>"
                         alt="<?= htmlspecialchars($project['title']) ?> after"
                         class="w-full h-32 object-cover rounded hover:opacity-90 transition-opacity">
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Title -->
        <div class="p-4 pt-0">
            <h3 class="text-lg font-semibold text-brand-charcoal">
                <?= htmlspecialchars($project['title']) ?>
            </h3>
        </div>
    </div>
<?php endforeach; ?>
```

---

## Accessibility

- Tab buttons have visible focus states (Tailwind default ring)
- Images have descriptive alt text
- Lightbox supports keyboard navigation (GLightbox default)
- Color contrast meets WCAG AA standards

---

## Browser Support

- Modern browsers (Chrome, Firefox, Safari, Edge)
- Alpine.js requires ES6 support
- CSS transitions require no polyfills
- GLightbox works on all modern browsers

---

## Files Summary

| File | Action | Purpose |
|------|--------|---------|
| `includes/before-after-data.php` | CREATE | Data array for before/after projects |
| `projects.php` | MODIFY | Add section after line 111 |
| `assets/images/projects/before-after/` | CREATE | Image directory structure |

---

## Testing Checklist

- [ ] Section appears after "Like What You See?" CTA
- [ ] 3-4 project cards display in grid
- [ ] Tab toggle switches between Before/After
- [ ] Fade animation plays on tab switch
- [ ] Before images open in lightbox as group
- [ ] After images open in separate lightbox group
- [ ] Lightbox shows correct title
- [ ] Responsive: 1 col mobile, 2 col tablet, 3-4 col desktop
- [ ] Images display correctly (cropped, not stretched)
