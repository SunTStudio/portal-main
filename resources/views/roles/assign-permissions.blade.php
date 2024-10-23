<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Assign Permissions to Role</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('roles.assignPermissions', $role->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="permissions">Select Permissions:</label>
                <div class="form-check">
                    @foreach ($permissions as $permission)
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                        <label>{{ $permission->name }}</label>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Assign Permissions</button>
        </form>
    </div>
</body>

</html>
