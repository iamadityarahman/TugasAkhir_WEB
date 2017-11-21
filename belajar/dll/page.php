<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div {
            display:none;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>
    <div class="kuda">Content</div>

    <a href="#" id="loadMore">Load More</a>
    <script>
        /*
            Load more content with jQuery - May 21, 2013
            (c) 2013 @ElmahdiMahmoud
        */   

        $(function () {
            $(".kuda").slice(0, 4).show();
            $("#loadMore").on('click', function (e) {
                e.preventDefault();
                $(".kuda:hidden").slice(0, 4).slideDown();
            });
        });
    </script>
</body>
</html>