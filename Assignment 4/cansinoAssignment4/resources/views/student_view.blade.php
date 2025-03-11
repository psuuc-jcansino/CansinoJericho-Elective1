<html>

<head>
    <title>View Student Records</title>
</head>

<body style="display: flex; align-items: center; justify-content: center;">
    <div
        style="width: 50%; margin: 0 auto;box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); padding: 20px; border-radius: 20px;">
        <div style="font-weight: bold; display: flex; justify-content: space-between; align-items: center; ">
            <span>
                Student Records
            </span>
            <a href="/insert" style="color:green;">Add Student</a>
        </div>
        @if (session('success'))
            <div style="color: green; font-size: 15px;">{{ session('success') }}</div>

        @endif
        <br>
        <table style="width: 100%; border-collapse: collapse; text-align: center; " border=1>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td style="background-color:  #FFC107 ;"><a href="/edit/{{$user->id}}"
                                style="text-decoration: none; color: white;">Edit</a></td>
                        <td style="background-color:  #A50000;"><a href="/delete/{{$user->id}}"
                                style="text-decoration: none; color: white;">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>