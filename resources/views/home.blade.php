<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD APPLICATION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="main_content pt-3">
        <div class="container">
            <div class="row">

              {{-- @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error )
                  <li>{{ $error }}</li>                    
                  @endforeach
                </ul>
              </div>                
              @endif --}}

              @if (session()->has('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
                
              @endif

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Student
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="route('store')" class="form-label">Student Photo</label>
                                    <input type="file" name="photo">
                                        @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="route('store')" class="form-label">Student Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        placeholder="Student Name">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Student Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                        placeholder="Student Email">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" value="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            All Students
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resultat as $res )
                                    <tr>
                                      <th scope="row">{{ $loop->iteration }}</th>
                                      <td>
                                        <img src="{{ asset('upload/'.$res->sphoto) }}" alt="" style="width: 100px">
                                      </td>
                                      <td>{{ $res->sname }}</td>
                                      <td>{{ $res->semail }}</td>
                                      <td>
                                        <a href="{{ route('edit', $res->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete', $res->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this student ?')">Delete</a>
                                      </td>
                                  </tr>                                      
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
