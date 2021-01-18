<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Projects</h1>
  <ul>

    @foreach($projects as $project)
    <li>
      <a href='/projects/{{$project -> id}}'>

        {{ $project -> title}} - {{ $project -> description}} -> {{$project -> created_at}}
      </a>
    </li>

    @endforeach
  </ul>

  <a href='/projects/create'>
    Create a project
  </a>
</body>
</html>