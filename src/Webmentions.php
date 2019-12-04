<?php

namespace Mattrothenberg\Webmentions;
use GuzzleHttp\Client;

class Webmentions extends \Statamic\Tags\Tags
{
    public function index () {
        $url = $this->params->get('url');

        if (!$url) {
            return false;
        } else {
            $client = new Client([
                'base_uri' => 'https://webmention.io/'
            ]);
            $res = $client->request('GET', '/api/mentions.jf2', [
                'query' => ['target' => $url],
                'http_errors' => false
            ]);
            $json = json_decode($res->getBody(), true);

            $children = $json['children'];
            $count = count($children);

            return $children ? ['mentions' => $children] : [];
        }
    }
}