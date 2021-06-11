
  function deleteTweet(str) {
    console.log(str);
    var tid = str;
    var param = "tid=" + str;
    console.log(param);



    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {

    
       let id="tweet"+str;

         document.getElementById(id).innerHTML = this.responseText;
      }
    };

    // xhttp.open("GET", "deletetweet.php?tid=".tid, true);
    // xhttp.send();
    xhttp.open("POST", "deletetweet.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(param);

  }