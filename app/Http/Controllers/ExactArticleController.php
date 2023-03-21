<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExactArticleController extends Controller
{
    public function __invoke(Request $request, string $code): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        try
        {
            $article = Article::where('Code',$code)->firstOrFail();
            $articleID = $article->id;
            $tagIDs = DB::table('article_tag')->where('article_id','=',$articleID)->pluck('tag_id')->toArray();
            $tags=Tag::whereIn('id',$tagIDs)->pluck('TagName')->toArray();
            sort($tags);
            return view('exact')->with('tags', $tags)->with('article',$article);
        }
        catch (Exception)
        {
            abort(404);
        }
    }
}
