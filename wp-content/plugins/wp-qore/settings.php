<?php

function wpqorefunc_fp_settings() {

$wpconfigchange='
define(\'WP_CONTENT_FOLDERNAME\', \'files\'); //change "files" to whatever you want and then rename wp-content folder to this name 
define(\'WP_CONTENT_DIR\', ABSPATH . WP_CONTENT_FOLDERNAME ); //don\'t edit this line
define(\'WP_CONTENT_URL\', \''.home_url('/').'\'.WP_CONTENT_FOLDERNAME);  //don\'t edit this line
define(\'WP_PLUGIN_DIR\', WP_CONTENT_DIR . \'/\'.\'modules\' ); //change "modules" to whatever you want 
//and then rename your plugins directory to new name.
define(\'WP_PLUGIN_URL\', WP_CONTENT_URL.\'/\'.\'modules\'); //change "modules" to whatever you want'; 

wpqorefunc_is_checked("wpqorefunc_showadminbar");
wpqorefunc_is_checked("wpqorefunc_reregjquery");
wpqorefunc_is_checked("wpqorefunc_removeversion");
wpqorefunc_is_checked("wpqorefunc_rmheader");
wpqorefunc_is_checked("wpqorefunc_2steplogin");
wpqorefunc_is_checked("wpqorefunc_compresshtml");
wpqorefunc_is_checked("wpqorefunc_dashboard");
wpqorefunc_is_checked("wpqorefunc_gzip");
wpqorefunc_is_checked("wpqorefunc_wphidenag");
wpqorefunc_is_checked("wpqorefunc_plug-edit");
wpqorefunc_is_checked("wpqorefunc_shortcode");
wpqorefunc_is_checked("wpqorefunc_exportwidget");
wpqorefunc_is_checked("wpqorefunc_hide-adminbar-sub");
wpqorefunc_is_checked("wpqorefunc_phpwidget");
wpqorefunc_is_checked("wpqorefunc_post_revisions");
wpqorefunc_is_checked("wpqorefunc_force_ssl_admin");
wpqorefunc_is_checked("wpqorefunc_coreupdate");
wpqorefunc_string_setting("wpqorefunc_secret_arg",'secretkey1');
wpqorefunc_string_setting("wpqorefunc_login_logo_url",'');
wpqorefunc_string_setting("wpqorefunc_theme_directory",'templates');
wpqorefunc_string_setting("wpqorefunc_exceptional_url",'');
wpqorefunc_is_checked("wpqorefunc_login_logo");
wpqorefunc_is_checked("wpqorefunc_forbid_wpadmin");
//wpqorefunc_string_setting("wpqorefunc_1st_pass"); //disabled since 1.0.0

?>

<div class="wrap">
<div id="icon-options-general" class="icon32"><br></div><h2>WP Qore Settings</h2>

<form action="" method="post">
<table class="form-table" style="background-color:#F7F7F7;border: 1px solid #e1e1e1;margin-bottom:20px">
<tbody>

<h3>Login Settings:</h3>

<tr valign="top">
<th scope="row"><label for="home">Force SSL Admin</label></th>
<td>
<label for="wpqorefunc_force_ssl_admin">
<div class="switch toggle3">
<input name="wpqorefunc_force_ssl_admin" type="checkbox" id="wpqorefunc_force_ssl_admin" value="1" <?php echo get_option("wpqorefunc_force_ssl_admin");?>>
<label><i></i></label>
</div>
<i>Once enabled, forces SSL for wp-admin area</i><br>
Requires all interaction with the WordPress backend, including login, to occur via a secure connection.<br>
<b>Warning:</b> You will need to have SSL support for your site to use this option or once enabled you won't be able to login your wp-admin without removing the plugin first.
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Customize login page</label></th>
<td>
<label for="wpqorefunc_login_logo">
<div class="switch toggle3">
<input name="wpqorefunc_login_logo" type="checkbox" id="wpqorefunc_login_logo" value="1" <?php echo get_option("wpqorefunc_login_logo");?>>
<label><i></i></label>
</div>
<i>Change login page logo and link (Default is, WordPress)</i>
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Login logo image url</label>
</th>

<td>
<input type="text" name="wpqorefunc_login_logo_url" style="width:420px" value="<?php echo get_option("wpqorefunc_login_logo_url");?>" placeholder="image url">
<br>Type url of image for login page. Make sure it is approximately 320px width x 80px height.
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Conceal login page</label></th>
<td>
<label for="wpqorefunc_2steplogin">
<div class="switch toggle3">
<input name="wpqorefunc_2steplogin" type="checkbox" id="wpqorefunc_2steplogin" value="1" <?php echo get_option("wpqorefunc_2steplogin");?>>
<label><i></i></label>
</div>
<i>Check to lock login page</i><br>
Once enabled, your example.com/wp-admin url will return a 404 error. The user who knows the secret key can access. For example, when example.com/wp-admin returns 404, example.com/wp-admin?secretkey1 will work. Remember, you can always change this secret key.
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Login secret key</label> (<a target="_blank" href="<?php echo WP_PLUGIN_URL.'/'.basename( dirname( __FILE__ ) ).'/example/screenshot_01.png'; ?>" title="click to see example..."><b>?</b></a>)</th>
<td>
 <input type="text" name="wpqorefunc_secret_arg" value="<?php echo get_option("wpqorefunc_secret_arg");?>" placeholder="for url get parameter">

<br>Only <?php echo home_url();?>/wp-admin?<?php echo get_option("wpqorefunc_secret_arg");?> will work, otherwise, included default wp-admin address will return 404.
	<br>
	<a href="javascript://" id="wpqorefunc_cr_exc_url">Add custom login page exception</a>
	<br>
<div id="wpqorefunc_cr_exc_div" style="display:none;margin-top:4px">If you have custom login page (for example if you are using any community plugin such as Buddypress and your users log in to their profile via custom url such as example.com/myloginpage) and you want that url continue working properly without wpqorefunc secret key, then just add that url to following input field.
	<br><input style="margin-bottom:6px;width:300px" type="text" name="wpqorefunc_exceptional_url" placeholder="Custom login url" value="<?php echo get_option("wpqorefunc_exceptional_url");?>"><br>

And then if you want to block your wp-admin for logged in <i>subscriber users</i>, check the following checkbox<br>

<label for="wpqorefunc_forbid_wpadmin" >
<div class="switch toggle3">
	<input type="checkbox" name="wpqorefunc_forbid_wpadmin" value="1" <?php echo get_option("wpqorefunc_forbid_wpadmin");?>>
<label><i></i></label>
</div>
<i>Block access to wp-admin for Logged in subscribers (all their requests will be redirected to homepage).</i></label> </div>

<script>
jQuery("#wpqorefunc_cr_exc_url").click(function () {

jQuery("#wpqorefunc_cr_exc_div").toggle("slow");

});
</script>
</label>
</td>
</tr>
</tbody></table>

<p style="border-bottom: 1px dashed #CCCCCC;padding-bottom: 20px">
<input type="hidden" name="wpqorefunc_settings" value="1">
<input type="submit" class="button button-primary" value="Save changes">
</p>

<table class="form-table" style="background-color:#F7F7F7;border: 1px solid #e1e1e1;margin-bottom:20px">
<tbody>

<h3>Source Obfuscation:</h3>

<tr valign="top">
<th scope="row"><label for="home">Register new theme directory</label></th>
<td>
<input type="text" name="wpqorefunc_theme_directory" style="width:420px" value="<?php echo get_option("wpqorefunc_theme_directory");?>" placeholder="theme directory">
<br>Create folder called <i><?php echo get_option("wpqorefunc_theme_directory"); ?></i> in <?php echo WP_CONTENT_DIR; ?> folder and then paste there any inactive theme folder you will need to use. <br>
<b>Warning!</b> Don't cut/paste active theme from <i>themes</i> folder to <i><?php echo get_option("wpqorefunc_theme_directory"); ?></i> folder. Do it only with inactive themes. First deactivate theme, cut & paste, then reactivate.
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Make your source code more unique 
</label></th>
<td>
Go to your file manager (or ftp), open your wp-config.php file and add the following lines there. Then, you will need to rename the wp-content and plugin folders to the new names in which you set in the code below. Copy the following code (below) and paste the code onto the top of your wp-config.php file, place it just after the initial opening &lt;?php tag (see <a target="_blank" href="<?php echo WP_PLUGIN_URL.'/'.basename( dirname( __FILE__ ) ).'/example/screenshot_02.png'; ?> " >before</a> and <a target="_blank" href="<?php echo WP_PLUGIN_URL.'/'.basename( dirname( __FILE__ ) ).'/example/screenshot_03.png'; ?> " >after</a> examples). <b>Please be attentive. If you don't know what something is for, please don't do it.</b>

<pre style="margin-top:10px;background:#CCCCCC;padding:10px"><?php echo $wpconfigchange; ?>
</pre>
</td>
</tr>
</tbody></table>

<p style="border-bottom: 1px dashed #CCCCCC;padding-bottom: 20px">
<input type="hidden" name="wpqorefunc_settings" value="1">
<input type="submit" class="button button-primary" value="Save changes">
</p>

<table class="form-table" style="background-color:#F7F7F7;border: 1px solid #e1e1e1;margin-bottom:20px">
<tbody>

<h3>General Settings:</h3>

<tr valign="top">
<th scope="row"><label for="home">Replace Dashboard</label> (<a target="_blank" href="<?php echo WP_PLUGIN_URL.'/'.basename( dirname( __FILE__ ) ).'/example/screenshot_04.png'; ?>" title="click to see example..."><b>?</b></a>)</th>
<td>
<label for="wpqorefunc_dashboard">
<div class="switch toggle3">
<input name="wpqorefunc_dashboard" type="checkbox" id="wpqorefunc_dashboard" value="1" <?php echo get_option("wpqorefunc_dashboard");?>>
<label><i></i></label>
</div>
<i>Check to replace</i><br>
When checked, this will replace the standard wp-admin dashboard with a new one that is clean and lightweight.
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Nag Updates</label> (<a target="_blank" href="<?php echo WP_PLUGIN_URL.'/'.basename( dirname( __FILE__ ) ).'/example/screenshot_05.png'; ?>" title="click to see example..."><b>?</b></a>)</th>
<td>
<label for="wpqorefunc_wphidenag">
<div class="switch toggle3">
<input name="wpqorefunc_wphidenag" type="checkbox" id="wpqorefunc_wphidenag" value="1" <?php echo get_option("wpqorefunc_wphidenag");?>>
<label><i></i></label>
</div>
<i>Check to disable</i><br>
This disables the annoying WordPress nag updates banner from appearing. This doesn't prevent updates, just conceals the update banner from the top of the wp-admin.
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Core Updates</label></th>
<td>
<label for="wpqorefunc_coreupdate">
<div class="switch toggle3">
<input name="wpqorefunc_coreupdate" type="checkbox" id="wpqorefunc_coreupdate" value="1" <?php echo get_option("wpqorefunc_coreupdate");?>>
<label><i></i></label>
</div>
<i>Check to disable</i><br>
This completely disables new WordPress version notifications and updates from being done.<br>
<b>Warning:</b> It is highly recommended that on your production environment you keep this option off. This option is provided for development environments only.
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Post Revisions</label></th>
<td>
<label for="wpqorefunc_post_revisions">
<div class="switch toggle3">
<input name="wpqorefunc_post_revisions" type="checkbox" id="wpqorefunc_post_revisions" value="1" <?php echo get_option("wpqorefunc_post_revisions");?>>
<label><i></i></label>
</div>
<i>Check to disable</i><br>
This disables saving multiple post revisions. Having multiple post revisions could cause bloat on your database. Disabling them will prevent such.
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Admin bar removal</label></th>
<td>
<label for="wpqorefunc_showadminbar">
<div class="switch toggle3">
<input name="wpqorefunc_showadminbar" type="checkbox" id="wpqorefunc_showadminbar" value="1" <?php echo get_option("wpqorefunc_showadminbar");?> >
<label><i></i></label>
</div>
<i>Remove admin bar from the frontend</i>
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Change default jQuery</label></th>
<td>
<label for="wpqorefunc_reregjquery">
<div class="switch toggle3">
<input name="wpqorefunc_reregjquery" type="checkbox" id="wpqorefunc_reregjquery" value="1" <?php echo get_option("wpqorefunc_reregjquery");?>>
<label><i></i></label>
</div>
<i>Use Google hosted jQuery instead of Wordpress core.</i><br>
<b>Attention:</b> If this doesn't play well with your theme, then simply turn it off.
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Shortcode in Widgets</label></th>
<td>
<label for="wpqorefunc_shortcode">
<div class="switch toggle3">
<input name="wpqorefunc_shortcode" type="checkbox" id="wpqorefunc_shortcode" value="1" <?php echo get_option("wpqorefunc_shortcode");?>>
<label><i></i></label>
</div>
<i>Check to enable</i><br>
This enables shortcode in widgets. In the instance you need to use shortcode within your widgets, then enabling this will help you.
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">PHP in Widgets</label></th>
<td>
<label for="wpqorefunc_phpwidget">
<div class="switch toggle3">
<input name="wpqorefunc_phpwidget" type="checkbox" id="wpqorefunc_phpwidget" value="1" <?php echo get_option("wpqorefunc_phpwidget");?>>
<label><i></i></label>
</div>
<i>Check to enable</i><br>
This enables php code in widgets. In the instance you need to use php within your widgets, then enabling this will help you.<br>
<b>Warning!</b> Turning this on may be a security risk. It's not recommended you use this unless you are very careful and know what you are doing. Use at your own risk.
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Import/Export Widgets</label></th>
<td>
<label for="wpqorefunc_exportwidget">
<div class="switch toggle3">
<input name="wpqorefunc_exportwidget" type="checkbox" id="wpqorefunc_exportwidget" value="1" <?php echo get_option("wpqorefunc_exportwidget");?>>
<label><i></i></label>
</div>
<i>Check to enable</i><br>
This allows you to import and export your widget settings. Once enabled, a submenu labeled 'Export Widgets' and 'Import Widgets' will appear within the wp-admin > Tools menu.
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Clean source code</label></th>
<td>
<label for="wpqorefunc_removeversion">
<div class="switch toggle3">
<input name="wpqorefunc_removeversion" type="checkbox" id="wpqorefunc_removeversion" value="1" <?php echo get_option("wpqorefunc_removeversion");?> >
<label><i></i></label>
</div>
<i>Remove WP version from source code (Recommended)</i>
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Minify your HTML</label></th>
<td>
<label for="wpqorefunc_compresshtml">
<div class="switch toggle3">
<input name="wpqorefunc_compresshtml" type="checkbox" id="wpqorefunc_compresshtml" value="1" <?php echo get_option("wpqorefunc_compresshtml");?>>
<label><i></i></label>
</div>
<i>Check to enable HTML minifier</i><br>
This will minify the HTML of your source code. This makes your website load much faster and makes it harder for people to view the source code of your website.
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Gzip Compression</label></th>
<td>
<label for="wpqorefunc_gzip">
<div class="switch toggle3">
<input name="wpqorefunc_gzip" type="checkbox" id="wpqorefunc_gzip" value="1" <?php echo get_option("wpqorefunc_gzip");?>>
<label><i></i></label>
</div>
<i>Check to enable gzip (Recommended)</i><br>
Enabling gzip in most cases will increase your pagespeed. Gzip (GNU zip) is a compression utility designed to be a replacement for compress. Its main advantages over compress are much better compression and freedom from patented algorithms.
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Remove wp tags from meta</label></th>
<td>
<label for="wpqorefunc_rmheader">
<div class="switch toggle3">
<input name="wpqorefunc_rmheader" type="checkbox" id="wpqorefunc_rmheader" value="1" <?php echo get_option("wpqorefunc_rmheader");?>>
<label><i></i></label>
</div>
<i>Check to remove from source code (Recommended)</i><br>
Remove manifest, generator meta tags, adjacent posts rel links, parent post rel links, feed links, rsd link and index rel links from the source code.
</label>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home">Plugin & Theme Editor</label></th>
<td>
<label for="wpqorefunc_plug-edit">
<div class="switch toggle3">
<input name="wpqorefunc_plug-edit" type="checkbox" id="wpqorefunc_plug-edit" value="1" <?php echo get_option("wpqorefunc_plug-edit");?>>
<label><i></i></label>
</div>
<i>Check to disable</i><br>
This disables the theme and plugin editor from within WordPress. This is a good idea for production environments.
</label>
</td>
</tr>

<tr valign="top" style="background-color:#373737" class="wpqorefunc_dbopt">
<th scope="row"><label for="home">Database Optimization Audit</label></th>
<td>
<p>
This checks your Database and then gives you suggestions about security and making your website faster.
<br> 
<input style="cursor:pointer" class="wpqorefunc_dbreport" type="button" value="Begin Audit &#8594;" id="wpqorefunc_dbreport">
</p>
<div id="wpqorefunc_report_result"></div>
</td>
</tr>
</tbody></table>

<p style="">
<input type="hidden" name="wpqorefunc_settings" value="1">
<input type="submit" class="button button-primary" value="Save changes">
</p>

</form>
</div>

<style type="text/css">
th,td{border-left: 1px solid #e1e1e1;border-right: 1px solid #e1e1e1;border-top: 1px solid #e1e1e1;}
th label{font-weight:bold;color:#464646;}
h3{color:#464646;}
.wpqorefunc_dbopt label,.wpqorefunc_dbopt p,.wpqorefunc_dbopt pre  {color:#FFFFFF;}
.wpqorefunc_gray{color:#00FF00;}
.wpqorefunc_red{color:#FF5050;}
.wpqorefunc_dbreport{float:right;margin-top: -20px;color: #FFFFFF;font-size: 12px;background-color: #FF0000;border-color: #FF0000;text-shadow: 0 -1px 0 rgba(0,0,0,.3);padding: 5px;}
.wpqorefunc_dbreport:hover{color: #FFCCCC;}
input{font-size: 14px}
</style>

<?php }

// your wp-admin copyright
include_once('functions/branding.php');

?>
