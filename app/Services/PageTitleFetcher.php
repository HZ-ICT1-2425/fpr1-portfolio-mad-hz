<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class PageTitleFetcher
{
    /**
     * Fetch the title of an url
     */
    public function fetch(string $url): string
    {
        try {
            $client = new Client([
                'timeout' => 5.0,
                'verify' => true
            ]);

            $response = $client->get($url, [
                'headers' => ['User-Agent' => 'Mozilla/5.0']
            ]);

            $html = (string) $response->getBody();
            $crawler = new Crawler($html);

            return $crawler->filter('title')->text(null, false) ?: 'Unknown title';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
