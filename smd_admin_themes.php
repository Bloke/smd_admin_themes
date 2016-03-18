<?php

// This is a PLUGIN TEMPLATE for Textpattern CMS.

// Copy this file to a new name like abc_myplugin.php.  Edit the code, then
// run this file at the command line to produce a plugin for distribution:
// $ php abc_myplugin.php > abc_myplugin-0.1.txt

// Plugin name is optional.  If unset, it will be extracted from the current
// file name. Plugin names should start with a three letter prefix which is
// unique and reserved for each plugin author ("abc" is just an example).
// Uncomment and edit this line to override:
$plugin['name'] = 'smd_admin_themes';

// Allow raw HTML help, as opposed to Textile.
// 0 = Plugin help is in Textile format, no raw HTML allowed (default).
// 1 = Plugin help is in raw HTML.  Not recommended.
# $plugin['allow_html_help'] = 1;

$plugin['version'] = '0.40';
$plugin['author'] = 'Stef Dawson';
$plugin['author_uri'] = 'http://stefdawson.com/';
$plugin['description'] = 'Admin-side theme manager and editor';

// Plugin load order:
// The default value of 5 would fit most plugins, while for instance comment
// spam evaluators or URL redirectors would probably want to run earlier
// (1...4) to prepare the environment for everything else that follows.
// Values 6...9 should be considered for plugins which would work late.
// This order is user-overrideable.
$plugin['order'] = '5';

// Plugin 'type' defines where the plugin is loaded
// 0 = public              : only on the public side of the website (default)
// 1 = public+admin        : on both the public and admin side
// 2 = library             : only when include_plugin() or require_plugin() is called
// 3 = admin               : only on the admin side (no AJAX)
// 4 = admin+ajax          : only on the admin side (AJAX supported)
// 5 = public+admin+ajax   : on both the public and admin side (AJAX supported)
$plugin['type'] = '4';

// Plugin "flags" signal the presence of optional capabilities to the core plugin loader.
// Use an appropriately OR-ed combination of these flags.
// The four high-order bits 0xf000 are available for this plugin's private use
if (!defined('PLUGIN_HAS_PREFS')) define('PLUGIN_HAS_PREFS', 0x0001); // This plugin wants to receive "plugin_prefs.{$plugin['name']}" events
if (!defined('PLUGIN_LIFECYCLE_NOTIFY')) define('PLUGIN_LIFECYCLE_NOTIFY', 0x0002); // This plugin wants to receive "plugin_lifecycle.{$plugin['name']}" events

$plugin['flags'] = '3';

// Plugin 'textpack' is optional. It provides i18n strings to be used in conjunction with gTxt().
// Syntax:
// ## arbitrary comment
// #@event
// #@language ISO-LANGUAGE-CODE
// abc_string_name => Localized String

