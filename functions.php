<?php
include_once('tgmpa/config-plugin-activation.php');

add_action( 'wp_enqueue_scripts', 'enqueue_theme_css' );

/* Função chamar estilos */
function enqueue_theme_css(){
    wp_enqueue_style(
      'default',
      get_template_directory_uri() . '/css/default.min.css'
    );
}
/* Função chamar scripts */
function my_scripts(){
  // script 02
  wp_enqueue_script(
    'default',
    get_stylesheet_directory_uri().'/js/default.min.js',
    array('jquery')
  );
}
// Adicionamos uma acção que chama a nossa função
add_action( 'wp_enqueue_scripts', 'my_scripts' );

// Adicionar Menus
add_theme_support( 'menus' );
register_nav_menu( 'Menu Principal', 'Menu Principal' );
remove_action('wp_head', 'wp_generator');


// YOIMAGES Crop's
add_theme_support( 'post-thumbnails' );
add_image_size( 'exemplo', 1000, 1000, true );


// Tamanho da imagem no editor de conteudo
function wpmidia_custom_image_sizes( $sizes ) {
  global $_wp_additional_image_sizes;
  if ( empty($_wp_additional_image_sizes) )
    return $sizes;

  foreach ( $_wp_additional_image_sizes as $id => $data ) {
    if ( !isset($sizes[$id]) )
      $sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
  }

  return $sizes;
}
add_filter( 'image_size_names_choose', 'wpmidia_custom_image_sizes' );
 
function wpmayor_custom_image_sizes($sizes) {
    $myimgsizes = array(
        "Imagem Conteúdo" => __("Imagem Conteúdo"),
        "full" => __("Tamanho Original")
    );
    return $myimgsizes;
}
add_filter('image_size_names_choose', 'wpmayor_custom_image_sizes');

// Ajuste de widget de pesquisa
function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <input type="text" value="' . get_search_query() . '" name="s" id="s"  placeholder="Digite sua busca aqui" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );

// Pagination
function post_pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }
     if(1 != $pages)
     {
         echo "<ul class='pagination'>";
         if($paged > 1) echo "<li><a href='".get_pagenum_link($paged - 1)."' class='current'>&laquo;</a></li>";
         if($paged > 6 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>1</a> <span class='current'>...</span></li>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li class='active'><span>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
             }
         }
         if ($paged < $pages-2 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><span class='current'>...</span></li> <li><a href='".get_pagenum_link($pages)."'>$pages</a></li>";
         if ($paged < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."' class='current'>&raquo;</a></li>";
         echo "</ul>";
     }
}



// Limite de caracteres
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    
    if(count($excerpt)>=$limit){
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt)." ...";
    }else{
        $excerpt = implode(" ",$excerpt);
    }
    
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

// Funçao Leia Mais
function excerptLeiaMais($limit) {
    $excerptLeiaMais = explode(' ', get_the_excerpt(), $limit);
    
    if(count($excerptLeiaMais)>=$limit){
        array_pop($excerptLeiaMais);
        $excerptLeiaMais = implode(" ",$excerptLeiaMais)." ...".' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Leia mais', 'your-text-domain') . '</a>';
    }else{
        $excerptLeiaMais = implode(" ",$excerptLeiaMais)."";
    }
    
    $excerptLeiaMais = preg_replace('`\[[^\]]*\]`','',$excerptLeiaMais);
    return $excerptLeiaMais;
}

// Usuários que poderão ver todos os "menus"
$admins = array( 
    'mobidick'
);
$current_user = wp_get_current_user();

function remove_menus(){
    global $admins, $current_user;

    // Remove os itens do menu
    if(!in_array($current_user->user_login, $admins)){
        //remove_menu_page( 'index.php' );               //Dashboard
        remove_menu_page( 'edit.php' );                  //Posts
        //remove_menu_page( 'edit.php?post_type=page' );   //Pages
        //remove_menu_page( 'upload.php' );              //Media
        remove_menu_page( 'edit-comments.php' );         //Comments
        //remove_menu_page( 'themes.php' );              //Appearance
        remove_menu_page( 'plugins.php' );               //Plugins
        //remove_menu_page( 'users.php' );               //Users
        remove_menu_page( 'tools.php' );                 //Tools
        remove_menu_page( 'options-general.php' );       //Settings
        remove_menu_page('edit.php?post_type=acf-field-group');      //ACF (Campos personalizados)
        remove_menu_page('cptui_main_menu');             //CPT UI (Editor de taxonomys)
    }
}
add_action( 'admin_menu', 'remove_menus', 999 );

