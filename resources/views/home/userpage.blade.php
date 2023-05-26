<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>
@include('sweetalert::alert')


    <div class="hero_area">
        <!-- header section strats -->

        @include('home.header')

        <!-- end header section -->
        <!-- slider section -->
        @include('home.slider')
        <!-- end slider section -->
    </div>
    <!-- why section -->
    @include('home.why')
    <!-- end why section -->

    <!-- arrival section -->
    @include('home.new-arival')
    <!-- end arrival section -->

    <!-- product section -->
    @include('home.product')
    <!-- end product section -->


    <!-- Comment And Reply System -->
    <h1 style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px;">Comments</h1>

    <div>
        <form action="{{url('add_comment')}}" method="post" style="text-align: center; padding-bottom: 30px;">
            @csrf
            <textarea name="comment" id="" style="height: 150px; width: 40%;" placeholder="Comment..."></textarea><br>
            <input type="submit" value="Comment" class="btn btn-primary">
        </form>
    </div>

    <div style="padding-left: 20%;">
        <h1 style="font-size: 20px; padding-bottom: 20px;">All Comments</h1>

        @foreach($comment as $comment)
        <div>
            <b>{{$comment->name}}</b>
            <p>{{$comment->comment}}</p>

            <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>

            @foreach($reply as $rep)
            @if($rep->comment_id == $comment->id)
            <div style="padding-left: 3%; padding-top: 10px; padding-bottom: 10px;">
                <b>{{$rep->name}}</b>
                <p>{{$rep->reply}}</p>

                <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
            </div>
            @endif
            @endforeach
        </div>
        @endforeach

        <!-- reply textbox  -->
        <div style="display: none;" class="replyDiv">
            <form action="{{url('add_reply')}}" method="post">
                @csrf
                <input type="text" name="commentId" id="commentId" hidden>
                <textarea name="reply" id="" style="height: 100px; width: 500px;" placeholder="Reply..."></textarea><br>
                <button type="submit" class="btn btn-primary">reply</button>
                <a href="javascript::void(0);" class="btn btn-primary" onClick="reply_close(this)">Close</a>
            </form>
        </div>
    </div>


    <!-- End Comment and Reply System -->

    <!-- subscribe section -->
    @include('home.subscribe')
    <!-- end subscribe section -->
    <!-- client section -->
    @include('home.client')
    <!-- end client section -->
    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>

    <script>
    function reply(caller) {
        document.getElementById('commentId').value = $(caller).attr('data-Commentid');
        $('.replyDiv').insertAfter($(caller));
        $('.replyDiv').show();
    }

    function reply_close(caller) {
        $('.replyDiv').hide();
    }
    </script>

    <script>
      document.addEventListener("DOMContentLoaded", function(event) {
         var scrollpos = localStorage.getItem('scrollpos');
         if (scrollpos) window.scrollTo(0, scrollpos);
      });

      window.onbeforeunload = function(e) {
         localStorage.setItem('scrollpos', window.scrollY);
      };
    </script>

    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>