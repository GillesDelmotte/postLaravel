<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Liste des articles de mon blog!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des articles de mon blog!</title>
</head>

<body>

    @component('components.main-navigation')
    @endcomponent

    <h1>
        Les article de {{$user->name}} ({{$posts->total()}})
    </h1>
    <div>
        @foreach($posts as $post)
        <article>
            <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
            <p>{{$post->content}}</p>
            <span>Un Article publié le : {{$post->published_at->diffForHumans()}}</span>
        </article>
        @can('update', $post)
        <a href="/posts/{{$post->id}}/edit">modifier le post</a>
        @endcan
        @endforeach

    </div>
    <div>
        {{$posts->links()}}
    </div>
</body>

</html>