//something like this clear the bin, needs to be fixed
const bin = document.getElementById("bin");
const td = document.getElementsByClassName("td");

bin.addEventListener("click", function () {
  console.log("yo");
  td.innerHTML = "";
});
