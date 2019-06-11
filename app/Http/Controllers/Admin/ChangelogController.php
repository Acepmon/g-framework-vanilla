<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ChangelogController extends Controller
{
    private $api = 'https://api.github.com/repos/acepmon/g-framework/commits';

    public function index()
    {
        $client = new Client();
        $result = $client->get($this->api);
        $body = $result->getBody();
        $json = json_decode($body, true);

        return view('admin.changelog.index', ['commits' => $json]);
    }
}
