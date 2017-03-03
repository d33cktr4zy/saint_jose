<?php
namespace stjo\Http\Composers;

use Illuminate\Foundation\Providers\ComposerServiceProvider;
use Illuminate\View\View;
use \stjo\Http\Repositories\publicSidebarRepo;

class publicSidebarComposer extends ComposerServiceProvider{

    protected $repo;

    public function __construct(publicSidebarRepo $repo)
    {
        $this->repo = $repo;
    }

    public function compose(View $view)
    {
        $view->with('bacaan', $this->repo->ambilBacaan());
        $view->with('PengumumanLima', $this->repo->ambilPengumuman());


        //dd('Composing');
    }
}
