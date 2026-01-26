<?php
/**
 * BuildCBS Project Data
 */

/**
 * Get project assets with graceful degradation
 */
function getProjectAssets($projectId) {
    $basePath = 'assets/images/projects/' . $projectId . '/';
    $beforePath = null;

    if (file_exists($basePath . 'before.jpg')) {
        $beforePath = $basePath . 'before.jpg';
    } elseif (file_exists($basePath . 'before.jpeg')) {
        $beforePath = $basePath . 'before.jpeg';
    }

    return [
        'thumbnail' => $basePath . 'thumb.jpg',
        'before' => $beforePath,
        'has_before' => $beforePath !== null,
        'images' => glob($basePath . '[0-9].jpg') ?: [],
    ];
}

$projects = [
    [
        'id' => 'pinnacle-pool-deck',
        'title' => 'Pool Deck Revival',
        'location' => 'Pinnacle Point Golf Estate',
        'category' => 'decking',
        'material' => 'Garapa',
        'description' => 'Transformed a worn deck into a stunning poolside retreat with premium Garapa decking and breathtaking ocean views.',
        'scope' => 'Structural repair and new decking surface installation',
        'materials_detail' => 'Premium Garapa hardwood',
        'challenges' => 'Worn and outdated original deck requiring full restoration',
        'featured' => true,
        'images' => [
            BASE_URL . 'assets/images/projects/pinnacle-pool-deck/1.jpg',
            BASE_URL . 'assets/images/projects/pinnacle-pool-deck/2.jpg',
            BASE_URL . 'assets/images/projects/pinnacle-pool-deck/3.jpg',
        ],
        'thumbnail' => BASE_URL . 'assets/images/projects/pinnacle-pool-deck/thumb.jpg',
    ],
    [
        'id' => 'balau-deck',
        'title' => 'Pool Deck Expansion',
        'location' => 'Village on Sea, Mossel Bay',
        'category' => 'decking',
        'material' => 'Balau',
        'description' => 'Expanded an existing Balau deck with 40 squares of decking, stairs, and a waterproof pool equipment room.',
        'scope' => 'Extended existing deck with 40 squares, added new pool equipment room',
        'materials_detail' => 'Balau for deck and cladding',
        'challenges' => 'Built waterproof pool equipment room under deck',
        'featured' => true,
        'images' => [
            BASE_URL . 'assets/images/projects/balau-deck/1.jpg',
            BASE_URL . 'assets/images/projects/balau-deck/2.jpg',
        ],
        'thumbnail' => BASE_URL . 'assets/images/projects/balau-deck/thumb.jpg',
    ],
    [
        'id' => 'beachfront-garapa',
        'title' => 'Beachfront Deck Revival',
        'location' => 'Vleesbaai',
        'category' => 'decking',
        'material' => 'Garapa',
        'description' => 'Transformed a weathered pine deck 5m from the beach into a stunning coastal haven using Garapa cladding.',
        'scope' => 'Restored round deck with cladding on front, sides, and stairs',
        'materials_detail' => 'CCA-treated timber substructure, Garapa cladding',
        'challenges' => 'Only 5m from beach, original pine severely weathered',
        'featured' => true,
        'images' => [
            BASE_URL . 'assets/images/projects/beachfront-garapa/1.jpg',
            BASE_URL . 'assets/images/projects/beachfront-garapa/2.jpg',
        ],
        'thumbnail' => BASE_URL . 'assets/images/projects/beachfront-garapa/thumb.jpg',
    ],
    [
        'id' => 'white-house',
        'title' => 'White House Revival',
        'location' => 'Glentana',
        'category' => 'renovation',
        'material' => 'Various',
        'description' => 'Complete exterior restoration including roof repairs, deck renovations, crack repairs, and fresh paint.',
        'scope' => 'Full exterior restoration, roof repairs, deck renovation',
        'materials_detail' => 'Paint, waterproofing, tiles',
        'challenges' => 'Weathered exterior with extensive cracks',
        'featured' => true,
        'images' => [
            BASE_URL . 'assets/images/projects/white-house/1.jpg',
            BASE_URL . 'assets/images/projects/white-house/2.jpg',
        ],
        'thumbnail' => BASE_URL . 'assets/images/projects/white-house/thumb.jpg',
    ],
    [
        'id' => 'pizza-braai',
        'title' => 'Outdoor Entertainment Area',
        'location' => 'Garden Route',
        'category' => 'custom',
        'material' => 'Face Brick, Tiles',
        'description' => 'Transformed a basic braai area into an all-weather entertainment space with custom pizza oven and skylights.',
        'scope' => '',
        'materials_detail' => '',
        'challenges' => '',
        'featured' => false,
        'images' => [
            BASE_URL . 'assets/images/projects/pizza-braai/1.jpg',
            BASE_URL . 'assets/images/projects/pizza-braai/2.jpg',
        ],
        'thumbnail' => BASE_URL . 'assets/images/projects/pizza-braai/thumb.jpg',
    ],
    [
        'id' => 'pvc-ceilings',
        'title' => 'PVC Ceiling Revival',
        'location' => 'Heiderand',
        'category' => 'ceilings',
        'material' => 'PVC',
        'description' => 'Replaced tired fibre cement ceilings with modern PVC ceilings and crisp white cornices throughout the home.',
        'scope' => 'Replaced ceilings in bedrooms, bathroom, and hallway',
        'materials_detail' => 'PVC ceilings with white cornices',
        'challenges' => 'Sagging fibre cement ceilings required removal',
        'featured' => false,
        'images' => [
            BASE_URL . 'assets/images/projects/pvc-ceilings/1.jpg',
            BASE_URL . 'assets/images/projects/pvc-ceilings/2.jpg',
        ],
        'thumbnail' => BASE_URL . 'assets/images/projects/pvc-ceilings/thumb.jpg',
    ],
    [
        'id' => 'glentana-staircase',
        'title' => 'Beach Access Staircase',
        'location' => 'Glentana',
        'category' => 'decking',
        'material' => 'Garapa',
        'description' => 'Premium Garapa staircase with cladding linking the client\'s home directly to the beach.',
        'scope' => 'Built staircase from house to beach with decking and cladding',
        'materials_detail' => 'Premium Garapa timber',
        'challenges' => 'Premium build with significant investment',
        'featured' => false,
        'images' => [
            BASE_URL . 'assets/images/projects/glentana-staircase/1.jpg',
        ],
        'thumbnail' => BASE_URL . 'assets/images/projects/glentana-staircase/thumb.jpg',
    ],
    [
        'id' => 'mozaik-tunnel',
        'title' => 'Mozaik Tunnel Deck',
        'location' => 'Pinnacle Point',
        'category' => 'decking',
        'material' => 'Pine',
        'description' => 'Restored the scenic deck at Pinnacle Point Mozaik Tunnel connecting to the St. Blaise Trail.',
        'scope' => 'Restored deck with new substructure and decking',
        'materials_detail' => 'Durable pine',
        'challenges' => 'Original structure was rotten and required full replacement',
        'featured' => false,
        'images' => [
            BASE_URL . 'assets/images/projects/mozaik-tunnel/1.jpg',
        ],
        'thumbnail' => BASE_URL . 'assets/images/projects/mozaik-tunnel/thumb.jpg',
    ],
    [
        'id' => 'vleesbaai-pine',
        'title' => 'Deck & Walkway Revival',
        'location' => 'Vleesbaai',
        'category' => 'decking',
        'material' => 'Pine',
        'description' => 'Restored a worn deck, stairs, and walkway with durable pine decking treated with timber preservative.',
        'scope' => 'Renovated deck, stairs, and walkway; replaced rotten elements',
        'materials_detail' => 'Durable pine with timber preservative',
        'challenges' => 'Rotten structural elements required replacement',
        'featured' => false,
        'images' => [
            BASE_URL . 'assets/images/projects/vleesbaai-pine/1.jpg',
        ],
        'thumbnail' => BASE_URL . 'assets/images/projects/vleesbaai-pine/thumb.jpg',
    ],
    [
        'id' => 'bedroom-renovation',
        'title' => 'Improved Accessibility',
        'location' => 'Glentana',
        'category' => 'renovation',
        'material' => 'Meranti',
        'description' => 'Door relocation and installation with custom Meranti doors, frames, and skirting for better room flow.',
        'scope' => 'Relocated door and installed new door for room access',
        'materials_detail' => 'Solid Maranti (custom doors, frames, skirting)',
        'challenges' => 'Dust control and walk-through room layout',
        'featured' => false,
        'images' => [
            BASE_URL . 'assets/images/projects/bedroom-renovation/1.jpg',
        ],
        'thumbnail' => BASE_URL . 'assets/images/projects/bedroom-renovation/thumb.jpg',
    ],
    [
        'id' => 'mb-golf-estate',
        'title' => 'Garapa Deck',
        'location' => 'Mossel Bay Golf Estate',
        'category' => 'decking',
        'material' => 'Garapa',
        'description' => 'Premium Garapa deck installation showcasing the natural beauty and durability of Brazilian hardwood.',
        'scope' => '',
        'materials_detail' => '',
        'challenges' => '',
        'featured' => false,
        'images' => [
            BASE_URL . 'assets/images/projects/mb-golf-estate/1.jpg',
        ],
        'thumbnail' => BASE_URL . 'assets/images/projects/mb-golf-estate/thumb.jpg',
    ],
];

// Sort projects: featured first
usort($projects, fn($a, $b) => ($b['featured'] ?? 0) <=> ($a['featured'] ?? 0));

// Category labels
$categories = [
    'all' => 'All Projects',
    'decking' => 'Decking',
    'renovation' => 'Renovations',
    'ceilings' => 'Ceilings',
    'custom' => 'Custom Builds',
];

// Get featured projects
function getFeaturedProjects($projects, $limit = 4) {
    return array_slice(array_filter($projects, fn($p) => $p['featured']), 0, $limit);
}

// Get projects by category
function getProjectsByCategory($projects, $category) {
    if ($category === 'all') return $projects;
    return array_filter($projects, fn($p) => $p['category'] === $category);
}
