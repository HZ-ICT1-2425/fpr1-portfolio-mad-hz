<?php

namespace App\Http\Responses\Faq;

use Illuminate\Contracts\Support\Responsable;

class FaqUpdateResponse implements Responsable
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return redirect()->route('faqs.index')->with('message', 'Your FAQ has been updated!');
    }
}
