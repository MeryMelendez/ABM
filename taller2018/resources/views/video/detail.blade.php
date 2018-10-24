@extends('layouts.app')

@section('content')
    <div class="col-md-11 col-md-offset-1 pull-right">
        <h2>{{$video->title}}</h2>
        <hr/>

        <div class="col-md-8">
            <video controls id="video-player">
                <source src="{{ route('fileVideo', ['filename' => $video->video_path]) }}"/>
                Tu navegador no es compatible con HTML5
            </video>
        </div>

        <div class="panel panel-default video-data">
            <div class="panel-heading">
                <div class="panel-title">
                    Subido por <strong>{{$video->user->name.' '.$video->user->surname}}</strong> el {{ \FormatTime::LongTimeFilter($video->created_at) }}
                </div>
            </div>
            <div class="panel-body">
                {{$video->description}}
            </div>
        </div>

    </div>
@endsection
