<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <title>Cards</title>
</head>

<body>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/update/{{$modif->id}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Nouveau titre</label>
            <input type="text" class="form-control" id="formGroupExampleInput" type="text" name="letitre" value="{{$modif->titre}}">
        </div>

        <div class="col">
            <input type="text" class="form-control" name="num1" value="{{$modif->num1}}">
        </div>
        <div class="col">
            <input type="text" class="form-control" name="num2" value="{{$modif->num2}}">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput2"> Nouvelle description</label>
            <textarea type="text" class="form-control" id="formGroupExampleInput2" name="ladescription"> {{$modif->description}}</textarea>
        </div>

        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="validatedCustomFile">
            <label class="custom-file-label" for="validatedCustomFile">Choisissez une image...</label>
        </div>

        <button type="submit" class="btn btn-dark">Update</button>
    </form>
</body>

</html>
