<?php

namespace App\Http\Controllers\Studio;

use Canvas\Post;
use Canvas\Topic;
use Illuminate\Http\Request;

class TopicController extends BaseController
{
    /**
     * Get all the topics.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return Topic::select(['name', 'slug'])
                    ->whereHas('posts')
                    ->withCount('posts')
                    ->orderByDesc('posts_count')
                    ->take(15)
                    ->get();
    }

    /**
     * Show a given topic.
     *
     * @param Request $request
     * @param string $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, string $slug)
    {
        $topic = Topic::select('name', 'slug')->where('slug', $slug)->first();

        if ($topic) {
            $posts = Post::whereHas('topic', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->published()->withUserMeta()->orderByDesc('published_at')->get();

            $posts->each->append('read_time');

            return response()->json([
                'topic' => $topic,
                'posts' => $posts,
            ]);
        } else {
            return response()->json(null, 404);
        }
    }
}
