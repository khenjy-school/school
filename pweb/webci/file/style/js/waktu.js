function startTime() {
  var skrg = new Date();
  var h = skrg.getHours();
  var m = skrg.getMinutes();
  var s = skrg.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('jam').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i}; 
  return i;
}