///****************************************************************VARIABLES GLOBALES********************************************************** */
const table = document.getElementById("cartable");
const formulaire = document.querySelector("#formulaire");
let form;
///*********************************************************************FONCTIONS********************************************************** */
function createTable(element) {
  let row = document.createElement("tr");
  table.appendChild(row);
  for (const key in element) {
    //CELLS
    if (Object.hasOwnProperty.call(element, key)) {
      if (key != "id") {
        const elem = element[key];
        let cell = document.createElement("td");
        row.appendChild(cell);
        cell.innerHTML = elem;
      }
    }
  }
  let cell = document.createElement("td");
  row.appendChild(cell);
  let img = document.createElement("img");
  cell.appendChild(img);
  img.setAttribute("src", "bin.png");
  img.style.width = "30px";
  ////
  img.addEventListener("click", function (event) {
    event.preventDefault();
    table.removeChild(row);
    // delete element;
    deleteThis(element.registration);
  });
}
function drawRow(element) {
  let row = document.createElement("tr");
  table.appendChild(row);
  for (let i = 0; i < element.length; i++) {
    const z = element[i];
    let cell = document.createElement("td");
    row.appendChild(cell);
    cell.innerHTML = z;
  }
  let cell = document.createElement("td");
  row.appendChild(cell);
  let img = document.createElement("img");
  cell.appendChild(img);
  img.setAttribute("src", "bin.png");
  img.style.width = "30px";
  ////
  img.addEventListener("click", function (event) {
    event.preventDefault();
    table.removeChild(row);
    // delete element;
    deleteThis(element.registration);
  });
}

function fetchit() {
  fetch("./cars.json")
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      // Work with JSON data here
      if (data.length > 0) {
        data.forEach((element) => {
          createTable(element);
        });
      }
    })
    .catch((err) => {
      // Do something for an error here
      console.log("Error Reading data " + err);
    });
}
fetchit();

function deleteThis(get) {
  fetch(`./deleteVoiture.php?registration=${get}`)
    .then((response) => {
      console.log(response);
      return response.json();
    })
    .then((data) => {
      // Work with JSON data here
      // console.log(data);
      data.forEach((element) => {
        // ROW
        console.log(element);
      });
    })
    .catch((err) => {
      // Do something for an error here
      console.log("Error Reading data " + err);
    });
}
function addThis() {
  $init = { method: "POST", body: form };
  fetch("./testForm.php", $init)
    .then((response) => {
      console.log(response);
      return response.json();
    })
    .then((data) => {
      // Work with JSON data here
      // console.log(data);
      data.forEach((element) => {
        // ROW
      });
    })
    .catch((err) => {
      // Do something for an error here
      console.log("Error Reading data " + err);
    });
}
///////////////////////
formulaire.addEventListener(
  "submit",
  function (event) {
    event.preventDefault();
    form = new FormData();
    let keepValue = [];
    for (let i = 0; i < Array.from(formulaire.children).length; i++) {
      let z;
      console.log(Array.from(formulaire.children));
      if (i % 2 == 1) {
        z = Array.from(formulaire.children)[i];
        form.append(z.name, z.value);
        keepValue.push(z.value);
      }
    }
    addThis();
    console.log(keepValue);
    drawRow(keepValue);
  },
  false
);
