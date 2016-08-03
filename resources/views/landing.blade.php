<!DOCTYPE html>
<html>
    <head>
        <title>{{ $me->name }} - {{ $me->profile->title }}</title>
        
        <link href='/css/app.css' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200|Scope+One' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <header>
                    {{ $me->name }} - {{ $me->profile->title }} <!-- arghhh -->
                    <div>
                        <img src="{{ $me->profile->photo_url }}" />
                    </div>
                </header>
                <input name="search" />
            </div>
        </div>
    </body>
</html>
