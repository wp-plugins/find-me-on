<?php
/*
Plugin Name: Find Me On
Plugin URI: http://jeremyanticouni.com/wordpress-plugins/find-me-on/
Description: The Find Me On sidebar widget displays icons for all of your social network profiles. Includes *73* Social Network options, 16px or 32px icon size, and three icon styles, including "sexy-style". Configure all the options on the <a href="options-general.php?page=find-me-on.php">configuration page</a>.  Originally forked from the <a href="http://blog.maybe5.com/?page_id=94">Social Links</a> plugin.
Author: Jeremy Anticouni
Crack Coder: Ian Bruce =P
Version: 2.0.5
Author URI: http://jeremyanticouni.com


/*  Copyright 2009  Jeremy Anticouni  (email : plugins@jeremyanticouni.com)
/*  Settings Framework via Josh Jones & Norman Yung of SexyBookmarks
/*  Copyright 2008  Kareem Sultan  (email : kareemsultan@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

http://www.gnu.org/licenses/gpl.txt

*/
//call install function upon activation
		register_activation_hook(__FILE__,'find_me_on_install');
		
//TO DO use these definitions instead
define('find_me_on_VERSION', '2.0.4');
define('find_me_on_DB_VERSION', '2.1');

define('KEY_SITE_ID',0);
define('KEY_IMAGE',1);
define('KEY_URL_TEMPLATE',2);
define('KEY_INSTRUCTION',3);
define('KEY_DISPLAY_NAME',4);
  
 //$sl_db_version = "1.0";
 $findmeonplugindir = get_settings('home').'/wp-content/plugins/'.dirname(plugin_basename(__FILE__));
 $pluginrelativedir = '/wp-content/plugins/'.dirname(plugin_basename(__FILE__));

 $definitions = array(
array(0,'aim','aim:GoIM?screenname=%userid%','Enter your Screenname.','AIM'),
array(1,'amazon','%userid%','Enter your complete Amazon Wishlist URL','Amazon Wishlist'),
array(2,'apple','%userid%','Enter your complete Apple URL','Apple'),
array(3,'bebo','http://bebo.com/%userid%','Enter your Bebo username.','Bebo'),
array(4,'bitbucket','http://bitbucket.org/%userid%','Enter your Bitbucket username.','Bitbucket'),
array(5,'blogger','%userid%','Enter your complete Blogger URL.','Blogger'),
array(6,'blogmarks','http://blogmarks.net/user/%userid%','Enter your BlogMarks username.','BlogMarks'),
array(7,'Brightkite','%userid%','Enter your complete BrightKite URL','BrightKite'),
array(8,'dapx','%userid%','Enter your complete Dapx URL.','Dapx'),
array(9,'delicious','http://delicious.com/%userid%','Enter your Delicious username.','Delicious'),
array(10,'digg','http://www.digg.com/users/%userid%','Enter your Digg username.','Digg'),
array(11,'diigo','%userid%','Enter your complete Diigo URL','Diigo'),
array(12,'disqus','http://disqus.com/people/%userid%','Enter your Disqus username.','Disqus'),
array(13,'ebay','http://myworld.ebay.com/%userid%','Enter your Ebay username.','Ebay'),
array(14,'facebook','%userid%','Enter your complete Facebook profile URL.','Facebook'),
array(15,'facebookpages','%userid%','Enter your complete Facebook Page URL','Facebook Page'),
array(16,'flickr','http://flickr.com/photos/%userid%','Enter your flickr username.','Flickr'),
array(17,'friendfeed','http://friendfeed.com/%userid%','Enter your FriendFeed username.','FriendFeed'),
array(18,'friendster','%userid%','Enter your complete Friendster URL','Friendster'),
array(19,'github','http://github.com/%userid%','Enter your Github username.','Github'),
array(20,'goodreads','http://goodreads.com/%userid%','Enter your GoodReads username.','GoodReads'),
array(21,'google','http://www.google.com/profiles/%userid%','Enter your Google username (without @google.com.)','Google Profile'),
array(22,'googlereader','http://www.google.com/reader/shared/%userid%','Enter your Google Reader shared number.','Google Reader'),
array(23,'googletalk','%userid%','Enter your complete Google Talk URL','Google Talk'),
array(24,'googlewave','%userid%','Enter your complete Google Wave URL','Google Wave'),
array(25,'hellotxt','http://hellotxt.com/user/%userid%','Enter your Hellotxt username.','Hellotxt'),
array(26,'hi5','%userid%','Enter your complete Hi5 URL','Hi5'),
array(27,'hyves','http://%userid%.hyves.nl','Enter your Hyves.nl username.','Hyves.nl'),
array(28,'identica','%userid%','Enter your complete Identi.ca URL','Identi.ca'),
array(29,'imeem','%userid%','Enter your complete Imeem URL','Imeem'),
array(30,'ilike','%userid%','Enter your complete iLike URL','iLike'),
array(31,'jaiku','%userid%','Enter your complete Jaiku URL','Jaiku'),
array(32,'jeqq','http://www.jeqq.com/user/view/profile/%userid%','Enter your Jeqq username.','Jeqq'),
array(33,'koornk','%userid%','Enter your complete Koornk URL','Koornk'),
array(34,'lastfm','http://www.last.fm/user/%userid%','Enter your Last.fm username.','Last.fm'),
array(35,'linkedin','%userid%','Enter your complete LinkedIn URL.','LinkedIn'),
array(36,'livejournal','%userid%','Enter your complete LiveJournal URL','LiveJournal'),
array(37,'multiply','%userid%','Enter your complete Multiply URL','Multiply'),
array(38,'myspace','%userid%','Enter your complete MySpace URL.','MySpace'),
array(39,'myyearbook','%userid%','Enter your complete MyYearbook URL','MyYearbook'),
array(40,'ning','%userid%','Enter your complete Ning URL','Ning'),
array(41,'orkut','http://www.orkut.com/Main#Profile.aspx?uid=%userid%','Enter your Orkut numeric User ID.','Orkut'),
array(42,'picasa','http://picasaweb.google.com/%userid%','Enter your PicasaGoogle username.','Picasa Web Album'),
array(43,'photobucket','%userid%','Enter your complete Photobucket URL','Photobucket'),
array(44,'plaxopulse','%userid%','Enter your complete Plaxo Pulse URL','Plaxo Pulse'),
array(45,'plurk','http://www.plurk.com/user/%userid%','Enter your Plurk username.','Plurk'),
array(46,'posterous','%userid%','Enter your complete Posterous URL','Posterous'),
array(47,'presently','%userid%','Enter your complete Present.ly URL','Present.ly'),
array(48,'qype','http://www.qype.com/people/%userid%','Enter your Qype username.','Qype'),
array(49,'radar','%userid%','Enter your complete Radar URL','Radar'),
array(50,'redgage','http://www.redgage.com/%userid%','Enter your RedGage username.','RedGage'),
array(51,'seesmic','%userid%','Enter your complete Seesmic URL','Seesmic'),
array(52,'blog','%userid%','Enter the complete RSS feed URL.','RSS'),
array(53,'shoutem','%userid%','Enter your complete Shoutem URL','Shoutem'),
array(54,'sixent','http://%userid%.sixent.com/','Enter your Sixent username.','Sixent'),
array(55,'streetmavens','%userid%','Enter your complete StreetMavens URL','StreetMavens'),
array(56,'stumbleupon','http://%userid%.stumbleupon.com','Enter your Stumble Upon username.','Stumble Upon'),
array(57,'tagged','%userid%','Enter your complete Tagged URL','Tagged'),
array(58,'technorati','http://technorati.com/people/technorati/%userid%/','Enter your Technorati username.','Technorati'),
array(59,'tumblr','%userid%','Enter your complete Tumblr URL','Tumblr'),
array(60,'twitter','http://twitter.com/%userid%','Enter your Twitter username.','Twitter'),
array(61,'vimeo','%userid%','Enter your vimeo Shortcut URL.','Vimeo'),
array(62,'typepad','%userid%','Enter your complete Typepad URL','Typepad'),
array(63,'utterli','%userid%','Enter your complete Utterli URL','Utterli'),
array(64,'vox','%userid%','Enter your complete Vox URL','Vox'),
array(65,'wordpress','%userid%','Enter your Wordpress URL.','Wordpress'),
array(66,'xanga','%userid%','Enter your complete Xanga URL','Xanga'),
array(67,'xing','%userid%','Enter your complete Xing URL.','Xing'),
array(68,'yahoomeme','%userid%','Enter your complete Yahoo Meme URL','Yahoo Meme'),
array(69,'yahooprofiles','%userid%','Enter your complete Yahoo Profile URL','Yahoo Profile'),
array(70,'yammer','%userid%','Enter your complete Yammer URL','Yammer'),
array(71,'yelp','%userid%','Enter your complete Yelp URL','Yelp'),
array(72,'youtube','http://www.youtube.com/%userid%','Enter your YouTube username.','YouTube')
   );

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

