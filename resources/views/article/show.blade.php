@extends('layouts.navbar')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@section('public')
    <div class="container border" >
        <div class="container-fluid p-3">
            @hasrole('admin')
                <div class="text-end">
                    <a href="{{ route('article.edit', ['id'=>$article->id]) }}" class=" btn btn-outline-secondary"><i class="bi bi-pencil-square"></i></a>
                </div>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            @endhasrole
            <h3>{{ $article->title }}</h3>

            <p style="width: 50%">{{ $article->descrip }}</p>
        </div>

        @if ($article->video)
            <div class="mb-3" style="display: block; text-align: center" >
                <iframe  width="560" height="315" src={{'https://www.youtube.com/embed/'.$article->video->video_id}} title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
            
        
        @endif

        @if ($article->files)
            @foreach ($article->files as $file)
                <div class="mb-5 p-3">


                    <div class="ratio ratio-16x9 border">
                        <iframe class="" src="{{asset($file->path)}}"></iframe>
                        
                    </div>
                </div>
            @endforeach
        @endif



    </div>

@endsection
