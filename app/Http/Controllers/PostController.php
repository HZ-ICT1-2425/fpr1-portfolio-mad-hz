<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Responses\Post\PostCreateResponse;
use App\Http\Responses\Post\PostDestroyResponse;
use App\Http\Responses\Post\PostUpdateResponse;
use App\Models\Post;
use App\Services\PageTitleFetcher;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PostController extends Controller implements HasMiddleware
{
    /**
     * Auth middleware
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show'])
        ];
    }

    /**
     * Paginate posts, 10 per page
     *
     * @return PostView with the posts
     */
    public function index()
    {
        $posts = Post::latestCreated()->paginate(10);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Shows the post page
     *
     * @param Post $post
     * @return PostView with 1 post information
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * @return PostCreateView to create a post
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Handles creating the post
     * Validate it through PostRequest
     *
     * @param PostRequest $request
     * @param PageTitleFetcher $titleFetcher
     * @return PostCreateResponse
     */
    public function store(PostRequest $request, PageTitleFetcher $titleFetcher)
    {
        $upload = $request->file('image_path');

        $sourceUrl = $request->source_url;
        $sourceTitle = $titleFetcher->fetch($sourceUrl);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'source_url' => $sourceUrl,
            'source_title' => $sourceTitle,
            'image_path' => $upload->storeAs('uploads', $upload->getClientOriginalName(), 'public'),
        ]);

        return new PostCreateResponse;
    }

    /**
     * @param Post $post
     * @return PostEditView with the post information in the inputs this time
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Updates the post details
     *
     * @param PostRequest $request
     * @param Post $post
     * @param PageTitleFetcher $titleFetcher
     * @return PostUpdateResponse
     */
    public function update(PostRequest $request, Post $post, PageTitleFetcher $titleFetcher)
    {
        $upload = $request->file('image_path');

        $sourceUrl = $request->source_url;
        $sourceTitle = $titleFetcher->fetch($sourceUrl);

        Post::where('slug', $post->slug)->update([
            'title' => $request->title,
            'body' => $request->body,
            'source_url' => $sourceUrl,
            'source_title' => $sourceTitle,
            'image_path' => $upload->storeAs('uploads', $upload->getClientOriginalName(), 'public'),
        ]);

        return new PostUpdateResponse;
    }

    /**
     * Deletes the post
     *
     * @param Post $post
     * @return PostDestroyResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return new PostDestroyResponse;
    }
}
