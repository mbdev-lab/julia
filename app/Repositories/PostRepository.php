<?php


namespace App\Repositories;


use App\Models\Post;
use App\Models\UserMute;

class PostRepository
{
    /**
     * @param int $viewerId
     * @return mixed
     */
    public function getNoMutedUsersPosts(int $viewerId, int $count = 50)
    {
        $mutedUsersSubQuery = UserMute::where('muter_user_id', $viewerId)->select('muted_user_id');

        return Post::whereNotIn('user_id', $mutedUsersSubQuery)->take($count)->get();
    }

}
