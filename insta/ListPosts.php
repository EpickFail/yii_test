<?php
namespace app\insta;


class ListPosts
{
    private $users;
    private $posts=[];
    
    public function __construct($users=['kevin', 'art'])
    {
        $this->users = $users;
    }
    
    public function render()
    {
        foreach ($this->users as $user) {
            $post = new UserPosts($user);
            $this->posts["$user"] = $post->compilePosts(10);
        }
        return $this->posts;
    }
}
    
        