// Remove os submenus desejados
function removeMenu() {
    global $admins, $current_user;

    if(!in_array($current_user->user_login, $admins)){
        global $submenu;

        unset($submenu['index.php'][10]);   // Painel -> Atualização
        unset($submenu['edit.php?post_type=banner-home'][10]);  // Adicionar mais Banners (sub-menu Banner Home)
        unset($submenu['themes.php'][5]); // Temas
        unset($submenu['themes.php'][6]); // Personalizar
        unset($submenu['themes.php'][7]); // Widgets
    }
}
add_action('admin_head', 'removeMenu');

// Remover o submenu Editor
function my_remove_menu_elements(){
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
}
add_action('admin_init', 'my_remove_menu_elements', 102);


// Desabilita os boxes do painel administrativo
function erikasarti_remove_wordpress_dashboard() {
 
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');              // Agora
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');               // Atividade
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');              // Rascunho rápido
    remove_meta_box('dashboard_primary', 'dashboard', 'side');                  // Novidades do WordPress
 
}
 
add_action('admin_init', 'erikasarti_remove_wordpress_dashboard');


// Remove os itens da barra de menus
function remove_admin_bar_links(){
    global $admins, $current_user;

    if(!in_array($current_user->user_login, $admins)){
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
        $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
        $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
        $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
        $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
        $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
        $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
        $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
        $wp_admin_bar->remove_menu('updates');          // Remove the updates link
        $wp_admin_bar->remove_menu('comments');         // Remove the comments link
        $wp_admin_bar->remove_menu('new-content');      // Remove the content link
        $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
        // $wp_admin_bar->remove_menu('my-account');    // Remove the user details tab
    }
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );


// Mudar o logo do Wordpress da tela de login
function cutom_login_logo(){
echo "<style type=\"text/css\">
    body.login div#login h1 a {
        background-image: url(".get_bloginfo('template_directory')."/img/logo2.png);
        -webkit-background-size: auto;
        background-size: auto;
        margin: 0 0 25px;
        width: 320px;
    }
</style>";
}
add_action( 'login_enqueue_scripts', 'cutom_login_logo' );

// Adiciona um box de widget personalizado na tela inicial
function register_my_dashboard_widget(){
    global $wp_meta_boxes;

    wp_add_dashboard_widget(
        'my_dashboard_widget',
        'Bem-vindo ao Gerenciador do Conexão Inteligente',
        'my_dashboard_widget_display'
    );

    $dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

    $my_widget = array( 'my_dashboard_widget' => $dashboard['my_dashboard_widget'] );
    unset( $dashboard['my_dashboard_widget'] );

    $sorted_dashboard = array_merge( $my_widget, $dashboard );
    $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action( 'wp_dashboard_setup', 'register_my_dashboard_widget' );
/* Remove a aba Opções de Tela
function wpmidia_remove_screen_options(){
    global $admins, $current_user;

    if(in_array($current_user->user_login, $admins)){
        return current_user_can( 'manage_options' );
    }
}
add_filter('screen_options_show_screen', 'wpmidia_remove_screen_options');
*/

// Remove a aba Ajuda
function hide_help(){
    global $admins, $current_user;

    if(!in_array($current_user->user_login, $admins)){
        echo '<style type="text/css">
                #contextual-help-link-wrap { display: none !important; }
        </style>';
    }
}
add_action('admin_head', 'hide_help');

// Muda o rodapé  
function wpmidia_change_footer_admin () {
    echo "Desenvolvido por <a href='http://www.agenciamobidick.com.br' target='_blank'>Agência Mobidick</a>";
} 
add_filter('admin_footer_text', 'wpmidia_change_footer_admin');