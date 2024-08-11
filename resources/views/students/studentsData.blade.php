

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>All Students</title>
</head>
<body class="bg-light">

  <div class="container my-5">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="text-primary">All Students</h1>
    </div>

    <table class="table table-bordered table-striped table-hover mt-4">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Grade</th>
          <th scope="col">Gender</th>
          <th scope="col">Address</th>
          <th scope="col">Image</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
        <tr>
          <th scope="row">{{ $student->id }}</th>
          <td>{{ $student->name }}</td>
          <td>{{ $student->email }}</td>
          <td>{{ $student->grade }}</td>
          <td>{{ $student->gender }}</td>
          <td>{{ $student->address }}</td>
          <td><img src="{{ $student->image }}" alt="student-img" class="img-fluid rounded" style="width: 30%; height: auto;"></td>
          <td>
            <div class="btn-group" role="group">
            <a href="{{ route('students.showOne', $student->id) }}" class="btn btn-success btn-sm me-1">View</a>
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm me-1">Update</a>
              <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm me-1">Delete</button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

            <a href="{{ route('students.create', $student->id) }}" class="btn btn-primary btn-sm me-1">Create</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe2KcB0ygjQeTfztmKC4HcB4y5uVNVxhVh0Sb0j5lzi5F5Dq8kMr06AQflg7" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-czRSgM/iGYdwX8inmOm30by6vr6AKPQKTNkGkM8Vr4p0ShgDi1uhU8VYpURyCkQ+" crossorigin="anonymous"></script>
</body>
</html>

