<?php

namespace App\Http\Responses\Auth;

use Illuminate\Contracts\Support\Responsable;

class LoginResponse implements Responsable
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return redirect()->route('home')->with('message', 'Welcome back '  . $request->user()->name);
    }
}