function find_me_on_wrapper(){

// This only works if the widget api is installed
if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
	return; // ...and if not, exit gracefully from the script.

//WPD_print('Filename: '.__FILE__);
//WPD_print('DB version: '.get_option( "find_me_on_DB_VERSION" ));
		// Displays the icons in the sidebar
		function widget_find_me_on($args) {
			global $definitions;
			global $message;
			global $status_message;
			extract($args);
					
			$options = get_option('widget_find_me_on');
				$title = empty($options['title']) ? 'Find Me On' : $options['title'];
			$width =  empty($options['width']) ? 20 : $options['width'];
			$iconsize =  empty($options['iconsize']) ? 16 : $options['iconsize'];
		
				echo $before_widget;
				echo $before_title . $title . $after_title ;
		
			echo '<!-- Find Me On Version: '. find_me_on_VERSION .' -->';
//			echo "<div id='findmeonContainer' style='width:100%;'>";
			echo generatefindmeonInnerHTML();
//			echo '</div>';
			echo $after_widget;
			
		}
	
		  //Config Panel
		function widget_find_me_on_control() {
			global $definitions;
            global $iconsize;
			$options = get_option('widget_find_me_on');
	
			if ( $_POST['find-me-on-submit'] ) {
				// Clean up control form submission options
				$newoptions['title'] = strip_tags(stripslashes($_POST['find-me-on-title']));
				$newoptions['width'] = strip_tags(stripslashes($_POST['find-me-on-width']));
				$newoptions['iconsize'] = strip_tags(stripslashes($_POST['find-me-on-iconsize']));
				$newoptions['iconstyle'] = strip_tags(stripslashes($_POST['find-me-on-iconstyle']));
	
	
				if ( $options != $newoptions ) {
					$options = $newoptions;
					update_option('widget_find_me_on', $options);
				}
			}
	
			$title = empty($options['title']) ? 'Find Me On' : $options['title'];
			$width = empty($options['width']) ? 100 : $options['width'];
			$iconsize = empty($options['iconsize']) ? 16 : $options['iconsize'];
			$iconstyle = empty($options['iconstyle']) ? 0 : $options['iconstyle'];
	
    		
			?>
			
				<table cellpadding="10">
					<tr><td>
						<label for="find-me-on-title">What shall we call it? 
                        <input type="text" id="find-me-on-title" name="find-me-on-title" value="<?php echo $title; ?>" /></label>
					</td></tr>
                    
                  
				</table>
				<input type="hidden" name="find-me-on-submit" id="find-me-on-submit" value="1" />
				
			<?php
		}//End of widget_find_me_on_control
		
		
		function wp_ajax_find_me_on_add_network(){
			// read submitted information
			global $definitions;
			global $message;
			global $status_message;
			
			$siteID = $_POST['siteID'];
			$data = $_POST['value'];
			$messageId = $_POST['responseDiv'];
		
			$result = insertNetwork($siteID,$data);
			if($result == 1)
			{
		 		$result = 'W00t!  New social network added.  |  Maybe you would consider <a href=#findmeondonationsbox>donating</a>?';
		 		//$message = 'Link added.';
				$statmessage_class = "findmeon-success";							
			}
		 	else
			{
		 		$result = 'There was a problem adding the link. Refresh the page and try again.';
		 		$message = 'There was a problem adding the link. Refresh the page and try again.';
				$statmessage_class = "findmeon-error";							
			}
		 	$innerHTMLpreview = generatefindmeonPreviewInnerHTML('');
		
			die('			
				$("statmessage-text").innerHTML = "'.$result.'";
				$("statmessage").className = "'.$statmessage_class.'";			
				$("statmessage").style.visibility = "visible";
				$("statmessage").style.display = "block";
				document.getElementById("displayDiv").innerHTML = "'.$innerHTMLpreview.'";
				createSortables();
			');
			
			//Add this line to the above javascript to show the complete table.
			//document.getElementById("editDiv").innerHTML = "' . generatefindmeonEditInnerHTML(). '";
		}
		
		function wp_ajax_find_me_on_add_network2(){
			// read submitted information
			global $definitions;
			global $message;
			global $status_message;
			
			$siteID = $_POST['siteID'];
			$data = $_POST['value'];
			$messageId = $_POST['responseDiv'];
		
			$result = insertNetwork($siteID,$data);
			if($result == 1)
			{
		 		$result = 'W00t!  New social network added.  |  Maybe you would consider <a href=#findmeondonationsbox>donating</a>?';
		 		//$message = 'Link added.';
				$statmessage_class = "findmeon-success";							
			}
		 	else
			{
		 		$result = 'There was a problem adding the link. Refresh the page and try again.';
		 		$message = 'There was a problem adding the link. Refresh the page and try again.';
				$statmessage_class = "findmeon-error";							
			}
		 	$innerHTMLpreview = generatefindmeonPreviewInnerHTML('');
		
			die('			
				$("statmessage-text").innerHTML = "'.$result.'";
				$("statmessage").className = "'.$statmessage_class.'";			
				$("statmessage").style.visibility = "visible";
				$("statmessage").style.display = "block";
				document.getElementById("previewicons").innerHTML = "'.$innerHTMLpreview.'";
				createSortables();
			');
			
			//Add this line to the above javascript to show the complete table.
			//document.getElementById("editDiv").innerHTML = "' . generatefindmeonEditInnerHTML(). '";
		}
		
		//TODO: Implement the add ajax process to send data and let the javascript add child elements
		//This is to avoid using innerHTML replacement and will then allow for more advanced client side effects
	/*	function wp_ajax_find_me_on_add_network_send_data(){
			// read submitted information
			global $definitions;
			
			$selectedIndex = $_POST['networkIndex'];
			$data = $_POST['value'];
			
			$result = insertNetwork($selectedIndex,$data);
			$data = generatefindmeonData();
			//$result = 'fake insert';
			die("$result
				$('message').innerHTML = 'Database result is $result.';
				$('message').class='updated fade';
				$('message').style.visibility = 'visible';
				updatefindmeon($data);
			");
			
		}
		*/
		
		/*
		// Grab required plugin info and format notice
			function findmeon_upgrade_notice(){
				require_once(ABSPATH.'/wp-admin/includes/plugin-install.php');
				$plug_api = plugins_api('plugin_information', array('slug' => sanitize_title('findmeon') ));
				if ( is_wp_error($plug_api) ) {
					wp_die($plug_api);
				}
				$latest_version = $plug_api->version;
				$your_version = findmeon_vNum;
				if (version_compare($latest_version, $your_version, '>')) {
					echo '<div class="error fade below-h2 update-message" style="background:#FFEBE8 !important;margin-top:30px !important;"><p><img src="'.FINDMEON_PLUGPATH.'images/icons/error.png" style="border:0;padding:0;margin:0 5px -3px 0 !important;" />'.__("You're using an outdated version of Find Me On!", "findmeon").' (<strong>v'.findmeon_vNum.'</strong>) '.__("Please update to the latest version", "findmeon").' <a href="http://wordpress.org/extend/plugins/find-me-on/download/"><strong>v'.$latest_version.'</strong></a> to help reduce support requests.</p></div>';
				}
			}
		
		// Display notice if versions don't match
		add_action( 'admin_notices', 'findmeon_upgrade_notice');
		
		
		//add sidebar link to settings page
		add_action('admin_menu', 'findmeon_menu_link');
		function findmeon_menu_link() {
			if (function_exists('add_options_page')) {
				$findmeon_admin_page = add_options_page('Find Me On', 'Find Me On', 9, basename(__FILE__), 'findmeon_settings_page');
				add_action( "admin_print_scripts-$findmeon_admin_page", 'findmeon_admin_scripts' );
				add_action( "admin_print_styles-$findmeon_admin_page", 'findmeon_admin_styles' );
			}
		}
		
		*/
		
		function wp_ajax_find_me_on_delete_network(){
			global $wpdb;
		 	global $definitions;
			global $status_message;
		 	
			$linkId = $_POST['linkId'];
		 	//WPD_print('deleting linkID='. $linkId);
		 	$table_name = $wpdb->prefix . "find_me_on";
		 	$sql = 'delete from ' .  $table_name . ' where id='.$linkId;
		 	$result = $wpdb->query($wpdb->prepare($sql));
		 	
		 	if($result == 1) {
		 		$result = 'Poof!  That icon is history!  |  Maybe you would consider <a href=#findmeondonationsbox>donating</a>?';
				$statmessage_class = 'findmeon-success';				
		 	} else {
		 		$result = 'There was a problem deleting the link. Refresh the page and try again.'.$sql;
				$statmessage_class = "findmeon-error";
			}
		 	//WPD_print($result);
		 	die('
				$("statmessage-text").innerHTML = "'.$result.'";
				$("statmessage").className = "'.$statmessage_class.'";			
				$("statmessage").style.display = "block";
				$("statmessage").style.visibility = "visible";
			');
		}
		
		function wp_ajax_find_me_on_seticon(){
			global $wpdb;
		 	global $definitions;
			global $status_message;

		 	$result = 1;
		 	
		 	if($result == 1) {
		 		$result = 'Poof!  That icon is history!  |  Maybe you would consider <a href=#findmeondonationsbox>donating</a>?';
				$statmessage_class = 'findmeon-success';				
		 	} else {
		 		$result = 'There was a problem deleting the link. Refresh the page and try again.'.$sql;
				$statmessage_class = "findmeon-error";
			}
		 	//WPD_print($result);
		 	die('
				$("statmessage-text").innerHTML = "'.$result.'";
				$("statmessage").className = "'.$statmessage_class.'";			
				$("statmessage").style.display = "block";
				$("statmessage").style.visibility = "visible";
			');
		}
		
	
		 
		 function insertNetwork($id,$value){
		 
		 	
		 	//WPD_print('Inserting new network');
		 	global $wpdb;
		 	
		 	//WPD_print('networkID='.$id.' data='.$value);
		 	$table_name = $wpdb->prefix . "find_me_on";
		 	$sql = 'Insert into ' .  $table_name . ' (network_id,user_info,sort_order) VALUES ("'.$id.'","'.$value.'",1000)';
		 	$result = $wpdb->query($wpdb->prepare($sql));
		 	//WPD_print($sql);
		 	return $result;
		 }
		 
		 function getfindmeon(){
		 	global $wpdb;
		 	$table_name = $wpdb->prefix . "find_me_on";
		 	$sql = 'Select * from ' .  $table_name . ' order by sort_order';
		 	$results = $wpdb->get_results($sql,ARRAY_N);
		 	////WPD_print("Select networks results: ".$results);
		 	return $results;
		 	
		 }
		 
		 function generatefindmeonInnerHTML(){
		 	global $definitions;
		 	global $findmeonplugindir;
      
		 	$options = get_option('widget_find_me_on');

			$iconsize = empty($options['iconsize']) ? 16 : $options['iconsize'];
			$iconstyle = empty($options['iconstyle']) ? 0 : $options['iconstyle'];

			
		 	$rows = getfindmeon();
		 	if(count($rows)==0)
		 		return;
		 	////WPD_print("Found".count($rows)." networks.");
		 	
			echo '<link type="text/css" rel="stylesheet" href="' . $findmeonplugindir . '/css/' .$iconsize.'_' .$iconstyle.'.css" />' . "\n";
					
			echo '<div class="findmeon-bookmarks findmeon-bookmarks-expand findmeon-bookmarks-bg-enjoy" style="margin: 0px 0pt 0pt ! important; padding: 0px 0pt 0pt 32px ! important; height: 32px; display: inline ! important; clear: both ! important;"><ul class="networks">';
			
		 	foreach ($rows as $row) {
		 		//WPD_print("SiteID: " . $row[1]);
		 		$linkInfoArray = $definitions[$row[1]];
		 		//WPD_print('network info '. $linkInfoArray);
		 		$url = str_replace("%userid%",$row[2],$linkInfoArray[KEY_URL_TEMPLATE]);
	
                
                $innerHTML = $innerHTML."
				<li class=\"findmeon-".$linkInfoArray[KEY_IMAGE]."\"><a href=\"".$url."\" class=\"external\" target=\"_blank\" title=\"".$linkInfoArray[KEY_IMAGE]."\"></a></li>";

                
                if($row != $rows[count($rows)-1]){
					$innerHTML = $innerHTML."\n";
				}
			}
			$innerHTML = $innerHTML."\n
			
			
			</ul><div style='clear: both;'></div></div>
			
			";

			return $innerHTML;
			
		 }
		
           
			
		 	function generatefindmeonPreviewInnerHTML($delimiter){
		 	global $definitions;
		 	global $findmeonplugindir;
            
            $options = get_option('widget_find_me_on');
			$iconsize = empty($options['iconsize']) ? 16 : $options['iconsize'];
			$iconstyle = empty($options['iconstyle']) ? 0 : $options['iconstyle'];


		 	$rows = getfindmeon();
		 	if(count($rows)==0)
		 		return;
		 	//WPD_print("Found ".count($rows)." networks.");
		 	
		 	foreach ($rows as $row) {
		 		//WPD_print("SiteID: " . $row[2]);
		 		//var_dump($row);
		 		$linkInfoArray = $definitions[$row[1]];
		 		//var_dump($linkInfoArray);
		 		//WPD_print('network info '. $linkInfoArray);
		 		$url = str_replace("%userid%",$row[2],$linkInfoArray[KEY_URL_TEMPLATE]);
                
                
                $previewinnerHTML = $previewinnerHTML . 
                
                
                 "&nbsp;&nbsp;&nbsp;<span style=\"margin-left:10px; margin-right:10px;\" id='link_$row[0]' title='$url'><img style='margin:2px' onmouseover='javascript:openDumpster();' onmouseout='javascript:closeDumpster();' src='$findmeonplugindir/images/icons/".$linkInfoArray[KEY_IMAGE]."_32.png' alt='".$linkInfoArray[KEY_DISPLAY_NAME]."'/></span>&nbsp;&nbsp;&nbsp;";
				 
				 
				 
				 
				if($row != $rows[count($rows)-1]){
					$previewinnerHTML = $previewinnerHTML.$delimiter;
				}
			}
			
			return $previewinnerHTML;
		 }
		 
		 
		 /*
		 function generatefindmeonData(){
			global $definitions;
		 
		 	$rows = getfindmeon();
		 	if(count($rows)==0)
		 		return;
		 	////WPD_print("Found".count($rows)." networks.");
		 	$data = '';
		 	foreach ($rows as $row) {
		 		$linkInfoArray = $definitions[$row[2]];
		 		$data += "link_$row[0],$linkInfoArray[0],$linkInfoArray[1],$linkInfoArray[4]\n";
		 	}
		 	return $data;
		 	
		 }
		*/
		
	
		
		
		function find_me_on_admin_menu(){
			global $pluginrelativedir;
		//add_options_page('Find Me On Settings', 'Find Me On', 8,$pluginrelativedir.'/edit-findmeon.php');
		//add_management_page('Find Me On Settings', 'Find Me On', 8,__FILE__,'widget_find_me_on_settings');
		//add_submenu_page('themes.php','Find Me On Settings', 'Find Me On', 8,__FILE__,'widget_find_me_on_settings');
		add_options_page('Find Me On', 'Find Me On', 9, basename(__FILE__), 'widget_find_me_on_settings');
		//add_action( "admin_print_scripts-$findmeon_admin_page", 'findmeon_admin_scripts' );
		//add_action( "admin_print_styles-$findmeon_admin_page", 'findmeon_admin_styles' );

		}
		
		function addHeaderCode(){
			//WPD_print("header code");
			global $findmeonplugindir;
            
           
            
			echo '<link type="text/css" rel="stylesheet" href="' . $findmeonplugindir . '/stylesheet.css" />' . "\n";

			
		}
		
	
		
			////WPD_print("Registering plugin");
 			
 			global $findmeonplugindir;
			wp_enqueue_script('find-me-on', $findmeonplugindir . '/js/findmeon.js',array('sack'));
 			wp_enqueue_script('scriptaculous');
 
			add_action('wp_head','addHeaderCode');
			
			
			
			//Add action to load sub menu
			add_action('admin_menu', 'find_me_on_admin_menu');
			
			
			
			
			//Add ajax callback action called from client side javascript
			add_action('wp_ajax_find_me_on_add_network', 'wp_ajax_find_me_on_add_network' );
			add_action('wp_ajax_find_me_on_delete_network', 'wp_ajax_find_me_on_delete_network' );
			
			register_sidebar_widget('Find Me On', 'widget_find_me_on');
			register_widget_control('Find Me On', 'widget_find_me_on_control');
		
	}//End of findmeon class


add_action('plugins_loaded','find_me_on_wrapper');

//todo handle auto db table update
function find_me_on_install(){
	//require_once('datastore.php');
	//sl_install();
	
	global $wpdb;
	
	 //WPD_print("Installing Find Me On Plugin");
	 //echo '<div>Activation Find Me On</div>';
	 
	$table_name = $wpdb->prefix . "find_me_on";
	
	// $installed_ver = get_option( "find_me_on_DB_VERSION" );

	if($wpdb->get_var("show tables like '$table_name'") != $table_name ) {
		
		$sql = "CREATE TABLE " . $table_name . " (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		network_id int not null,
		user_info VARCHAR(110) NOT NULL,
		sort_order int not null DEFAULT 0,
		UNIQUE KEY id (id)
		);";
		
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
		
		
		add_option("find_me_on_DB_VERSION", find_me_on_DB_VERSION);
	}
 }


//Administration page
$message;
$messageClass;
function widget_find_me_on_settings(){

	if (isset($_POST['saveorder']))
	{
		saveSortOrder();
	}
	
	if (isset($_POST['find-me-on-submit']))
	{
		setIconStyle();
	}
	
	
	
	


	global $definitions;
	global $message;
	global $messageClass;
  	global $findmeonplugindir;
	global $error_message;
	
	$visibility = 'hidden';
	if(!empty($messageClass))
		$visibility = 'visible';
		
		
	if(isset($_POST['save_changes'])) 
	{
		$status_message = __('Your changes have been saved successfully!', 'findmeon').' | '.__('Maybe you would consider ', 'findmeon').'<a href="#sexydonationsbox">'.__('donating', 'findmeon').'</a>?';
	}
		
	
	//if there was an error,
	//display it in my new fancy schmancy divs

	$statmessage_visibility = 'hidden';
	$statmessage_display = 'none';

	if ($error_message != '') {
		$display_message = $error_message;
		$statmessage_visibility = 'visible';
		$statmessage_display = 'block';
	} elseif ($message != '') {
		$statmessage_text = $message;
		$statmessage_visibility = 'visible';
		$statmessage_display = 'block';
	}
	?>
	
     			<script type="text/javascript">
				//<![CDATA[
				
				function doStuff(el) {
					var dumpster = document.getElementById('mydumpster');
				dumpster.src= "<?php echo $findmeonplugindir ?>/images/dumpsteropen.png";
				dumpster.onmouseout=function() {
                                var dumpster = document.getElementById('mydumpster');
				dumpster.src="<?php echo $findmeonplugindir ?>/images/dumpster.png";
				}
				}
                                
                                function openDumpster() {
			            var dumpster = document.getElementById('mydumpster');
				    dumpster.src= "<?php echo $findmeonplugindir ?>/images/dumpsteropen.png";
                                }
                                function closeDumpster() {
			            var dumpster = document.getElementById('mydumpster');
				    dumpster.src= "<?php echo $findmeonplugindir ?>/images/dumpster.png";
                                }

				
				//]]>
				</script>
                
                
                  <!--[if lt IE 7]>
              <div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>
                <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Close this notice'/></a></div>
                <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>
                  <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='Warning!'/></div>
                  <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>
                    <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>You are using an outdated browser</div>
                    <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>For a better experience using this site, please upgrade to a modern web browser.</div>
                  </div>
                  <div style='width: 75px; float: left;'><a href='http://www.firefox.com' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>
                  <div style='width: 75px; float: left;'><a href='http://www.browserforthebetter.com/download.html' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>
                  <div style='width: 73px; float: left;'><a href='http://www.apple.com/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>
                  <div style='float: left;'><a href='http://www.google.com/chrome' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>
                </div>
              </div>
              <![endif]-->

             
                
        <link rel="stylesheet" href="<?php echo $findmeonplugindir ?>/css/admin-style.css" type="text/css" media="all" />


		<div class="wrap">
			<div id="icon-options-general" class="icon32"></div><h2>Find Me On Settings</h2>
			
				
                <?php echo '
                    <div id="statmessage" class="findmeon-success" style="display:' . $statmessage_display . '"; visibility:' . $statmessage_visibility . ';">
                        <div class="dialog-left">
                            <img src="'.$findmeonplugindir.'/images/icons/success.png" class="dialog-ico" alt=""/>
                            <span id="statmessage-text">
                            '.$statmessage_text.'
                            </span>
                        </div>
                        <div class="dialog-right">
                            <img src="'.$findmeonplugindir.'/images/icons/success-delete.jpg" class="del-x" alt=""/>
                        </div>
                    </div>';
                ?>



               <div id="findmeon-col-left">
					<ul id="findmeon-sortables">
						<li>
                            <div class="box-mid-head" id="iconator">
                                <img src="<?php echo $findmeonplugindir ?>/images/icons/globe-plus.png" alt="" class="box-icons" />
                                <h2>So, you want to be social?</h2>
                                    <div class="bnav">
                                        <a href="javascript:void(null);" class="toggle" id="gle0">
                                        <img src="<?php echo $findmeonplugindir ?>/images/icons/toggle-plus.png" class="close" alt=""/>
                                        <img src="<?php echo $findmeonplugindir ?>/images/icons/toggle-min.png" class="open" style="display:none;" alt=""/>
                                        </a>
                                    </div>
                            </div>
                            <div class="box-mid-body iconator" id="toggle1" style="width:100%">
                                <div class="padding">
                                    <div id="findmeon-networks">
                                    	<p>Select which social network you want to display, enter your info, and press 'Add'</p>
                                        <img src="<?php echo $findmeonplugindir ?>/images/spacer.gif" height="1" width="100%">
                                        <select id='networkDropdown' onchange='selectionChanged()'>
                                        <option>Select network...</option>
                                        
                                        <?php
                                            
                                            foreach ($definitions as $key => $linkInfoArray){
                                                echo "<option value='$linkInfoArray[0]' instruction='$linkInfoArray[3]'>$linkInfoArray[4]</option>";
                                            }
                                        ?>
                                        </select>
                                                                    
                                    <input type="text" id="addSettingInput" style="width:400px;" onkeydown="if(event.keyCode == 13){find_me_on_ajax_addNetwork(document.getElementById('networkDropdown').selectedIndex,document.getElementById('addSettingInput'),document.getElementById('responseDiv'));}">
                                   
                                    <input type="hidden" name="callBackUrl" id="callBackUrl" value="<?php echo $findmeonplugindir ?>"/>
									<br />
                                   <label id='instruction'></label>

                                    </form>
                                    
                                   
                                    </div>
                                    <div class="padding">
                                     <input class="button-secondary" type="button" id="addButton" value="Add New Icon" disabled=true
                                    onclick="find_me_on_ajax_addNetwork(document.getElementById('networkDropdown').selectedIndex,document.getElementById('addSettingInput'),document.getElementById('responseDiv'));" /> 
                                    <img src="<?php echo $findmeonplugindir ?>/images/spacer.gif" height="1" width="600px" />
                                    <img src="<?php echo $findmeonplugindir ?>/images/spacer.gif" height="1" width="10px" />
                                    <img src="<?php echo $findmeonplugindir ?>/images/spacer.gif" height="1" width="10px" />
                                    <img src="<?php echo $findmeonplugindir ?>/images/spacer.gif" height="1" width="10px" />
                                    <img src="<?php echo $findmeonplugindir ?>/images/spacer.gif" height="1" width="10px" />
                                    <img src="<?php echo $findmeonplugindir ?>/images/spacer.gif" height="1" width="10px" />
                                    <img src="<?php echo $findmeonplugindir ?>/images/spacer.gif" height="1" width="10px" />
                                    <img src="<?php echo $findmeonplugindir ?>/images/spacer.gif" height="1" width="10px" />
                                    <img src="<?php echo $findmeonplugindir ?>/images/spacer.gif" height="1" width="10px" />
                                    <img src="<?php echo $findmeonplugindir ?>/images/spacer.gif" height="1" width="10px" />
                                    <img src="<?php echo $findmeonplugindir ?>/images/spacer.gif" height="1" width="10px" />
                                    <img src="<?php echo $findmeonplugindir ?>/images/spacer.gif" height="1" width="10px" />
                                </div>
                            </div>
                            </li>
                            
                            <li>
                            <div class="box-mid-head" id="iconorder">
                                <img src="<?php echo $findmeonplugindir ?>/images/icons/iconorder.png" alt="" class="box-icons" />
                                <h2>Some call me persnickety, I just like order.</h2>
                                    <div class="bnav">
                                        <a href="javascript:void(null);" class="toggle" id="gle1">
                                        <img src="<?php echo $findmeonplugindir ?>/images/icons/toggle-plus.png" class="close" alt=""/>
                                        <img src="<?php echo $findmeonplugindir ?>/images/icons/toggle-min.png" class="open" style="display:none;" alt=""/>
                                        </a>
                                    </div>
                            </div>
                            <div class="box-mid-body iconator" id="toggle1">
                                <div class="padding">
                                    <div id="findmeon-networks">
                                    	<p>Click-n-drag the icons until your happy.  Then do it again.</p>
                                        <div  id="displayDiv" style="margin-left:auto; margin-right:auto; width:100%; cursor:move;" class="drop_target">
            							      <?php echo generatefindmeonPreviewInnerHTML("\n");  ?><img src="<?php echo $findmeonplugindir; ?>/images/ajax-loading.gif" style="display:none" id="addButtonLoader" />         
                                    </div>
                                </div>
                            </div>
                            
                            <div class="padding"
                            <form method="post" onSubmit="find_me_on_ajax_saveOrder()" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">        
                            <input class="button-secondary" type="submit" id="saveOrderButton" name="saveorder" value="Save Icon Order" style="margin-top:0px"/>
                            <input type="hidden" name="sortOrderData" id="sortOrderData"/>
                            <input type="hidden" name="callBackUrl" id="callBackUrl" value="<?php echo $plugindir ?>"/>
                            </div>
                            
                            </li>
                            
                             <li>
                            <div class="box-mid-head" id="iconator">
                                <img src="<?php echo $findmeonplugindir ?>/images/icons/trash.png" alt="" class="box-icons" />
                                <h2>We can't always be perfect</h2>
                                    <div class="bnav">
                                        <a href="javascript:void(null);" class="toggle" id="gle2">
                                        <img src="<?php echo $findmeonplugindir ?>/images/icons/toggle-plus.png" class="close" alt=""/>
                                        <img src="<?php echo $findmeonplugindir ?>/images/icons/toggle-min.png" class="open" style="display:none;" alt=""/>
                                        </a>
                                    </div>
                            </div>
                            <div class="box-mid-body iconator" id="toggle1">
                                <div class="padding">
                                    <div id="findmeon-networks">
                                        <p>Need to toss an icon?  Drag it here.</p>
                                            <div id="trash" style="width:150px; display:inline; float:left; class="drop_target">		
                                                <img name="dumpster" align="left" src="<?php echo $findmeonplugindir ?>/images/dumpster.png" id="mydumpster"/>
                                        </div>   
                                              
                                    </div>
                                </div>
                            </div>
                            </li>
                            
                            
                        <li>
				<div class="box-mid-head">
					<img src="<?php echo $findmeonplugindir ?>/images/icons/image.png" alt="" class="box-icons" />
					<h2>Big and shiny?  Small 'n sexy?  It's up to you</h2>
					<div class="bnav">
						<a href="javascript:void(null);" class="toggle" id="gle3">
							<img src="<?php echo $findmeonplugindir ?>/images/icons/toggle-plus.png" class="close" alt=""/>
							<img src="<?php echo $findmeonplugindir ?>/images/icons/toggle-min.png" class="open" style="display:none;" alt=""/>
						</a>
					</div>
				</div>
				<div class="box-mid-body" id="toggle4">
					<form action="" method="post">
                    
                    <?php 
                        $options = get_option('widget_find_me_on');
	
                        if ( $_POST['find-me-on-submit'] ) {
                            // Clean up control form submission options
                            $newoptions['title'] = strip_tags(stripslashes($_POST['find-me-on-title']));
                            $newoptions['width'] = strip_tags(stripslashes($_POST['find-me-on-width']));
                            $newoptions['iconsize'] = strip_tags(stripslashes($_POST['find-me-on-iconsize']));
                            $newoptions['iconstyle'] = strip_tags(stripslashes($_POST['find-me-on-iconstyle']));
                
                
                            if ( $options != $newoptions ) {
                                $options = $newoptions;
                                update_option('widget_find_me_on', $options);
                            }
                        }
                
                        $title = empty($options['title']) ? 'Find Me On' : $options['title'];
                        $width = empty($options['width']) ? 100 : $options['width'];
                        $iconsize = empty($options['iconsize']) ? 16 : $options['iconsize'];
                        $iconstyle = empty($options['iconstyle']) ? 0 : $options['iconstyle'];
                
                        
                        ?>
                    
                    <div class="padding">
							<p>16 or 32 pixel icons?</p>
						
                            
							<label class="bgimg demo-16">
								<input <?php echo (($iconsize == "16")? 'checked="checked"' : ""); ?> id="bgimg-caring" name="find-me-on-iconsize" type="radio" value="16" />
							</label>
							<label class="bgimg demo-32">
								<input <?php echo (($iconsize == "32")? 'checked="checked"' : ""); ?> id="bgimg-care-old" name="find-me-on-iconsize" type="radio" value="32" />
							</label>
						
					</div>
                    
                    

                    <div class="padding">
													
                            <p>Which icon style?</p>

							<label class="bgimg demo-sexy">
								<input <?php echo (($iconstyle == "2")? 'checked="checked"' : ""); ?> id="bgimg-caring" name="find-me-on-iconstyle" type="radio" value="2" />
							</label>
							<label class="bgimg demo-shiny">
								<input <?php echo (($iconstyle == "0")? 'checked="checked"' : ""); ?> id="bgimg-care-old" name="find-me-on-iconstyle" type="radio" value="0" />
							</label>
							<label class="bgimg demo-dim">
								<input <?php echo (($iconstyle == "1")? 'checked="checked"' : ""); ?> id="bgimg-love" name="find-me-on-iconstyle" type="radio" value="1" />
							</label>
						
					</div>
                    
                    
                    <div class="padding">
                    <p>Do you have a fancy name in mind for the widget?</p>
                        <input type="text" id="find-me-on-title" name="find-me-on-title" value="<?php echo $title; ?>" /></label>
                     </div>

                     <div class="padding">
                    <form name="findmeon-bookmarks" id="findmeon-bookmarks" action="" method="post">
								<input type="hidden" name="find-me-on-submit" id="find-me-on-submit" value="1" />
                                <input class="button-secondary" type="submit" value="Set Size and Style Options"/>
                                </form>    
                     </div>
				</div>
			</li>
                        
                        
                        
                      
                   </ul>
		
        </form>
                                    

</div>

        
    </div>
                
                
		<script language="JavaScript">
			createSortables();
		</script>
        
   
		<div id="findmeon-col-right">
        
            <div class="box-right">
            <a href="/wp-admin/options-general.php?page=find-me-on.php">
                <div class="box-right-head">
					<img src="<?php echo $findmeonplugindir ?>/images/icons/plug.png" alt="" class="box-icons"/><img src="<?php echo $findmeonplugindir ?>/images/icons/reload.png" alt="" style="float:right; margin-top:5px; margin-right:6px;">
                    <h3>Preview</h3>
                </div>
                </a>
                <div class="box-right-body">
                    <div class="padding">
                        <ul>
                             <div id="previewicons"><?php echo generatefindmeonInnerHTML("\n");  ?></div>
                        </ul>
             		</div>
            	</div>
       		</div>     
            
       

      <div class="box-right">
		<div class="box-right-head">
			<img src="<?php echo $findmeonplugindir ?>/images/icons/thumb-up.png" alt="" class="box-icons" />
			<h3><?php _e('Plugin Sponsors', 'findmeon'); ?></h3>
		</div>
		<div class="box-right-body">
			<div class="padding">
				<ul class="sexy-adslots">
					<li class="sexy-medium-banner">
						<a href="http://www.makeitwork.com" title="Make It Work" target="_blank" rel="dofollow">
							<img src="http://www.makeitwork.com/images/miw_ad.png" alt="The Neighborhood Computer Support Company | Make It Work" height="363" width="234" />
						</a>

                    </li>
                    
				</ul>
			</div>
		</div>
        
	</div>

 <div class="box-right findmeon-donation-box">
		<div class="box-right-head">
			<img src="<?php echo $findmeonplugindir; ?>/images/icons/money-coin.png" alt="" class="box-icons" />
			<h3><?php _e('Support by Donating', 'findmeon'); ?></h3>
		</div>
		<div class="box-right-body">
			<div class="padding">
            
            <a name="findmeondonationsbox"></a>
            
				<p>If you like this plugin, consider helping support future development by donating!</p>
				<div class="findmeon-donate-button" align="center">
					<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9476350" target="_blank" title="<?php _e('Help support the development of this plugin by donating!', 'findmeon'); ?>">
						<img src="<?php echo $findmeonplugindir; ?>/images/coffee.png" alt="" />
					</a>
				</div>
			</div>
		</div>
	</div>



	<?php
	


}//End of widget_find_me_on_settingsF

function saveSortOrder(){
   global $wpdb;
   global $message;
   global $status_message;
   global $messageClass;
   //WPD_print("Action: " . $action);
   //WPD_print("Sort Data: " . $sortDataOrder);
   $sortDataOrder = !empty($_POST['sortOrderData']) ? $_POST['sortOrderData'] : '';
   if(!empty($sortDataOrder))
   {
      //WPD_print("Saving order");
      parse_str($sortDataOrder,$newSortorderArray);
      if(count($newSortorderArray) != 0){
         //WPD_print("List size: " . count($newSortorderArray));
         $table_name = $wpdb->prefix . "find_me_on";
         foreach($newSortorderArray["displayDiv"] as $order => $id){
            //WPD_print('Order: '.$order.' Value: '.$id);

            $sql = 'Update ' .  $table_name . ' Set sort_order='.$order.' where id='.$id;
            $result = $wpdb->query($wpdb->prepare($sql));
            //WPD_print('Result for '.$sql.' is '.$result);

         }
         $message = 'Your wish is my command!  |  Maybe you would consider <a href=#findmeondonationsbox>donating</a>?';
	

         //$status_message = 'Saved links\' order.';

      }
      else{
         $message = 'No items to save.';
      }
      $messageClass = 'updated fade';
   }
}



 function setIconStyle(){
   global $wpdb;
   global $message;
   global $status_message;
   global $messageClass;
        
	
		$message = 'Now you\'re stylin!  |  Maybe you would consider <a href=#findmeondonationsbox>donating</a>?';
     	$messageClass = 'updated fade';
   
}


?>
