function showResult(str) {
    if (str.length == 0) {
        document.getElementById("searchResult").innerHTML = "";
     //  document.getElementById("livesearch").innertext="";  
     //   document.getElementById("livesearch").style.border = "0px";
        return;
    }

    // var resultdiv = getElementById("livesearch");


    var result = new Array();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

             result = this.responseText.split(" ");
             const list = document.getElementById("searchResult");    
             list.innerHTML="";  
             console.log(result);
             for (var i = 0; i < result.length-1; i++) {
               
               
                 const li = document.createElement('li');
                 var link = `<a href="user.php?usn=`+result[i+1]+`">`+result[i+1]+`</a>`;
                 li.innerHTML=link;
                 
                 li.classList.add("list-group-item");
                 list.appendChild(li);
             }
            
        }
    }

    xmlhttp.open("GET", "./livesearch.php?q=" + str, true);
    xmlhttp.send();
}
