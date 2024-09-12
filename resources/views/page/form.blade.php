<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
            <a href="/home">kembali</a>
            
            <form action="/dashboard" method="POST">
                @csrf
                <label for="first-name">First Name : </label>
                <br><br>
                <input type="text" name="fname" id="first-name" placeholder="First Name">
                <br><br>
                <label for="last-name">Last Name : </label>
                <br><br>
                <input type="text" name="lname" id="last-name" placeholder="Last Name">
                <br><br>
                <input type="submit" value="kirim">
            </form>
</body>
</html>