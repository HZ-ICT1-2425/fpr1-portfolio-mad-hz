<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Responses\Post\PostCreateResponse;
use App\Http\Responses\Post\PostDestroyResponse;
use App\Http\Responses\Post\PostUpdateResponse;
use App\Models\Post;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class PostController extends Controller
{
    /**
     * Paginate posts, 3 per page
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
     * @return PostCreateResponse
     */
    public function store(PostRequest $request)
    {
        $upload = $request->file('image_path');

        $sourceUrl = $request->source_url;
        $sourceTitle = $this->fetchPageTitle($sourceUrl);

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
     * @return PostUpdateResponse
     */
    public function update(PostRequest $request, Post $post)
    {
        $upload = $request->file('image_path');

        $sourceUrl = $request->source_url;
        $sourceTitle = $this->fetchPageTitle($sourceUrl);

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
     * @return PostDestroyResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return new PostDestroyResponse;
    }

    /**
     * Fetch title of the source page
     */
    private function fetchPageTitle(string $url): string
    {
        try {
            $client = new Client(['timeout' => 5.0, 'verify' => true]);

            $response = $client->get($url, ['headers' => ['User-Agent' => 'Mozilla/5.0']]);

            $html = (string) $response->getBody();
            $crawler = new Crawler($html);

            return $crawler->filter('title')->text(null, false) ?: 'Unknown title';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
