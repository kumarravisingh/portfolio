<?php

namespace App\Http\Controllers\Studio;

use App\User;
use Canvas\Post;
use Canvas\UserMeta;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * The user associated with a post.
     *
     * @var User
     */
    protected $user;

    /**
     * The metadata associated with a user.
     *
     * @var UserMeta
     */
    protected $userMeta;

    /**
     * Show a given user.
     *
     * @param Request $request
     * @param string $identifier
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, string $identifier)
    {
        switch ($this->publicIdentifier()) {
            case 'id':
                $this->user = User::where('id', $identifier)->first();

                if ($this->user) {
                    $this->userMeta = UserMeta::where('user_id', $this->user->id)->first();

                }
                break;
            case 'username':
                $this->userMeta = UserMeta::where('username', $identifier)->first();

                if ($this->userMeta) {
                    $this->user = User::where('id', $this->userMeta->user_id)->first();
                }
                break;
            default:
                break;
        }

        $posts = Post::where('user_id', $this->user->id)
                     ->published()
                     ->withUserMeta()
                     ->orderByDesc('published_at')
                     ->get();

        $posts->each->append('read_time');

        $avatar = !empty($this->userMeta->avatar) ? $this->userMeta->avatar : $this->generateDefaultGravatar($this->user->email, 500);

        return response()->json([
            'user' => $this->user,
            'avatar' => $avatar,
            'summary' => optional($this->userMeta)->summary,
            'posts' => $posts,
        ]);
    }
}
