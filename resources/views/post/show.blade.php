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
    @can('forceDelete', $post)
    <form action="/posts/{{$post->id}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">supprimer le post</button>
    </form>
    @endcan
    <div>
        <h2>ajouter un commentaire</h2>
        <form action="/comments" method="POST">
            @csrf
            <input type="hidden" name="postId" value="{{$post->id}}">
            <label for="comment">Votre commentaire&nbsp;:</label>
            <br>
            <textarea name="comment" id="comment" cols="100" rows="10"></textarea>
            <br>
            <button type="submit">Poster le commentaire</button>
        </form>
    </div>
    <div>
        <h2>Les commentaires du post</h2>
        ...
    </div>
</body>

</html>