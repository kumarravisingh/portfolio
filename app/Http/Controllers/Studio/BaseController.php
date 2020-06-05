<?php

namespace App\Http\Controllers\Studio;

use App\Http\Controllers\Controller;
use Canvas\UserMeta;
use Illuminate\Support\Str;

class BaseController extends Controller
{
    /**
     * Build a global JavaScript object for the Vue app.
     *
     * @return array
     */
    protected function scriptVariables(): array
    {
        $user = auth()->user();

        if ($user) {
            $metaData = UserMeta::where('user_id', $user->id)->first();
            $avatar = !empty(optional($metaData)->avatar) ? $metaData->avatar : $this->generateDefaultGravatar($user->email);
        }

        return [
            'avatar' => $avatar ?? null,
            'canvasPath' => config('canvas.path'),
            'path' => config('studio.path'),
            'identifier' => config('studio.identifier'),
            'timezone' => config('app.timezone'),
            'user' => $user,
        ];
    }

    /**
     * Get the identifying attribute.
     *
     * @return string
     */
    protected function publicIdentifier(): string
    {
        return config('studio.identifier');
    }

    /**
     * Generate a default Gravatar image url from a given email.
     *
     * @param string $email
     * @param int $size
     * @return string
     */
    protected function generateDefaultGravatar(string $email, int $size = 200): string
    {
        $emailHash = md5(trim(Str::lower($email)));

        return "https://secure.gravatar.com/avatar/{$emailHash}?s={$size}";
    }
}
