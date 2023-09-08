function menures() {
  var x = document.getElementById("nav_atas");
  if (x.className === "nvmenu")
  {
      x.className += " responsive";
  }
  else
  {
      x.className = "nvmenu";
  }
}
