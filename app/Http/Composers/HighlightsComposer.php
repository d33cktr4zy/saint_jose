<?php
namespace stjo\Http\Composers;

use Illuminate\Foundation\Providers\ComposerServiceProvider;
use Illuminate\View\View;
use stjo\Http\Repositories\HighlightsRepositories;

class HighlightsComposer extends ComposerServiceProvider {

    protected $repo;
    /**
     * @param \stjo\Http\Repositories\HighlightsRepository $repo
     */
    public function __construct (HighlightsRepositories $repo){
        $this->repo = $repo;
    }

    public function compose(View $view){
        //
        $view->with('pengumuman', $this->repo->highlightsPengumuman());
        $view->with('forum', $this->repo->highlightsForum());
    }


}