<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'blueinfin' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'nvL8|?/(iz#:oYWQy7WzZGn`BtRE_l{.lxTrXoVc0mqGQRH?*I1<Bw$3`xY.5$j%' );
define( 'SECURE_AUTH_KEY',  '|SICSk!hS</mJgb9fF[P]smUXg#u^%VqMQL#tA#>pRFsYHlvA}`7rLRr9G/Nz_G|' );
define( 'LOGGED_IN_KEY',    '/|Z%mJl)aV(U;;[>UDhO~0f=&r$y>tLpgt^%qg_I;-pPW*9dxod>+D^)o:80AZg&' );
define( 'NONCE_KEY',        ';o,*<OEhG}1~VJ3y!9yvlBFp<ViQuMyx{H@n{!^`(lbrJ&HQ5{Y5QB5MbCh8,-E+' );
define( 'AUTH_SALT',        ' 7zs]k <?MD.<at:]_zL7opKWa#JCUGL9TucyCh<w,O(+!w<*-?Zye^&HN$g.j3`' );
define( 'SECURE_AUTH_SALT', 'wA*P?M,#mEg>v2N-L;1kw#OUQ=ufjrAyqg)Jdtw J8XUDsvzdIKSqhB@bHN0M|*c' );
define( 'LOGGED_IN_SALT',   '$+dmd|uw*@Os@VHk2KwR_:68syRSH!_3_1},f9{L^-viB:s:<jg_61<7=h*dldO~' );
define( 'NONCE_SALT',       '{y4F+^0*Igb#~.IbV-rH GA[DAqdZ<v)h4s~Yl}.YZ@_Tl@{1.JX]MwLdl,hp:E4' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'bluein_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
