function deleteComment(str)
{

    // if(str==null)
    // {
    //         window.location.reload();
    // }

    const comment=document.getElementById("comment"+str);

   // const btn= document.getElementById(deletebtn);
   var xhttp = new XMLHttpRequest();

   var result= new Array();
   xhttp.onreadystatechange=function(){

       if(this.readyState==4 && this.status ==200){

        if(this.responseText==1)
        {
            comment.innerHTML="deleted";
        }
       }

   }

   var param = "cid="+str;
   xhttp.open("POST", "deletecomment.php");
   xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   xhttp.send(param);

}