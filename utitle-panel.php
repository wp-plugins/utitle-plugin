<?php if (isset($_POST['ut_action'])) { ?>
<div id="message" class="updated fade" style="background-color: rgb(255, 251, 204);">
  <p><strong><?php echo $status; ?></strong></p>
</div>
<?php } ?>
<style type="text/css">
table, .box
{
    background-color: #fff;
    border: 2px solid #ccc;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    width:100%;
    padding: 2px;
}
table td, table th {
padding:4px;
vertical-align:top;
border-bottom:1px dashed #cccccc;
}
table th{
border-right:1px dashed #cccccc;
}

</style>
<div class="wrap">
<h2>uTitle Plugin </h2>
<div class="box">
<h3>Options</h3>
<form method="post" name="mpn_form">
  <?php if ( function_exists('wp_nonce_field') )
			wp_nonce_field('mpn-1', 'mpn-main');
			?>
    <input type="hidden" name="mpn_action" value="save" />
  <table>
    <tbody>
      <tr>
        <th scope="row"><label for="ut_com_text">Comment link text</label></th>
        <td align="left"><input name="ut_com_text" type="text" id="ut_com_text" value="<?php echo $options['ut_com_text']; ?>" size="80" /></td>
      </tr>
      <tr>
        <th scope="row"><label for="ut_host_url">Self-hosting address (Optional)</label></th>
        <td><p>
          <input name="ut_host_url" type="text" id="ut_host_url" value="<?php echo $options['ut_host_url']; ?>" size="80" />
          <br />
          <em>The service for making and replaying comments is currently based at <a href="http://www.rsc-ne-scotland.org.uk/mashe/utitle/">http://www.rsc-ne-scotland.org.uk/mashe/utitle/</a> and you are free you use this with the uTitle Plugin. </em></p>
          <p><em>No guaruntees are made regarding uptime/availabllity but if you would like to host your own copy the code is available under a GPL license and can be downloaded from <a href="http://github.com/mhawksey/uTitle">http://github.com/mhawksey/uTitle</a>. Once installed the self-hosting address can be entered above.</em></p></td>
      </tr>
      <tr>
        <th scope="row"></th>
        <td><span class="submit">
            <input class="inputbutton" type="submit" value="Save settings" name="saving"/>
            <input class="inputbutton" type="submit" value="Reset" name="reset" />
        </span></td>
      </tr>
    </tbody>
  </table>
  </form>
  </div>
  &nbsp;
  <div class="box">
  <h3>Instructions</h3>
  <p>To include a uTitled video in your post add the shortcode:</p>
  <blockquote>
    <p> [utitle mode={1 or 2} comment={yes or no}]{YouTube Video ID}[/utitle]. </p>
  </blockquote>
  <table border="0" cellpadding="10">
    <tr>
      <td align="center"><img src="<?php echo WP_PLUGIN_URL; ?>/utitle-plugin/screenshot-1.jpg" width="238" height="175" alt="Example of Mode 1" /><br />
        Example of mode 1 - Video with Twitter comments (uses &lt;embed&gt;)</td>
      <td align="center"><img src="<?php echo WP_PLUGIN_URL; ?>/utitle-plugin/screenshot-2.jpg" width="238" height="291" alt="Example of mode 2" /><br />
        Example of mode 2 -Video with Twitter comments and jump navigation (uses &lt;iframe&gt;)</td>
    </tr>
  </table>
  <p>Selecting 'comment=yes' adds a link (the text is customisable above) which when clicked opens a dialog window with the interface shown below. This links with Twitter to allow users to comment on the video.</p>
  <p align="center"><img src="<?php echo WP_PLUGIN_URL; ?>/utitle-plugin/screenshot-3.jpg" width="676" height="420" alt="Commetn interface" /></p>
  <p>For example to include http://www.youtube.com/watch?v=RVp2F6tDWfw using the embeded player and Twitter commenting would be</p>
  <blockquote>
    <p>   [utitle mode=1 comment=yes]RVp2F6tDWfw[/utitle]  </p>
  </blockquote>
</div>
