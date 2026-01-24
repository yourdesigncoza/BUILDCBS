<?php
/**
 * BuildCBS Homepage
 */
require_once 'includes/config.php';
require_once 'includes/projects-data.php';

$page_title = SITE_NAME . ' - Quality Construction in the Garden Route';
$page_description = 'Premium timber decking, renovations, and custom builds in Mossel Bay, George, and the Garden Route. NHBRC registered. Get a free quote today.';

require_once 'includes/head.php';
require_once 'includes/header.php';
?>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="<?= BASE_URL ?>assets/images/hero/hero.jpg"
                 alt="Premium deck with ocean views"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/70"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Quality Construction &<br>Renovation in the Garden Route
            </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto">
                Premium timber decking, renovations, and custom builds. NHBRC registered.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= BASE_URL ?>contact.php" class="bg-brand-orange text-white px-8 py-4 rounded-md font-semibold text-lg hover:bg-orange-600 transition-colors">
                    Get a Free Quote
                </a>
                <a href="<?= BASE_URL ?>projects.php" class="border-2 border-white text-white px-8 py-4 rounded-md font-semibold text-lg hover:bg-white hover:text-brand-charcoal transition-colors">
                    View Our Work
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-brand-charcoal mb-4">What We Do</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    BuildCBS specialises in premium timber decking, renovations, and custom builds across the Garden Route.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1: Decking -->
                <div class="bg-brand-light rounded-lg p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-brand-orange/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-charcoal mb-2">Timber Decking</h3>
                    <p class="text-gray-600 text-sm">
                        Premium hardwood and treated pine decking designed for coastal conditions. Garapa, Balau, and more.
                    </p>
                </div>

                <!-- Service 2: Renovations -->
                <div class="bg-brand-light rounded-lg p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-brand-orange/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-charcoal mb-2">Renovations</h3>
                    <p class="text-gray-600 text-sm">
                        Complete property restoration including structural repairs, waterproofing, painting, and finishes.
                    </p>
                </div>

                <!-- Service 3: Ceilings -->
                <div class="bg-brand-light rounded-lg p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-brand-orange/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-charcoal mb-2">Ceilings & Finishes</h3>
                    <p class="text-gray-600 text-sm">
                        Modern PVC ceilings, cornices, doors, and interior woodwork. Low-maintenance with premium finish.
                    </p>
                </div>

                <!-- Service 4: Custom -->
                <div class="bg-brand-light rounded-lg p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-brand-orange/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-charcoal mb-2">Custom Outdoor Living</h3>
                    <p class="text-gray-600 text-sm">
                        Braai areas, pizza ovens, and entertainment spaces. All-weather solutions for SA lifestyle.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 md:py-24 bg-brand-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Image -->
                <div class="relative">
                    <img src="<?= BASE_URL ?>assets/images/hero/hero.jpg"
                         alt="BuildCBS quality craftsmanship"
                         class="rounded-lg shadow-xl w-full">
                    <div class="absolute -bottom-6 -right-6 bg-brand-orange text-white p-6 rounded-lg shadow-lg hidden md:block">
                        <p class="text-3xl font-bold">5+</p>
                        <p class="text-sm">Years Experience</p>
                    </div>
                </div>

                <!-- Content -->
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-brand-charcoal mb-6">Built on Local Expertise</h2>
                    <p class="text-gray-600 mb-6">
                        BuildCBS was founded with one goal: to deliver quality construction services to the Garden Route community.
                        Led by <?= OWNER_NAME ?>, our team combines years of hands-on experience with a deep understanding of coastal building requirements.
                    </p>
                    <p class="text-gray-600 mb-8">
                        From Mossel Bay to George, we've earned a reputation for reliable workmanship and attention to detail.
                    </p>

                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-brand-orange flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">NHBRC Registered</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-brand-orange flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Premium Materials</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-brand-orange flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Full-Service Solutions</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-brand-orange flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Garden Route Specialists</span>
                        </li>
                    </ul>

                    <a href="<?= BASE_URL ?>contact.php" class="inline-block bg-brand-orange text-white px-8 py-3 rounded-md font-semibold hover:bg-orange-600 transition-colors">
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-brand-charcoal mb-4">Featured Projects</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    A selection of our recent work across the Garden Route.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach (getFeaturedProjects($projects) as $project): ?>
                <div class="group relative overflow-hidden rounded-lg shadow-lg">
                    <img src="<?= $project['thumbnail'] ?>"
                         alt="<?= htmlspecialchars($project['title']) ?>"
                         class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300"
                         onerror="this.src='<?= BASE_URL ?>assets/images/hero/hero.jpg'">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <div class="text-white">
                            <h3 class="font-bold text-lg"><?= htmlspecialchars($project['title']) ?></h3>
                            <p class="text-sm text-gray-300"><?= htmlspecialchars($project['location']) ?> &bull; <?= htmlspecialchars($project['material']) ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-10">
                <a href="<?= BASE_URL ?>projects.php" class="inline-block border-2 border-brand-orange text-brand-orange px-8 py-3 rounded-md font-semibold hover:bg-brand-orange hover:text-white transition-colors">
                    View All Projects
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-24 bg-brand-charcoal">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Transform Your Space?</h2>
            <p class="text-gray-300 text-lg mb-8">
                Whether it's a new deck, a complete renovation, or a custom braai area, we're here to help.
                Get in touch for a free, no-obligation quote.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= BASE_URL ?>contact.php" class="bg-brand-orange text-white px-8 py-4 rounded-md font-semibold text-lg hover:bg-orange-600 transition-colors">
                    Get a Free Quote
                </a>
                <a href="tel:<?= SITE_PHONE_INTL ?>" class="border-2 border-white text-white px-8 py-4 rounded-md font-semibold text-lg hover:bg-white hover:text-brand-charcoal transition-colors">
                    Call <?= SITE_PHONE ?>
                </a>
            </div>
        </div>
    </section>

<?php require_once 'includes/footer.php'; ?>
