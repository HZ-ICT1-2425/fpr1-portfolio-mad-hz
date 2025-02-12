<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Http\Responses\Faq\FaqCreateResponse;
use App\Http\Responses\Faq\FaqDestroyResponse;
use App\Http\Responses\Faq\FaqUpdateResponse;
use App\Models\Faq;
use App\Services\PageTitleFetcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class FaqController extends Controller implements HasMiddleware
{
    /**
     * Auth middleware
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index'])
        ];
    }

    /**
     * Paginate faqs, 10 per page
     *
     * @return FaqView with the faqs
     */
    public function index()
    {
        $faqs = Faq::paginate(10);

        return view('faqs.index', [
            'faqs' => $faqs,
        ]);
    }

    /**
     * @return FaqCreateView to create a faq
     */
    public function create()
    {
        return view('faqs.create');
    }

    /**
     * Handles creating the faq
     * Validate it through FaqRequest
     *
     * @param FaqRequest $request
     * @param PageTitleFetcher $titleFetcher
     * @return FaqCreateResponse
     */
    public function store(FaqRequest $request, PageTitleFetcher $titleFetcher)
    {
        $sourceUrl = $request->source_url;
        $sourceTitle = $titleFetcher->fetch($sourceUrl);

        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'source_url' => $sourceUrl,
            'source_title' => $sourceTitle,
        ]);

        return new FaqCreateResponse;
    }

    /**
     * Shows the edit page with inputs pre filled
     *
     * @param Faq $faq
     * @return FaqEditView with the faq information in the inputs this time
     */
    public function edit(Faq $faq)
    {
        return view('faqs.edit', [
            'faq' => $faq
        ]);
    }

    /**
     * Updates the faq details
     *
     * @param FaqRequest $request
     * @param Faq $faq
     * @param PageTitleFetcher $titleFetcher
     * @return FaqUpdateResponse
     */
    public function update(FaqRequest $request, Faq $faq, PageTitleFetcher $titleFetcher)
    {
        $sourceUrl = $request->source_url;
        $sourceTitle = $titleFetcher->fetch($sourceUrl);

        Faq::where('id', $faq->id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'source_url' => $sourceUrl,
            'source_title' => $sourceTitle,
        ]);

        return new FaqUpdateResponse;
    }

    /**
     * Deletes the faq
     *
     * @param Faq $faq
     * @return FaqDestroyResponse
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return new FaqDestroyResponse;
    }
}
