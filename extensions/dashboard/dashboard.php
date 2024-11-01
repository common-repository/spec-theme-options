<?php
function spec_admin_menu()
{
    add_menu_page(
        __('SPEC Themes', 'specshop'),
        __('SPEC Themes', 'specshop'),
        'manage_options',
        'spec-themes-dashboard',
        'spec_admin_page_contents',
        'dashicons-admin-site-alt3',
        3
    );
    add_submenu_page('spec-themes-dashboard', 'Theme Dashboard', 'Theme Dashboard ', 'manage_options', 'spec-themes-dashboard', 'spec_admin_page_contents', 0);
}
add_action('admin_menu', 'spec_admin_menu');
