<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphic {{isset($content->title)?'- '.$content->title:''}}</title>
</head>
<body>
    <section class="about_magazine">
        <div class="container">
            @if(isset($content->page_content))
                @php echo $content->page_content; @endphp
            @endif
        </div>
    </section>
    
</body>
</html>





