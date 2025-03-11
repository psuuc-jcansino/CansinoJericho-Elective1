<html>

<head>
    <title>Student Management | Edit</title>
</head>

<body style="
    display: flex; 
    align-items: center; 
    justify-content: center; 
    height: 100vh; 
    margin: 0;
">
    <div style="
        width: 50%; 
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); 
        padding: 20px; 
        border-radius: 20px; 
        background-color: white;
    ">
        <div style="
            font-weight: bold; 
            font-size: 20px; 
            text-align: center;
            margin-bottom: 15px;
        ">
            Edit Student
        </div>

        <form action="/edit/<?php echo $users[0]->id; ?>" method="post">
            @csrf
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 10px; font-weight: bold;">Name</td>
                    <td style="padding: 10px;">
                        <input type='text' name='stud_name' value='<?php echo $users[0]->name; ?>'
                            style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px;" />
                    </td>
                </tr>
                <tr>
                    <td colspan='2' style="text-align: center; padding-top: 15px;">
                        <input type='submit' value="Update Student" style="
                            background-color: #28a745; 
                            color: white; 
                            padding: 10px 15px; 
                            border: none; 
                            border-radius: 5px; 
                            font-size: 16px;
                        " />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>