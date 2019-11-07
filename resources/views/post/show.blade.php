<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Liste des articles de mon blog!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$post->title}}</title>
</head>

<body>
    @component('components.main-navigation')
    @endcomponent
    <h1>
        {{$post->title}}
    </h1>
    <p>
        {{$post->content}}
    </p>
    <div>
        <time datetime="{{$post->created_at}}">
            {{$post->created_at->diffForHumans()}}
        </time>
    </div>
    <div>
        <p>
            Écrit par : <a href="/author/{{$post->author->id}}/posts">{{$post->author->name}}</a>
        </p>
    </div>
    <br>
    <br>
    <br>
    @can('forceDelete', $post)
    <form action="/posts/{{$post->id}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">supprimer le post</button>
    </form>
    @endcan
</body>

</html>