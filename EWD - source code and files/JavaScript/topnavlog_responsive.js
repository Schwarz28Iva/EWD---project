function myFunctionlog() {
  var x = document.getElementById("myTopnavlog");
  if (x.className === "topnavlog") {
    x.className += " responsive";
  } else {
    x.className = "topnavlog";
  }
}