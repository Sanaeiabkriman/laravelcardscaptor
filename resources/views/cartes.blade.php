<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <title>Cards</title>
</head>

<body>@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="container p-5" method="post" action="/create" enctype="multipart/form-data">
        @csrf
        <div class="form-row text-center row">
            <input type="text" class="form-control" name="letitre" placeholder="Titre" value="{{old('letitre')}}">
            <input type="text" class="form-control" name="num1" placeholder="Année début" value="{{old('num1')}}">
            <input type="text" class="form-control" name="num2" placeholder="Année fin" value="{{old('num2')}}">
            <textarea type="text" class="form-control" name="ladescription">{{old('ladescription')}}
                </textarea>

                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choisissez une image...</label>
                </div>

            <div class="my-2 col-12">
                <button type="submit" class="btn btn-dark"> Ajouter une carte</button> 
            </div>

        </div>
    </form>

    <div class="container">
        <div class="row">
            @foreach ($donnees as $item)
            <div class="card container col-4 p-1">
                <div style='overflow:hidden;height: 480px'>                
                    <img class="card-img-top" src={{Storage::url($item->image)}} alt="Card image cap">
                </div>
                <div class="card-body row" >
                    <div  class="col-12 mb-3">
                        <p class="card-title" name="titre">{{$item->titre}}</p>
                        <span class="card-title" name="num1">{{$item->num1}}</span> - <span class="card-title" name="num2">{{$item->num2}}</span>
                        <p class="card-text">{{$item->description}}</p>
                    </div>
                    <div class="col-6 text-center">
                        <a class="btn btn-dark"  href="/edit/{{$item->id}}">modifier</a> 
                    </div>
                    <div class="col-6 text-center">
                        <form action="/cartes/{{$item->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-dark" action="delete">supprimer</button>
                        </form>
                    </div>

                </div>
            </div>
            @endforeach
        </div>   
    </div>
</body>

</html>
