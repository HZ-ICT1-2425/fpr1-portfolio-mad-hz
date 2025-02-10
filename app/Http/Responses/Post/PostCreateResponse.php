<?php

namespace App\Http\Responses\Post;

use Illuminate\Contracts\Support\Responsable;

class PostCreateResponse implements Responsable
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return redirect()->route('posts.index')->with('message', 'Your post has been created!');
    }
}
