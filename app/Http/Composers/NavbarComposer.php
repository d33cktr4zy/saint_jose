<?php
namespace stjo\Http\Composers;

use Illuminate\Foundation\Providers\ComposerServiceProvider;
use Illuminate\View\View;
use stjo\Http\Repositories\NavbarRepository;

class NavbarComposer extends ComposerServiceProvider {
    protected $repo;

    public function __construct(NavbarRepository $repo){
        $this->repo = $repo;
    }

    public function compose(View $view){
        //
        $view->with('sakramen', $this->repo->getNamaSakramen());
        $view->with('kat', $this->repo->getNamaKategorial());
    }
}