function commentTweet()
{

    var comment=document.getElementById("comment").value;

  //  var username=document.getElementById("username").value;

  var username=document.getElementById("username").value;

console.log("username: "+username);

    var tid=document.getElementById("tid").value;
  
    //removing @ from username 
  
  //  username=username.substring(username.indexOf("@") + 1);
//    console.log(comment);

    var xhttp = new XMLHttpRequest();

    var result= new Array();
    xhttp.onreadystatechange=function(){

        if(this.readyState==4 && this.status ==200){

            document.getElementById("comment").value="";

            let list=document.getElementById("commentDiv");
           console.log(this.responseText);


              const li = document.createElement('li');
                 li.innerHTML=this.responseText;
                 
                 li.classList.add("comment-list");
                 list.appendChild(li);

        }

    }

    var param = "comment="+comment+"&username="+username+"&tid="+tid;
    xhttp.open("POST", "makecomment.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(param);


  //  console.log("comment "+comment+"\n usernae:"+username+"\n id"+tid);

}