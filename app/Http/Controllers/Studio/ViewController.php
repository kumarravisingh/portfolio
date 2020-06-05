<?php

namespace App\Http\Controllers\Studio;

use Illuminate\Http\Request;

class ViewController extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        return view('studio.app', [
            'scripts' => $this->scriptVariables(),
        ]);
    }
}
