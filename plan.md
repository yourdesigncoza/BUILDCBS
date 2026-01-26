# BuildCBS Projects Page Redesign Plan

## Summary
Redesign projects.php with large cards (2/row desktop, 1/row mobile), always-visible project details extracted from PDFs, graceful degradation for missing assets, and improved Before/After section.

---

## Chosen Layout: Magazine-Style with Before Badge

```
┌────────────────────────────────────────────────────────────────┐
│ ┌──────────────────────┐  ┌──────────────────────┐             │
│ │ [BEFORE badge]       │  │                      │             │
│ │                      │  │   THUMB (Featured)   │   Title     │
│ │   before.jpg         │  │   click → lightbox   │   Category  │
│ │                      │  │                      │─────────────│
│ │   (if available)     │  │                      │   Scope:... │
│ └──────────────────────┘  └──────────────────────┘   Materials │
└────────────────────────────────────────────────────────────────┘
```

**Key Features:**
- **Thumb.jpg** = Featured/After image (primary visual, opens lightbox)
- **before.jpg** = Before image with "BEFORE" banner overlay (graceful hide if missing)
- Details panel beside images shows scope, materials, challenges
- 2 columns desktop, 1 column mobile
- Featured projects sorted first (same card size)

---

## Implementation Tasks

### 1. Update projects-data.php
Add extracted content to each project array:

```php
'scope' => 'Extended existing deck, added 40 squares...',
'materials_detail' => 'Balau for deck and cladding',
'challenges' => 'Built waterproof pool equipment room',
```

**Extracted Content Per Project:**

| Project | Scope | Materials | Challenges |
|---------|-------|-----------|------------|
| balau-deck | Extended deck, +40 squares, new pool equipment room | Balau (deck + cladding) | Waterproof room construction |
| beachfront-garapa | Restored round deck, cladding on front/sides/stairs | CCA-treated timber, Garapa cladding | 5m from beach, weathered pine |
| bedroom-renovation | Relocated door, installed new door for room access | Solid Maranti (custom doors/frames/skirting) | Dust control, walk-through room layout |
| glentana-staircase | Staircase from house to beach + decking/cladding | Garapa timber | Premium/costly build |
| mozaik-tunnel | Restored deck, replaced substructure + decking | Durable pine | Rotten original structure |
| pinnacle-pool-deck | Structural repair + new decking surface | Premium Garapa | Worn/outdated original deck |
| pvc-ceilings | Replaced ceilings in bedrooms/bathroom/hallway | PVC ceilings, white cornices | Sagging fibre cement ceilings |
| vleesbaai-pine | Renovated deck/stairs/walkway, replaced rotten elements | Durable pine + timber preservative | Rotten structural elements |
| white-house | Exterior restoration, roof repairs, deck renovation | Paint, waterproofing, tiles | Weathered exterior with cracks |
| mb-golf-estate | *(no notes available)* | — | — |
| pizza-braai | *(no notes available)* | — | — |

### 2. Auto-detect Available Assets
Update projects-data.php to scan folders:

```php
function getProjectAssets($projectId) {
    $basePath = 'assets/images/projects/' . $projectId . '/';
    $beforePath = null;
    if (file_exists($basePath . 'before.jpg')) $beforePath = $basePath . 'before.jpg';
    elseif (file_exists($basePath . 'before.jpeg')) $beforePath = $basePath . 'before.jpeg';

    return [
        'thumbnail' => $basePath . 'thumb.jpg',
        'before' => $beforePath,
        'images' => glob($basePath . '[0-9].jpg') ?: [],
    ];
}
```

### 2b. Sort Featured Projects First
```php
usort($projects, fn($a, $b) => ($b['featured'] ?? 0) <=> ($a['featured'] ?? 0));
```

### 3. Modify projects.php

**Remove:**
- Filter buttons section (lines 30-39)
- Alpine.js filter logic

**Add:**
- Large card component (2 columns on lg:, 1 on mobile)
- Always-visible details section
- Graceful degradation (hide missing before/notes sections)

**Grid structure:**
```php
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
```

### 4. Update Before/After Section
Replace current tab-toggle with side-by-side comparison for ALL 9 projects with before images:

```html
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php foreach ($projects as $p): ?>
    <?php if ($p['before']): ?>
    <div class="rounded-lg overflow-hidden shadow-lg">
        <div class="grid grid-cols-2">
            <div class="relative">
                <span class="absolute top-2 left-2 bg-gray-800 text-white px-2 py-1 text-xs rounded">Before</span>
                <img src="<?= $p['before'] ?>" class="w-full h-48 object-cover" />
            </div>
            <div class="relative">
                <span class="absolute top-2 left-2 bg-brand-orange text-white px-2 py-1 text-xs rounded">After</span>
                <img src="<?= $p['thumbnail'] ?>" class="w-full h-48 object-cover" />
            </div>
        </div>
        <div class="p-4"><h3><?= $p['title'] ?></h3></div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
</div>
```

**9 projects with before images:** balau-deck, beachfront-garapa, bedroom-renovation, glentana-staircase, pinnacle-pool-deck, pizza-braai, pvc-ceilings, vleesbaai-pine, white-house

---

## Files to Modify

| File | Changes |
|------|---------|
| `includes/projects-data.php` | Add scope/materials/challenges fields, asset detection |
| `projects.php` | New card layout, remove filters, update B/A section |
| `includes/before-after-data.php` | May remove if consolidated into main data |

---

## Verification

1. Check all 11 projects render correctly
2. Verify graceful degradation (mb-golf-estate, pizza-braai show without notes)
3. Test lightbox opens with all project images
4. Mobile responsive: single column, full-width cards
5. Before/After section shows only projects with before images (9 projects)
