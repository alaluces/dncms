<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">  
        
        <title>{{ Theme.get('title') }}</title>
        <meta charset="utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        
        <meta name="keywords" content="{{ Theme.get('keywords') }}">
        <meta name="description" content="{{ Theme.get('description') }}">
        
        {{ Theme.asset().styles() }}
        {{ Theme.asset().scripts() }}
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">     
        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>        
        
    </head>
    <body>
        {{ Theme.partial('header') }}

        <div class="container">
            {{ Theme.content() }}
        </div>

        {{ Theme.partial('footer') }}

        {{ Theme.asset().container('footer').scripts() }}
    </body>
</html>