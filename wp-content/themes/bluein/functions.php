<?php
add_theme_support('post-thumbnails');
add_theme_support('menus');
// Désactive le nouvel editeur Wordpress
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

function add_new_styles_scripts(){
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/bootstrap/dist/css/bootstrap.min.css' );
    wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Raleway&display=swap');
    wp_enqueue_script('jquery-3.3.1', get_stylesheet_directory_uri().'/js/jquery-3.3.1.min.js');

    }
  add_action('wp_enqueue_scripts','add_new_styles_scripts');
    //----------------------------------------------------

    // 	CUSTOM POST TYPE 'articles custom'

  	add_action('init', 'CPT_articles');
  	function CPT_articles() {
  		register_post_type(
  			'articles', array(
  				'label' => 'Articles personnalisés',
  				'labels' => array(
  					'name' => 'Articles personnalisés',
  					'singular_name' => 'Article personnalisé',
  					'menu_name' => 'Articles personnalisés',
  					'name_admin_bar' => 'Articles personnalisés',
  					'add_new' => 'Ajouter',
  					'add_new_item' => 'Ajouter un article personnalisé',
  					'new_item' => 'Nouveau article personnalisé',
  					'edit_item' => "Editer l'article personnalisé",
  					'view_item' => "Voir l'article personnalisé",
  					'all_items' => 'Voir toutes les articles personnalisés',
  					'search_items' => "Rechercher parmi les articles personnalisés",
  					'not_found' => "Pas d'article personnalisé trouvé",
  					'not_found_in_trash' => "Pas d'article personnalisé dans la corbeille"
  				),
  				'public' => true,
  				'show_in_menu' => true,
  				'query_var' => true,
  				'rewrite' => array(
  					'slug' => 'articles'
  				),
  				'capability_type' => 'post',
  				'has_archive' => true,
  				'hierarchical' => false,
  				'menu_position' => 5,
  				'menu_icon' => 'dashicons-editor-video',
  				'supports' => array(
  					'title',
  					'editor',
  					'thumbnail',
  					'excerpt',
  					'author',
  					'comments'
  				)
  			)
  		);
  	}


            // Metabox pour les infos complémentaires des événements
            add_action('add_meta_boxes', 'add_metabox_articles');
            function add_metabox_articles() {
              add_meta_box('id_metabox_articles', 'Infos complémentaires',  'MB_articles', 'articles', 'side');
            }

            function MB_articles($post) {
              $date_evenement = get_post_meta($post->ID, '$date_evenement', true);
              $nom_evenement = get_post_meta($post->ID, 'nom_evenement', true);
              $groupe = get_post_meta($post->ID, 'groupe', true);
              $fichier= get_post_meta($post->ID, 'fichier', true);
              ?>

              <p>
                <label for="nom_evenement">nom de l'évènement associé à l'article</label><br />
                <input id="nom_evenement" type="text" name="nom_evenement" value="<?php echo $nom_evenement; ?>" placeholder="Franc'off" />
              </p>

              <p>
                <label for="date_evenement">date de l'évènement associé à l'article</label><br />
                <input id="date_evenement" type="text" name="date_evenement" value="<?php echo $date_evenement; ?>" placeholder="16h00" />
              </p>
              <p>
                <label for="fichier">pdf ou image du dossier c:/pdf (windows)  </label><br />
                <input id="fichier" type="file" name="fichier" value="<?php echo $fichier; ?>" placeholder="fichier" />
              </p>
              <p>
                <label for="groupe">Ajouter des membres du groupe  </label><br />
                <input id="groupe" type="text" name="groupe" value="<?php echo $groupe; ?>" placeholder="Julien,Jean,Yves" />
              </p>
              <?php
            }

            add_action('save_post','save_metabox_articles');

            function save_metabox_articles($post_id) {
              if(isset($_POST['date_evenement'])) {
                update_post_meta($post_id,'date_evenement',$_POST['date_evenement']);
              }
              if(isset($_POST['nom_evenement'])) {
                update_post_meta($post_id,'nom_evenement',$_POST['nom_evenement']);
              }
              if(isset($_POST['groupe'])) {
                update_post_meta($post_id,'groupe',$_POST['groupe']);
              }
              if(isset($_POST['fichier'])) {


        //Met le chemin dans la DB
          update_post_meta($post_id,'fichier',$_POST['fichier']);
        //upload le fichier du répertoire client c:/musique sur le serveur dans le dossier wp-content\uploads\2019\06 de wordpress
        $fichier= $_POST['fichier'];

        $file = "C:/pdf/".$fichier;
        $filename = basename($file);
        $upload_file = wp_upload_bits($filename, null, file_get_contents($file));
        if (!$upload_file['error']) {
          $wp_filetype = wp_check_filetype($filename, null );
          $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_parent' => $parent_post_id,
            'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
            'post_content' => '',
            'post_status' => 'inherit'
          );
          $attachment_id = wp_insert_attachment( $attachment, $upload_file['file'], $parent_post_id );
          if (!is_wp_error($attachment_id)) {
            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            $attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
            wp_update_attachment_metadata( $attachment_id,  $attachment_data );
          }
        }


        /*

        global $current_user;
        get_currentuserinfo();
        $upload_dir = wp_upload_dir();
        $user_dirname = $upload_dir['basedir'] . '/' . $current_user->user_login;
        if(!file_exists($user_dirname)) wp_mkdir_p($user_dirname);


         */



              }
            }


    //----------------------------------------------------

    // 	CUSTOM POST TYPE 'musiques'
    add_action('init', 'CPT_musiques');
    function CPT_musiques() {
      register_post_type(
        'musiques', array(
          'label' => 'Extraits musicaux',
          'labels' => array(
            'name' => 'Extraits musicaux',
            'singular_name' => 'Extrait musical',
            'menu_name' => 'Extraits musicaux',
            'name_admin_bar' => 'Extraits musicaux',
            'add_new' => 'Ajouter',
            'add_new_item' => 'Ajouter un extrait musical',
            'new_item' => 'Nouveau extrait musical',
            'edit_item' => 'Editer un extrait musical',
            'view_item' => "Voir l'extrait musical",
            'all_items' => 'Voir tous les extraits musicaux',
            'search_items' => 'Rechercher parmi les extraits musicaux',
            'not_found' => "Pas d'extraits musicaux trouvés",
            'not_found_in_trash' => "Pas d'extrait musical dans la corbeille"
          ),
          'public' => true,
          'show_in_menu' => true,
          'query_var' => true,
          'rewrite' => array(
            'slug' => 'musiques'
          ),
          'capability_type' => 'post',
          'has_archive' => true,
          'hierarchical' => false,
          'menu_position' => 5,
          'menu_icon' => 'dashicons-editor-video',
          'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'author',
            'comments'
          )
        )
      );
    }

    // Metabox pour les infos complémentaires des musiques
    add_action('add_meta_boxes', 'add_metabox_musiques');
    function add_metabox_musiques() {
      add_meta_box('id_metabox_musiques', 'Infos complémentaires',  'MB_musiques', 'musiques', 'side');
    }

    function MB_musiques($post) {
      $date_de_sortie = get_post_meta($post->ID, 'date_de_sortie', true);
      $duree = get_post_meta($post->ID, 'duree', true);
      $album= get_post_meta($post->ID, 'album', true);
      $nom_extraits= get_post_meta($post->ID, 'nom_extraits', true);

      $fichier_musique= get_post_meta($post->ID, 'fichier_musique', true);
      wp_nonce_field('my_unique_action','Sequere_submission');
      ?>
      <p>
        <label for="album">Nom de l'album ou du single</label><br />
        <input id="album" type="text" name="album" value="<?php echo $album; ?>" placeholder="ex : dessiner Liège" />
      </p>

      <p>
        <label for="date_de_sortie">Date de sortie de l'album</label><br />
        <input id="date_de_sortie" type="text" name="date_de_sortie" value="<?php echo $date_de_sortie; ?>" placeholder="JJ/MM/AAAA" />
      </p>
      <p>
        <label for="nom_extraits">Nom de l'extrait musical</label><br />
        <input id="nom_extraits" type="text" name="nom_extraits" value="<?php echo $nom_extraits; ?>" placeholder="ex : dessiner Liège" />
      </p>
      <p>
        <label for="duree">Durée de l'extrait musical</label><br />
        <input id="duree" type="text" name="duree" value="<?php echo $duree; ?>" placeholder="ex : 5 min" />
      </p>
      <p>
        <label for="fichier_musique">Musique à télécharger du dossier c:/musiques (windows) </label><br />
        <input id="fichier_musique" type="file" name="fichier_musique" value="<?php echo $fichier_musique2; ?>" placeholder="fichier" />
      </p>

      <?php
    }

    add_action('save_post','save_metabox_musiques');

    function save_metabox_musiques($post_id) {
      if(isset($_POST['date_de_sortie'])) {
        update_post_meta($post_id,'date_de_sortie',$_POST['date_de_sortie']);
      }

      if(isset($_POST['duree'])) {
        update_post_meta($post_id,'duree',$_POST['duree']);
      }
      if(isset($_POST['album'])) {
        update_post_meta($post_id,'album',$_POST['album']);
      }
      if(isset($_POST['nom_extraits'])) {
        update_post_meta($post_id,'nom_extraits',$_POST['nom_extraits']);
      }




      if(isset($_POST['fichier_musique'])) {


//Met le chemin dans la DB
  update_post_meta($post_id,'fichier_musique',$_POST['fichier_musique']);
//upload le fichier du répertoire client c:/musique sur le serveur dans le dossier wp-content\uploads\2019\06 de wordpress
$fichier= $_POST['fichier_musique'];

$file = "C:/musiques/".$fichier;
$filename = basename($file);
$upload_file = wp_upload_bits($filename, null, file_get_contents($file));
if (!$upload_file['error']) {
  $wp_filetype = wp_check_filetype($filename, null );
  $attachment = array(
    'post_mime_type' => $wp_filetype['type'],
    'post_parent' => $parent_post_id,
    'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
    'post_content' => '',
    'post_status' => 'inherit'
  );
  $attachment_id = wp_insert_attachment( $attachment, $upload_file['file'], $parent_post_id );
  if (!is_wp_error($attachment_id)) {
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    $attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
    wp_update_attachment_metadata( $attachment_id,  $attachment_data );
  }
}


/*

global $current_user;
get_currentuserinfo();
$upload_dir = wp_upload_dir();
$user_dirname = $upload_dir['basedir'] . '/' . $current_user->user_login;
if(!file_exists($user_dirname)) wp_mkdir_p($user_dirname);


 */



      }

    }







    // 	CUSTOM POST TYPE 'evenements'
    add_action('init', 'CPT_evenements');
    function CPT_evenements() {
      register_post_type(
        'evenements', array(
          'label' => 'Evénements',
          'labels' => array(
            'name' => 'Evénements',
            'singular_name' => 'Evénement',
            'menu_name' => 'Future événement',
            'name_admin_bar' => 'Future événement',
            'add_new' => 'Ajouter',
            'add_new_item' => 'Ajouter un événement',
            'new_item' => 'Nouveau événement',
            'edit_item' => "Editer l'événement",
            'view_item' => "Voir l' événement'",
            'all_items' => 'Voir tous les événements',
            'search_items' => 'Rechercher parmi les événements',
            'not_found' => "Pas d' événement' trouvé",
            'not_found_in_trash' => "Pas d'événement dans la corbeille"
          ),
          'public' => true,
          'show_in_menu' => true,
          'query_var' => true,
          'rewrite' => array(
            'slug' => 'evenements'
          ),
          'capability_type' => 'post',
          'has_archive' => true,
          'hierarchical' => false,
          'menu_position' => 4,
          'menu_icon' => 'dashicons-tickets-alt',
          'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'author',
            'comments'
          )
        )
      );
    }


        // Metabox pour les infos complémentaires des événements
        add_action('add_meta_boxes', 'add_metabox_evenements');
        function add_metabox_evenements() {
          add_meta_box('id_metabox_evenements', 'Infos complémentaires',  'MB_evenements', 'evenements', 'side');
        }

        function MB_evenements($post) {
          $date_debut = get_post_meta($post->ID, 'date_debut', true);
          $date_fin = get_post_meta($post->ID, 'date_fin', true);
          $participants = get_post_meta($post->ID, 'participants', true);

          $heure_debut = get_post_meta($post->ID, 'heure_debut', true);
          $heure_debut = get_post_meta($post->ID, 'heure_fin', true);
          $description = get_post_meta($post->ID, 'description', true);

          ?>


          <p>
            <label for="date_debut">Date de début de l'évènement</label><br />
            <input id="date_debut" type="text" name="date_debut" value="<?php echo $date_debut; ?>" placeholder="JJ/MM/AAAA" />
          </p>
          <p>
            <label for="heure_debut">Heure du début de l'évènement</label><br />
            <input id="heure_debut" type="text" name="heure_debut" value="<?php echo $heure_debut; ?>" placeholder="16h00" />
          </p>
          <p>
            <label for="date_fin">Date de fin de l'évènement</label><br />
            <input id="date_fin" type="text" name="date_fin" value="<?php echo $date_fin; ?>" placeholder="JJ/MM/AAAA" />
          </p>
          <p>
            <label for="heure_fin">Heure de fin de l'évènement</label><br />
            <input id="heure_fin" type="text" name="heure_fin" value="<?php echo $heure_fin; ?>" placeholder="19h00" />
          </p>
          <p>
            <label for="participants">Artistes</label><br />
            <input id="participants" type="text" name="participants" value="<?php echo $participants; ?>" placeholder="Jean-Marie" />
          </p>
          <p>
            <label for="description">Description</label><br />
            <input id="description" type="text" name="description" value="<?php echo $description; ?>" placeholder="description" />
          </p>
          <?php
        }

        add_action('save_post','save_metabox_evenements');

        function save_metabox_evenements($post_id) {
          if(isset($_POST['date_debut'])) {
            update_post_meta($post_id,'date_debut',$_POST['date_debut']);
          }
          if(isset($_POST['heure_debut'])) {
            update_post_meta($post_id,'heure_debut',$_POST['heure_debut']);
          }
          if(isset($_POST['date_fin'])) {
            update_post_meta($post_id,'date_fin',$_POST['date_fin']);
          }
          if(isset($_POST['heure_fin'])) {
            update_post_meta($post_id,'heure_fin',$_POST['heure_fin']);
          }
          if(isset($_POST['participants'])) {
            update_post_meta($post_id,'participants',$_POST['participants']);
          }

          if(isset($_POST['description'])) {
            update_post_meta($post_id,'description',$_POST['description']);
          }
        }





    // Taxonomie EVENEMENTS
  	add_action('init', 'CAT_evenements');

  	function CAT_evenements() {
  		register_taxonomy(
  			'evenementstype', array('evenements','articles'), array(
  				'label' => "Type d'événements",
  				'labels' => array(
  					'name' => "Types d'événements",
  					'singular_name' => "Type d'événement",
  					'search_items' => "Rechercher parmi les types d'événements",
  					'all_items' => "Tous les types d'événements",
  					'edit_item' => "Editer le type d'événement",
  					'update_item' => "Mettre à jour le type d'événement",
  					'add_new_item' => "Ajouter un nouveau type d'événement",
  					'new_item_name' => "Nom du nouveau type d'événement",
  					'menu_name' => "types d'événements"
  				),
  				'hierarchical' => true,
  				'show_admin_column' => true,
  				'query_var' => true,
  				'rewrite' => array(
  					'slug' => 'evenementstype'
  				)
  			)
  		);
  	}

    // Taxonomie musiques
  	add_action('init', 'CAT_musiques');

  	function CAT_musiques() {
  		register_taxonomy(
  			'musiquesstyles', array('musiques'), array(
  				'label' => "Styles de musiques",
  				'labels' => array(
  					'name' => "Styles de musiques",
  					'singular_name' => "Style de musique",
  					'search_items' => "Rechercher parmi les styles de musiques",
  					'all_items' => "Tous les styles de musiques",
  					'edit_item' => "Editer le style de musique",
  					'update_item' => "Mettre à jour le style de musique",
  					'add_new_item' => "Ajouter un style de musique",
  					'new_item_name' => "Nom du nouveau style de musique",
  					'menu_name' => "styles de musiques"
  				),
  				'hierarchical' => true,
  				'show_admin_column' => true,
  				'query_var' => true,
  				'rewrite' => array(
  					'slug' => 'musiquesstyles'
  				)
  			)
  		);
  	}

    // Taxonomie musiques
    add_action('init', 'CAT_album');

    function CAT_album() {
      register_taxonomy(
        'albums', array('musiques'), array(
          'label' => "Nom de l'album",
          'labels' => array(
            'name' => "Nom de l'album",
            'singular_name' => "Nom de l'album",
            'search_items' => "Rechercher parmi le nom d'album",
            'all_items' => "Tous les  noms d'album",
            'edit_item' => "Editer le nom d'album",
            'update_item' => "Mettre à jour le nom d'album",
            'add_new_item' => "Ajouter un  nom d'album",
            'new_item_name' => "Nom du nouveau album",
            'menu_name' => "nom d'album"
          ),
          'hierarchical' => true,
          'show_admin_column' => true,
          'query_var' => true,
          'rewrite' => array(
            'slug' => 'albums'
          )
        )
      );
    }
    /**
     * Example of how you can add your own custom media
     * button in WordPress editor
     */


  	// Taxonomie TAG_extraits
  	add_action('init', 'TAG_extraits');

  	function TAG_extraits() {
  		register_taxonomy(
  			'extraits', array('musiques'), array(
  				'label' => "Thème de l'extrait musical",
  				'labels' => array(
  					'name' => 'Thèmes des extraits musicaux',
  					'singular_name' => "Thème de l'extrait musical",
  					'search_items' => "Rechercher parmi les thèmes d'extraits musicaux",
  					'all_items' => "Tous les thèmes d'extraits musicaux",
  					'edit_item' => "Editer le thème de l'extrait musical",
  					'update_item' => "Mettre à jour le thème de l'extrait musical",
  					'add_new_item' => "Ajouter un nouveau thème d'extrait musical",
  					'new_item_name' => "Nom du nouveau thème d'extrait musical",
  					'menu_name' => "Nom des thèmes des extraits musicaux"
  				),
  				'hierarchical' => false,
  				'show_admin_column' => true,
  				'query_var' => true,
  				'rewrite' => array(
  					'slug' => 'extraits'
  				)
  			)
  		);
  	}

    //sidebar
    function clea_parcours_p_register_sidebars() {

  	register_sidebar(

  		array(
  			'id' => 'before-front-page',
  			'name' => __( "Avant le contenu de page d'accueil" ),
  			'description' => __( 'Pour insérer un contenu juste sous le menu' ),
  			'before_widget' => '<div id="%1$s" class="widget %2$s">',
  			'after_widget' => '</div>',
  			'before_title' => '<h3 class="widget-title">',
  			'after_title' => '</h3>'
  		)
  	);

  }
  add_action( 'widgets_init', 'media' );



  function media() {

  register_sidebar(

    array(
      'id' => 'media',
      'name' => __( "media" ),
      'description' => __( 'Pour insérer un contenu juste sous le menu' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>'
    )
  );

}


add_action( 'widgets_init', 'calendrier' );



function calendrier() {

register_sidebar(

  array(
    'id' => 'calendrier',
    'name' => __( "calendrier" ),
    'description' => __( 'Pour insérer un contenu juste sous le menu' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
  )
);

}
add_action( 'widgets_init', 'clea_parcours_p_register_sidebars' );

  register_nav_menu( 'menu-article', 'Menu article' );
