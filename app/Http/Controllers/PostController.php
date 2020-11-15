<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Message;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    public static function getFeatured()
    {
        $posts = Post::where('featured', 1)
            ->where('published', 1)
            ->paginate(9);
        return $posts;
    }


    public static function getLatest()
    {
        $categories = Category::select('id')->where('slug', 'LIKE', 'article-%')->get();
        $posts = Post::whereIn('category_id', $categories)
        ->where('published', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(4);
        return $posts;
    }

    public static function setMessage(Request $request) {
       $message = new Message();
       $message->message = $request->message;
       $message->user_id = Auth::id();
       $message->save();
       return $message;       
    }
    public static function getByViews()
    {
        $categories = Category::select('id')->where('slug', 'LIKE', 'article-%')->get();
        $posts = Post::whereIn('category_id', $categories)
        ->where('published', 1)
            ->orderBy('views', 'DESC')
            ->paginate(4);
        return $posts;
    }
    public static function getEvents()
    {
        $category = Category::where('slug', 'events')->firstOrFail();
        $posts = Post::whereCategoryId($category->id)
            ->where('published', 1)
            ->orderBy('views', 'DESC')
            ->paginate(4);
        return $posts;
    }
    public static function getArticles($type)
    {
        $menu = nova_get_menus()->first()['menuItems'];
        $category = Category::whereSlug('article-' . $type)->firstOrFail();
        $posts = Post::where('category_id', $category->id)
        ->where('published', 1)
            ->simplePaginate(3);
        return view('blog', compact('menu', 'posts'));
    }
    public static function getVideos($type)
    {
        $menu = nova_get_menus()->first()['menuItems'];
        $category = Category::whereSlug('video-' . $type)->firstOrFail();
        $posts = Post::whereCategoryId($category->id)
        ->where('published', 1)
            ->simplePaginate(8);
        return view('videos', compact('menu', 'posts'));
    }
    public static function getClub()
    {
        $menu = nova_get_menus()->first()['menuItems'];
        $category = Category::whereSlug('club-douleur')->firstOrFail();
        $posts = Post::whereCategoryId($category->id)
        ->where('published', 1)
            ->simplePaginate(3);
        return view('blog', compact('menu', 'posts'));
    }
    public function invoke($slug)
    {
        $menu = nova_get_menus()->first()['menuItems'];
        $post = Post::whereSlug($slug)
        ->where('published', 1)
            ->firstOrFail();
        $post->views += 1;
        $post->save();

        $related = Post::where('id', '!=', $post->id)
            ->whereCategoryId($post->category->id)
            ->where('published', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(4);
        return view('post', compact('post', 'related', 'menu'));
    }
    public function invokeVideo($slug)
    {
        $menu = nova_get_menus()->first()['menuItems'];
        $post = Post::whereSlug($slug)
        ->where('published', 1)
            ->firstOrFail();
        $post->views += 1;
        $post->save();
        return view('video', compact('post', 'menu'));
    }
    public function invokeSearch($slug)
    {
        $menu = nova_get_menus()->first()['menuItems'];
        $term = '%' . $slug . '%';
        $posts = Post::where('slug', 'like', $term)
            ->orWhere('title', 'like', $term)
            ->orWhere('body', 'like', $term)
            ->where('published', 1)
            ->simplePaginate(6);
        return view('search', compact('posts', 'menu'));
    }
}
