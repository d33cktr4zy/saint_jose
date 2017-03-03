<?php
namespace stjo\Http\Composers;

use Illuminate\Foundation\Providers\ComposerServiceProvider;
use Illuminate\View\View;
use stjo\Http\Repositories\adminSidebarRepo;

class adminSidebarComposer extends ComposerServiceProvider {

    protected $repo;

    public function __construct(adminSidebarRepo $repo){
        $this->repo = $repo;
    }

    public function compose(View $view){
        $view->with('userStat', $this->repo->hitungUser());
        $view->with('lastWeek', $this->repo->satuMingguTerakhir());
        $view->with('umatStat', $this->repo->hitungUmat());
        $view->with('jumlahKeluarga', $this->repo->hitungKeluarga());
        $view->with('umatLingkungan', $this->repo->hitungLingkungan());
    }
}