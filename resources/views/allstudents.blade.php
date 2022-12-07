<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
      </style>
      
</head>
<body>
    <table>
        <tr>
            <th>Enr</th>
            <th>nom</th>
            <th>email</th>
            <th>phone</th>
          </tr>
          @foreach ($all_students as $item )
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>
            @foreach ($item->rPhone as $single )
              {{ $single->phone }}<br>
            @endforeach
          </td>
            {{-- <td>{{ $item->rPhone->phone }}</td> --}}

            {{-- <td>{{ $item->rStudent->id }}</td>
            <td>{{ $item->rStudent->name }}</td>
            <td>{{ $item->rStudent->email }}</td>
            <td>{{ $item->phone }}</td> --}}
          </tr>
          @endforeach         
          
    </table>
</body>
</html>
