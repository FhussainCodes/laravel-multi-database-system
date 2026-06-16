<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <form action="{{ route('store.form') }}" method="POST" autocomplete="off">
            @csrf
            <h1>DYNAMIC FORM</h1>

        <label>Name</label>
            <input type="text" name="name" placeholder="please enter name" required>

              <label>Email</label>
            <input type="email" name="email" placeholder="admin@gmail.com" required>
        
            <label>Role</label>
            <input type="text" placeholder="admin,teacher,student" name="role">
       

            <label>Password</label>
            <input type="password" name="password" placeholder="********" autocomplete="new-password" required>
       

            <label>Email Verified At</label>
            <input type="text" name="email_verified_at" placeholder="Optional">
       
                   <label>Remember Token</label>
            <input type="text" name="remember_token" placeholder="Optional">

                <label>Select Database</label>

            <select name="db_connection" required>
                <option value="">Select Database</option>

                <option value="mysql">Student DB</option>

                <option value="mysql_second">Teacher DB</option>
            </select>

            <button type="submit" >Save User</button>


        </form>

</body>
</html>