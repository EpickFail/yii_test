<?php
namespace app\insta;

use \Unirest\Request;

class UserPosts
{
    private $user;
    private $posts=[];
    
    public function __construct($user)
    {
        $this->user = $user;
    }
    
    private function scrapInstagram($user)
    {
        $response = Request::get('https://instagram.com/'.$user);
        $pageString = $response->body;
        $arr = explode('window._sharedData = ', $pageString);
        $json = explode(';</script>', $arr[1]);
        $arrayUser = json_decode($json[0], true);
        return $arrayUser['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
    }
    
    public function compilePosts($quantity)
    {
        foreach ($this->scrapInstagram($this->user) as $node) {
            $this->posts[] = $node['node']['display_url'];
            if (count($this->posts) === $quantity) {
                return $this->posts;
            }
        }
    }

}