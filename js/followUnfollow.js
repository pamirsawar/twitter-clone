function followUnfollow(str) {
    var str=str;
   
   // var result = new Array();
    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

        var btn=document.getElementById("FUbtn")
      
            let result = this.responseText
           
            document.getElementById("FUbtn").innerHTML=result;
          //  document.getElementById("followers").innerText;
        }


    }
    xmlhttp.open("GET", "unfollowunfollow.php?id=" + str, true);
    xmlhttp.send();
}