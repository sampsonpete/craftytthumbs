<?php
/**
 * Craft YT Thumbs plugin for Craft CMS 3.x
 *
 * Use YouTube Data API to get video thumbnail from video URL
 *
 * @link      https://dos.studio
 * @copyright Copyright (c) 2020 Pete Sampson
 */

namespace dos\craftytthumbs\variables;

use dos\craftytthumbs\CraftYtThumbs;

use Craft;

// Load Google Data API
use Google_Client;
use Google_Service_YouTube;

/**
 * Craft YT Thumbs Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.craftYtThumbs }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Pete Sampson
 * @package   CraftYtThumbs
 * @since     1.0.0
 */
class CraftYtThumbsVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.craftYtThumbs.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.craftYtThumbs.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function getYtThumbnail($url)
    {
        // Build the client object
        $client = new Google_Client();
        $client->setApplicationName('Craft_YT_Thumbs');
        $client->setDeveloperKey('AIzaSyBvq7QPTH1mgV7U9ohnnUwYYGFb3IR72oA');

        // Build the service object
        $service = new Google_Service_YouTube($client);

        // Get video ID from URL
        $id = str_replace('https://www.youtube.com/watch?v=', '', $url);

        // Get thumbnail from YouTube Data API
        $queryParams = [
            'id' => $id
        ];

        $response = $service->videos->listVideos('snippet,contentDetails,statistics', $queryParams);

        $thumb = $response->items[0]->snippet->thumbnails->high->url;

        return $thumb;
    }
}
