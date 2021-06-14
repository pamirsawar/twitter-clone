function comment()
{

    var comment=document.getElementById("comment").value;

    var username=document.getElementById("username").value;

    //removing @ from username 
    username=username.substring(username.indexOf("@") + 1);

    console.log(comment);

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange=function(){

        if(this.readyState==4 && this.status ==200){

           // add comment to the list div
        }

    }

    var param = "comment="+comment+"usn="+username;
    xhttp.open("POST", "makecomment.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(param);
}