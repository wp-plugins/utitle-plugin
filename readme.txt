=== uTitle Plugin ===
Contributors: mhawksey
Tags: YouTube, Twitter, embed, comment, commenting, video, player
Requires at least: 2.5
Tested up to: 3.0
Stable tag: 0.1
The uTitle Plugin  allows timeline commenting of YouTube videos using Twitter by integrating with the experimental uTitle tool

== Description ==

[uTitle](http://www.rsc-ne-scotland.org.uk/mashe/utitle/) is an experimental tool which uses Twitter to allow users to make free and timeline based comments on YouTube videos. The original concept is [explained in detail in this blog post](http://www.rsc-ne-scotland.org.uk/mashe/2010/06/convergence-youtube-meets-twitter-in-timeline-commenting-of-youtube-videos-using-twitter-utitle/), but the basic idea is video are played in custom interface which lets users 'tweet' comments. Part of each tweet includes a hashtag linking it to a specific YouTube video and a timestamp from the current point in the video. Tweets are stored in the [TwapperKeepr](http://twapperkeeper.com/) and temporarily cached on the uTitle site. When a video is replayed in the uTitle interface existing comments appear at the timed points as subtitles and users can also use the timed tweets to jump to part of the video [(see this video for a demonstration)](http://www.youtube.com/watch?v=RVp2F6tDWfw)  

This plugin allows you to easily embed commented YouTube videos by enabling a uTitle specific short code (e.g. [utitle mode=1 comment=yes]RVp2F6tDWfw[/utitle]). Options are available to choose the type of player (see Screenshots) and as well as a choice to provide a link to invite users to add their own comments.   

uTitle essentially works as the glue combining YouTube and Twitter, subsequently there is no direct control over moderating comments (but it does via TwapperKeepers configuration conform to Twitter's deletion policy).

This plugin and the uTitle site are not affiliated with YouTube or Twitter.

== Installation ==

1. Once you've downloaded and extracted move the utitle-plugin folder to wp-content/plugins
1. Activate 'uTile' (additional options can be set via the Setting panal)

== Frequently Asked Questions ==

= Do I need to register a video with uTitle before it can be commented upon =

No. Just include the YouTube video reference in the shortcode and uTitle will do the rest

= Can I include other people videos for commenting =

Yes. If the video owner has enabled embedding of their video in other sites you should be able to enable embedding and commenting using uTitle 

= Can I export comments made using uTitle =

Yes. If you visit this link http://twapperkeeper.com/hashtag/{your video id} (replacing {your video id} with the shortcode) the page includes export options


== Screenshots ==

1. Screenshot of the video playback (mode 1)
1. Screenshot of the video playback with additional navigation (mode 2)
1. Screenshot of the WordPress dialog box which includes the uTitle commenting interface


== Changelog ==

**0.1** - Initial Release