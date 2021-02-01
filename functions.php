<?php

// Intégration du fichier avec les appels add_action().
require_once get_template_directory() . '/inc/actions.php';

// Intégration du fichier avec les appels add_filter().
require_once get_template_directory() . '/inc/filters.php';

// Intégration du fichier avec les fonctions de filtrage.
require_once get_template_directory() . '/inc/filter-functions.php';

// Intégration du fichier avec les fonctions de template.
require_once get_template_directory() . '/inc/template-functions.php';

// TEmplates tags.
require_once get_template_directory() . '/inc/template-tags.php';

// Shortcodes.
require_once get_template_directory() . '/inc/shortcode.php';

// Custom menu walker.
require_once get_template_directory() . '/classes/class-walker-menu.php';

// Plugin ACF
require_once get_template_directory() . '/inc/plugins/acf.php';
