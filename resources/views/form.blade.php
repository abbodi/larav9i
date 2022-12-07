<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>env. form</title>
</head>
<body>
    <form action="{{ route('form') }}" method="post">
        @csrf

        <div>Mail Host</div>
        <div>
            <input type="text" name="mail_host" value="{{ env('MAIL_HOST') }}">
        </div>

        <div>Mail Port</div>
        <div>
            <input type="text" name="mail_port" value="{{ env('MAIL_PORT') }}">
        </div>

        <div>User Name</div>
        <div>
            <input type="text" name="mail_username" value="{{ env('MAIL_USERNAME') }}">
        </div>

        <div>Password</div>
        <div>
            <input type="text" name="mail_password" value="{{ env('MAIL_PASSWORD') }}">
        </div>

        <div>Encryption</div>
        <div>
            <input type="text" name="mail_encryption" value="{{ env('MAIL_ENCRYPTION') }}">
        </div>

        <div>
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>