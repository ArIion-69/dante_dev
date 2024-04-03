<?php
add_theme_support('title-tag');


add_action('wp_enqueue_scripts', 'style_theme');

function style_theme()
{
	wp_enqueue_style('style_swiper', get_template_directory_uri() . '/assets/css/swiper.css');


	wp_enqueue_style('style_select', get_template_directory_uri() . '/assets/css/select2.min.css');


	wp_enqueue_style('style_main', get_template_directory_uri() . '/assets/css/styles.css');
	wp_enqueue_style('hero_style', get_template_directory_uri() . '/assets/css/hero.css');
	wp_enqueue_style('menu_style', get_template_directory_uri() . '/assets/css/menu.css');

	if (is_page([2257, 23])) {
		wp_enqueue_style('fancy-box', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css');
	}

	wp_enqueue_style('style', get_stylesheet_uri());
}



add_action('wp_footer', 'script_theme');

function script_theme()
{
	// wp_enqueue_script('jquery');

	wp_register_script('filter', get_template_directory_uri() . '/assets/js/filter.js', array('jquery'), time(), true);

	wp_localize_script('filter', 'true_obj', array('ajaxurl' => admin_url('admin-ajax.php')));

	wp_enqueue_script('filter');

	wp_enqueue_script('script_swiper',  get_template_directory_uri() . '/assets/js/swiper.min.js');

	wp_enqueue_script('script_select',  get_template_directory_uri() . '/assets/js/select2.min.js');

	if (is_page([2257, 23])) {
		wp_enqueue_script('fancy-script',  'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js');
	}

	wp_enqueue_script('script_custom-js',  get_template_directory_uri() . '/assets/js/custom.js');
}




add_action('after_setup_theme', 'theme_register_nav_menu');

function theme_register_nav_menu()
{
	register_nav_menu('main', 'Menu Main');
	register_nav_menu('tablet', 'Menu Tablet');
}

add_theme_support('post-thumbnails', array('post', 'page'));
add_post_type_support('page', 'excerpt');
add_post_type_support('post', 'excerpt');


add_action('wp_ajax_filterfilter', 'ajax_posts_filter');
add_action('wp_ajax_nopriv_filterfilter', 'ajax_posts_filter');
function ajax_posts_filter()
{

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => -1,
	);

	if (!empty($_POST['category']) && $_POST['category']) {
		$args['cat'] = $_POST['category'];
	}

	if (!empty($_POST['doctor']) && $_POST['doctor']) {
		$args['meta_value'] = $_POST['doctor'];
	}



	$query = new WP_Query($args);
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
?>

			<div class="d_articles-item">
				<a href="<?php the_permalink(); ?>" class="d_articles-item-img">
					<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo get_field('post_doctor')->post_title; ?>">
				</a>
				<div class="d_articles-item-author">
					<div class="d_articles-item-author-photo" style="background-image: url(<?php the_field('doctor_photo', get_field('post_doctor')); ?>)"></div>
					<a href="<?php the_permalink(get_field('post_doctor')); ?>"><?php echo get_field('post_doctor')->post_title; ?></a>
				</div>
				<a class="d_articles-item-title" href="<?php the_permalink(); ?>">
					<h3>
						<?php
						the_title();
						$cats = get_the_category(get_the_ID());
						?>
					</h3>
				</a>
				<div class="d_tags">
					<a href="<?php the_permalink(); ?>" class="d_tag d_tag-filled"><?= $cats[0]->name; ?></a>
					<div class="d_tag"><i class="icon icon-time"></i> <?php the_date(); ?></div>
					<div class="d_tag"><i class="icon icon-views"></i> <?php the_field('view_counter'); ?></div>
				</div>
			</div>

<?php }
	} else {
		echo ("Ничего не найдено");
	}
	wp_reset_postdata();

	die();
}



