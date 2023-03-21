<?php

namespace App\Console\Commands;

use App\Models\Tag;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetArticlesCountBoundToTagId extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tag:count {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get number of articles binded to exact tag by its id';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $id = $this->argument('id');
        if (Tag::where('id','=',$id)->exists())
        {
            $articles_count = DB::table('article_tag')->where('tag_id','=', $id)->count();
            $this->info($articles_count . ' articles relate to tag with that id');
        }
        else
        {
            $this->info('Tag not found!');
        }
    }
}
