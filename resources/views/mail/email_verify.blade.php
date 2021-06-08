<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('Email Verification Code')}}</title>
    <style>
        .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>
</head>

<body>
    {{-- <p>Your Verification Code is:  {{$msg->email_verify_code}}</p> --}}

    <a href="{{url('verify?code=',$receiver->email_verify_code)}}" class="button">{{__('Verify Email')}}</a>
</body>

</html>