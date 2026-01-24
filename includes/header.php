<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav x-data="{ open: false, scrolled: false }"
         x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
         :class="scrolled ? 'bg-brand-charcoal shadow-lg' : 'bg-transparent'"
         class="fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="<?= BASE_URL ?>" class="flex items-center">
                    <img src="<?= BASE_URL ?>assets/images/logo/web-logo.png" alt="<?= SITE_NAME ?>" class="h-8 md:h-10">
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="<?= BASE_URL ?>" class="text-white hover:text-brand-orange transition-colors font-medium">Home</a>
                    <a href="<?= BASE_URL ?>projects.php" class="text-white hover:text-brand-orange transition-colors font-medium">Projects</a>
                    <a href="<?= BASE_URL ?>contact.php" class="text-white hover:text-brand-orange transition-colors font-medium">Contact</a>
                    <a href="<?= BASE_URL ?>contact.php" class="bg-brand-orange text-white px-6 py-2 rounded-md font-semibold hover:bg-orange-600 transition-colors">
                        Get a Quote
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="open = !open" class="md:hidden text-white p-2" aria-label="Toggle menu">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open"
             x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1"
             class="md:hidden bg-brand-charcoal border-t border-gray-700">
            <div class="px-4 py-4 space-y-3">
                <a href="<?= BASE_URL ?>" class="block text-white hover:text-brand-orange transition-colors py-2">Home</a>
                <a href="<?= BASE_URL ?>projects.php" class="block text-white hover:text-brand-orange transition-colors py-2">Projects</a>
                <a href="<?= BASE_URL ?>contact.php" class="block text-white hover:text-brand-orange transition-colors py-2">Contact</a>
                <a href="<?= BASE_URL ?>contact.php" class="block bg-brand-orange text-white px-6 py-3 rounded-md font-semibold text-center hover:bg-orange-600 transition-colors mt-4">
                    Get a Quote
                </a>
            </div>
        </div>
    </nav>
