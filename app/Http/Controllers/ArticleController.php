<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $code = $request->query('code');
        $title = $request->query('title');
        $tag = $request->query('tag');
        if (!empty($code))
        {
            $posts = Article::where('Code', 'like', '%' . $code . '%')->paginate(50);
        }
        else if (!empty($title))
        {
            $posts = Article::where('Title', 'like', '%' . $title . '%')->paginate(50);
        }
        else if (!empty($tag))
        {
            $tagIDs = Tag::where('TagName', 'like', '%' . $tag . '%')->pluck('id')->toArray();
            $postsIDs = DB::table('article_tag')->whereIn('tag_id', $tagIDs)->pluck('article_id')->toArray();
            $posts = Article::whereIn('id', $postsIDs)->paginate(50);
        }
        else
        {
            $posts = DB::table('articles')->paginate(50);
        }

        return view('posts')->with('posts', $posts)->with('code', $code)->with('title', $title)->with('tag', $tag);
    }
}
