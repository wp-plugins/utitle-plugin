<?php
/*
Plugin Name: uTitle WordPress Plugin
Plugin URI: http://www.rsc-ne-scotland.org.uk/mashe/wordpress-plugins/utitle-plugin/
Description: The uTitle Plugin integrates with the beta <a href="http://www.rsc-ne-scotland.org.uk/mashe/utitle/">uTitle service</a> which allows timeline commenting of YouTube videos using Twitter
Author: Martin Hawksey
Version: 0.1
Author URI: http://www.rsc-ne-scotland.org.uk/mashe
*/

/*  Copyright 2009  Martin Hawksey  (email : martin.hawksey@gmail.com)
 
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
*/

if(!class_exists("uTitlePlugin")){
	class uTitlePlugin{
		 var $default_options = array(
			'ut_revision' => 1,
			'ut_com_text' => 'Click here to add yours ...', 
			'ut_host_url' => 'http://www.rsc-ne-scotland.org.uk/mashe/utitle/'
		  );
		  //constructor
		  function uTitlePlugin(){
			  $this->install_plugin();
			  $this->actions_filters();
		  }
	
		  //initialise
		  function init(){
	
		  }
		  //the shortcode replacement function
		  function func_utitle($attr, $content){
			if ($this->o['mpn_host_url']=="")
				$url =  "http://www.rsc-ne-scotland.org.uk/mashe/utitle/";
			else 
				$url = $this->o['mpn_host_url'];
				
			$sHTML = '<div style="text-align:center;">';
			$eHTML = '</div>';
			$com_text = "<br/>Comments powered by <img src='".$url."images/twitter.png' align='absbottom' alt='Twitter' style='border:none; padding:0px;' >";
			$a = shortcode_atts( array(
					'mode' => 'null',
					'comment' => 'no'), $attr );
			// build player
			if ($a['mode']=='1'){
				//make embed code
				$res = "<embed src='".$url."player/player.swf' height='320' width='470' allowscriptaccess='always' allowfullscreen='true' flashvars='&autostart=false&captions.back=false&captions.file=".urlencode($url)."xml%2F".$content.".xml&captions.fontsize=14&captions.height=296&captions.state=true&captions.visible=true&captions.width=470&captions.x=0&captions.y=0&file=http%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D".$content."&plugins=viral-2%2Ccaptions-1&viral.functions=link%2Cembed&viral.onpause=false'/>";
			} elseif ($a['mode']=='2'){
				//make iframe	
				$res = '<iframe src="'.$url.'u.php?v='.$content.'" scrolling="no" frameborder="0" allowtransparency="true" style="border:none; overflow:hidden; width:470px; height:555px"></iframe>';
			}
			$res = str_replace('%YOUTUBEURL%', $content, $res).$com_text ;
			if (strtolower($a['comment'])=='yes'){
				// if comment add link to thickbox
				$res .= ' <a href="#TB_inline?&width=1006&height=606&inlineId=utitle_content" title="uTitle: YouTube/Twitter commenting" class="thickbox">'.$this->o['ut_com_text'].'</a>';
				$res .= '<div id="utitle_content" style="display:none">';
				$res .= '<iframe src="'.$url.'int.php?v='.$content.'" scrolling="no" frameborder="0" allowtransparency="true" style="border:none; overflow:hidden; width:996px; height:586px"></iframe>';
				$res .= '</div>';
			}
			$res = $sHTML.$res.$eHTML;
			return $res;
		  }
		  function actions_filters(){
			add_action('init', array(&$this, 'init'));
			add_action('admin_menu', array(&$this, 'admin_menu'));
			add_action('wp_print_scripts', array(&$this, 'utitlehead'));
			wp_enqueue_script('jquery');
			wp_enqueue_script('thickbox');
			wp_enqueue_style ('thickbox');
			add_shortcode('utitle', array($this,'func_utitle'));
		  }
		  function install_plugin(){
			  $this->o = get_option('utitle-options');
			  if (!is_array($this->o)) {
				  update_option('utitle-options', $this->default_options);
				  $this->o = get_option('utitle-options');
			  } else {
				  foreach ($this->default_options as $key => $value)
					  if (!isset($this->o[$key]))
						  $this->o[$key] = $value;
				  $this->o["ut_revision"] = $this->default_options["ut_revision"];
				  update_option('utitle-options', $this->o);
			  }
		  }
		  function utitlehead() {
			?>
<script type="text/javascript">
			//<![CDATA[ 
			var tb_pathToImage = "<?php echo get_bloginfo('url'); ?>/wp-includes/js/thickbox/loadingAnimation.gif";
			var tb_closeImage = "<?php echo get_bloginfo('url'); ?>/wp-includes/js/thickbox/tb-close.png";
			//]]>
			</script>
<?php
		  }
		  function admin_menu(){
              add_submenu_page('options-general.php', 'uTitle', 'uTitle', 9, __FILE__, array($this, 'options_panel'));
          }
          function options_panel(){
              $options = $this->o;
              $status = $this->status;
              include($this->plugin_path . 'utitle-panel.php');
          }
	}
	$utitle_plugin = new uTitlePlugin();
}
?>