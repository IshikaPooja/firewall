<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- bootstrp css cdn -->
  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    *{
    margin: 0;
    padding: 0;
}
#form-data{
    transform: translate(0%,50%);
    width: 25vw;
    background-color: rgb(227, 227, 227);
    padding: 2vw;
}
#link{
    margin-left: 10px;
}
#button{
    margin-top: 30px;
    margin-left: 5px;
}

</style>
</head>
<body>
    
@include('Rule::layout.header') 
@yield('content')

<!-- bootstrp js cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>