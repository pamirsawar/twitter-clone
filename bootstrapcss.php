<?php
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="/style/css/mdb.min.css"> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <script src="/style/js/mdb.min.js"></script> -->

<link rel="preconnect" href="https://fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Poppins:ital,wght@0,100;0,200;0,300;1,300&display=swap" rel="stylesheet">

<script src="/js/deletetweet.js"></script>
<script src="/js/formrefresh.js"></script>
<script src="/js/searchuser.js"></script>
<script src="/js/followUnfollow.js"></script>
<script src="/js/liketweet.js"></script>
<script src="/js/comment.js"></script>
<script src="/js/deletecomment.js"></script>

<style>
  h6 {
    display: inline;
  }


  body::-webkit-scrollbar {
  width: 0.50rem;
}

body::-webkit-scrollbar-track {
  background: #212529;
}

body::-webkit-scrollbar-thumb {
  background: #ffc107;
}

.comment-list{
  list-style-type: none;  
}

#searchResult li{
color: white;
background-color: #343a40;
}

#searchResult a{
color: white;
background-color: #343a40;
}


#searchResult a:hover{
text-decoration: none;
color:blue;

}

#searchResult li:hover{
color: 343a40;
background-color: #081421;
}

#searchResult li:hover >a{
  background-color: #081421;




}
  ul.nav-list{
    position: absolute;
    top:3.8rem;
    left: 81%;
    width: 17%;
    z-index: 1;
    /* background-color: transparent; */
    backdrop-filter: blur(5px);
  }

  @media (max-width: 990px)
  {
    ul.nav-list{
    position: absolute;
    top:15rem;
    left: 10px;
    width: 10rem;
    z-index: 1;
  }

  #comment{
    resize:none;
   }
  
  }
</style>
