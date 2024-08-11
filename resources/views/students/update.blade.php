<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <h1 class="text-center text-info m-5">Update {{$student->id}}</h1>
    <form class=" border p-2 bordered w-75 m-auto" method="post" action="{{route('students.update',$student->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group py-3">
            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}"  placeholder="Enter name">
        </div>
        <div class="form-group py-3">
          <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="grade" name="grade" value="{{ $student->grade }}" placeholder="Enter Grade">
        </div>
        {{-- <div class="form-group py-3">
            <select id="gender" name="gender" value="{{ $student->gender }}" class="form-control">
              <option selected>Choose...</option>
              <option value="male" >male</option>
              <option value="female" >female</option>
            </select>
          </div> --}}

          <div class="form-group py-3">
    <select id="gender" name="gender" class="form-control">
        <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
    </select>
</div>


          {{-- <div class="form-group py-3">
            <input type="file" class="form-control" id="image" name="image" value="{{ $student->image }}" placeholder="Enter image">
          </div> --}}

          <div class="form-group py-3">
    <label for="image">Current Image:</label>
    <img src="{{ $student->image }}" alt="student-img" class="img-fluid rounded my-2" style="width: 150px; height: auto;">
    <input type="file" class="form-control mt-2" id="image" name="image">
</div>

        <div class="form-group py-3">
          <input type="text" class="form-control" id="address" name="address" value="{{ $student->address }}" placeholder="Enter Your Address">
        </div>

        <button type="submit" class="btn btn-info mt-5">update</button>
      </form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
