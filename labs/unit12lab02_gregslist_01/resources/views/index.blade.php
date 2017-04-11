<!doctype html>
<head>
    <title>gregslist - Omaha</title>
    <meta http-equiv="Content-Type" content = "text/html" ; charset=UTF-8"/>
    <link rel=stylesheet href="{{ asset('css/style.css') }}"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src ="{{ asset('js/script.js') }}"></script>

</head>
<body style = "display:none;">
    <div id="left">
        <h1>gregslist</h1>
        <p><a href="#">post to classifieds</a></p>
        <p><a href="#">my account</a></p>
        <p>search gregslist</p>
        <form id = "search" method="post" action="todo">
            <label for="search-input">search</label><br>
            <input type="text" name ="search-input"/><br>
            <input type="submit"/>
        </form>
    </div>
    <div id="right">
        <h2>Omaha</h2>
        <div id = "content">
            <h3>community</h3>
                <ul>
                    <li>activities</li>
                    <li>classes</li>
                    <li>events</li>
                </ul>
            <h3>housing</h3>
                <ul>
                    <li>apartments</li>
                    <li>rooms wanted</li>
                    <li>vacation rentals</li>
                </ul>
            <h3>jobs</h3>
                <ul>
                    <li>admin</li>
                    <li>education</li>
                    <li>information technology</li>
                </ul>
             </div>
        </div>
        <footer>
            (C) Copyright 2017, Gregslist
        </footer>
    </body>
</html>