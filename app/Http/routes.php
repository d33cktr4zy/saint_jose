<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/**
 *  Home Routes
 */
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

/**
 * Auth Routes
 *
 */
Route::get('login',
           ['as'    => 'getLoginForm',
            'uses'  => 'SigkatAuthController@getLogin']);

Route::post('login',
            ['as'   => 'postLoginForm',
             'uses' => 'SigkatAuthController@postLogin']);

Route::get('logout',
           ['as'    => 'getLogout',
            'uses'  => 'SigkatAuthController@getLogout']);


/**
 *  Sakramen Routes
 *
 */
Route::get('sakremen/{sakramen}', ['as'=> 'sakramen', 'uses' => 'SakramenController@show']);

/**
 *  Route ke Admin
 *  Accessible only to admin
 */
Route::group([ 'prefix' => 'admin' ], function (){
    Route::get('profile',
               ['as'    => 'adminProfile',
                'uses'  => 'UserController@show']
    );

    /**
     * Manajemen Forum Buat Admins
     */
    Route::group(['prefix' => 'forum'], function(){
        Route::get('kategori',
                   ['as'    => 'manKategori',
                    'uses'  => 'ForumController@manageKategori']
        );

        Route::post('kategori',
                    ['as'   => 'buatKategori',
                     'uses' => 'ForumController@buatKategori']
        );

        Route::group(['prefix' => 'kategori'], function(){
            Route::get('{id}/edit',
                       ['as'    => 'editKategori',
                        'uses'  => 'ForumController@editKategori']
            );

            Route::post('{id}/edit',
                        ['as'   => 'updateKategori',
                         'uses' => 'ForumController@updateKategori']
            );

            Route::get('{id}/delete',
                       ['as'    => 'deleteKategori',
                        'uses'  => 'ForumController@deleteKategori']
            );
        });

        Route::get('topik',
                   ['as' => 'manTopik',
                    'uses'  => 'ForumController@manageTopik']
        );
    });

    /**
     * Manajemen Pengumuman
     */
    Route::group([ 'prefix' => 'pengumuman' ], function (){
        Route::get('new',
                   ['as'    => 'buatPengumuman',
                    'uses'  => 'PengumumanController@baru']
        );

        Route::post('new',
                    ['as'   => 'simpanPengumuman',
                     'uses' => 'PengumumanController@simpan']
        );

        Route::get('{id}/edit',
                   ['as' => 'editPengumuman',
                    'uses' => 'PengumumanController@edit']
        );

        Route::get('{id}/delete',
                   ['as' => 'deletePengumuman',
                    'uses' => 'PengumumanController@delete']
        );

        Route::get('list',
                   ['as'    => 'lihatPengumumanAdmin',
                    'uses'  => 'PengumumanController@listPengumumanAdmin']
        );

        Route::get('jenis',
                   ['as' => 'lihatJenisPengumuman',
                    'uses' => 'PengumumanController@listJenis']
        );

        Route::post('jenis',
                    ['as' => 'buatJenisPengumuman',
                     'uses' => 'PengumumanController@simpanJenisPengumuman']
        );

        Route::get('jenis/{id}/edit',
                   ['as' => 'editJenisPengumuman',
                    'uses' => 'PengumumanController@editJenisPengumuman']
        );

        Route::post('jenis/{id}/edit',
                    ['as' => 'updateJenisPengumuman',
                     'uses' => 'PengumumanController@simpanJenisPengumuman']
        );

        Route::get('jenis/{id}/delete',
                   ['as' => 'deleteJenisPengumuman',
                    'uses' => 'PengumumanController@deleteJenisPengumuman']
        );
    });

    /**
     * Manajemen Berita
     */
    Route::group([ 'prefix' => 'berita' ], function (){
        Route::get('new',
                   ['as'    => 'buatBerita',
                    'uses'  => 'BeritaController@beritaBaru']
        );

        Route::post('new',
                    ['as' => 'simpanBeritaBaru',
                     'uses' => 'BeritaController@simpanBeritaBaru']
        );

        Route::get('list',
                   ['as'    => 'lihatBeritaAdmin',
                    'uses'  => 'BeritaController@listBeritaAdmin']
        );

        Route::get('{id}/edit',
                   ['as'    => 'editBerita',
                    'uses'  => 'BeritaController@editBerita']
        );

        Route::post('{id}/edit',
                    ['as'   => 'updateBerita',
                     'uses' => 'BeritaController@updateBerita']
        );

        Route::get('{id}/delete',
                   ['as'    => 'deleteBerita',
                    'uses'  => 'BeritaController@deleteBerita']
        );
    });

    /**
     * Manajemen Bacaan
     *
     */
    Route::group([ 'prefix' => 'bacaan' ], function (){
        Route::get('new',
                   ['as'    => 'buatBacaan',
                    'uses'  => 'BacaanController@baru']
        );

        Route::get('list',
                   ['as'    => 'lihatBacaanAdmin',
                    'uses'  => 'BacaanController@index']
        );
    });

    /**
     * Manajemen Umat
     */
    Route::group([ 'prefix' => 'umat' ], function (){
        Route::get('new',
                   ['as'    => 'buatUmat',
                    'uses'  => 'UmatController@baru']
        );

        Route::post('new',
                    ['as'   => 'simpanUmat',
                     'uses' => 'UmatController@simpanBaru']
        );

        Route::get('list',
                   ['as'    => 'lihatUmatAdmin',
                    'uses'  => 'UmatController@index']
        );

        Route::get('{id}/edit',
                   ['as'    => 'editUmatAdmin',
                    'uses'  => 'UmatController@editUmat']
        );

        Route::post('{id}/edit',
                    ['as'   => 'updateUmatAdmin',
                     'uses' => 'UmatController@updateUmat']
        );

        Route::get('{id}/delete',
                   ['as'    => 'deleteUmatAdmin',
                    'uses'  => 'UmatController@deleteUmat']
        );

        Route::post('getKeluarga',
                    ['as'   => 'updateKeluargaAjax',
                     'uses' => 'UmatController@updateKeluargaAjax']
        );
    });

    /**
     * Manajemen Lingkungan
     */
    Route::group(['prefix' => 'lingkungan'], function(){
        Route::get('lingkungan',
                   ['as' => 'dataLingkungan',
                    'uses'  => 'LingkunganController@dataLingkungan']
        );

        Route::get('keluarga',
                   ['as' => 'dataKeluarga',
                    'uses'  => 'LingkunganController@dataKeluarga']
        );
    });

    /**
     * Manajemen Kegiatan
     */
    Route::group(['prefix' => 'kegiatan'], function(){
        Route::get('list',
                   ['as' => 'lihatKegiatan',
                    'uses'  => 'KegiatanController@index']
        );

        Route::get('new',
                   ['as' => 'buatKegiatan',
                    'uses'  => 'KegiatanController@baru']
        );
    });

    /**
     * Manajemen User
     *
     */
    Route::group(['prefix' => 'user'], function(){
        Route::get('list',
                   ['as'    => 'listUser',
                    'uses'  => 'UserController@index']
        );

        Route::get('edit/{id}',
                   ['as'    => 'editUserAdmin',
                    'uses'  => 'UserController@editUser']
        );

        Route::post('edit/{id}',
                    ['as'   => 'updateUserAdmin',
                     'uses' => 'UserController@updateUser']
        );

    });
});

