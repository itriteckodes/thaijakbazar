<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('Email Verification')}}</title>
</head>
<body>
    <h3>{{__('Please click the link below to create new password')}}  </h3>
    <a href="{{route('forget',$user->code)}}">{{__('Verify Now')}}</a>
</body>
</html>