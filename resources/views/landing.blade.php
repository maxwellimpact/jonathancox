<!DOCTYPE html>
<html>
    <head>
        <title>{{ $me->name }} - {{ $me->profile->title }}</title>
        
        <link href='/css/app.css' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200|Scope+One' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="container">
            <header class="profile">
                <div class="profile__group">
                    <!-- arghhh -->
                    <div class="profile__desc">
                        <h1 class="profile__name">
                            {{ $me->name }}
                        </h1>
                        <p class="profile__title">
                            {{ $me->profile->title }}
                        </p>
                    </div>
                    <div class="profile__photo">
                        <img src="{{ $me->profile->photo_url }}" />
                    </div>
                </div>
                
                <div class="profile__group">
                    <input class="profile__search" name="search" placeholder="learn more..." />
                </div>
            </header>
        </div>
    </body>
</html>