$plugin['textpack'] = <<<EOT
#@smd_at
smd_at_actions => Actions
smd_at_allowed_skins => Allowed themes
smd_at_all_themes => All themes
smd_at_apply_skin => Apply this theme
smd_at_avail_title => Available themes
smd_at_based_on => (based on {skin})
smd_at_by => by
smd_at_case_sort => Case-sensitive theme list
smd_at_clear => none
smd_at_clone => Base
smd_at_confirm => Go
smd_at_core_theme => Cannot delete {skin}: core theme
smd_at_core_theme_file => Cannot delete files from {skin}: core theme
smd_at_crush_format => Format
smd_at_crush_type => Export compression type
smd_at_css => Stylesheet
smd_at_c_bzip2 => BZip
smd_at_c_gzip => GZip
smd_at_c_tar => Tar
smd_at_c_zip => Zip
smd_at_delete_confirm => Really delete theme {skin}?
smd_at_delete_failed => Delete failed. Try removing it manually
smd_at_edit_lbl => Edit {theme} theme
smd_at_empty_info => You should choose a file first
smd_at_export => Export
smd_at_filename_format => Filename format
smd_at_files_deleted => Deleted: {list}. Note that empty folders may need removing manually
smd_at_file_name => File name
smd_at_file_not_deleted => File {name} <strong>not</strong> deleted
smd_at_file_saved => File {name} saved
smd_at_find_theme => Browse themes
smd_at_folder => ... to folder
smd_at_folders => Folder
smd_at_folder_deleted => Folder {name} deleted
smd_at_folder_name => Folder
smd_at_global_skin => Default theme
smd_at_help_link => <a href="{link}">Help</a>
smd_at_image_files => Image
smd_at_import_failed => Installation failed :-( Check the archive structure
smd_at_import_ok => Installation successful.
smd_at_install_skin => Install theme
smd_at_is_global => (default)
smd_at_js => Javascript
smd_at_layout => Layout method
smd_at_layout_grid => Grid
smd_at_layout_list => List
smd_at_list_title => Installed themes
smd_at_manage_lbl => Theme manager
smd_at_max_theme_size => Max theme file size (bytes)
smd_at_mkdir_failed => Cannot create directory for file {name}. Try manually creating it.
smd_at_name_empty => You should give your theme a name
smd_at_new => Create new theme
smd_at_new_cloneskin => Name of copy
smd_at_new_file => New file
smd_at_new_skin => Theme name
smd_at_one_theme => One theme
smd_at_other => Other files
smd_at_other_files => Others
smd_at_per_group => per priv level
smd_at_per_site => for all
smd_at_per_user => per user
smd_at_php => PHP
smd_at_prefs_deleted => Preferences deleted
smd_at_prefs_installed => Preferences installed
smd_at_prefs_title => Admin theme preferences
smd_at_preview => Preview of {name}
smd_at_preview_image => View image
smd_at_renamed => Renamed to {name}
smd_at_rename_failed => Rename failed
smd_at_scss => SCSS
smd_at_set => Set
smd_at_setup => Preferences
smd_at_skinner => Theme
smd_at_skin_cloned => Theme extended as {name}
smd_at_skin_created => Theme {name} created
smd_at_skin_deleted => Theme {name} deleted
smd_at_skin_exists => Theme {name} already exists
smd_at_skin_files => Theme files
smd_at_skin_gbl => Theme
smd_at_skin_groups => Group themes
smd_at_skin_switched => Theme switched to {skin}
smd_at_skin_system => Theme system
smd_at_ssc => Styleplate
smd_at_supported_import => Supported import types: {types}
smd_at_tab_name => Admin themes
smd_at_textile => Textile
smd_at_thumbsize => Thumb dimensions
smd_at_times => x
smd_at_txt => Text
smd_at_unsupported_compressiontype => {crush} is not a supported compression format in this installation
smd_at_unsupported_filetype => File is not of a supported type
smd_at_unsupported_fudge => : hit Save again to store anyway
smd_at_upload_report => Uploaded {num_success} files(s) {uploaded}. Failed: {num_fail}
smd_at_version => v
smd_at_work => Maintenance mode
smd_at_work_admin_message => Website is in <a href="{url}">Maintenance Mode</a>
smd_at_work_enabled => Maintenance mode enabled
smd_at_work_message => Maintenance message
smd_at_work_test => Test
EOT;

if (!defined('txpinterface'))
        @include_once('zem_tpl.php');

# --- BEGIN PLUGIN CODE ---
/**
 * smd_admin_themes
 *
 * A Textpattern CMS plugin for creating, editing, testing, installing and distributing admin-side themes
 *  -> Employ images, CSS, JS, HTML/PHP in your theme
 *  -> Use constants in your CSS files
 *  -> Base your theme on an existing theme to tweak it to your taste
 *  -> Export a theme package for distribution to the community in either .tar, .tgz, .bz2 or .zip format (requires smd_crunchers plugin)
 *  -> Import / install other themes from the "community repository":http://textgarden.org/administration-themes
 *  -> Administrator can set a default theme for all users, or enable per-user / per-role themes
 *
 * @author Stef Dawson
 * @link   http://stefdawson.com/
 */

// TODO:
//  * Verify that files can't be uploaded/created outside of the theme's dir
//  * 'empty_info' message shouldn't fire for bad file upload
// TOFIX:
//  * rawurlencode/decode for files with spaces in them. Currently can't edit contents of file with spaces in it as they get encoded as %20. If encoded, with each save they get %2520 added and it gets longer and longer....

if (@txpinterface == 'admin') {
	// Silence warnings because, although the plugin requires smd_crunchers for the
	// import/export features, it'll function in a reduced capacity without it
	@require_plugin('smd_crunchers');

	global $smd_at_event, $smd_at_fullev, $smd_at_adm_event, $smd_at_privs,
		$smd_core_themes, $prefs, $smd_at_feedurl, $smd_at_theme_repo;

	$smd_at_event = 'smd_at';
	$smd_at_fullev = 'smd_admin_themes';
	$smd_at_adm_event = 'smd_admat';
	$smd_at_privs = '1';
	$smd_at_feedurl = 'http://textgarden.org/admin-themes-feed';
	$smd_at_theme_repo = 'http://textgarden.org/administration-themes';

	$smd_core_themes = array('classic', 'hive', 'remora');

	add_privs($smd_at_event, $smd_at_privs);
	add_privs('plugin_prefs.'.$smd_at_fullev, $smd_at_privs);
	register_tab("extensions", $smd_at_event, gTxt('smd_at_tab_name'));
	register_callback('smd_at_options', 'plugin_prefs.'.$smd_at_fullev);
	register_callback('smd_at_welcome', 'plugin_lifecycle.'.$smd_at_fullev);
	register_callback('smd_at', $smd_at_event);
	register_callback('smd_at_per', 'admin_side', 'theme_name');
	register_callback('smd_at_link', 'prefs_ui', 'theme_name');
	register_callback('smd_at_inject_css', 'admin_side', 'head_end');

	if (isset($prefs['smd_at_system']) && $prefs['smd_at_system'] == 2) {
		add_privs($smd_at_adm_event, '2,3,4,5,6');
		register_tab("admin", $smd_at_adm_event, gTxt('smd_at_skinner'));
		register_callback('smd_admat', $smd_at_adm_event);
	}
}

// -------------------------------------------------------------
// CSS definitions: hopefully kind to themers
function smd_at_get_style_rules() {
	$smd_at_styles = array(
		'smd_at' =>'
.smd_at_update { font-weight:bold; color:#900; }
#smd_at_images { margin:0px 6px -4px 0; }
.smd_skin_filetypes { margin:12px 0; }
smd_fakebtn { color:#555; cursor:pointer; }
'
	);

	return $smd_at_styles;
}

// -------------------------------------------------------------
function smd_at_inject_css($evt, $stp) {
	global $smd_at_event, $event;

	if ($event == $smd_at_event) {
		$smd_at_styles = smd_at_get_style_rules();
		echo '<style type="text/css">', $smd_at_styles['smd_at'], '</style>';
	}

	return;
}

// ------------------------
// Plugin jumpoff point
function smd_at($evt, $stp) {
	$available_steps = array(
		'smd_at_clone'         => true,
		'smd_at_delete'        => true,
		'smd_at_delete_folder' => true,
		'smd_at_edit'          => false,
		'smd_at_multi_edit'    => true,
		'smd_at_export'        => true,
		'smd_at_import'        => true,
		'smd_at_newfile'       => false,
		'smd_at_prefs_install' => false,
		'smd_at_prefs_remove'  => false,
		'smd_at_prefs_update'  => true,
		'smd_at_preview'       => true,
		'smd_at_rename'        => true,
		'smd_at_save'          => true,
		'smd_at_setup'         => false,
		'smd_at_switch'        => true,
		'smd_at_upload'        => true,
		'smd_at_change_pageby' => true,
		'save_pane_state'      => true,
	);

	if ($stp == 'save_pane_state') {
		smd_at_save_pane_state();
	} else if ($stp && bouncer($stp, $available_steps)) {
		$stp();
	} else {
		smd_at_list();
	}
}

// -------------------------------------------------------------
function smd_at_welcome($event, $step) {
	$msg = '';
	switch ($step) {
		case 'installed':
			smd_at_prefs_install(0);
			break;
		case 'deleted':
			smd_at_prefs_remove(0);
			break;
	}
	return $msg;
}

// -------------------------------------------------------------
function smd_at_link() {
	global $smd_at_event;
	return href(gTxt('smd_at_manage_lbl'), '?event='.$smd_at_event);
}

// ------------------------
function smd_at_list($message='') {
	global $smd_at_event, $prefs, $theme, $smd_core_themes, $smd_at_fullev, $smd_at_feedurl, $smd_at_theme_repo;

	$smd_at_styles = smd_at_get_style_rules();
	$at_prefs = smd_at_get_prefs();

	extract(gpsa(array('step', 'page', 'crit', 'search_method', 'skin')));
	$message = ($message) ? $message : gps('message');
	$layout = $at_prefs['smd_at_layout'];
	$stylerule = ($layout==0) ? 'list' : 'grid';
	$tw = $at_prefs['smd_at_tw'] + 10;
	$th = $at_prefs['smd_at_th'] + 80;
	$helpLink = "?event=plugin&step=plugin_help&name=$smd_at_fullev#usage";

	$pageby = (gps('qty')) ? gps('qty') : ((cs('smd_at_pageby')) ? cs('smd_at_pageby') : 15);
	$max_theme_size = $at_prefs['smd_at_max_theme_size'];

	$curr_skin = (smd_at_exists($theme->name)) ? $theme->name : 'classic';
	$skin_list = smd_at_read_skins();
	$crushers = smd_at_crush_options('compress');
	$uncrushers = smd_at_crush_options('decompress');
	$bases = array();

	// Get a list of ancestor themes (i.e. dependencies)
	foreach ($skin_list as $skina) {
		$manifest = smd_at_read_skinfo($skina);
		if ($manifest) {
			if ($manifest['based_on']) {
				$bases[] = $manifest['based_on'];
			}
		}
	}
	$bases = array_unique($bases);

	pagetop(gTxt('smd_at_manage_lbl'),$message);

	// Handle paging
	$total = count($skin_list);
	$limit = max(@$pageby, 15);
	list($page, $offset, $numPages) = pager($total, $limit, $page);
	$skin_list = array_slice($skin_list, $offset, $limit);

	$qs = array(
		"event" => $smd_at_event,
		"page" => $page,
	);

	echo script_js(<<<EOJS
function smd_getcrush(skin) {
	skinHandle = "crush_"+skin;
	jQuery('.smd_popup').each(function() {
		box = jQuery(this);
		if (box.attr("id") == skinHandle) {
			if (box.css("display") == "none") {
				box.slideDown('fast');
			} else {
				box.slideUp('fast');
			}
		} else {
			box.slideUp('fast');
		}
	});
	jQuery('#'+skinHandle+' a').click(function() {
		jQuery(this).attr("href", "?event={$smd_at_event}&skin="+skin+"&step=smd_at_export&crush="+jQuery('#'+skinHandle+' input[type=\'radio\']:checked').val()+"&page="+{$page}+"&_txp_token="+textpattern._txp_token);
	});
	return false;
}

function smd_getval(skin, step) {
	skinHandle = "pop_"+skin;
	jQuery('.smd_popup').each(function() {
		box = jQuery(this);
		if (box.attr("id") == skinHandle) {
			if (box.css("display") == "none") {
				box.slideDown('fast');
				jQuery('#'+skinHandle+' input').focus();
			} else {
				box.slideUp('fast');
			}
		} else {
			box.slideUp('fast');
		}
	});
	jQuery('#'+skinHandle+' a').click(function() {
		jQuery(this).attr("href", "?event={$smd_at_event}&skin="+((skin=='new')? '' : skin)+"&step="+step+"&new_skin="+jQuery('#'+skinHandle+' input').val()+"&page="+{$page}+"&_txp_token="+textpattern._txp_token);
	});

	jQuery('#'+skinHandle+' input').keyup(function () {
		this.value = this.value.replace(/[^a-zA-Z0-9_]/g,'');
		while (this.value.length > 0 && this.value.substring(0,1).match(/[0-9]/)) {
			this.value = this.value.substring(1);
		}
	});

	return false;
}
EOJS
	);

	// List the available skins
	echo '<h1 class="txp-heading">', gTxt('smd_at_tab_name'), '</h1>',
		n, '<div id="smd_control" class="txp-control-panel">',
		n, (($uncrushers) ? upload_form(gTxt('smd_at_install_skin'), '', 'smd_at_import', $smd_at_event, '', $max_theme_size).n.'<p><small>'.gTxt('smd_at_supported_import', array('{types}' => (($uncrushers) ? join(', ', $uncrushers) : gTxt('none')) )).'</small></p>' : '').
		n, '<p class="txp-buttons">',
			n, '<a href="?event=', $smd_at_event, a, 'step=smd_at_setup">', gTxt('smd_at_setup'), '</a>',
			n, gTxt('smd_at_help_link', array('{link}' => $helpLink)),
			n, '<a href="'.$smd_at_theme_repo.'">', gTxt('smd_at_find_theme'), '</a>',
			n, '<a href="#" onclick="return smd_getval(\'new\', \'smd_at_clone\');">'.gTxt('smd_at_new').'</a>',
		n, '</p>',
		n, '<p id="pop_new" class="smd_popup empty">',
			n, '<span>', gTxt('smd_at_new_skin'), '</span>', n, '<input type="text" name="smd_text_name" value="" size="', INPUT_REGULAR, '" /> <a href="#">[', gTxt('smd_at_confirm'), ']</a>',
		n, '</p>',
		n, '</div>';

	echo '<div class="txp-container">',
		'<form method="post" name="longform" action="', join_qs($qs), '">';

	$hdrow = hed(gTxt('smd_at_list_title'), 2);
	if ($layout=="0") {
		echo '<div class="txp-listtables">',
			startTable('','','txp-list',5),
			tr(
				tda($hdrow, ' colspan="7"')
			),
			assHead(
				gTxt('smd_at_skin_gbl'),
				'author',
				gTxt('version'),
				'description',
				gTxt('smd_at_actions')
			);
	} else {
		echo $hdrow, '<div class="txp-grid">';
	}
	if( is_callable('fsockopen') )
		$transport = 'fsock';
	elseif( is_callable('curl_init') ) {
		$transport = 'curl';
	} else {
		$transport = '';
	}

	$feed = '';
	switch ($transport) {
		case 'curl':
			$c = curl_init();
			curl_setopt($c, CURLOPT_URL, $smd_at_feedurl);
			curl_setopt($c, CURLOPT_REFERER, hu);
			curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($c, CURLOPT_VERBOSE, false);
			curl_setopt($c, CURLOPT_TIMEOUT, 10);
			$feed = curl_exec($c);
			break;
		case 'fsock':
			$url = parse_url($smd_at_feedurl);
			$fp = @fsockopen ($url['host'], 80, $errno, $errstr, 5);
			if ($fp) {
				$qry = 'GET '.$smd_at_feedurl;
				$qry .= " HTTP/1.0\r\n\r\n";

				fputs($fp, $qry);
				stream_set_timeout($fp, 10);
				$info = stream_get_meta_data($fp);

				$hdrs = true;
				while ((!feof($fp)) && (!$info['timed_out'])) {
					$line = fgets($fp, 8192);
					$line = preg_replace("[\r\n]", "", $line);
					if ($hdrs == false) {
						$feed .= $line."\n";
					}
					if (strlen($line) == 0) $hdrs = false;
				}
				if ($info['timed_out']) {
					$feed = '';
				}
				fclose($fp);
			} else {
				$feed = '';
			}
			break;
		default:
			$feed = '';
	}

	$smd_at_vlast = '';
	$feeds = array();
	if (isset($prefs['smd_at_versions']) && isset($prefs['smd_at_vlast'])) {
		if (time() - $prefs['smd_at_vlast'] < 86400) {
			// Last updated within the last day, so read the cached version numbers
			$feeds = unserialize($prefs['smd_at_versions']);
		}
	}
	if (!$feeds || gps('read_versions')) {
		$feeds = smd_at_feed($feed);
		$installed_feed = array();
		$feeds = (is_array($feeds)) ? $feeds : array();

		// Only record the version info from themes that are installed
		foreach($skin_list as $skin_name) {
			$feed_skin_name = str_replace('_', '-', $skin_name); // Unsanitize the url_title
			if (array_key_exists($feed_skin_name, $feeds)) {
				$installed_feed[$feed_skin_name] = $feeds[$feed_skin_name];
			}
		}
		set_pref('smd_at_vlast', time(), $smd_at_event, PREF_HIDDEN, 'text_input');
		set_pref('smd_at_versions', serialize($installed_feed), $smd_at_event, PREF_HIDDEN, 'text_input');
	}

	foreach ($skin_list as $skin_name) {
		// Read each manifest and set up the labels
		$skinfo = smd_at_read_skinfo($skin_name);
		$feed_skin_name = str_replace('_', '-', $skin_name); // Unsanitize for url_title matching

		$thumbnail = smd_at_get_thumb($skinfo, 1);
		$this_skin = ($skinfo) ? $skinfo['dname'] : $skin_name;
		$is_gbl = ($skin_name == $at_prefs['smd_at_global_skin']) ? gTxt('smd_at_is_global') : '';
		$switch_link = '?event='.$smd_at_event.a.'step=smd_at_switch'.a.'nextstep=smd_at_list'.a.'skin='.$skin_name.a.'page='.$page.a.'_txp_token='.form_token();
		$skintext = $this_skin .n. $is_gbl .n. (($skinfo && $skinfo['based_on']) ? n.gTxt('smd_at_based_on', array('{skin}' => $skinfo['based_on'])) : '');
		$thumblock = ($layout==0)
						? '<a href="'.$switch_link.'" title="'.gTxt('smd_at_apply_skin').'">'.$skintext.(($thumbnail) ? br.$thumbnail : '').'</a>'
						: '<a href="'.$switch_link.'" title="'.gTxt('smd_at_apply_skin').'">'.(($thumbnail) ? $thumbnail : gTxt('smd_at_apply_skin')).'</a>';
		$authblock = (($skinfo && strpos($skinfo['author_uri'], "http://") === 0) ? '<a href="'.$skinfo['author_uri'].'">'.$skinfo['author'].'</a>' : (($skinfo) ? $skinfo['author'] : '-'));
		$actblock = '<a href="?event='.$smd_at_event.a.'step=smd_at_edit'.a.'skin='.$skin_name.'">['.gTxt('edit').']</a>'
			. sp .(($skinfo) ? '<a href="#" onclick="return smd_getval(\''.$skin_name.'\', \'smd_at_clone\');">['.gTxt('smd_at_clone').']</a>' : '')
			. sp .(($skinfo && $crushers) ? '<a href="#" onclick="return smd_getcrush(\''.$skin_name.'\');">['.gTxt('smd_at_export').']</a>' : '')
			. sp .((in_array($skin_name, $smd_core_themes) || in_array($skin_name, $bases)) ? '' : '<a href="?event='.$smd_at_event.a.'step=smd_at_delete'.a.'skin='.$skin_name.a.'page='.$page.a.'_txp_token='.form_token().'" onclick="return confirm(\''.gTxt('smd_at_delete_confirm', array('{skin}' => $skin_name)).'\');">['.gTxt('delete').']</a>');
		$cloneblock = '<p id="pop_'.$skin_name.'" class="smd_popup empty"><span>'.gTxt('smd_at_new_cloneskin').'</span>'.n.'<input type="text" name="smd_text_name" value="" size="'.INPUT_MEDIUM.'" class="input-medium" />'.n.'<a href="#">['.strong(gTxt('smd_at_confirm')).']</a></p>';
		$crushblock = (($crushers) ? '<p id="crush_'.$skin_name.'" class="smd_popup empty"><span>'.gTxt('smd_at_crush_format').'</span>'.radioSet($crushers, $skin_name.'_crush', $at_prefs['smd_at_crush']).n.'<a href="#">['.strong(gTxt('smd_at_confirm')).']</a></p>' : '');
		$verblock = ($skinfo) ? ((isset($feeds[$feed_skin_name]) && isset($feeds[$feed_skin_name]['summary']) && version_compare($feeds[$feed_skin_name]['summary'],$skinfo['version'])===1) ? '<a href="'.$feeds[$feed_skin_name]['link'].'" class="smd_at_update">'.gTxt('smd_at_version').$skinfo['version'].'</a>' : gTxt('smd_at_version').$skinfo['version']) : '';

		if ($layout==0) {
			echo tr(
				n.td($thumblock)
				.n.td($authblock)
				.n.td($verblock)
				.n.td((($skinfo)? $skinfo['description'] : '-').(($skinfo && $skinfo['help']) ? ' '.href('['.gTxt('help').']', $skinfo['help']) : ''))
				.n.td($actblock .n. $cloneblock .n. $crushblock)
			, (($skin_name == $curr_skin) ? ' class="highlight"' : '')
			);
		} else {
			echo '<div class="txp-grid-cell', (($skin_name == $curr_skin) ? ' highlight' : ''), '">',
					n, hed($skintext, 3),
					n, '<p>', $thumblock, '</p>',
					n, '<p>', $verblock, n, gTxt('smd_at_by'), n, $authblock, '</p>',
					n, '<p>', $actblock, '</p>',
					n, $cloneblock,
					n, $crushblock,
				n, '</div>';
		}
	}

	if ($layout=="0") {
		echo n, endTable();
	}

	echo n, '</div>',
		n, tInput(),
		n, '</form>',
		n, '<div id="list_navigation" class="txp-navigation">',
		n, nav_form($smd_at_event, $page, $numPages, NULL, NULL, NULL, NULL),
		n, pageby_form($smd_at_event, $pageby),
		n, '</div>',
		n, '</div>';
}

function smd_at_feed($feed) {
	global $feeds;

	$feed=preg_replace("/>"."[[:space:]]+"."</i", "><", $feed); // Kill whitespace in feed
	$xmlparser = xml_parser_create();
	xml_set_element_handler($xmlparser, "smd_at_feed_start_tag", "smd_at_feed_end_tag");
	xml_set_character_data_handler($xmlparser, "smd_at_feed_tag_contents");
	xml_parse($xmlparser, $feed);
	xml_parser_free($xmlparser);

	return $feeds;
}

function smd_at_feed_start_tag($parser, $name, $attribs) {
	global $smd_at_feedin, $smd_at_feedtag;
	if ($name == "ENTRY") {
		$smd_at_feedin = true;
	}
	if ($smd_at_feedin) {
		$smd_at_feedtag = $name;
	}
}
function smd_at_feed_end_tag($parser, $name) {
	global $smd_at_feedin, $smd_at_feedtag, $smd_at_feedname;
	if ($name == "ENTRY") {
		$smd_at_feedin = false;
		$smd_at_feedname = '';
	}
}

function smd_at_feed_tag_contents($parser, $data) {
	global $smd_at_feedin, $smd_at_feedtag, $smd_at_feedname, $feeds;
	if ($smd_at_feedin) {
		if ($smd_at_feedtag == "NAME") {
			$feeds[$data] = '';
			$smd_at_feedname = $data;
		}
		if (isset($feeds[$smd_at_feedname])) {
			if ($smd_at_feedtag == "TITLE" || $smd_at_feedtag == "SUMMARY" || $smd_at_feedtag == "UPDATED" || $smd_at_feedtag == "ID" || $smd_at_feedtag == "LINK") {
				$feeds[$smd_at_feedname][strtolower($smd_at_feedtag)] = $data;
			}
		}
	}
}

// ------------------------
function smd_at_valid_types() {
	$editable = array('ssc', 'scss', 'css', 'js', 'php', 'txt', 'textile');
	$imagable = array('jpg', 'jpeg', 'gif', 'png', 'svg');
	return array($editable, $imagable);
}

// ------------------------
function smd_at_edit($message='') {
	global $smd_at_event, $file_max_upload_size, $step;

	extract(doSlash(gpsa(array('skin', 'new_skin', 'new_skin_dir', 'file', 'dir'))));

	$smd_at_styles = smd_at_get_style_rules();
	$at_prefs = smd_at_get_prefs();
	$layout = $at_prefs['smd_at_layout'];

	list($editable, $imagable) = smd_at_valid_types();

	$skinfo = smd_at_read_skinfo($skin);
	$file = (empty($new_skin)) ? $file : $new_skin;
	$dir = (empty($new_skin_dir)) ? $dir : $new_skin_dir;
	$files = smd_at_listdir(THEME.$skin);
	sort($files);

	// Split the list into its directory groups
	$allfiles = array();
	foreach ($files as $currfile) {
		$file_info = pathinfo($currfile);
		// Ignore any rogue Subversion files
		if (strpos($file_info['dirname'], '/.svn') === false) {
			$file_type = strtolower((isset($file_info['extension'])) ? $file_info['extension'] : 'other');
			$allfiles[$file_type][] = $currfile;
		}
	}
	if (gps('smd_at_edits')) {
		$contents = str_replace('\r\n','
',gps('smd_at_edits')); // newline workaround
	} else {
		$contents = '';
		if ($file && file_exists(THEME.$skin.DS.$dir.DS.$file)) {
			$contents = file(THEME.$skin.DS.$dir.DS.$file);
			$contents = join("", $contents);
		}
	}

	$info = explode ('.',$file);
	$lastpart = count($info)-1;
	$ext = strtolower(trim($info[$lastpart]));
	$is_textile = ($ext == 'textile');
	$is_svg = ($ext == 'svg');

	// Begin rendering the page
	pagetop(gTxt('smd_at_edit_lbl', array('{theme}' => $skin)), $message);

	$skin_list = smd_at_read_skins();

	// selectInput needs both index and value to be the same in this case
	$skinsel = array();
	foreach($skin_list as $key1 => $value1) {
		$skinsel[$value1] = $skin_list[$key1];
   }
	$skinChange = '<form name="skinchange" action="index.php">'
		. eInput($smd_at_event)
		. sInput('smd_at_edit')
		. tInput()
		. selectInput('skin', $skinsel, $skin, 0, 1)
		. '</form>';

	$fileList = array();
	$fileList[] = '<div id="content_switcher">'
		.n. hed(gTxt('smd_at_skin_files'),2)
		.n. $skinChange
		.n. '<p class="txp-buttons">'
		.n. '<a class="navlink" href="?event='.$smd_at_event.a.'step=smd_at_newfile'.a.'skin='.$skin.'">'.gTxt('smd_at_new_file').'</a>'
		.n. '<a class="navlink" href="?event='.$smd_at_event.'">'.gTxt('smd_at_all_themes').'</a>'
		.n. '</p>'
		.n. '<form action="index.php" method="post" enctype="multipart/form-data">'
		.n. hInput('MAX_FILE_SIZE', $file_max_upload_size)
		.n. hInput('id', $skin)
		.n. eInput($smd_at_event)
		.n. sInput('smd_at_upload')
		.n. tInput()
		.n. '<input type="file" name="smd_at_file[]" multiple="true" />'.sp.fInput('submit', '', gTxt('upload'))
		.n. graf('<label for="smd_at_folder">'.gTxt('smd_at_folder').'</label>' .n. fInput('text', 'smd_at_folder', ps('smd_at_folder'), '', '', '', INPUT_MEDIUM, '', 'smd_at_folder'))
		.n. '</form>'
//		.n. upload_form(gTxt('upload_file'), '', 'smd_at_upload', $smd_at_event, $skin, $file_max_upload_size, '', '')
		.n. '<form id="smd_at_allfiles" action="index.php" method="post">';

	$dirs = $dirout = $out = array();
	$methods = array(
		'delete'     => gTxt('delete'),
	);

	foreach ($allfiles as $ftype => $filerec) {
		foreach ($filerec as $idx => $currfile) {
			$justfile = basename($currfile);
			$dirs[] = $theDir = dirname($currfile);
			$justdir = trim(str_replace(THEME.$skin, '', $theDir), DS);
			$parts = explode('.', $justfile);
			$basefile = array_shift($parts);
			$showfile = ($file == $justfile) ? strong($justfile) : $justfile;
			$is_img = smd_at_is_image($currfile);
			$is_bin = smd_at_is_binary($currfile);

			$edit = $is_img ? '<a href="'.$currfile.'" title="'.gTxt('smd_at_preview_image').'">'.$showfile.'</a>' : ($is_bin ? $showfile : '<a href="?event='.$smd_at_event.a.'step=smd_at_edit'.a.'skin='.$skin.a.'file='.$justfile.a.'dir='.$justdir.'">'.$showfile.'</a>');
			$modbox = ($basefile == $skin)
				?	''
				:	'<input type="checkbox" name="selected_files[]" value="'.$justdir.DS.$justfile.'" />';

			$group_name = in_array($ftype, $imagable) ? 'image_files' : (in_array($ftype, $editable) ? $ftype : 'other');

			$out[$group_name][] = '<li>'.n.'<span class="smd-at-list-action">'.$modbox.'</span><span class="smd-at-list-name">'.$edit.'</span></li>';
		}
	}

	$combined = array_merge($editable, array('image_files', 'other'));
	foreach($combined as $group_name) {
		if (isset($out[$group_name])) {
			$visipref = 'smd_at_pane_'.$group_name.'_visible';
			$fileList[] = '<div class="summary-details '.$group_name.'"><h3 class="lever'.(get_pref($visipref) ? ' expanded' : '').'"><a href="#'.$group_name.'">'.gTxt('smd_at_'.$group_name).'</a></h3>'.n.
				'<div id="'.$group_name.'" class="toggle skin-list" style="display:'.(get_pref($visipref) ? 'block' : 'none').'">'.n.
				'<ul class="plain-list">'.n;
			$fileList[] = join(n, $out[$group_name]);
			$fileList[] = '</ul></div></div>';
		}
	}

	$fileList[] = multi_edit($methods, $smd_at_event, 'smd_at_multi_edit', '', '', '', $skin);
	$fileList[] = tInput().n.'</form>';

	$dirs = array_unique($dirs);
	unset($dirs[array_search(THEME.$skin, $dirs)]);
	foreach ($dirs as $thisdir) {
		$dirout[] = '<tr><td class="smd-at-list-name">'.str_replace(THEME.$skin.'/', '', $thisdir).'</td><td>'.dLink($smd_at_event, 'smd_at_delete_folder', 'delfolder', $thisdir, 1, 'skin', $skin).'</td></tr>';
	}

	$folderList = ($dirout) ? '<div class="summary-details folders"><h3 class="lever'.(get_pref('smd_at_pane_folders_visible') ? ' expanded' : '').'"><a href="#folders">'.gTxt('smd_at_folders').'</a></h3>'.n.
		'<div id="folders" class="toggle skin-list" style="display:'.(get_pref('smd_at_pane_folders_visible') ? 'block' : 'none').'">'.n.
		'<table>'.
		join(n, $dirout) . '</table></div></div>' : '';

	$qs = array(
		"event" => $smd_at_event,
	);
	$qsVars = "index.php".join_qs($qs);

	// Render the rest of the page
	echo startTable('', '', 'txp-columntable'),
	tr(
		td(
			hed(gTxt('smd_at_edit_lbl', array('{theme}' => (($skinfo) ? $skinfo['dname'] : $skin))), 1).
			form(
				n.graf(
					'<label for="new_skin">' . gTxt('smd_at_file_name') . '</label>'
					.n.'<input type="text" id="new_skin" name="new_skin" value="'.txpspecialchars($file).'" size="'.INPUT_REGULAR.'" />'
					.n.($is_textile ? '<a class="smd_at_preview" href="?event=' . $smd_at_event .a. 'step=smd_at_preview' .a. 'skin='.$skin.a.'dir='.$dir.a.'file='.$file.a.'type=textile'.a.'_txp_token='.form_token().'">'.gTxt('preview').'</a>' : '')
					.n.($is_svg ? '<a class="smd_at_preview" href="'. THEME . $skin.'/' . (($dir) ? $dir.'/' : '') . $file .'">'.gTxt('preview').'</a>' : '')
				)
				.($step == 'smd_at_newfile'
					? n.graf(
						'<label for="new_skin_dir">' . gTxt('smd_at_folder_name') . '</label>'
						.n.'<input type="text" id="new_skin_dir" name="new_skin_dir" value="'.txpspecialchars($dir).'" size="'.INPUT_REGULAR.'" />'
					)
					: ''
				)
				.n.graf(
					'<textarea id="smd_at_edits" class="code" name="smd_at_edits" cols="'.INPUT_XLARGE.'" rows="'.INPUT_REGULAR.'">'.txpspecialchars($contents).'</textarea>'
					)
				.n.graf(
					fInput('submit','',gTxt('save'),'publish')
				)
				.n.eInput($smd_at_event)
				.n.sInput('smd_at_save')
				.n.hInput('skin',$skin)
				.n.hInput('file',$file)
				.n.hInput('dir',$dir)
			)
		, '', 'column').
		n.tdtl(join(n, $fileList).n.$folderList.n.'</div>', ' class="column"')
	),
	endTable().
	script_js( <<<EOS
		jQuery(document).ready(function() {
			jQuery('#smd_at_allfiles').txpMultiEditForm({
				'checkbox' : 'input[name="selected_files[]"][type=checkbox]',
				'row' : '.plain-list li, .smd-at-list-name',
				'highlighted' : '.plain-list li'
			});
		});
		jQuery('#smd_at_edits').keyup(function() {
			jQuery('.smd_at_preview').hide();
		});
EOS
	);
}

// ------------------------
// Just clear out the var so the save function treats the content as a new file
function smd_at_newfile() {
	$_POST['file'] = '';
	$message='';
	smd_at_edit($message);
}

// ------------------------
function smd_at_preview() {
	extract(doSlash(gpsa(array('skin', 'file', 'dir', 'type'))));

	$fp = $skin.DS.(($dir) ? $dir.DS : '').$file;

	$path = THEME.$fp;
	$out = '';

	switch ($type) {
		case 'textile':
			@include_once txpath.'/lib/classTextile.php';

			if (class_exists('Textile') && file_exists($path)) {
				$textile = new Textile();
				$contents = file_get_contents($path);
				$out = $textile->TextileThis($contents);
			}
		break;
	}

	pagetop(gTxt('smd_at_preview', array('{name}' => $fp)));
	echo n,'<div id="smd_at_container" class="txp-container txp-view">',
		n,'<div class="text-column">' . $out . '</div>',
		n,'</div>';

	//TODO: back to smd_at_edit() button?
}

// ------------------------
// Do the first 512 bytes contain a disproportionate quantity of non-ascii chars?
// Hacked from http://stackoverflow.com/questions/3872877/how-to-check-if-uploaded-file-is-binary-file, thanks
function smd_at_is_binary($path) {
	if (file_exists($path)) {
		if (!is_file($path)) return 0;

		$fh  = fopen($path, "r");
		$blk = fread($fh, 512);
		fclose($fh);
		clearstatcache();

		return (
			0 or substr_count($blk, "\x00") > 0
		);
	}
	return 0;
}

// ------------------------
// Hacked from http://www.binarytides.com/blog/php-best-way-to-check-if-file-is-an-image/, thanks
function smd_at_is_image($path) {
	// Silence warnings in case file is not readable due to spaces or something
	$a = @getimagesize($path);
	$image_type = $a[2];

	if(in_array($image_type , array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG))) {
		return true;
	}
	return false;
}

// ------------------------
function smd_at_clone() {
	global $txp_user;

	extract(doSlash(gpsa(array('skin', 'new_skin'))));
	$msg='';

	$new_skin = trim($new_skin);
	$new_skin = rawurlencode($new_skin);

	if (empty($new_skin)) {
		$msg = array(gTxt('smd_at_name_empty'), E_WARNING);
	}

	// Check the new name isn't already in use
	$themes = smd_at_read_skins();

	if (in_array($new_skin, $themes)) {
		$msg = array(gTxt('smd_at_skin_exists', array('{name}' => $new_skin)), E_ERROR);
	}

	// No errors, so make a new dir and create the PHP file
	if ($msg=='') {
		$content = '';
		$destdir = THEME.$new_skin.DS;
		$res = mkdir($destdir);
		$based = '';

		if ($skin) {
			// Based on an existing theme. No need for any functions other than manifest()
			$based = "theme::based_on('".$skin."');";
			$extends = $skin.'_theme';
			$srcss = THEME.$skin.DS.'textpattern.css';
			if (file_exists($srcss) && filesize($srcss) > 0) {
				$import = join('', file($srcss));
			} else {
				$import = '@import url("../classic/textpattern.css");';
			}
			$content = '{';
		} else {
			// Brand spanking new theme. Clone 'classic' functions then add new manifest()
			$extends = 'theme';
			$import = '';
			$src = txpath.DS.THEME.'classic'.DS.'classic.php';
			$grab = false;
			$fp = file($src);

			foreach($fp as $line) {
				$line = rtrim($line);
				if (strpos($line, 'function manifest()') !== false) {
					$grab = false; // unnecessary?
					break;
				}
				if ($grab) {
					$content .= $line.n;
				}
				if (strpos($line, 'class classic_theme extends theme') !== false) {
					$grab = true;
				}
			}
		}

		// manifest fields
		$manuser = get_author_name($txp_user);
		$mantitle = ucwords($new_skin);

		// Write the new PHP file
		$buf = <<<EOF
<?php

if (!defined('txpinterface')) die('txpinterface is undefined.');

{$based}

class {$new_skin}_theme extends {$extends}
{$content}

	function manifest()
	{
		return array(
			'title'	 		=> '{$mantitle}',
			'author' 		=> '{$manuser}',
			'author_uri' 	=> '',
			'version' 		=> '1.0',
			'description' 	=> '',
			'help' 			=> '',
		);
	}
}
?>
EOF;

		$fp = fopen($destdir.$new_skin.'.php', "wb");
		fwrite($fp, $buf);
		fclose($fp);

		// Create the CSS file
		$fp = fopen($destdir.'textpattern.css', "wb");
		fwrite($fp, $import);
		fclose($fp);

		if ($skin) {
			$msg = gTxt('smd_at_skin_cloned', array('{name}' => $new_skin));;
		} else {
			$msg = gTxt('smd_at_skin_created', array('{name}' => $new_skin));;
		}

//	$msg = gTxt('skin_not_created', array('{name}' => $new_skin));;

	}

	smd_at_list($msg);
}

// ------------------------
function smd_at_crush_options($type='compress') {
	global $plugins;

	$smd_crushers = array();

	if (is_array($plugins) && in_array('smd_crunchers', $plugins)) {
		$crunchers = smd_crunch_capabilities($type);
		foreach (array('tar', 'gzip', 'zip', 'bzip2') as $cm) {
			if (in_array($cm, $crunchers)) {
				$smd_crushers[$cm] = gTxt('smd_at_c_'.$cm);
			}
		}
	}

	return $smd_crushers;
}

// ------------------------
function smd_at_export() {
	extract(doSlash(gpsa(array('skin','crush'))));

	$at_prefs = smd_at_get_prefs();

	$message='';
	chdir(THEME);
	$skinfo = smd_at_read_skinfo($skin);
	$reps = array(
		'{theme}' => $skin,
		'{version}' => $skinfo['version'],
	);
	$out = strtr($at_prefs['smd_at_filename_format'], $reps);

	// Check the passed compression format is valid
	$crushers = smd_at_crush_options('compress');
	if ($crush=='' || $crush=='undefined' || !array_key_exists($crush, $crushers)) {
		$msg = array(gTxt('smd_at_unsupported_compressiontype', array('{crush}' => $crush)), E_WARNING);
		smd_at_list($message);
		return;
	}

	switch($crush) {
		case 'zip':
			$zip = new smd_crunch_zip_file($out.'.zip');
			break;
		case 'bzip2':
			$zip = new smd_crunch_bzip_file($out.'.tbz2');
			break;
		case 'tar':
			$zip = new smd_crunch_tar_file($out.'.tar');
			break;
		case 'gzip':
			$zip = new smd_crunch_gzip_file($out.'.tgz');
 			break;
	}

	$zip->set_options(array('basedir' => txpath.DS.THEME, 'overwrite' => 1, 'inmemory' => 1));
	$zip->add_files($skin.DS.'*.*');
	$zip->exclude_files($skin.DS.'*.svn*');
	$zip->create_archive();
	$zip->download_file();
}

// ------------------------
function smd_at_import() {
	$name = $_FILES['thefile']['name'];
	$file = get_uploaded_file($_FILES['thefile']['tmp_name'], txpath.DS.THEME.basename($_FILES['thefile']['tmp_name']));
	$basedir = txpath.DS.THEME;
	$uncrushers = smd_at_crush_options('decompress');
	$message='';
	$info = explode ('.',$name);
	$lastpart = count($info)-1;
	$ext = $info[$lastpart];

	if ($name && $file) {
		if ($ext == 'zip' && array_key_exists('zip', $uncrushers)) {
			$zip = new smd_crunch_dUnzip2($file);
//			$zip->debug = true;
			$zip->getList();
			$validArchive = smd_at_check_archive($zip->compressedList, $ext);
			if ($validArchive) {
				$zip->unzipAll($basedir, '', true, 0755);
				$zip->close();
				$message = gTxt('smd_at_import_ok');
			} else {
				$message = array(gTxt('smd_at_import_failed'), E_ERROR);
			}
		} else if ($ext == 'tgz' && array_key_exists('gzip', $uncrushers)) {
			$zip = new smd_crunch_gzip_file(basename($file));
			$zip->set_options(array('basedir' => $basedir, 'overwrite' => 1));
			$zip->extract_files();
			$message = gTxt('smd_at_import_ok');
		} else if ($ext == 'tbz2' && array_key_exists('bzip2', $uncrushers)) {
			$zip = new smd_crunch_bzip_file(basename($file));
			$zip->set_options(array('basedir' => $basedir, 'overwrite' => 1));
			$zip->extract_files();
			$message = gTxt('smd_at_import_ok');
		} else if ($ext == 'tar') {
			$zip = new smd_crunch_tar_file(basename($file));
			$zip->set_options(array('basedir' => $basedir, 'overwrite' => 1));
			$zip->extract_files();
			$message = gTxt('smd_at_import_ok');
		} else {
			$message = array(gTxt('smd_at_unsupported_compressiontype', array('{crush}' => $ext)), E_WARNING);
		}

		// Remove the temporary file
		unlink($file);
	} else {
		$message = array(gTxt('smd_at_empty_info'), E_WARNING);
	}

	smd_at_list($message);
}

// Check the directory structure of the archive for various items/attributes.
// Each time one of the conditions is met, the vcnt is incrememented.
// Once the whole archive has been read, if the vcnt matches the expectedCounts for
// that type, the archive is valid.
function smd_at_check_archive($struct, $type='zip') {
	$expectedCounts = array('zip' => 1, 'tgz' => 0, 'tbz2' => 0, 'tar' => 0);
	switch ($type) {
		case "zip":
			$vcnt = 0;
			foreach ($struct as $entry => $info) {
				$parts = pathinfo($info['file_name']);
				if (isset($parts['extension']) && $parts['extension'] == 'php') {
					$dirbits = explode(DS, $parts['dirname']);
					$numdirs = count($dirbits);
					if (($parts['filename'] == $dirbits[$numdirs-1]) && $numdirs==1) {
						$vcnt++;
					}
				}
			}
			break;
	}

	return ($expectedCounts[$type] == $vcnt) ? true : false;
}

// ------------------------
function smd_at_sanitize_folder($text) {
	// Remove control characters and " * \ : < > ? |
	$text = preg_replace('/[\x00-\x1f\x22\x2a\x3a\x3c\x3e\x3f\x5c\x7c\x7f]+/', '', $text);
	// Remove duplicate dots and any leading or trailing dots/spaces
	$text = preg_replace('/[.]{2,}/', '.', trim($text, '. '));
	// Remove any leading or trailing slash
	$text = trim($text, '/');
	return $text;
}

// ------------------------
function smd_at_rrmdir($dir) {
	foreach(glob($dir . '/*') as $file) {
		if(is_dir($file))
			smd_at_rrmdir($file);
		else
			unlink($file);
	}
	rmdir($dir);
}

// ------------------------
function smd_at_upload() {
	global $file_max_upload_size;

	extract(doSlash(gpsa(array('id', 'smd_at_folder'))));

	$_POST['skin'] = $skin = $id;
	$folder = smd_at_sanitize_folder($smd_at_folder);

	$filelist = $_FILES['smd_at_file']['name'];
	$name = $pos = NULL;
	$message='';
	$up_count = $fail_count = 0;
	$uploaded = array();

	$skinfo = smd_at_read_skinfo($skin);
	$new_skin = $skinfo['name'];

	if ($new_skin) {
		$newpath = $skinfo['path'] . (($folder) ? $folder.'/' : '');

		if (!file_exists($newpath)) {
			mkdir($newpath, 0755, true);
		}

		foreach ($filelist as $pos => $name) {
			if ($name == '') continue;

			$file = get_uploaded_file($_FILES['smd_at_file']['tmp_name'][$pos]);

			// Skip files that are too big
			$size = filesize($file);
			if ($file_max_upload_size < $size) {
				unlink($file);
				$fail_count++;
				continue;
			}

			if ($name && $file) {
				if(shift_uploaded_file($file, $newpath.$name)) {
					chmod($newpath.$name, 0755);
					$up_count++;
					$uploaded[] = $name;
				} else {
					unlink($file);
					$fail_count++;
				}
			}
		}
		$message = gTxt('smd_at_upload_report', array('{num_success}' => $up_count, '{num_fail}' => $fail_count, '{uploaded}' => join(', ', $uploaded)));
	} else {
		$message = array(gTxt('smd_at_empty_info'), E_WARNING);
	}

	smd_at_edit($message);
}

// ------------------------
function smd_at_delete() {
	global $smd_core_themes, $smd_at_event;

	if (!has_privs($smd_at_event)) {
		smd_at_edit();
	}

	extract(doSlash(gpsa(array('skin'))));
	$message='';

	if (in_array($skin, $smd_core_themes)) {
		$message = array(gTxt('smd_at_core_theme', array('{skin}' => $skin)), E_ERROR);
		smd_at_list($message);
	} else {
		$skindir = THEME.$skin;
		if (!smd_rmdir_recursive($skindir)) {
			$message = array(gTxt('smd_at_delete_failed'), E_ERROR);
		} else {
			$message = gTxt('smd_at_skin_deleted', array('{name}' => $skin));
		}

		// Handle situations if current skin has been deleted
		if (!file_exists(txpath.DS.THEME.$skin)) {
			$at_prefs = smd_at_get_prefs();

			// Reset the global skin in case it's been deleted
			$gbl_skin = $at_prefs['smd_at_global_skin'];
			$gbl_skin = ($gbl_skin != '' && file_exists(txpath.DS.THEME.$gbl_skin)) ? $gbl_skin : 'classic';
			set_pref('smd_at_global_skin', $gbl_skin, $smd_at_event, PREF_HIDDEN, 'text_input');
			set_pref('theme_name', $gbl_skin);

			$skin = get_pref('smd_skin');
			if (!file_exists(txpath.DS.THEME.$skin)) {
				$skin = $gbl_skin;
			}
			set_pref('smd_skin', $skin, 'smd_at', PREF_HIDDEN, 'text_input', 0, PREF_PRIVATE);
		}
		$_GET['skin'] = $skin;
		$_GET['nextstep'] = 'smd_at_list';
		smd_at_switch($message);
	}
}

// ------------------------
function smd_at_delete_file($skin, $delfile) {
	global $smd_core_themes, $smd_at_event;

	if (!has_privs($smd_at_event)) {
		smd_at_edit();
	}

	$ret = false;
	$path = THEME.$skin.DS.$delfile;
	if (file_exists($path) && !in_array($skin, $smd_core_themes)) {
		$ret = unlink($path);
	}
	return $ret;
}

// ------------------------
function smd_at_delete_folder() {
	global $smd_core_themes, $smd_at_event;

	if (!has_privs($smd_at_event)) {
		smd_at_edit();
	}

	extract(doSlash(gpsa(array('skin', 'delfolder'))));
	$message = '';

	$_POST['skin'] = $skin;

	if (file_exists($delfolder) && !in_array($skin, $smd_core_themes)) {
		smd_at_rrmdir($delfolder);
		$message = gTxt('smd_at_folder_deleted', array('{name}' => $delfolder));
	}

	smd_at_edit($message);
}

// ------------------------
function smd_at_multi_edit() {
	global $smd_core_themes, $smd_at_event;

	if (!has_privs($smd_at_event)) {
		smd_at_edit();
	}

	$message = '';
	$method = ps('edit_method');
	$files = ps('selected_files');
	$skin = ps('crit'); // bit of a hack, but multi_edit() has a fixed param set
	$affected = array();
	$_POST['skin'] = $skin;

	if ($files and is_array($files)) {
		if ($method == 'delete') {
			foreach ($files as $name) {
				if (smd_at_delete_file($skin, $name)) {
					$affected[] = $name;
				}
			}

			if ($affected) {
				$message = gTxt('smd_at_files_deleted', array('{list}' => join(', ', $affected)));
			}

			smd_at_edit($message);
		}
	} else {
		smd_at_edit();
	}
}

// ------------------------
function smd_at_save() {
	extract(doSlash(gpsa(array('skin','new_skin','new_skin_dir','file','dir','smd_at_edits'))));

	list($editable, $imagable) = smd_at_valid_types();
	$message = $extraMsg = '';
	$file = trim($file);
	$new_skin = trim($new_skin);
	$new_skin_dir = trim(trim($new_skin_dir), DS);
	$msglev = 0;

	// New file
	if (!$file && $new_skin) {
		$file = $new_skin;
		$dir = $new_skin_dir;
		$ext = array_pop(explode ('.',$file));
		if (strtolower($file) != 'readme' && ($ext == '' || !in_array($ext, $editable))) {
			$message = gTxt('smd_at_unsupported_filetype').gTxt('smd_at_unsupported_fudge');
			$msglev = E_WARNING;
			$_POST['file'] = $file;
			$_POST['dir'] = $dir;
		}
	}

	if ($message=='') {
		$fname = sanitizeForFile($file);
		$new_skin = rawurlencode($new_skin);
		$_POST['new_skin'] = $new_skin;

		$smd_at_edits = doStrip(str_replace('\r\n','
',$smd_at_edits)); // newline workaround

		if ($fname) {
			$filepath = THEME.$skin.DS.$dir.DS;
			if (!file_exists($filepath.$fname)) {
				if (!file_exists($filepath)) {
					mkdir($filepath, 0755, true);
				}

				$ret = touch($filepath.$fname);
				if ($ret === false) {
					$message = gTxt('smd_at_mkdir_failed', array('{name}' => $fname));
				}
			}

			// Assuming no errors so far...
			if ($message == '') {
				$fh = fopen($filepath.$fname, 'wb');
				fwrite($fh, $smd_at_edits);
				fclose($fh);

				if ($fname != $new_skin) {
					// Rename the file
					$res = rename($filepath.$fname, $filepath.$new_skin);

					// If the renamed file is the theme's PHP file, try to rename the main skin dir too
					$filebits = explode('.', $new_skin);
					$oldfilebits = explode('.', $fname);
					$ext = array_pop($filebits);
					if ($res && $ext == 'php' && ($oldfilebits[0] == $skin)) {
						$new_filepath = THEME.$filebits[0].DS;
						$ren = rename($filepath, $new_filepath);
						$filepath = ($ren) ? $new_filepath : $filepath;
						$_POST['skin'] = $filebits[0];
					}
					$extraMsg = ($res) ? gTxt('smd_at_renamed', array('{name}' => $new_skin)) : gTxt('smd_at_rename_failed');
				}

				// Process any css replacements
				$filebits = explode ('.',(($fname==$new_skin)? $fname : $new_skin));
				$cssfile = $filebits[0];
				$ext = array_pop($filebits);
				if ($ext == 'ssc') {
					$replacements = array();
					$num_rep1 = preg_match_all('/(\@[A-Za-z0-9_]+):\s*(.*);/', $smd_at_edits, $matches1);
					$num_rep2 = preg_match_all('/(\@[A-Za-z0-9_]+):\s*\{(.*?)\}/s', $smd_at_edits, $matches2);

					// Simple replacements
					foreach($matches1 as $idx => $reparr) {
						if ($idx == 0) {
							// Remove the var definitions
							foreach ($reparr as $rep) {
								$smd_at_edits = str_replace($rep, '',$smd_at_edits);
							}
						}
						if ($idx == 1) {
							foreach ($reparr as $jdx => $rep) {
								$replacements[$rep] = $matches1[2][$jdx];
							}
						}
					}

					// Multi-line replacements
					foreach($matches2 as $idx => $reparr) {
						if ($idx == 0) {
							// Remove the var definitions
							foreach ($reparr as $rep) {
								$smd_at_edits = str_replace($rep, '',$smd_at_edits);
							}
						}
						if ($idx == 1) {
							foreach ($reparr as $jdx => $rep) {
								$replacements[$rep.';'] = trim($matches2[2][$jdx]);
							}
						}
					}

					// Generate and write the new css file
					$smd_at_edits = trim(strtr($smd_at_edits, $replacements));
					$fh = fopen($filepath.$cssfile.'.css', 'wb');
					fwrite($fh, $smd_at_edits);
					fclose($fh);
					if ($fname != $new_skin) {
						$oldfname = explode ('.', $fname);
						$oldfname = $oldfname[0].'.css';
						$res = @unlink($filepath.$oldfname);
					}
				}

				$message = gTxt('smd_at_file_saved', array('{name}' => $fname)).br.$extraMsg;
			}
		}
	}
	smd_at_edit(array($message, $msglev));
}


// ------------------------
// PREFS
// ------------------------
// Get current pref value or default for each known pref
function smd_at_get_prefs($force=0) {
	global $prefs;

	$smd_at_prefs = array(
		'smd_at_case_sort' => array(
			'html'     => 'yesnoradio',
			'position' => 10,
			'default'  => '1',
			'group'    => 'smd_at_settings',
		),
		'smd_at_crush' => array(
			'html'     => 'radioset',
			'position' => 20,
			'default'  => 'zip',
			'group'    => 'smd_at_settings',
		),
		'smd_at_tw' => array(
			'html'     => 'text_input',
			'position' => 30,
			'default'  => '260',
			'group'    => 'smd_at_settings',
		),
		'smd_at_th' => array(
			'html'     => 'text_input',
			'position' => 40,
			'default'  => '150',
			'group'    => 'smd_at_settings',
		),
		'smd_at_filename_format' => array(
			'html'     => 'text_input',
			'position' => 60,
			'default'  => '{theme}',
			'group'    => 'smd_at_settings',
		),
		'smd_at_max_theme_size' => array(
			'html'     => 'text_input',
			'position' => 70,
			'default'  => (500 * 1024),
			'group'    => 'smd_at_settings',
		),
		'smd_at_layout' => array(
			'html'     => 'radioset',
			'position' => 80,
			'default'  => '1',
			'group'    => 'smd_at_settings',
		),
		'smd_at_system' => array(
			'html'     => 'radioset',
			'position' => 90,
			'default'  => '0',
			'group'    => 'smd_at_settings',
		),
		'smd_at_global_skin' => array(
			'html'     => 'selectlist',
			'position' => 100,
			'default'  => '',
			'group'    => 'smd_at_settings',
		),
		'smd_at_group_list' => array(
			'html'     => 'list',
			'position' => 110,
			'default'  => '',
			'group'    => 'smd_at_settings',
		),
		'smd_at_user_list' => array(
			'html'     => 'list',
			'position' => 120,
			'default'  => '',
			'group'    => 'smd_at_settings',
		),
	);

	$at_prefs = array();
	foreach ($smd_at_prefs as $key => $prefarr) {
		$at_prefs[$key] = get_pref($key, '', $force);
		if ($at_prefs[$key] == '') {
			$at_prefs[$key] = $prefarr['default'];
		}
	}
	return $at_prefs;
}

// ------------------------
function smd_at_options($event, $step, $message='') {
	smd_at_setup($message);
}

// ------------------------
function smd_at_setup($message='') {
	global $smd_at_event, $theme, $smd_core_themes;

	$smd_at_styles = smd_at_get_style_rules();
	$at_prefs = smd_at_get_prefs(1);

	pagetop(gTxt('smd_at_prefs_title'),$message);

	$levels = get_groups();
	unset($levels[1]); // Publishers get special privs apart from the masses
	$numLevs = count($levels);

	// Split the user skin list
	$uskins = explode(',', $at_prefs['smd_at_user_list']);

	$layout = $at_prefs['smd_at_layout'];
	$clrBtn = ' [<span id="smd_clr" class="smd_fakebtn">'.gTxt('smd_at_clear').'</span>]';
	$btnSet = fInput('submit', 'submit', gTxt('smd_at_set'), 'publish');
	$btnSave = graf(fInput('submit', 'submit', gTxt('save'), 'publish'));
	$btnList = '<p class="txp-buttons"><a class="navlink" href="?event='.$smd_at_event.'">'.gTxt('smd_at_all_themes').'</a></p>';
	$radBtns = array(
		gTxt('smd_at_per_site'),
		gTxt('smd_at_per_group'),
		gTxt('smd_at_per_user'),
	);

	$skin_list = smd_at_read_skins();

	// selectInput needs both index and value to be the same in this case
	$skinsel = array();
	foreach($skin_list as $key1 => $value1) {
		if (smd_at_exists($value1)) {
			$skinsel[$value1] = $skin_list[$key1];
		}
	}
	$gbl_skin = ($at_prefs['smd_at_global_skin'] != '') ? $at_prefs['smd_at_global_skin'] : $theme->name;
	$crushers = smd_at_crush_options('compress');

	echo n, '<div class="plugin-column">',
		n, '<h2>', strong(gTxt('smd_at_prefs_title')), '</h2>',
		n, $btnList,
		n, '<form method="post" action="?event=', $smd_at_event, a, 'step=smd_at_prefs_update" onsubmit="return smd_presub();">',
		n, inputLabel('smd_at_case_sort', yesnoRadio('smd_at_case_sort', $at_prefs['smd_at_case_sort']), 'smd_at_case_sort');

	if ($crushers) {
		echo n, inputLabel('smd_at_crush', radioSet($crushers, 'smd_at_crush', $at_prefs['smd_at_crush']), 'smd_at_crush_type');
	}

	echo n, inputLabel('smd_at_layout', radioSet(array(gTxt('smd_at_layout_list'), gTxt('smd_at_layout_grid')), 'smd_at_layout', $at_prefs['smd_at_layout']), 'smd_at_layout'),
		n, inputLabel('smd_at_thumbsize', fInput('text', 'smd_at_tw', $at_prefs['smd_at_tw'],'input-xsmall','','',4).n.gTxt('smd_at_times').n.fInput('text', 'smd_at_th', $at_prefs['smd_at_th'],'input-xsmall','','',4), 'smd_at_thumbsize'),
		n, inputLabel('smd_at_filename_format', fInput('text', 'smd_at_filename_format', $at_prefs['smd_at_filename_format']), 'smd_at_filename_format'),
		n, inputLabel('smd_at_max_theme_size', fInput('text', 'smd_at_max_theme_size', $at_prefs['smd_at_max_theme_size']), 'smd_at_max_theme_size'),
		n, inputLabel('smd_at_global_skin', selectInput('smd_at_global_skin', $skinsel, $gbl_skin, 0, 0, 'smd_at_global_skin'), 'smd_at_global_skin'),
		n, inputLabel('smd_at_skin_system', gTxt('smd_at_one_theme').n.radioSet($radBtns, 'smd_at_system', $at_prefs['smd_at_system']), 'smd_at_skin_system');

	// Option 1
	$priv_list = '<select id="smd_at_privs" name="smd_at_privs[]" class="list" size="'.$numLevs.'" multiple="multiple">';
	foreach ($levels as $levid => $levname) {
		$priv_list .= '<option value="'.$levid.'">'.$levname.'</option>';
	}
	$priv_list .= '</select>';

	// Note the hidden skin group box; jQuery keeps track of any list changes and keeps it updated
	$sela = '<span class="edit-label"><label>'. gTxt('smd_at_skin_groups').'</label></span>';
	$selb = hInput('smd_at_group_list', $at_prefs['smd_at_group_list']);
	$selb .= '<select id="smd_at_grps" name="smd_at_grps" class="list" size="'.$numLevs.'">';
	foreach ($skin_list as $askin) {
		if (smd_at_exists($askin)) {
			$selb .= '<option value="'.$askin.'">'.$askin.'</option>';
		}
	}
	$selb .= '</select>';
	echo n, graf($sela.'<span class="edit-value">'.$selb.$priv_list.'</span>', ' class="smd_at_sel1"');

	// Option 2
	$sela = gTxt('smd_at_allowed_skins');
	$selb = '<select id="smd_at_user_list" name="smd_at_user_list[]" class="list" size="8" multiple="multiple">';
	foreach ($skin_list as $askin) {
		if (smd_at_exists($askin)) {
			$selb .= '<option value="'.$askin.'"'.((in_array($askin, $uskins)) ? ' selected="selected"' : '').'>'.$askin.'</option>';
		}
	}
	$selb .= '</select>'.$clrBtn;

	echo graf($sela.'<span class="edit-value">'.$selb.'</span>', ' class="smd_at_sel2"'),
		n, $btnSave,
		n, tInput(),
		n, '</form>',
		n, '</div>';

	echo script_js(<<<EOJS
// Handle show/hide of pref widgets based on radio selection
function smd_at_prefswap(selValue) {
	for (idx=0; idx < 3; idx++) {
		if (idx==selValue) {
			jQuery(".smd_at_sel"+idx).show();
		} else {
			jQuery(".smd_at_sel"+idx).hide();
		}
	}
}

jQuery(function() {
	jQuery("input[name='smd_at_system']").change(function() {
		smd_at_prefswap(this.value);
	});

	jQuery('#smd_clr').click(function() {
		jQuery('#smd_at_user_list option').prop("selected", "");
	});

	jQuery("#smd_at_grps").change(function() {
		selskin = jQuery(this).val();

		// Clear the old privs list and grab the current list from the hidden field
		jQuery("#smd_at_privs option").prop("selected",false);
		var grplist = jQuery("input[name='smd_at_group_list']").val();
		var grps = grplist.split(',');
		var cnt = grps.length;
		for (var idx = 0; idx < cnt; idx++) {
			privs = grps[idx].split(':');
			skinid = privs.shift();
			if (skinid == selskin) {
				numPrivs = privs.length;
				for (jdx = 0; jdx < numPrivs; jdx++) {
					jQuery("#smd_at_privs option[value='"+privs[jdx]+"']").prop("selected", true);
				}
			}
		}
	});

	jQuery("#smd_at_privs").change(function() {
		selskin = jQuery("#smd_at_grps option:selected").val();
		var out = [];
		var privs = [];
		privs.push(selskin);
		jQuery("#smd_at_privs option:selected").each(function() {
			privs.push(jQuery(this).val());
		});
		if (privs.length == 1) {
			privs.pop();
		} else {
			out.push(privs.join(":"));
		}
		var hidlist = jQuery("input[name='smd_at_group_list']").val();
		var prevlist = hidlist.split(',');
		var prevcnt = prevlist.length;

		jQuery("#smd_at_grps option").each(function() {
			currskin = jQuery(this).val();
			if (currskin != selskin) {
				for (var idx = 0; idx < prevcnt; idx++) {
					prevprivs = prevlist[idx].split(':');
					skinid = prevprivs.shift();
					// Generate the priv list for the currently selected skin, removing any duplicate privs set elsewhere
					if (skinid == currskin) {
						tmpout = [];
						tmpout.push(skinid);
						for (thispriv in prevprivs) {
							if (jQuery.inArray(prevprivs[thispriv], privs) < 0) {
								tmpout.push(prevprivs[thispriv]);
							}
						}
						if (tmpout.length > 1) {
							out.push(tmpout.join(":"));
						}
					}
				}
			}
		});
		jQuery("input[name='smd_at_group_list']").val(out);
	});

	// Display a tooltip showing the currently-assigned skin when hovering over a privilege level
	jQuery("#smd_at_privs option").hover(function() {
		hovitem = jQuery(this).val();
		grps = jQuery("input[name='smd_at_group_list']").val();
		items = grps.split(",");
		for (idx = 0; idx < items.length; idx++) {
			skinz = items[idx].split(":");
			for (jdx = 1; jdx < skinz.length; jdx++) {
				if (skinz[jdx] == hovitem) {
					jQuery(this).attr("title", skinz[0]);
					break;
				}
			}
		}
	},
	function() {
		jQuery(this).attr("title", "");
	});
	smd_at_prefswap(jQuery("input[name='smd_at_system']:checked").val());
	jQuery("#smd_at_privs").change();
});
EOJS
	);
}

// ------------------------
// Split a multi-char preference value into an array of keys/values.
// Note: value is passed in and not read directly from the prefs array in this function - intentionally
function smd_at_pref_explode($val) {
	$order = array_values(array(gTxt('smd_at_c_gzip'),gTxt('smd_at_c_bzip2'),gTxt('smd_at_c_zip')));
	$onoff = array_values(preg_split('//', $val, -1, PREG_SPLIT_NO_EMPTY));
	$out = array();
	foreach($order as $key1 => $value1) {
		$out[(string)$value1] = $onoff[$key1];
	}
	return $out;
}

// -------------------------------------------------------------
function smd_at_prefs_install($showpane='1') {
	$at_prefs = smd_at_get_prefs();

	$message = '';
	foreach ($at_prefs as $pref => $dflt) {
		if (!fetch('name','txp_prefs','name',$pref)) {
			$id = safe_insert('txp_prefs','prefs_id=1, name='.doQuote(doSlash($pref)).', val='.doQuote(doSlash($dflt)).', event="smd_at", type='.PREF_HIDDEN);
		}
	}
	if ($showpane) {
		$message = gTxt('smd_at_prefs_installed');
		smd_at_setup($message);
	}
}

// -------------------------------------------------------------
function smd_at_prefs_remove($showpane='1') {
	$at_prefs = smd_at_get_prefs();

	$message = '';
	foreach ($at_prefs as $pref => $dflt) {
		if (fetch('name','txp_prefs','name',$pref)) {
			$id = safe_delete('txp_prefs','name='.doQuote(doSlash($pref)));
		}
	}
	if ($showpane) {
		$message = gTxt('smd_at_prefs_deleted');
		smd_at_setup($message);
	}
}

// -------------------------------------------------------------
function smd_at_prefs_update() {
	global $smd_plugin_prefs, $smd_at_event;

	$at_prefs = smd_at_get_prefs();

	$message = '';
	$post = array();

	foreach ($at_prefs as $pref => $prefobj) {
		$post[$pref] = ps($pref);
	}

	// Handle list options separately and only update them if they're set
	// (they've already been set in the foreach above, so need unsetting)
	if (ps('smd_at_user_list')) {
		$post['smd_at_user_list'] = join(',', ps('smd_at_user_list'));
	} else {
		$post['smd_at_user_list'] = '';
	}
	if (ps('smd_at_group_list')) {
		$post['smd_at_group_list'] = ps('smd_at_group_list');
	} else {
		unset($post['smd_at_group_list']);
	}
	if (ps('smd_at_crush')) {
		$post['smd_at_crush'] = ps('smd_at_crush');
	} else {
		unset($post['smd_at_crush']);
	}

	// Set the system-wide theme to the global theme
	if ($post['smd_at_global_skin']) {
		set_pref('theme_name', $post['smd_at_global_skin']);
	}

	foreach ($at_prefs as $pref => $dflt) {
		if (isset($post[$pref])) {
			set_pref($pref, $post[$pref], $smd_at_event, PREF_HIDDEN);
		}
	}
	$message = gTxt('preferences_saved');
	smd_at_setup($message);
}

// ------------------------
// UTILITY FUNCTIONS
// ------------------------
function smd_at_get_privs($user='') {
	global $txp_user;
	$user = ($user) ? $user : $txp_user;
	$privs = safe_field("privs", "txp_users", "name='".doSlash($user)."'");
	return $privs;
}

// ------------------------
function smd_at_exists($name) {
	$instance = theme::factory($name);
	return $instance;
}

// If per-user skin support is OFF, the global skin wins.
// One exception: if the user is an admin, allow the current skin to prevail so they may switch skins with impunity
// and not affect the global skin
function smd_at_per() {
	global $smd_at_privs, $theme, $txp_user;

	$at_prefs = smd_at_get_prefs();
	$skinSys = $at_prefs['smd_at_system'];
	$privs = smd_at_get_privs();
	$gbl_skin = ($at_prefs['smd_at_global_skin'] != '') ? $at_prefs['smd_at_global_skin'] : '';
	$gbl_skin = (smd_at_exists($gbl_skin)) ? $gbl_skin : 'classic';

	switch ($skinSys) {
		case 0:
			// Global forced skin (except admins)
			if (!in_array($privs, explode(',', $smd_at_privs))) {
				return $gbl_skin;
			} else {
				// Admins
				$adm_skin = get_pref('smd_skin', (($gbl_skin) ? $gbl_skin : $theme->name));
				return (smd_at_exists($adm_skin)) ? $adm_skin : 'classic';
			}
			break;
		case 1:
			// Group-level forced skins
			if (!in_array($privs, explode(',', $smd_at_privs))) {
				$forceSkins = ($at_prefs['smd_at_group_list'] != '') ? $at_prefs['smd_at_group_list'] : (($gbl_skin) ? $gbl_skin : $theme->name);

				// Split the group skin list
				$gskins = array();
				$gopts = explode(',', $forceSkins);
				foreach ($gopts as $grpdef) {
					if ($grpdef == '') continue;
					$privgrp = explode(":", $grpdef);
					$skinid = array_shift($privgrp);
					if (in_array($privs, $privgrp)) {
						return (smd_at_exists($skinid)) ? $skinid : 'classic';;
					}
				}
				return ($gbl_skin) ? $gbl_skin : $theme->name;
			} else {
				// Admins
				$adm_skin = get_pref('smd_skin', (($gbl_skin) ? $gbl_skin : $theme->name));
				return (smd_at_exists($adm_skin)) ? $adm_skin : 'classic';
			}
			break;
		case 2:
			// Per-user skin. If user is non-admin, check the skin is in the allowed list
			if (!in_array($privs, explode(',', $smd_at_privs))) {
				$validSkins = ($at_prefs['smd_at_user_list']) ? $at_prefs['smd_at_user_list'] : (($gbl_skin) ? $gbl_skin : $theme->name);
				$validSkins = do_list($validSkins);
				$the_skin = get_pref('smd_skin', (($gbl_skin) ? $gbl_skin : $theme->name));
				return (in_array($the_skin, $validSkins) && smd_at_exists($the_skin)) ? $the_skin : '';
			} else {
				// Admins
				$adm_skin = get_pref('smd_skin', (($gbl_skin) ? $gbl_skin : $theme->name));
				return (smd_at_exists($adm_skin)) ? $adm_skin : 'classic';
			}
			break;
	}
}

// ------------------------
// Read and return the manifest, if it exists and add a few other niceties to the array for later
function smd_at_read_skinfo($skin) {
	global $smd_core_themes;

	$this_theme = theme::factory($skin);
	$skinfo = array();
	if ($this_theme) {
		$skinfo = $this_theme->manifest();
		$skinfo['dname'] = empty($skinfo['title']) ? ucwords($this_theme->name) : $skinfo['title'];
		$skinfo['name'] = $this_theme->name;
		$skinfo['path'] = $this_theme->url;
		$skinfo['phpfile'] = $this_theme->path($skin);
		$skinfo['based_on'] = '';
		$contents = file_get_contents($skinfo['phpfile']);
		if (($pos = strpos($contents, 'theme::based_on')) !== false) {
			$begpos = strpos($contents, "'", $pos)+1;
			$endpos = strpos($contents, "'", $begpos);
			$base = substr($contents, $begpos, $endpos-$begpos);
			$skinfo['based_on'] = (in_array($base, $smd_core_themes)) ? '' : $base;
		}
		unset($this_theme);
	}
	return $skinfo;
}

// ------------------------
// Grab the thumbnail filename if it exists, optionally return a formatted img tag
function smd_at_get_thumb($skin, $img=0) {
	$at_prefs = smd_at_get_prefs();
	$tw = $at_prefs['smd_at_tw'];
	$th = $at_prefs['smd_at_th'];
	$use_thumb = ($tw == 0 || $th == 0) ? false : true;
	$dflt_thumb = 'data:image/png;base64,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';

	// An array means the manifest has already been read and is being passed into this function
	if (!is_array($skin)) {
		$skin = smd_at_read_skinfo($skin);
	}
	if ($skin) {
		$skindir = $skin['path'];
		$thumbname = glob($skindir.'screenshot.*');
		return ($img && $use_thumb) ? '<img class="content-image" src="'.(($thumbname && file_exists($thumbname[0])) ? $thumbname[0] : $dflt_thumb).'" alt="'.((isset($skin['name'])) ? $skin['name'] : '').' thumbnail" width="'.$tw.'" height="'.$th.'" />' : '';
	} else {
		return '';
	}
}

// ------------------------
function smd_at_read_skins() {
	$skin_list = theme::names();
	$skin_list = smd_at_sort($skin_list);
	return $skin_list;
}

// ------------------------
// Sort the skins, keeping core themes at the top
function smd_at_sort($skin_list) {
	global $prefs, $smd_core_themes;

	$caseSense = isset($prefs['smd_at_case_sort']) ? $prefs['smd_at_case_sort'] : 1;

	if($caseSense) {
		natsort($skin_list);
	} else {
		natcasesort($skin_list);
	}
	$dflt_found = array();
	foreach ($skin_list as $skin_idx => $skin_name) {
		if (in_array($skin_name, $smd_core_themes)) {
			unset($skin_list[$skin_idx]);
			$dflt_found[] = $skin_name;
		}
	}

	$dflts = array_reverse($dflt_found); // So they go in alphabetical order
	foreach ($dflts as $coretheme) {
		array_unshift($skin_list, $coretheme);
	}

	return $skin_list;
}

// ------------------------
function smd_at_listdir($start_dir='.') {
	$files = array();

	if (is_dir($start_dir)) {
		$fh = opendir($start_dir);
		while (($file = readdir($fh)) !== false) {
			// loop through the files, skipping . and .., and recursing if necessary
			if (strcmp($file, '.')==0 || strcmp($file, '..')==0) continue;
			$filepath = $start_dir . '/' . $file;
			if ( is_dir($filepath) ) {
				$files = array_merge($files, smd_at_listdir($filepath));
			} else {
				array_push($files, $filepath);
			}
		}
		closedir($fh);
	} else {

		// false if the function was called with an invalid non-directory argument
		$files = false;
	}

	return $files;
}

// ------------------------
// Recursive rmdir() courtesy of the php manual user comments
function smd_rmdir_recursive($filepath) {
	if (is_dir($filepath) && !is_link($filepath)) {
		if ($dh = opendir($filepath)) {
			while (($sf = readdir($dh)) !== false) {
				if ($sf == '.' || $sf == '..') continue;
				if (!smd_rmdir_recursive($filepath.'/'.$sf)) {
					break; // Doh, can't delete
				}
			}
			closedir($dh);
		}
		return rmdir($filepath);
	}
	return unlink($filepath);
}

// ------------------------
// From PHP manual comments. Thanks puremango
function smd_at_is_dir($dir) {
	// bypasses open_basedir restrictions of is_dir and fileperms
	$tmp_cmd = `ls -dl $dir`;
	$dir_flag = $tmp_cmd[0];
	if($dir_flag!="d") {
		// not d; use next char (first char might be 's' and is still directory)
		$dir_flag = $tmp_cmd[1];
	}
	return ($dir_flag=="d");
}

// ------------------------
function smd_at_change_pageby() {
	setcookie('smd_at_pageby', gps('qty'));
	smd_at_list();
}

// ------------------------
function smd_at_switch($message='') {
	global $smd_at_privs;

	extract(doSlash(gpsa(array('skin', 'event', 'nextstep'))));
	$url = "?event=".$event."&step=".$nextstep;

	if ($skin && smd_at_exists($skin)) {
		set_pref('smd_skin', $skin, $event, PREF_HIDDEN, 'text_input', 0, PREF_PRIVATE);
		$url .= '&message=' . (($message) ? $message : gTxt('smd_at_skin_switched', array('{skin}' => $skin)));
	} else {
		$url .= '&message=' . $message;
	}

	// Since the headers have been sent, double-declutch in order to show the skin this first time
	echo <<<EOS
<script type="text/javascript">
window.location.href="{$url}";
</script>
<noscript>
<meta http-equiv="refresh" content="0;url={$url}" />
</noscript>
EOS;
	exit;
}

// All-user skin chooser
function smd_admat($event, $step) {
	if(!$step or !in_array($step, array(
			'smd_at_switch',
		))) {
		smd_at_chooser('');
	} else $step();
}

// ------------------------
function smd_at_chooser($message='') {
	global $prefs, $smd_at_adm_event, $theme;

	$smd_at_styles = smd_at_get_style_rules();
	$at_prefs = smd_at_get_prefs();
	$layout = $at_prefs['smd_at_layout'];
	$tw = $at_prefs['smd_at_tw'] + 10;
	$th = $at_prefs['smd_at_th'] + 80;

	$message = ($message) ? $message : gps('message');
	pagetop(gTxt('smd_at_skinner'),$message);

	$curr_skin = $theme->name;

	$allowed = '';
	if (isset($prefs['smd_at_user_list'])) {
		$allowed = explode(",",$prefs['smd_at_user_list']);
		foreach ($allowed as $idx => $valid) {
			if ($valid == '') {
				unset($allowed[$idx]);
			}
		}
	}
	$allowed = smd_at_sort($allowed);
	$hdrow = hed(gTxt('smd_at_avail_title'), 2);

	echo '<div class="txp-container">';

	if ($layout==0) {
		echo '<div class="txp-listtables">',
			startTable('', '', 'txp-list'),
			tr(
				tda($hdrow, ' colspan="3"')
			),
			assHead(
				gTxt('smd_at_skin_gbl'),
				'author',
				'description'
			);
	} else {
		echo $hdrow, '<div class="txp-grid">';
	}
	foreach ($allowed as $skin_name) {
		$skinfo = smd_at_read_skinfo($skin_name);
		if ($skinfo) {
			$thumbnail = smd_at_get_thumb($skinfo, 1);
			$switch_link = '?event='.$smd_at_adm_event.a.'step=smd_at_switch'.a.'nextstep=smd_admat'.a.'skin='.$skin_name;
			$thumblock = ($layout==0)
						? '<a href="'.$switch_link.'" title="'.gTxt('smd_at_apply_skin').'">'.$skinfo['dname'].(($thumbnail) ? br.$thumbnail : '').'</a>'
						: '<a href="'.$switch_link.'" title="'.gTxt('smd_at_apply_skin').'">'.(($thumbnail) ? $thumbnail : gTxt('smd_at_apply_skin')).'</a>';
			$authblock = (strpos($skinfo['author_uri'], "http://") === 0) ? '<a href="'.$skinfo['author_uri'].'">'.$skinfo['author'].'</a>' : $skinfo['author'];

			if ($layout==0) {
				echo tr(
					n.td($thumblock)
					.n.td($authblock)
					.n.td($skinfo['description'])
					, (($skin_name == $curr_skin) ? ' class="highlight"' : '')
				);
			} else {
				echo n, '<div class="txp-grid-cell'.(($skin_name == $curr_skin) ? ' highlight' : '').'">',
						n, hed($skinfo['dname'], 3),
						n, '<p>', $thumblock, '</p>',
						n, '<p>', n, gTxt('smd_at_by'), n, $authblock.'</p>',
					n, '</div>';
			}
		}
	}
	if ($layout==0) {
		echo n, endTable(),
			n, '</div>';
	} else {
		echo n, '</div>';
	}
	echo n, '</div>';
}

// -------------------------------------------------------------
function smd_at_save_pane_state() {
	list($p1, $p2) = smd_at_valid_types();

	$panes = array_merge($p1, $p2, array('folders', 'image_files', 'other'));
	$pane = gps('pane');

	if (in_array($pane, $panes))
	{
		set_pref("smd_at_pane_{$pane}_visible", (gps('visible') == 'true' ? '1' : '0'), 'smd_at', PREF_HIDDEN, 'yesnoradio', 0, PREF_PRIVATE);
		send_xml_response();
	} else {
		send_xml_response(array('http-status' => '400 Bad Request'));
	}
}
# --- END PLUGIN CODE ---
if (0) {
?>
<!--
# --- BEGIN PLUGIN HELP ---
h1(#top). smd_admin_themes

Install, manage, edit and switch admin-side themes then share them with the community.

h2(#features). Features

* Create and Edit admin-side themes
* Employ images, CSS, JS, HTML/PHP (for changing masthead, header & footer) in your theme
* Use constants in your CSS files
* Base your theme on an existing theme to tweak it to your taste
* Export a theme package for distribution to the community in either .tar, .tgz, .bz2 or .zip format (requires "smd_crunchers":http://stefdawson.com/smd_crunchers plugin)
* Import / install other themes from the "community repository":http://textgarden.org/administration-themes
* Administrator can set a default theme for all users, or enable per-user / per-role themes

h2(#install). Installation / Uninstallation

p(warning). Requires Textpattern 4.5.0+ and "smd_crunchers":http://stefdawson.com/smd_crunchers plugin for import/export

Download the plugin from either "textpattern.org":http://textpattern.org/plugins/1096/smd_admin_themes, or the "software page":http://stefdawson.com/sw, paste the code into the Textpattern __Admin->Plugins__ pane, install and enable the plugin. A new tab labelled __Extensions->Admin themes__ is created. *Only publishers will see this tab*.

The plugin should automatically install the preferences for you. Click 'Preferences' from the __Extensions->Admin themes__ tab or __Options__ from the __Admin->Plugins__ tab to alter, delete or reinstall them.

Visit the "forum thread":http://forum.textpattern.com/viewtopic.php?id=30952 for more info or to report on the success or otherwise of the plugin.

To uninstall, simply delete the plugin from the _Admin->Plugins_ page. The preferences will automatically be removed. Please be aware that removing the plugin does *not remove any themes you have installed, nor does it remove per-user theme preferences*. Per-user prefs will simply be ignored when the plugin is deleted.

h2(#usage). Usage

On the __Extensions->Admin themes__ tab is a list or grid containing installed themes. Out of the box, there will be three available: __classic__, __hive__ and __remora__. *It's advisable not to change these themes* so you can always go back to them if everything goes sideways. Plus it's a very useful starting point from which to "base":#clone a "new theme":#new.

In the list layout, the columns are:

; %(atnm)Theme%
: The name of the theme and (optional) thumbnail assigned to it. Click to "activate":#switch the theme.
: If the theme is based on another user's theme, this dependency will be shown in parentheses after the theme name.
; %(atnm)Author%
: You! Linked to your web site if you supply it in your "Manifest":#about.
; %(atnm)Version%
: Theme version number in @major.minor.subrev@ notation. If a newer version of a theme is available from Textgarden, the version number will be hyperlinked to the theme on Textgarden so you may download/install it.
: The versions are checked, at most, once every 24 hours to avoid hammering the server.
; %(atnm)Description%
: Brief one- or two-liner explaining your theme. If you have offered a help URL in your manifest, it will be linked here as well.
; %(atnm)Actions%
: Actions to perform on each theme:
;; %(atnm)[New theme]%
:: "Create":#new a new blank, empty folder ready for your theme. No spaces / odd characters are allowed in the name and it must not start with a number.
;; %(atnm)[Edit]%
:: "Edit":#edit_theme the various details, files and content within the theme.
;; %(atnm)[Base]%
:: "Extend":#clone one of the existing themes to make your own changes under a new name.
;; %(atnm)[Export]%
:: "Save":#export the theme package to your hard drive for distribution/backup in your chosen compression format.
;; %(atnm)[Delete]%
:: Completely "remove":#delete the theme. Not available to the core themes, for obvious reasons! Also not available if a theme has been used as a basis for another theme in the current site.

The currently selected theme is shaded and the current default theme that is in effect is highlighted. The grid view has parts of the above information, laid out slightly differently.

h2(#switch). Switching themes

As the administrator, you can play God over everyone else's themes. You are free to install as many as you wish and switch between them without affecting any other logins. Nobody else will even know you have installed the plugin.

If, however, you visit the "Preferences":#setup page you can configure the themes that others use. There are three mechanisms to choose from:

* Force one theme for all users (except yourself)
* Force one theme for each user privilege level (except yourself)
* Allow all users (except yourself) to pick their favourite theme from a shortlist you define

At all times, you can choose any theme you please for your own use. This allows trialling, tweaking and testing of themes before unleashing them on your user base.

h2(#setup). Theme preferences

* %(atnm)Case-sensitive theme list% : When set to @Yes@, upper-case theme names take precedence over lower case theme names and will be listed first. For example, 3 theme called 'Angelic', 'barbaric' and 'Cohesive' will be ordered: @Angelic, Cohesive, barbaric@. Set to @No@ to mix upper and lower-case themes together (order is then @Angelic, barbaric, Cohesive@ ). The core themes are always listed first.
* %(atnm)Export compression type% : %(warning)Only if "smd_crunchers":http://stefdawson.com/smd_crunchers is installed% Depending on your version of PHP and which modules have been compiled into it, you will see a list of compression formats here. Choose one that suits you as the default in which to export your theme packages. You may choose from _Tar_, _GZip_ (actually tar+gzip), _Bzip2_ (tar+bzip), or _Zip_ (the default).
* %(atnm)Layout method% : Choose from a List View (useful if you prefer to hide or use small thumbs) or a Grid View of installed themes. This setting applies to both admin and user theme selection tabs. Default: Grid View
* %(atnm)Thumb dimensions% : Set the thumbnail dimensions in the theme list. Set either dimension to 0 to turn off thumbnail display. Default: 260 x 150px
* %(atnm)Filename format% : Define the format of the exported theme. You can use @{theme}@ and @{version}@ replacement variables in this field. For example, @{theme}_v{version}@. Default: @{theme}@
* %(atnm)Max theme file size% : Any (compressed) theme that exceeds this file size will not be imported. Default: @512000@
* %(atnm)Default theme% : Set the theme for all other users. If using 'One theme for everyone' the theme chosen here is forced upon all users. If using any of the other mechanisms, this theme is a fallback should something go pear-shaped.
* %(atnm)Theme system% : As detailed in "Switching themes":#switch, you may choose the way the Textpattern interface is presented to other users:
** %(atnm)One theme for all% : uses the Default theme for all users; they have no choice in the matter
** %(atnm)One theme per privilege level% : allows you to assign one or more privilege levels to a theme. Choose a theme from the left-hand list and then shift/ctrl-click the privilege levels to assign them. Flick between themes in the left column to see which ones are set for various user levels, or hover over a privilege level to see a tooltip. Only one level can be assigned to a theme so if you click a level that has already been assigned to another theme, it will be removed from its original assignment. Note you must Save the changes for them to take effect
** %(atnm)One theme per user% : define a shortlist from the available installed themes to offer to all users. A new panel will become available to other users under _Admin_ that is essentially a cut-down version of the _Admin themes_ tab. Users can switch between any one of the themes you have permitted.

Remember to click Save to apply the changes. Clicking any other panel will undo any modifications you may have made.

h2(#browse). Browse themes

Click this button to be taken to the central admin theme repository where you may browse themes and download them ready for installation.

h2(#import). Install a theme

p(warning). Only available if "smd_crunchers":http://stefdawson.com/smd_crunchers is installed.

Locate a theme package on your hard drive or paste a URL to a package in the box at the top of the page. Hit *Upload* and it will be installed. If it already exists it will be overwritten. Note that you may receive a warning if the theme is packaged using a compression algorithm that is not built into your version of PHP. A list of supported compression types is given below the upload box.

h2(#new). Create a new (empty) theme

Click *Create new theme* and a box will slide down allowing you to give your theme a name.

No spaces or odd characters are permitted, because the name you enter is the name of the folder that will be created in the _theme_ folder and the name of your theme's class. If you do manage to use odd characters, the name will be "dumbed down" for you.

In order to avoid name clashes with other people's themes, it is recommended that all themes you design begin with a unique 3-letter prefix of your own choosing, plus an underscore -- exactly like plugins. Thus, smd_BlueMeanie might well be the name of a theme. When you have named your theme, click **[Go]** to create a folder in which it can reside.

Once the name is set, the only ways to rename it are to:

# edit the theme's main @.php@ filename from the plugin's interface. The folder will be automatically renamed to match.
# manually rename the folder and @.php@ filename.

In both cases, you *must* also alter the theme's class name inside the @.php@ file itself.

h2(#clone). Extend an existing theme

Click **[Base]** to create a new theme based on another. A box will slide down so you may enter the name of your copy.

Observe the "naming convention":#new, then click **[Go]** to create the new theme.

%(warning)Please remember, your theme will be dependent on the chosen theme and *both* must be present on a user's system for the theme to work%. It is worth ensuring that users of your theme are made aware of this dependency to avoid unnecessary frustration; perhaps add a link to the theme's base, mention the dependency in the Help link and/or in the theme's article on Textgarden. You will not be able to delete any theme from the list that has such a dependency, otherwise your admin side will stop working.

h2(#export). Export a theme

p(warning). Only available if "smd_crunchers":http://stefdawson.com/smd_crunchers is installed.

If you wish to back up a theme or share it with others, click **[Export]**. A box will slide down offering you a choice of compression formats; the default is the format you chose from the "Preferences":#setup page.

When you have chosen the appropriate format, click **[Go]** to export the theme and save it to your computer. All related files in the theme will be packaged together into a single download file for convenience.

The filename is governed by the _Filename format_ preference.

h2(#delete). Delete a theme

Hit this (and confirm you are sure) to remove the entire theme folder and contents from the file system. %(warning)This is not undoable, so be careful%.

h2(#edit_theme). Edit a theme

A theme is a collection of files. The files all reside in their own self-contained folder under @textpattern/theme@. The name of the folder is the name of your theme, hence the reason it cannot contain any obscure characters that would be invalid in the filesystem or PHP variables.

When you click **[Edit]** you will be taken to a screen that allows you to make changes to the theme. The Edit screen is broken into two sub-panels, as follows:

h3(#edit_content). Content

This is where you edit the contents of the files in your theme. The small edit box at the top is the filename and the large text area is its content. Click **Save** to commit changes. You may freely rename any file you are editing.

p(warning). Important: if you select a file, edit it, rename it, and click **Save** you will overwrite whatever was in the previous file -- even if you empty the contents of the textarea in an effort to make a "new" one. If you wish to create a new file, you must click the **New file** button to ensure you are not editing an existing file by mistake.

When creating a new file, another box will appear allowing you to specify the folder for the file. Although files can be renamed, folders cannot. Once a file is inside a folder it cannot be moved to a different folder from the user interface: you will have to use your FTP program to move files or rename folders.

It is also worth noting that file permissions vary from host to host. If you try and save a theme file and receive a yukky warning message about not being able to write the file, try increasing the permissions on the theme folder and all files beneath it.

The theme files are distributed in Textpattern with @644@ permissions which should be fine for a standard host. Some shared hosting companies -- and these are usually the ones that tell you to set your @files@ and @images@ folders to 777 in order to make them writable by Textpattern -- run Apache/PHP in a different way which might require higher permissions in order to write to the theme folder. This is unfortunately outside the scope of the plugin so you will have to experiment if it causes you problems.

h3. File handling

Alongside the editing area is where theme files are managed. Firstly is a select list of all installed themes; the current theme being edited is selected. Changing the theme here will immediately allow you to edit another theme. This is very useful if you are copying and pasting files from one theme to another and saves you having to go back to the theme list first.

Beneath that are two buttons:

* %(atnm)New file% : Create a new, empty file in your theme folder. Nothing is actually created until you hit **Save** but using this button ensures you begin with a clean slate and don't accidentally overwrite the previous file you were editing
* %(atnm)Theme list% : A shortcut back to the main theme list (equivalent to clicking the _Admin themes_ menu item)

Next is an upload area allowing you to upload new files and images to your theme. You can browse for as many files to upload as you wish -- subject to the maximum file size restriction as set in your __Advanced Preferences__ -- and (optionally) store them in the nominated folder. These can be any of the supported file types, including images.

Below those buttons are a bunch of collapsible sections containing all the files that make up your theme. Click:

* a section heading to toggle the group of files visible/hidden
* a filename to load it into the text area for editing
* a regular (binary) image filename to preview it: svg files are previewed separately while editing them in the text area

Note that other binary files may not be edited and are prevented from being clicked.

You can use the checkboxes alongside each file to select files for deletion. Use the 'With selected...' box at the bottom of the list for this task. You may shift-click multiple files to select a range.

h4(#edit_img). Images

p(warning). Images must have a lower-case file extension or they will not show up in the list (although they will be uploaded). Supported extensions are @.jpg@, @.jpeg@, @.gif@, @.png@ and @.svg@.

Upload any images that your theme uses. Note the best way to refer to image URLs in stylesheets is with a relative path:

bc. .myStyle {
   background: url(my-image.png);
}

Each theme can also contain an optional thumbnail. This is an image of 260x150px in size, called @screenshot.png@ (or @.jpg@, @.gif@, etc) in your root theme folder. Note it will be squashed / stretched to fit your thumbnail dimensions set in the plugin prefs.

If you select an SVG image it will be opened up in the editor just like a regular file. You may preview it by clicking the *Preview* link alongside the filename input box. All other image files are previewed by clicking their name in the file list.

h4(#edit_css). Stylesheets

p(warning). Files can be any valid filename but MUST end in @.css@ or @.scss@ (i.e. Sass files)

The meat and potatoes of your theme. Add as many sheets as you like and load them from your PHP file(s).

h4(#edit_ssc). Styleplates

p(warning). Files can be any valid filename but MUST end in @.ssc@

A special version of a stylesheet that allows you to define constants throughout your sheet. Write your stylesheet in exactly the same way as normal, but where you find yourself, for example, using the same color value repeatedly or the same rules block, you can save yourself typing by using constants:

bc(prettyprint). @branding: #123456;
#header {
  color: @branding;
}
h2 {
  color: @branding;
}

You can also specify whole rule blocks like this (_Note the colon after the block name_) :

bc. @my_block: {
  margin:0 20px;
  border:3px solid #999;
  font-size:120%;
}
#header {
  color: @branding;
  position:relative;
  @my_block;
}
h2 {
  @my_block;
}

If you put all your constants at the top of the @.ssc@ file they will be removed from the generated css file.

When you save a @.ssc@ file, a corresponding-named @.css@ file will also be created. The two will be kept in sync as far as practicable (even if you rename the original file). When it comes to deletion though, they are treated separately. This allows you to either keep the @.ssc@ file in the distribution archive or remove it prior to export.

h4(#edit_js). Javascript

p(warning). Files can be any valid filename but MUST end in @.js@

Any trickery you may wish to employ in your theme can be written in these files. Remember that jQuery is loaded by default on the admin side so you can play with that.

h4(#edit_php). PHP

p(warning). One file must be named *exactly* the same as your theme, i.e. @smd_BlueMeanie.php@. Any other files must end in @.php@

Consult the "Admin Side theme guide":http://textpattern.net/wiki/index.php?title=Creating_an_Admin_Side_Theme on Textbook for the rules on making themes. Note that corrupt themes are detected to the best of the plugin's ability and you may not export, base or switch to any theme that is broken.

If you rename the theme's core PHP file (i.e. the one with the same name as the theme folder itself) the plugin will attempt to rename the folder as well; essentially renaming the theme. This should prevent a theme from becoming uneditable, but it is up to you to keep the class name in sync with the file name. If at any time you go back to the theme list/grid and find a theme exists but has no information associated with it, chances are it's because the class name doesn't match the theme's folder name. Just hit **[Edit]** and alter the PHP file to bring everything back on track.

h4(#edit_js). Text / Textile docs

Any files with a @.txt@ or @.textile@ extension are supported. Textile files can be previewed by clicking the *Preview* link alongside the filename input box. Note that when the main textarea is edited, the preview becomes unavailable because the file must be saved to update it first.

h4(#edit_other). Others

Any files that are not of the above supported types appear here. If you do try to create a file that is not supported, a warning will be issued. You must hit **Save** again to confirm you really wish to create the file.

h4(#edit_folder). Folders

Any folders that your theme is using will be listed here. If you click the 'x' alongside any one, it *and all its contents* will be deleted. By contrast, if you delete all files from a folder using the regular 'With selected' mechanism, the folder itself will remain in the filesystem (although it won't be shown) in this folder list.

h3(#about). Manifest

In your main PHP file is a function called @manifest()@ which contains info about you and your theme. Edit the values here to stamp your mark on the theme. Note that if your description contains apostrophes they must be _escaped_ by preceding them with a single backslash @\@. e.g.

bc. 'description' => 'Don\'t fear the reaper!',

h2(#peruser). Per-user theme selection

If an administrator chooses to allow per-user themes, a new panel appears under the Admin menu item of all users (except administrators). This simply displays all available themes -- ones that the administrator has explicitly allowed.

Clicking a theme name or thumbnail will immediately switch to that theme until the user chooses another or the administrator changes theme system.

h2(#author). Author and credits

"Stef Dawson":http://stefdawson.com/contact.

This plugin would not have existed without the dedication, ideas and genius of Robert Wetzlmayr for the theme support. Plus of course the army of beta testers, ideas hamsters and tireless theme advocates, most notably Stuart Butcher, Dale Chapman, Dave DeSandro, Mike Dennis and Phil Wareham.

Kudos and thanks to you all.

h2(#changelog). Changelog

* 12 Jun 2009 | 0.1 | Initial public beta
* 03 Sep 2009 | 0.11 | Improved Textgarden theme feed and links ; improved file support (both thanks thebombsite) ; made global theme more obvious ; altered prefs panel a bit ; added @.ssc@ support ; ignored .svn subdirs (all thanks pieman) ; improved warning messages ; misc fixes and housekeeping
* 02 Nov 2009 | 0.12 | Reduced theme feed clutter in the prefs table
* 04 Nov 2009 | 0.13 | Removed ereg_replace to conform with PHP5.3+ (thanks thebombsite) ; changed 'global' to 'default' ; fixed rogue untranslated string
* 09 Nov 2009 | 0.14 | Moved URLs in line with Textgarden layout alterations (thanks for the headsup thebombsite) ; made feeds more robust in the event Textgarden is down / under maintenance (thanks mlarino)
* 09 Feb 2010 | 0.2 | Native support for zip importing and exporting (almost) irrespective of your PHP environment ; zip is now the default system ; better notification of supported compression types and more robust rejection if something is missing
* 10 Feb 2010 | 0.21 | Fixed bzip2 warning (thanks thebombsite) ; fixed recursive mkdir problem with bzip2 files (thanks PHP manual comments) ; fixed rogue temp file left behind with zip import
* 15 Feb 2010 | 0.22 | When renaming the core theme PHP file, automatically rename folder too (thanks floodfish)
* 28 Feb 2010 | 0.23 | Rudimentary validation of zip file contents (thanks Tuts_and_Tipps); fixed export notification
* 06 Aug 2010 | 0.24 | Fixed @fsockopen()@ and undefined index warnings if not connected to the Internet / prefs not installed
* 01 Nov 2010 | 0.25 | Better theme integration (colours, etc) ; fixed duplicate page renders on edit screen and added filename format option (both thanks maverick)
* 21 Feb 2011 | 0.26 | Fixed import bug if more than one dot in filename (thanks philwareham)
* -08 Jun 2011 | 0.27 | Fixed erroneous stripping of slashes on save ; added txp path pref (thanks maniqui)- *VERSION REVOKED*
* 28 Sep 2011 | 0.28 | Fixed erroneous stripping of slashes on save
* 29 Jan 2012 | 0.30 | Moved (de)compression algorithms to smd_crunchers: now a required library for this plugin if you wish to import/export
* 29 Jan 2012 | 0.31 | D'oh, moved @smd_mkdir_recursive()@ to smd_crunchers too
* 11 Sep 2012 | 0.40 | Updated for Txp 4.5.0 (thanks philwareham) ; better folder support ; improved file and image handling ; supports sass, svg, and textile types ; preview facility added ; multi-file uploads supported ; placeholder image added for themes without screenshots (thanks philwareham)
# --- END PLUGIN HELP ---
-->
<?php
}
?>