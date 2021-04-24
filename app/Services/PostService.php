<?php


namespace App\Services;


use App\Repositories\PostRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class PostService
{
    private $postRepository;
    private $data;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function postsByViewerId($id, $count = 50)
    {
        $cacheKey = 'post_' . md5($id);

        $this->data = Cache::get($cacheKey);
        if (empty($this->data)) {
            $this->data = $this->postRepository->getNoMutedUsersPosts($id, $count);
            Cache::put($cacheKey, $this->data, Carbon::now()->addMinutes(60));
        }

        return $this;
    }

    public function sort(string $typeSort)
    {
        if ($typeSort === 'asc') {
            return $this->data->sortBy('date');
        }

        if ($typeSort === 'desc') {
            return $this->data->sortByDesc('date');
        }

        if ($typeSort === 'random') {
            return $this->data->shuffle();
        }
    }

    public function get()
    {
        return $this->data;
    }


}
