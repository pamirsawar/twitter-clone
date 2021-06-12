function like(str) {
    var str=str;
   
   // var result = new Array();
    var xmlhttp = new XMLHttpRequest();
   
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

                let likebtn= "btn"+str;
   
           
            document.getElementById(likebtn).innerHTML=this.responseText;
        
        }

    }
    xmlhttp.open("GET", "liketweet.php?tid=" + str, true);
    xmlhttp.send();
}