/**
 * User Route
 *
 */
Route::group(['prefix' => 'user'], function () {
    /**
     * User By ID
     * ----------------------------------
     * Ini buat penggunaan Id sendiri
     */
    Route::group(['prefix' =>'{id}'], function($id){
        Route::get('profile',
                   ['as'    => 'userProfile',
                    'uses'  => 'UserController@show']
        );

        Route::get('edit',
                   ['as'    => 'editUser',
                    'uses'  => 'UserController@edit']
        );

        Route::post('upload',
            ['as'   => 'uploadFoto',
             'uses' => 'UserController@uploadFoto']
        );

    });

    Route::group(['prefix' => 'daftar'], function () {
        Route::get('satu',
                   ['as'    => 'daftarSatu',
                    'uses'  => 'UserController@daftarSatu']
        );
    });
});

/**
 * Forum Routes
 *
 */
Route::group(['prefix' => 'forum'], function(){
    /**
     * Tampilan Depan
     */
    Route::get('/',
               ['as' => 'forumMain',
                'uses'  => 'ForumController@index']
    );

    Route::group(['prefix' => '{kategoriID}'], function(){
        /**
         * Showing the Topik List
         * ---------------------------
         * Ketika nama Kategori di klik di tampilan utama
         */
        Route::get('/',
            ['as'   =>  'forumTopikList',
                'uses' =>  'ForumController@topikList']
        );

        Route::group(['prefix' => '{topikID}'], function(){
            /**
             * Showing the kontent of topik
             * ----------------------------------
             * Ketika nama topik di klik di tampilan utama atau di kategori list
             */
            Route::get('/',
                ['as'   =>  'forumThread',
                    'uses' =>  'ForumController@topikKonten']
            );
        });
    });
});

/**
 * Public Data Routes
 */
Route::group(['prefix' => 'data'], function(){
    Route::get('umat',
               ['as'    => 'dataUmat',
                'uses'  => 'UmatController@index']
    );

    Route::get('lingkungan',
               ['as'    => 'dataLingkungan',
                'uses'  => 'LingkunganController@index']
    );

    Route::get('kegiatan',
               ['as'    => 'dataKegiatan',
                'uses'  => 'KegiatanController@index']
    );
});

/**
 * Kategorial Routes
 * --------------------------
 * Just to display The Kategorial Views
 */
Route::group(['prefix' => 'kategorial'], function(){
    Route::get('{kategorial}',
        ['as'   => 'kategorial',
         'uses' => 'KategorialController@index']
    );
});

/**
 * Sakramen Routes
 *--------------------------
 * Just to display The Sakramen Views
 */
Route::group(['prefix' => 'sakramen'], function(){
   Route::get('{sakramen}',
       ['as'    => 'sakramen',
        'uses'  => 'SakramenController@index']
   );
});

/**
 * About Routes
 * ------------------
 * Displaying about pages.
 *
 */
Route::group(['prefix' => 'about'], function(){
    Route::get('{about}',
        [
            'as'    => 'about',
            'uses'  => 'AboutController@index'
        ]
    );
});


/**
 * App Istallation route
 */