function register_post_types()
{
	register_post_type('doctor', [
		'label'  => null,
		'labels' => [
			'name'               => 'Врачи', // основное название для типа записи
			'singular_name'      => 'Врач', // название для одной записи этого типа
			'add_new'            => 'Добавить Врача', // для добавления новой записи
			'add_new_item'       => 'Добавление Врача', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Врача', // для редактирования типа записи
			'new_item'           => 'Новый Врач', // текст новой записи
			'view_item'          => 'Смотреть Врача', // для просмотра записи этого типа.
			'search_items'       => 'Искать Врача', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Врачи', // название меню
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-plus',
		'hierarchical'        => false,
		'supports'            => ['title'], //'trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);

	register_post_type('review', [
		'label'  => null,
		'labels' => [
			'name'               => 'Отзывы', // основное название для типа записи
			'singular_name'      => 'Отзыв', // название для одной записи этого типа
			'add_new'            => 'Добавить Отзыв', // для добавления новой записи
			'add_new_item'       => 'Добавление Отзыва', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Отзыва', // для редактирования типа записи
			'new_item'           => 'Новый Отзыв', // текст новой записи
			'view_item'          => 'Смотреть Отзыв', // для просмотра записи этого типа.
			'search_items'       => 'Искать Отзыв', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Отзывы', // название меню
		],
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-comments',
		'hierarchical'        => false,
		'supports'            => ['title'], //'trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	]);
}

add_action('init', 'register_post_types');





//add class to yoast breadcrumb link
add_filter('wpseo_breadcrumb_single_link', 'change_breadcrumb_link_class');
function change_breadcrumb_link_class($link)
{
	return str_replace('<a', '<a class="d_service-text"', $link);
}


// REMOVE COMMENTS

// Removes from admin menu
add_action('admin_menu', 'my_remove_admin_menus');
function my_remove_admin_menus()
{
	remove_menu_page('edit-comments.php');
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support()
{
	remove_post_type_support('post', 'comments');
	remove_post_type_support('page', 'comments');
}
// Removes from admin bar
function mytheme_admin_bar_render()
{
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');




// SEARCH

add_filter('get_search_form', 'my_search_form');
function my_search_form($form)
{

	$form = '
	<form role="search" method="get" id="searchform" class="searchform" action="/">
		<input type="text" value="" id="searchinput" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="Поиск" />
	</form>';

	return $form;
}

function tg_include_custom_post_types_in_search_results($query)
{
	if ($query->is_main_query() && $query->is_search() && !is_admin()) {
		$query->set('post_type', array('post', 'doctor', 'page'));
	}
}
add_action('pre_get_posts', 'tg_include_custom_post_types_in_search_results');





function true_register_wp_sidebars()
{

	/* В боковой колонке - первый сайдбар */
	register_sidebar(
		array(
			'id' => 'true_side', // уникальный id
			'name' => 'Акции', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div class="d_side-element d_additional-info additional_desktop"><div id="sidebar-sale" class="d_side-element-text"><div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div></div></div>',
			'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h3>'
		)
	);
}

add_action('widgets_init', 'true_register_wp_sidebars');


function action_price_wp_sidebars()
{

	/* В боковой колонке - первый сайдбар */
	register_sidebar(
		array(
			'id' => 'price_side', // уникальный id
			'name' => 'Акции на странице цен', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h3>'
		)
	);
}

add_action('widgets_init', 'action_price_wp_sidebars');



add_action('init', function () {
	pll_register_string('footer-license', 'Стоматологическая клиника D.Ante <br> Лицензия №****** от **.**.2020');
	pll_register_string('footer-phone', 'Чтобы узнать больше об услугах или записаться на прием, позвоните по одному из номеров');
	pll_register_string('footer-text-1', 'или');
	pll_register_string('footer-text-2', 'Запишитесь на прием онлайн');
	pll_register_string('footer-text-3', 'Клиника в социальных сетях');
	pll_register_string('footer-text-adr', 'Адрес стоматологии D.ANTE <br> на Олимпийской');
	pll_register_string('footer-text-adr-2', 'г. Киев, ул. Антоновича (Горького) 47, <br> 2-й этаж (код парадного "68" — нажать одновременно)');
	pll_register_string('filter-text-1', 'Фильтр');
	pll_register_string('filter-text-2', 'Все темы');
	pll_register_string('filter-text-3', 'Все авторы');
	pll_register_string('filter-text-4', 'Фильтровать');
	pll_register_string('page-text-1', 'Содержание статьи');
	pll_register_string('page-text-2', 'Показать все содержание');
	pll_register_string('page-text-3', '❗️Пожизненная гарантия на все импланты, установленные в D.Ante!');
	pll_register_string('page-text-4', ': спросите стоматолога');
	pll_register_string('page-text-5', 'Если вы не нашли нужной информации в этом материале, задайте свой вопрос — и наши стоматологи ответят на него, администратор перезвонит и озвучит ответ.  Обычно отвечаем в течение 24 часов.');
	pll_register_string('page-text-6', 'И «нет» — ваш вопрос не будет виден другим посетителям сайта.');
	pll_register_string('page-about-text-1', 'Наши фотографии');
	pll_register_string('all-doctor-text-1', 'Трудимся, чтобы ваши зубы не болели');
	pll_register_string('all-doctor-text-2', 'Специализация:');
	pll_register_string('all-doctor-text-3', 'Есть вопросы по процедурам и вы хотите получить консультацию одного из наших врачей?');
	pll_register_string('all-doctor-text-4', 'Нажмите, чтобы позвонить <br> + 38 (068) 287-77-07');
	pll_register_string('all-doctor-text-5', 'Отвечаем на звонки с 09:00 до 21:00');
	pll_register_string('doctor-page-text-1', 'Образование');
	pll_register_string('doctor-page-text-2', 'Сертификаты');
	pll_register_string('doctor-page-text-3', 'Спросите стоматолога');
	pll_register_string('doctor-page-text-4', 'Последние статьи');
	pll_register_string('doctor-page-text-5', 'доктора');
	pll_register_string('doctor-page-text-6', 'в блоге D.Ante');
	pll_register_string('doctor-page-text-7', 'Читать статью полностью >');
	pll_register_string('page-ins-text-1', 'Даже если мы не работаем напрямую с вашей страховой, вы можете получить компенсацию лечения');
	pll_register_string('page-ins-text-2', 'Запишитесь на прием');
	pll_register_string('page-service-text-1', 'Еще услуги по сфере');
	pll_register_string('page-service-text-2', ': <br>спросите стоматолога');
	pll_register_string('page-service-text-3', 'Если вы нашли нужной информации в этом материале, задайте свой вопрос — и наши стоматологи ответят на него, администратор перезвонит и озвучит ответ. Обычно отвечаем в течение 24 часов.');
	pll_register_string('page-service-text-4', 'Последние статьи<br> с тегом');
	pll_register_string('page-service-text-5', 'в блоге D.Ante');
	pll_register_string('single-text-1', 'Автор этой статьи');
	pll_register_string('single-text-2', 'Персональная страница доктора');
	pll_register_string('single-text-3', 'Все статьи доктора');
	pll_register_string('sale-text-1', 'Записаться на прием');
	pll_register_string('content-doctor-text-1', 'Врачи D.Ante');
	pll_register_string('service-text', 'Услуги стоматологии');
	pll_register_string('reviews-text-1', 'Отзывы о клинике<br> и врачах');
	pll_register_string('reviews-text-2', 'Больше отзывов —');
	pll_register_string('reviews-text-3', 'на картах Google');
	pll_register_string('sale-text-1', 'Акции стоматологии');
	pll_register_string('sale-text-2', 'Все акции действуют до');
	pll_register_string('sale-text-3', 'Ими могут воспользоваться и новые, и постоянные пациенты клиники');
	pll_register_string('article-text-1', 'Свежие статьи наших врачей');
	pll_register_string('menu-item-block-text-1', 'Запись на прием');
	pll_register_string('menu-item-block-text-2', 'Язык сайта');
	pll_register_string('menu-item-block-text-3', 'Показать номера');
	pll_register_string('menu-item-block-text-4', 'Показать номер');
	pll_register_string('menu-item-block-text-5', 'Изменить язык сайта:');
	pll_register_string('menu-item-block-text-6', 'Социальные сети:');
	pll_register_string('menu-item-block-text-7', '<strong>Адрес:</strong><br> Киев, ул. Антоновича 47<br> метро «Олимпийская»<br>');
	pll_register_string('menu-item-block-text-8', 'Контактные телефоны:');
	pll_register_string('menu-item-block-text-9', '<strong>Режим работы клиники:</strong><br>Пон-Сб: с 9:00 до 21:00<br> Вс: с 9:00 до 15:00<br>');
	pll_register_string('menu-item-block-text-10', '<strong>Стоматологическая клиника D.Ante.</strong><br> Поймем. Объясним. Сделаем.');
	pll_register_string('menu-item-block-text-11', 'Рейтинг клиники в Google');
	pll_register_string('modal-text-1', 'Запишитесь на прием<br>в удобный для вас день');
	pll_register_string('modal-text-2', 'Подробности акции');
	pll_register_string('modal-text-3', 'Оставьте свой номер телефона. Мы перезвоним, чтобы рассказать подробности об акции:');
	pll_register_string('sub-text-1', 'Подпишитесь на рассылку, чтобы не пропускать');
	pll_register_string('sub-text-2', 'материалы от врачей D.Ante');
	pll_register_string('sub-text-3', 'Мы не передаем ваши данные третьим лицам и не присылаем больше одного письма в месяц');
	pll_register_string('sub-text-4', '#полезностоматологические');
	pll_register_string('text-title-action', 'Акция');
	pll_register_string('all-action', 'Смотреть все акции');
	pll_register_string('all-article-on-home', 'Все статьи');
	pll_register_string('n-doc-str-1', 'опыт работы');
	pll_register_string('n-doc-str-2', 'лет');
	pll_register_string('n-doc-str-3', 'Отзывы о работе доктора');
	pll_register_string('n-doc-str-4', 'Статьи доктора');
	pll_register_string('n-doc-str-5', 'Видео доктора');
	pll_register_string('n-doc-str-6', 'Перейти на Youtube-канал с видео доктора');
	pll_register_string('n-doc-str-7', 'Запишитесь на прием <br> в удобный для вас день');
	pll_register_string('n-doc-str-8', 'Мы перезвоним, чтобы уточнить время приема');
	pll_register_string('n-doc-str-9', 'Перейти ко всем статьям доктора');
	pll_register_string('table-1', 'Лучшая версия твоей улыбки');
	pll_register_string('table-2', 'Стоматологическая клиника D.Ante.');
	pll_register_string('table-3', 'Режим работы клиники:');
	pll_register_string('table-4', 'Лучшая версия твоей улыбки');
	pll_register_string('table-5', '<br>Пон-Сб: с 9:00 до 21:00<br> Вс: с 9:00 до 15:00<br>');
	pll_register_string('table-6', 'Контактные телефоны:');
	pll_register_string('table-7', '<strong>Адрес:</strong><br> Киев, ул. Антоновича 47<br> метро «Олимпийская»<br>');
	pll_register_string('sign', '✍️ Контент цієї сторінки створено стоматологами D.Ante');
	pll_register_string('menu-1', 'Стоматологічна клініка <br> Краща версія твоєї усмішки');
	pll_register_string('menu-2', 'м. Київ, вул. Антоновича, 47');
	pll_register_string('menu-3', '«Олімпійська»');
	pll_register_string('menu-4', 'Рейтинг клініки в Google');
	pll_register_string('menu-5', 'Змінити мову');
	pll_register_string('menu-6', 'Запис на прийом');
	pll_register_string('menu-7', 'Рейтинг в Google');
	pll_register_string('menu-8', 'м. Київ, <br> вул. Антоновича 47 (м. «Олімпійська»)');
	pll_register_string('menu-9', 'Відкрити адресу в Google-мапах');
	pll_register_string('menu-10', 'Стоматологічна клініка D.Ante, Київ — <br> Краща версія твоєї усмішки! (c) 2017-2024');


	// pll_register_string('', '');

});


add_shortcode('faq', 'faq_title');

function faq_title($atts)
{
	$atts = shortcode_atts(array(
		'content'   => 'Вопрос',
	), $atts);

	return '<h4 class="faq-title"> ' . $atts['content'] . ' </h4>';
}

add_filter('jpeg_quality', 'cody_remove_image_compression');
function cody_remove_image_compression($quality)
{
	return 100;
}

//поиск только по заголовкам записей start
function wph_search_by_title($search, &$wp_query)
{
	global $wpdb;
	if (empty($search)) return $search;

	$q = $wp_query->query_vars;
	$n = !empty($q['exact']) ? '' : '%';
	$search = $searchand = '';

	foreach ((array) $q['search_terms'] as $term) {
		$term = esc_sql(like_escape($term));
		$search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
		$searchand = ' AND ';
	}

	if (!empty($search)) {
		$search = " AND ({$search}) ";
		if (!is_user_logged_in())
			$search .= " AND ($wpdb->posts.post_password = '') ";
	}
	return $search;
}
add_filter('posts_search', 'wph_search_by_title', 500, 2);
//поиск только по заголовкам записей end


//This code removes the noreferrer value from the rel attribute of your new or updated links
function removing_noreferrer_link_rel($rel_values)
{
	return 'noopener noreferrer';
}
add_filter('wp_targeted_link_rel', 'removing_noreferrer_link_rel', 999);



//закрытие в nofollow всех внешних ссылок start
function wph_nofollow_external_links($content)
{
	$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>";
	if (preg_match_all("/$regexp/siU", $content, $matches, PREG_SET_ORDER)) {
		if (!empty($matches)) {
			$srcUrl = get_bloginfo('url');
			for ($i = 0; $i < count($matches); $i++) {
				$tag = $matches[$i][0];
				$tag2 = $matches[$i][0];
				$url = $matches[$i][0];
				$noFollow = '';
				$pattern = '/rel\s*=\s*"\s*[n|d]ofollow\s*"/';
				preg_match($pattern, $tag2, $match, PREG_OFFSET_CAPTURE);
				if (count($match) < 1)
					$noFollow .= ' rel="noopener noreferrer" ';
				$pos = strpos($url, $srcUrl);
				if ($pos === false) {
					$tag = rtrim($tag, '>');
					$tag .= $noFollow . '>';
					$content = str_replace($tag2, $tag, $content);
				}
			}
		}
	}
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}
add_filter('the_content', 'wph_nofollow_external_links');
//закрытие в nofollow всех внешних ссылок end


add_action('wp_head', 'wp_resource_hints', 2);




// Google rating
function update_google_maps_rating() {
    $api_key = 'AIzaSyDdmiRibI1i3Hit5TZTpzI8FLkBYT0fko0';
    $company_place_id = 'ChIJMeYYweLO1EARImIBKVo6Dmw';
    $api_url = "https://maps.googleapis.com/maps/api/place/details/json?place_id={$company_place_id}&fields=rating&key={$api_key}";

    $response = file_get_contents($api_url);

    if (is_wp_error($response)) {
        error_log('Google Maps API Error: ' . $response->get_error_message());
        return;
    }

    $data = json_decode($response);

    if (isset($data->result->rating)) {
        $google_maps_rating = $data->result->rating;
        update_option('google_rating_new', $google_maps_rating);
        update_option('last_google_maps_update', time());
    }
}

function display_google_maps_rating_shortcode() {

    $last_update_time = get_option('last_google_maps_update', 0);

    if (time() - $last_update_time > 24 * 60 * 60) {
        update_google_maps_rating();
    }

    $google_maps_rating = get_option('google_rating_new');
    return esc_html($google_maps_rating);
}
add_shortcode('google_maps_rating', 'display_google_maps_rating_shortcode');


