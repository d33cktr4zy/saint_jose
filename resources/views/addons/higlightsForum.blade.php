<div class="row" id="hiliteForum">
    <div class="col-xs-12">
        <h1>Kiriman Forum Terakhir</h1>
        <hr />
        @foreach($forum as $post )
            <div class="row">
                <div class="col-xs-8">
                    {{--<p>{!! $post !!}</p>--}}
                    <h4><strong>{!! \stjo\Model\ForumPost::find($post['id_post'])->topik->nm_topik !!}</strong></h4>
                </div>
                <div class="col-xs-2">
                    <small><strong>Oleh </strong> {!! \stjo\Model\ForumPost::find($post['id_post'])->user->username !!}</small>
                </div>
                <div class="col-xs-2">
                    <p align="right"> <small><strong>pada </strong> {!! \Carbon\Carbon::parse($post['wkt_kirim'])->toDateTimeString() !!}</small></p>
                </div>
            </div>
            <div class="row">
                <p>{!! str_limit($post['isi_post'],200,'...') !!} <a href="{!! url('forum/post/'.$post['id_post']) !!}">Read More</a> </p>
                <hr />
            </div>
        @endforeach

    </div>
</div>