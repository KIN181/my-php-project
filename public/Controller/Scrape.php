<?php
namespace Controller;

use Goutte\Client;
use Model\UserModel;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Model/userModel.php';

class Scrape {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function scrapeQuotes($maxQuotes = 50) {
        $client = new Client();
        $url = 'http://quotes.toscrape.com';
        $quotes = [];

        while (count($quotes) < $maxQuotes && $url) {
            $crawler = $client->request('GET', $url);

            $newQuotes = $crawler->filter('span.text')->each(function ($node) {
                return $node->text();
            });

            $quotes = array_merge($quotes, $newQuotes);
            $quotes = array_slice($quotes, 0, $maxQuotes);

            // 次ページのリンク取得
            $nextPageLink = $crawler->selectLink('Next')->link();
            $url = $nextPageLink ? $nextPageLink->getUri() : null;
        }

        // 取得したデータをDBに保存
        foreach ($quotes as $quote) {
            $this->userModel->saveUrl($quote);
        }

        return $quotes;
    }
}
