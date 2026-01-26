<?php
/**
 * BuildCBS Projects Gallery - Magazine Style Layout
 */
require_once 'includes/config.php';
require_once 'includes/projects-data.php';

$page_title = 'Our Projects - ' . SITE_NAME;
$page_description = 'View our portfolio of timber decking, renovations, and custom builds across the Garden Route. Quality craftsmanship in Mossel Bay, George, Glentana, and more.';

require_once 'includes/head.php';
require_once 'includes/header.php';
?>

    <!-- Page Header -->
    <section class="pt-32 pb-16 bg-brand-charcoal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Our Projects</h1>
            <p class="text-gray-300 max-w-2xl mx-auto">
                Explore our portfolio of quality construction work across the Garden Route.
            </p>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Magazine-Style Grid: 2 cols desktop, 1 col mobile -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <?php foreach ($projects as $index => $project):
                    $assets = getProjectAssets($project['id']);
                    $lazyLoad = $index >= 4 ? 'lazy' : 'eager';
                ?>
                <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">

                    <!-- Image Section -->
                    <div class="grid <?= $assets['has_before'] ? 'grid-cols-2' : 'grid-cols-1' ?> gap-2 p-2">

                        <?php if ($assets['has_before']): ?>
                        <!-- Before Image -->
                        <div class="relative">
                            <span class="absolute top-2 left-2 bg-gray-800/90 text-white px-3 py-1 text-xs font-semibold rounded z-10">Before</span>
                            <a href="<?= BASE_URL . $assets['before'] ?>"
                               class="glightbox block"
                               data-gallery="project-<?= $project['id'] ?>"
                               data-title="<?= htmlspecialchars($project['title']) ?> - Before">
                                <img src="<?= BASE_URL . $assets['before'] ?>"
                                     alt="<?= htmlspecialchars($project['title']) ?> before renovation"
                                     class="w-full h-48 object-cover rounded-lg hover:opacity-90 transition-opacity"
                                     loading="<?= $lazyLoad ?>">
                            </a>
                        </div>
                        <?php endif; ?>

                        <!-- After/Thumbnail Image -->
                        <div class="relative <?= $assets['has_before'] ? '' : '' ?>">
                            <?php if ($assets['has_before']): ?>
                            <span class="absolute top-2 left-2 bg-brand-orange text-white px-3 py-1 text-xs font-semibold rounded z-10">After</span>
                            <?php endif; ?>
                            <a href="<?= $project['thumbnail'] ?>"
                               class="glightbox block"
                               data-gallery="project-<?= $project['id'] ?>"
                               data-title="<?= htmlspecialchars($project['title']) ?>">
                                <img src="<?= $project['thumbnail'] ?>"
                                     alt="<?= htmlspecialchars($project['title']) ?> completed project"
                                     class="w-full h-48 object-cover rounded-lg hover:opacity-90 transition-opacity"
                                     loading="<?= $lazyLoad ?>">
                            </a>
                        </div>
                    </div>

                    <!-- Hidden gallery images for lightbox -->
                    <?php if (!empty($assets['images'])): ?>
                        <?php foreach ($assets['images'] as $image): ?>
                        <a href="<?= BASE_URL . $image ?>"
                           class="glightbox hidden"
                           data-gallery="project-<?= $project['id'] ?>"
                           data-title="<?= htmlspecialchars($project['title']) ?>"></a>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- Details Section -->
                    <div class="p-6">
                        <!-- Category Badge -->
                        <span class="inline-block bg-brand-orange/10 text-brand-orange text-xs font-semibold px-3 py-1 rounded-full mb-3">
                            <?= ucfirst($project['category']) ?>
                        </span>

                        <!-- Title & Location -->
                        <h3 class="text-xl font-bold text-brand-charcoal mb-1">
                            <?= htmlspecialchars($project['title']) ?>
                        </h3>
                        <p class="text-sm text-gray-500 mb-3">
                            <?= htmlspecialchars($project['location']) ?> &bull; <?= htmlspecialchars($project['material']) ?>
                        </p>

                        <!-- Scope (if available) -->
                        <?php if (!empty($project['scope'])): ?>
                        <p class="text-gray-600 line-clamp-3 mb-3">
                            <?= htmlspecialchars($project['scope']) ?>
                        </p>
                        <?php else: ?>
                        <p class="text-gray-600 line-clamp-3 mb-3">
                            <?= htmlspecialchars($project['description']) ?>
                        </p>
                        <?php endif; ?>

                        <!-- Materials & Challenges (if available) -->
                        <?php if (!empty($project['materials_detail'])): ?>
                        <div class="flex flex-wrap gap-2 text-sm">
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full">
                                <strong>Materials:</strong> <?= htmlspecialchars($project['materials_detail']) ?>
                            </span>
                        </div>
                        <?php endif; ?>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-brand-light">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-brand-charcoal mb-4">Like What You See?</h2>
            <p class="text-gray-600 mb-8">
                Let's discuss your project. Get in touch for a free quote.
            </p>
            <a href="<?= BASE_URL ?>contact.php" class="inline-block bg-brand-orange text-white px-8 py-4 rounded-md font-semibold text-lg hover:bg-orange-600 transition-colors">
                Get a Free Quote
            </a>
        </div>
    </section>

<?php require_once 'includes/footer.php'; ?>
