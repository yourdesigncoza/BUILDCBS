<?php
/**
 * BuildCBS Projects Gallery
 */
require_once 'includes/config.php';
require_once 'includes/projects-data.php';
require_once 'includes/before-after-data.php';

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

    <!-- Filter & Gallery -->
    <section class="py-16 bg-white" x-data="{ filter: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                <?php foreach ($categories as $key => $label): ?>
                <button @click="filter = '<?= $key ?>'"
                        :class="filter === '<?= $key ?>' ? 'bg-brand-orange text-white' : 'bg-brand-light text-brand-charcoal hover:bg-brand-orange/10'"
                        class="px-6 py-2 rounded-full font-medium transition-colors">
                    <?= $label ?>
                </button>
                <?php endforeach; ?>
            </div>

            <!-- Masonry Gallery -->
            <div class="masonry">
                <?php foreach ($projects as $project): ?>
                <div class="masonry-item"
                     x-show="filter === 'all' || filter === '<?= $project['category'] ?>'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100">
                    <div class="group relative overflow-hidden rounded-lg shadow-lg bg-gray-100">
                        <!-- Main Image (links to lightbox) -->
                        <a href="<?= $project['thumbnail'] ?>"
                           class="glightbox block"
                           data-gallery="projects"
                           data-title="<?= htmlspecialchars($project['title']) ?>"
                           data-description="<?= htmlspecialchars($project['location']) ?> &bull; <?= htmlspecialchars($project['material']) ?>">
                            <img src="<?= $project['thumbnail'] ?>"
                                 alt="<?= htmlspecialchars($project['title']) ?>"
                                 class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-500"
                                 loading="lazy"
                                 onerror="this.src='<?= BASE_URL ?>assets/images/hero/hero.jpg'">

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                                <span class="inline-block bg-brand-orange text-white text-xs font-semibold px-3 py-1 rounded-full mb-2 w-fit">
                                    <?= ucfirst($project['category']) ?>
                                </span>
                                <h3 class="text-white font-bold text-xl mb-1"><?= htmlspecialchars($project['title']) ?></h3>
                                <p class="text-gray-300 text-sm mb-2">
                                    <?= htmlspecialchars($project['location']) ?> &bull; <?= htmlspecialchars($project['material']) ?>
                                </p>
                                <p class="text-gray-400 text-sm line-clamp-2">
                                    <?= htmlspecialchars($project['description']) ?>
                                </p>
                            </div>
                        </a>

                        <!-- Additional images for lightbox (hidden) -->
                        <?php if (count($project['images']) > 1): ?>
                            <?php foreach (array_slice($project['images'], 1) as $image): ?>
                            <a href="<?= $image ?>"
                               class="glightbox hidden"
                               data-gallery="projects"
                               data-title="<?= htmlspecialchars($project['title']) ?>"
                               data-description="<?= htmlspecialchars($project['location']) ?>">
                            </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Empty State -->
            <div x-show="document.querySelectorAll('.masonry-item[style*=\'display: none\']').length === <?= count($projects) ?>"
                 class="text-center py-12 text-gray-500">
                <p>No projects found in this category.</p>
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

    <!-- Before & After Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-brand-charcoal mb-4">Our Work in Action</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    See the remarkable transformations we've achieved for our clients
                </p>
            </div>

            <!-- Before/After Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <?php foreach ($beforeAfterProjects as $project): ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden" x-data="{ activeTab: 'before' }">

                    <!-- Tab Toggle -->
                    <div class="flex border-b border-gray-200">
                        <button @click="activeTab = 'before'"
                            :class="activeTab === 'before' ? 'bg-brand-orange text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                            class="flex-1 py-3 px-4 font-semibold transition-colors">
                            Before
                        </button>
                        <button @click="activeTab = 'after'"
                            :class="activeTab === 'after' ? 'bg-brand-orange text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
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
                                 class="w-full h-32 object-cover rounded hover:opacity-90 transition-opacity"
                                 loading="lazy">
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
                                 class="w-full h-32 object-cover rounded hover:opacity-90 transition-opacity"
                                 loading="lazy">
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
            </div>
        </div>
    </section>

<?php require_once 'includes/footer.php'; ?>
