@extends('template.utama')


@section('content')
<div class="container-fluid">
    <div class="row" id="Input">
        {{--{!! dd($errors) !!}--}}
        @include('addons.adminMenu')
        {!! $errors->first('updated','<span class="help-block bg-danger">:message</span>') !!}

        <div class="col-xs-12">
            <h1 style="display: block;">Data User&nbsp;</h1>
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8">
            {!! Form::open(['route' => 'listUser',
                            'method' => 'get',
                            'class' => 'form-horizontal',
                            'role' => 'form']) !!}

            {{--<form role="form" class="form-horizontal" action="{!! route('cariUser') !!}" method="post">--}}
                <div class="form-group" style="margin-bottom:5px">
                    <label class="control-label col-sm-2" for="username">Username</label>
                    <div class="col-sm-5">
                        @if(isset($username))
                        <input type="text" name="username" class="form-control" id="username" placeholder="username" value="{!! $username !!}">
                        @else
                        <input type="text" name="username" class="form-control" id="username" placeholder="username">
                        @endif
                    </div>
                    <div class="col-xs-2">
                        <button type="submit" class="btn" name="cari" value="cari">Cari</button>
                    </div>
                </div>
                        {!! $errors->first('username','<span class="help-block bg-danger">:message</span>') !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row text-center" style="margin-bottom: 5px; margin-top:5px;;">
        <div class="col-xs-12">
            <ul class="pager" style="margin-bottom: 5px; margin-top:5px;">
                @if(isset($username))
                    <li class="previous">
                        @if($users->currentPage()>1)
                            <a href="{!!  $users->appends(['username' => $username,'cari'=> 'cari'])->previousPageUrl() !!}">Previous</a>
                        @endif
                    </li>
                    <li class="next">
                        @if($users->currentPage() < $users->lastPage())
                            <a href="{!! $users->appends(['username' => $username,'cari'=> 'cari'])->nextPageUrl() !!}">Next</a>
                        @endif
                    </li>
                @else
                    <li class="previous">
                        @if($users->currentPage()>1)
                            <a href="{!!  $users->previousPageUrl() !!}">Previous</a>
                        @endif
                    </li>
                    <li class="next">
                        @if($users->currentPage() < $users->lastPage())
                            <a href="{!! $users->nextPageUrl() !!}">Next</a>
                        @endif
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="row">
            <p class="text-center">Menampilkan :
                {!! $users->currentPage() * $users->perPage() - $users->perPage() +1  !!}
               sampai {!! $users->currentPage() * $users->perPage() - $users->perPage() + 1 + $users->count() - 1   !!}
               dari
                {!! $users->total() !!} user...</p>
        <div class="col-xs-12">
            <table class="table">
                <thead>
                <tr style="display: table-row;">
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tgl Lahir</th>
                    <th>Alamat</th>
                </tr>
                </thead>
                <tbody>
                {{--<td>{!! ($umats->perPage() * $umats->currentPage()) - $umats->perPage() + $key +1 !!}</td>--}}

                @foreach($users as $key => $user)
                <tr>
                    <td>{!! ($users->perPage() * $users->currentPage()) - $users->perPage() + $key + 1  !!}</td>
                    <td>{!! $user->username !!}</td>
                    <td>{!! $user->nama_depan !!} {!! $user->nama_belakang !!}</td>
                    <td>
                        @if($user->jk == 1)
                            Laki-Laki
                        @else
                            Perempuan
                        @endif
                    </td>
                    <td>{!! \Carbon\Carbon::parse($user->tanggal_lahir)->formatLocalized('%d %b %Y') !!}</td>
                    <td>
                        {!! $user->alamat !!}
                    </td>
                    <td class="text-justify">
                        <a href="{!! action('UserController@editUser',[$user->id]) !!}"><i class="fa fa-pencil fa-2x"></i></a>
                        &nbsp;
                        <i class="fa fa-trash-o fa-2x"></i>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-xs-12">
            <ul class="pager" style="margin-top:5px;">
                @if(isset($username))
                    <li class="previous">
                        @if($users->currentPage()>1)
                            <a href="{!!  $users->appends(['username' => $username,'cari'=> 'cari'])->previousPageUrl() !!}">Previous</a>
                        @endif
                    </li>
                    <li class="next">
                        @if($users->currentPage() < $users->lastPage())
                            <a href="{!! $users->appends(['username' => $username,'cari'=> 'cari'])->nextPageUrl() !!}">Next</a>
                        @endif
                    </li>
                @else
                    <li class="previous">
                        @if($users->currentPage()>1)
                            <a href="{!!  $users->previousPageUrl() !!}">Previous</a>
                        @endif
                    </li>
                    <li class="next">
                        @if($users->currentPage() < $users->lastPage())
                            <a href="{!! $users->nextPageUrl() !!}">Next</a>
                        @endif
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection