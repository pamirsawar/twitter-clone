function like(str) {
    var str=str;
   
   // var result = new Array();
    var xmlhttp = new XMLHttpRequest();
   
//    var result=Array();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

               // result=this.responseText.split(" ");
                let likebtn= "btn"+str;
             //   let likecnt="likecnt"+str;
           
                console.log(this.responseText);
               // console.log(likecnt);
            document.getElementById(likebtn).innerHTML=this.responseText;
           // document.getElementById(likecnt).innerHTML=result[1];
        }

    }
    xmlhttp.open("GET", "liketweet.php?tid=" + str, true);
    xmlhttp.send();
}