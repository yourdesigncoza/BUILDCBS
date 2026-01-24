<?php
/**
 * BuildCBS Contact Page
 */
require_once 'includes/config.php';
require_once 'includes/csrf.php';

$page_title = 'Contact Us - ' . SITE_NAME;
$page_description = 'Get in touch with BuildCBS for a free quote on your decking, renovation, or construction project in the Garden Route.';

// Handle form status messages
$status = $_GET['status'] ?? null;
$statusMessage = '';
$statusType = '';

if ($status === 'success') {
    $statusMessage = 'Thank you for your message! We\'ll be in touch soon.';
    $statusType = 'success';
} elseif ($status === 'error') {
    $msg = $_GET['msg'] ?? 'unknown';
    if ($msg === 'required') {
        $statusMessage = 'Please fill in all required fields.';
    } elseif ($msg === 'invalid') {
        $statusMessage = 'Your session expired. Please try submitting the form again.';
    } else {
        $statusMessage = 'Sorry, there was a problem sending your message. Please try again or call us directly.';
    }
    $statusType = 'error';
}

require_once 'includes/head.php';
require_once 'includes/header.php';
?>

    <!-- Page Header -->
    <section class="pt-32 pb-16 bg-brand-charcoal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Get in Touch</h1>
            <p class="text-gray-300 max-w-2xl mx-auto">
                Ready to start your project? Contact us for a free, no-obligation quote.
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12">

                <!-- Contact Form -->
                <div>
                    <h2 class="text-2xl font-bold text-brand-charcoal mb-6">Request a Quote</h2>

                    <?php if ($statusMessage): ?>
                    <div class="mb-6 p-4 rounded-lg <?= $statusType === 'success' ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200' ?>">
                        <?= htmlspecialchars($statusMessage) ?>
                    </div>
                    <?php endif; ?>

                    <form action="<?= BASE_URL ?>send-mail.php" method="POST" class="space-y-6">
                        <?= csrf_field() ?>

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-orange focus:border-brand-orange transition-colors"
                                   placeholder="Your name">
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-orange focus:border-brand-orange transition-colors"
                                   placeholder="your@email.com">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                Phone Number <span class="text-red-500">*</span>
                            </label>
                            <input type="tel"
                                   id="phone"
                                   name="phone"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-orange focus:border-brand-orange transition-colors"
                                   placeholder="074 123 4567">
                        </div>

                        <!-- Project Type -->
                        <div>
                            <label for="project_type" class="block text-sm font-medium text-gray-700 mb-1">
                                Project Type <span class="text-red-500">*</span>
                            </label>
                            <select id="project_type"
                                    name="project_type"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-orange focus:border-brand-orange transition-colors bg-white">
                                <option value="">Select a project type</option>
                                <option value="Timber Decking">Timber Decking</option>
                                <option value="Renovation">Renovation / Restoration</option>
                                <option value="Ceilings">Ceilings & Interior Finishes</option>
                                <option value="Custom Build">Custom Build (Braai, Pizza Oven, etc.)</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
                                Project Details <span class="text-red-500">*</span>
                            </label>
                            <textarea id="message"
                                      name="message"
                                      rows="5"
                                      required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand-orange focus:border-brand-orange transition-colors resize-none"
                                      placeholder="Tell us about your project..."></textarea>
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                                class="w-full bg-brand-orange text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-orange-600 transition-colors">
                            Request a Quote
                        </button>
                    </form>
                </div>

                <!-- Contact Details -->
                <div>
                    <h2 class="text-2xl font-bold text-brand-charcoal mb-6">Contact Information</h2>

                    <div class="bg-brand-light rounded-lg p-8 mb-8">
                        <ul class="space-y-6">
                            <!-- Phone -->
                            <li class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-brand-orange/10 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-brand-charcoal">Phone</h3>
                                    <a href="tel:<?= SITE_PHONE_INTL ?>" class="text-gray-600 hover:text-brand-orange transition-colors text-lg">
                                        <?= SITE_PHONE ?>
                                    </a>
                                </div>
                            </li>

                            <!-- Email -->
                            <li class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-brand-orange/10 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-brand-charcoal">Email</h3>
                                    <a href="mailto:<?= SITE_EMAIL ?>" class="text-gray-600 hover:text-brand-orange transition-colors">
                                        <?= SITE_EMAIL ?>
                                    </a>
                                </div>
                            </li>

                            <!-- WhatsApp -->
                            <li class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-brand-charcoal">WhatsApp</h3>
                                    <a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Hi%20BuildCBS%2C%20I'd%20like%20to%20get%20a%20quote"
                                       target="_blank"
                                       class="text-gray-600 hover:text-green-600 transition-colors">
                                        Message us on WhatsApp
                                    </a>
                                </div>
                            </li>

                            <!-- Location -->
                            <li class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-brand-orange/10 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-brand-charcoal">Service Area</h3>
                                    <p class="text-gray-600"><?= SITE_LOCATION ?></p>
                                    <p class="text-gray-500 text-sm mt-1"><?= SERVICE_AREAS ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Social -->
                    <div class="bg-brand-light rounded-lg p-8">
                        <h3 class="font-semibold text-brand-charcoal mb-4">Follow Us</h3>
                        <a href="<?= SITE_FACEBOOK ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 text-gray-600 hover:text-blue-600 transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            <span>Facebook</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php require_once 'includes/footer.php'; ?>
