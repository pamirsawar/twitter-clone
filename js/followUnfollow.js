function followUnfollow(str) {
    var str=str;
   
   // var result = new Array();
    var xmlhttp = new XMLHttpRequest();
    var result = new Array();
   
    console.log("in follow unfollow funtion");

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            result = this.responseText.split(" ");

      

                console.log(result);

            document.getElementById("FUbtn").innerHTML=result;
          //  document.getElementById("followers").innerText;
          document.getElementById("followingcnt").innerHTML="updated";
        }


    }
    xmlhttp.open("GET", "unfollowunfollow.php?id=" + str, true);
    xmlhttp.send();
}