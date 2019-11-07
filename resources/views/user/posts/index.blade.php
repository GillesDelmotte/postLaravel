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
        Les article de {{$user->name}}
    </h1>
    <div>
        @foreach($posts as $post)
        <article>
            <h2>{{$post->title}}</h2>
            <p>{{$post->content}}</p>
        </article>
        @endforeach
    </div>
    <div>
        {{$posts->links()}}
    </div>
</body>

</html>