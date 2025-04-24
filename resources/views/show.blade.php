<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form_model</title>

    {{-- add csrf token here --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>User List</h2>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Add Data</button>
                </div>

                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Age</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->age }}</td>
                            <td>
                                <button class="btn btn-primary viewBtn"
                                    data-id="{{ $user->id }}"
                                    data-name="{{ $user->name }}"
                                    data-email="{{ $user->email }}"
                                    data-city="{{ $user->city }}"
                                    data-age="{{ $user->age }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#viewModal">
                                    View
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-warning editBtn"
                                    data-id="{{ $user->id }}"
                                    data-name="{{ $user->name }}"
                                    data-email="{{ $user->email }}"
                                    data-city="{{ $user->city }}"
                                    data-age="{{ $user->age }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateModal">
                                    Update
                                </button>
                            </td>
                            <td>
                                <form action="{{ route('crud.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" data-id="{{$user->id}}" class="btn btn-danger deletebtn">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-5">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div> 
    <!-- Single User Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">User Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered w-100">
                    <tr>
                        <th>Name:</th>
                        <td><span id="view-name"></span></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><span id="view-email"></span></td>
                    </tr>
                    <tr>
                        <th>City:</th>
                        <td><span id="view-city"></span></td>
                    </tr>
                    <tr>
                        <th>Age:</th>
                        <td><span id="view-age"></span></td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
    </div>
    <!-- End of Single User Modal -->
    <!-- Registration Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Register</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <h2 class="text-center mb-4">Register</h2> --}}
                <form class="add">
                    @csrf
                    <div class="mb-3">
                        <label for="add-name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="add-name" id="add-name" required>
                    </div>

                    <div class="mb-3">
                        <label for="add-email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="add-email" id="add-email" required>
                    </div>

                    <div class="mb-3">
                        <label for="add-city" class="form-label">City</label>
                        <input type="text" class="form-control" name="add-city" id="add-city" required>
                    </div>

                    <div class="mb-3">
                        <label for="add-age" class="form-label">Age</label>
                        <input type="number" class="form-control" name="add-age" id="add-age" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    <!-- End of Registration Modal -->
    <!-- Update Model -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="city" required>
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" id="age" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    <!-- End of Update Model -->
    <script>
        $(document).ready(function() {
            $('.editBtn').on('click', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var email = $(this).data('email');
                var city = $(this).data('city');
                var age = $(this).data('age');

                $('#updateModal #name').val(name);
                $('#updateModal #email').val(email);
                $('#updateModal #city').val(city);
                $('#updateModal #age').val(age);

                $('#updateForm').attr('action', '/crud/' + id);
            });
            $('.viewBtn').on('click', function() {
                $('#view-name').text($(this).data('name'));
                $('#view-email').text($(this).data('email'));
                $('#view-city').text($(this).data('city'));
                $('#view-age').text($(this).data('age'));
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // add user
            $('#btnsubmit').on('click', function(e) {
                e.preventDefault();

                var name = $('#add-name').val();
                var email = $('#add-email').val();
                var city = $('#add-city').val();
                var age = $('#add-age').val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('crud.store') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name,
                        email: email,
                        city: city,
                        age: age
                    },
                    success: function(response) {
                        $('#exampleModalCenter').modal('hide');
                        $('.add')[0].reset(); // Correct form reset
                        location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;

                            // Clear previous errors
                            $('.invalid-feedback').remove();
                            $('.is-invalid').removeClass('is-invalid');

                            // Loop and show new errors
                            $.each(errors, function(key, value) {
                                let input = $('#add-' + key);
                                input.addClass('is-invalid');
                                input.after('<div class="invalid-feedback">' + value[0] + '</div>');
                            });
                        }
                    }
                });
            });

            // update user
            $('#updateForm').on('submit', function(e) {
                e.preventDefault();

                var id = $(this).attr('action').split('/').pop();
                var name = $('#name').val();
                var email = $('#email').val();
                var city = $('#city').val();
                var age = $('#age').val();

                $.ajax({
                    type: "PUT",
                    url: "/crud/" + id,
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name,
                        email: email,
                        city: city,
                        age: age
                    },
                    success: function(response) {
                        $('#updateModal').modal('hide');
                        location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;

                            // Clear previous errors
                            $('.invalid-feedback').remove();
                            $('.is-invalid').removeClass('is-invalid');

                            // Loop and show new errors
                            $.each(errors, function(key, value) {
                                let input = $('#' + key);
                                input.addClass('is-invalid');
                    input.after('<div class="invalid-feedback">' + value[0] + '</div>');
                            });
                        }
                    }
                });
            });

            // delete user
            $('.deletebtn').on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var id = $(this).data('id');

                if (confirm("Are you sure you want to delete this user?")) {
                    form.submit();
                }
            });
     });
    </script>
</body>
</html>
