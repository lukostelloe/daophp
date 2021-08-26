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

        let input = document.createElement("input");
        cell.appendChild(input);
        input.value = elem;

        // cell.innerHTML = elem;
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

function findAll() {
  fetch(`./controllerVoiture.php?fonction=findALL`)
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      // Work with JSON data here
      console.log(data);
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
findAll();

function deleteThis(get) {
  fetch(`./controllerVoiture.php?fonction=deleteRow&variable=${get}`)
    .then((response) => {
      console.log(response);
      return response.json();
    })
    .then((data) => {
      // Work with JSON data here
    })
    .catch((err) => {
      // Do something for an error here
      console.log("Error Reading data " + err);
    });
}
function addThis() {
  $init = { method: "POST", body: form };
  fetch(`./controllerVoiture.php`, $init)
    .then((response) => {
      console.log(response);
      return response.json();
    })
    .then((data) => {
      // Work with JSON data here
      // console.log(data);
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
      if (i % 2 == 1) {
        z = Array.from(formulaire.children)[i];
        form.append(z.name, z.value);
        keepValue.push(z.value);
        console.log(z);
      }
    }
    addThis();
    console.log(keepValue);
    drawRow(keepValue);
  },
  false
);
