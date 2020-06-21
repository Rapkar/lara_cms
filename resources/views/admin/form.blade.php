<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<form method="POST" action="{{route('reg')}}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">firstname</label>
          <input name="first_name" type="text" class="form-control" id="exampleInputPassword1" placeholder="firstname">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">lastname</label>
            <input name="last_name" type="text" class="form-control" id="exampleInputPassword1" placeholder="lastname">
          </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</body>
</html>
