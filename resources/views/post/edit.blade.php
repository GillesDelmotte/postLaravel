<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Liste des articles de mon blog!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creation d'un nouveau post</title>
</head>

<body>

    @component('components.main-navigation')
    @endcomponent

    <h1>
        Modification d'un nouveau post // {{$post->owner_id}} {{auth()->id()}}
    </h1>
    <form action="/posts/{{$post->id}}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="title">titre de l'article</label><br>
            <input type="text" name="title" id="title" value="{{$post->title}}" style="width:100%; display:block">
        </div>
        <div>
            <label for="content">contenu de l'article</label><br>
            <textarea name="content" id="content" cols="100" rows="20">{{$post->content}}</textarea>
        </div>
        <input type="submit" value="poster l'article">
    </form>
</body>

</html>