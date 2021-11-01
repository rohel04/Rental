<?php


?>
<link rel="stylesheet" href="css/style.css">
<div id="footer">

    <p>&copy; All Right Reserved. | Develop by: <a href="http://rohelshk.com.np" target="_blank"
            style="color:#CBCBCB; text-decoration:none">Rohel
            Shakya</a>
    </p>
    <div class="information">Copying the Content of This website is strickly prohibited.</div>
    <center>
        <div class="social">
            Follow Us :<br>

            <a href="https://www.facebook.com/rohelshk/" class="fa fa-facebook" target="_blank"></a>
            <a href="https://twitter.com/shk_r04" class="fa fa-twitter" target="_blank"></a>
            <a href="https://www.instagram.com/rohel_shk/" class="fa fa-instagram" target="_blank"></a>
            <a href="https://www.youtube.com/channel/UCM3PCQ3TDL7Ks6cuqRig2xw" class="fa fa-youtube"
                target="_blank"></a>
        </div>
    </center>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
</div>
<script>
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
<style>
.social {
    padding-top: 25px;
    /* padding-right: 6px; */
    /* float: right; */
}

.fa {
    /* padding-left: 25px; */
    padding-top: 13px;
    font-size: 26px;
    width: 30px;
    text-align: center;
    text-decoration: none;
    margin: 8px;
    /* border-radius: 50%; */
}

.fa:hover {
    opacity: 0.7;
    color: beige;
}

.fa-facebook {
    /* background: #3B5998; */
    color: white;

}

.fa-twitter {
    /* background: #000; */
    color: white;
    /* border-radius: 30px; */
}

.fa-instagram {
    /* background: #000; */
    color: white;
    /* border-radius: 30px; */
}

.fa-youtube {
    /* background: #000; */
    color: white;
    /* border-radius: 30px; */
}
</style>