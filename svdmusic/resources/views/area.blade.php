@extends('layouts.site')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('public/site') }}/css/rank-song.css" />
@endsection
@section('title', $model->name_area)
@section('main')
    <div class="ms-wrapper-mobile">
        <div class="ms-ranking-song">
            <div class="blur-song-bg"></div>
            <div class="blur-song-bg-1"></div>
            <img class="ms-ranking-bg" src="{{ url('public/site') }}/image/bg-login.PNG" />
            <h1 class="title-ranking-song text-title">#{{ $model->name_area }} </h1>
        </div>
        <div class="ms-song-lyrics hidden">
            <div class="blur-song-bg"></div>
            <img class="img-blur" />
            <div class="wrapper-ms-song-lyrics">
                <div class="song-action">
                    <div class="wrapper-song-action">
                        <p class="title-suggesstion title-playing">Đang phát :</p>
                        <div class="wrapper-img-action">
                            <div class="overlay"></div>
                            <img src="">
                        </div>
                        <audio id="audio" class="lrc" data-lrc="" controls></audio>
                    </div>
                </div>
                <div class="wrapper-lyric">
                    <div class="container-lyrics">
                        <div class="wrapper-title-lyrics">
                            <p class="title-suggesstion">Lời bài hát :</p>
                        </div>
                        <div id="abc" class="lyricwrap">
                            <div class="lyric"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ms-wrapper-content-song ms-content-mobile ms-list-ranking-song">
            <div class="owl-carousel carousel-new-song top-ranking-song">
                @foreach ($songArea as $item)
                    <li class="list-music-top" data-index="">
                        <div class="item ">
                            <div class="wrapper-suggesstion">
                                <span class="material-icons flex-center">play_arrow</span>
                                <div class="overlay"></div>
                                <h1 class="number-new-song number-1">#</h1>
                                <img onerror="this.src='{{ url('public/uploads/banner_song/video_default.jpg') }}'"
                                    src="{{ url('public/uploads/banner_song') }}/{{ $item->image_bannersong }}" />
                            </div>
                            <div class="info-new-song">
                                <div class="name"> {{ $item->name_song }}</div>
                                <div class="creator">{{ $item->artist->name_artist }}</div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </div>
            <div class="ms-list-song">
                <div class="wrap-list-song">
                    <ul class="list-music list-music-ranking">
                        @foreach ($model->songs as $item)
                            <li class="list-music-item"
                                data-music="{{ url('public/uploads/mp3') }}/{{ $item->link_mp3 }}"
                                data-lrc="{{ url('public/uploads/lrc') }}/{{ $item->link_lyrics }}"
                                data-name="{{ $item->name_song }}" data-creator="{{ $item->artist->name_artist }}"
                                data-avatar="{{ url('public/uploads/image_song') }}/{{ $item->image_song }}"
                                data-img="{{ url('public/uploads/banner_song') }}/{{ $item->image_bannersong }}"
                                data-index="">
                                <div class="equalizer-and-number">
                                    <p class="number-item"></p>
                                </div>
                                <div class="list-music-item-info">
                                    <div class="avatar">
                                        <div class="btn-play"><span class="material-icons">
                                                play_arrow
                                            </span></div>
                                        <div class="over-lay-item-info"></div>
                                        <img onerror="this.src='{{ url('public/uploads/image_song/song_default.jpg') }}'"
                                            src="{{ url('public/uploads/image_song') }}/{{ $item->image_song }}">
                                    </div>
                                    <div class="item-info">
                                        <div class="name">{{ $item->name_song }}</div>
                                        <div class="creator">{{ $item->artist->name_artist }}</div>
                                    </div>
                                    <div class="item-control">

                                        <span class="material-icons-outlined">
                                            playlist_add
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endsection
