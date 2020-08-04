# Craft YT Thumbs plugin for Craft CMS 3.x

Use the YouTube Data API to get video thumbnail from video URL

## Requirements

This plugin requires Craft CMS 3.0.0 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require sampsonpete/craft-yt-thumbs

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Craft YT Thumbs.

## Craft YT Thumbs Overview

This plugin uses the YouTube Data API to get video thumbnails from YouTube videos. [Other plugins](https://github.com/mikestecker/craft-videoembedder) that get videos from YouTube don’t use the Data API and so YouTube rejects the unauthenticated thumbnail calls when over a certain limit. Using this plugin gets around this limit.

## Configuring Craft YT Thumbs

Add your YouTube Data API developer key to the plugin settings screen.

## Using Craft YT Thumbs

Pass a YouTube URL to the `getYtThumbnail` variable and a thumbnail image URL will be returned.

**Example:**

```
{% set thumb = craft.videoEmbedder.getYtThumbnail('https://www.youtube.com/watch?v=HtRGeyznv7k') %}

{% if thumb | length %}
    {{ thumb }}
{% endif %}
```

**Output:**

```
https://i.ytimg.com/vi/HtRGeyznv7k/hqdefault.jpg
```



Brought to you by [Pete Sampson](https://dos.studio)
