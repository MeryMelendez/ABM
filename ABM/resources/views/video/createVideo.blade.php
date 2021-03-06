@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h2>Crear un nuevo video</h2>
            <hr/>
            <form action="{{ url('/guardar-video') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
                {!! csrf_field() !!}

                @if($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" id="title" name="title" pattern="[A-Za-z0-9]+"/>
                </div>

                <div class="form-group">
                    <label for="title">Description</label>
                    <textarea class="form-control" id="description" name="description" pattern="[A-Za-z0-9]+"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Miniatura</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*"/>
                </div>

                <div class="form-group">
                    <label for="video">Archivo de video</label>
                    <input type="file" class="form-control" id="video" name="video" accept="video/*"/>
                </div>
                <button type="submit" class="btn btn-success">Crear video</button>
            </form>
        </div>
    </div>
@endsection
