///*************************************************************VARIABLES GLOBALES********************************************************** */
const table = document.getElementById("cartable"); //Tableau
const formulaire = document.querySelector("#formulaire"); //Formulaire
let form;
///******************************************************************FONCTIONS************************************************************** */
//DESSINE LE TABLEAU prend en argument un Array ou un objet(resultat JSON)
function drawRow(element) {
  let typeOf = Array.isArray(element) ? true : false;
  let row = document.createElement("tr");
  table.appendChild(row);
  if (typeOf) {
    for (let i = 0; i < element.length; i++) {
      const z = element[i];
      let cell = document.createElement("td");
      row.appendChild(cell);
      cell.innerHTML = z;
      // let input = document.createElement("input");
      // cell.appendChild(input);
      // input.value = z;
    }
  } else {
    for (const key in element) {
      if (Object.hasOwnProperty.call(element, key)) {
        if (key != "id") {
          const elem = element[key];
          let cell = document.createElement("td");
          row.appendChild(cell);
          cell.innerHTML = elem;
          // let input = document.createElement("input");
          // cell.appendChild(input);
          // input.value = elem;
        }
      }
    }
  }
  //test a faire
  let cell = document.createElement("td");
  row.appendChild(cell);
  let img = document.createElement("img");
  cell.appendChild(img);
  img.setAttribute("src", "bin.png"); //ICONE POUR MODIFIER
  img.style.width = "30px";
  img.addEventListener("click", function (event) {
    event.preventDefault();
    for (let i = 0; i < Array.from(row.children).length - 2; i++) {
      const element = Array.from(row.children)[i];
      let input = document.createElement("input");
      element.appendChild(input);
      input.value = element.textContent;
    }
    let validate = document.createElement("button");
    validate.textContent = "Validé changements";
    cell.appendChild(validate);
    validate.addEventListener("click", function () {
      let params = [];
      for (let i = 0; i < Array.from(row.children).length - 2; i++) {
        const element = Array.from(row.children)[i].lastChild;

        input.value = element.textContent;
      }
    });
  });
  //
  let cell2 = document.createElement("td");
  row.appendChild(cell2);
  let img2 = document.createElement("img");
  cell2.appendChild(img2);
  img2.setAttribute("src", "bin.png");
  img2.style.width = "30px";
  img2.addEventListener("click", function (event) {
    event.preventDefault();
    table.removeChild(row);
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
          drawRow(element);
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

function modifierParam() {
  //envoyer objet [{"",""}] clé valeur dans un array

  let params = [];
  fetch(`./controllerVoiture.php?fonction=modifyRow&variable=${params}`)
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

//******************************************* */ Fonction a implémenté pour code plus propre
// function poubelleRow(row) {
//   // marche pas //
//   let cell = document.createElement("td");
//   row.appendChild(cell);
//   let img = document.createElement("img");
//   cell.appendChild(img);
//   img.setAttribute("src", "bin.png");
//   img.style.width = "30px";
//   img.addEventListener("click", function (event) {
//     event.preventDefault();
//     table.removeChild(row);
//     deleteThis(element.registration);
//   });
// }
// function modfierRow(row) {
//   let cell = document.createElement("td");
//   row.appendChild(cell);
//   let img = document.createElement("img");
//   cell.appendChild(img);
//   img.setAttribute("src", "bin.png"); //ICONE POUR MODIFIER
//   img.style.width = "30px";
//   img.addEventListener("click", function (event) {
//     event.preventDefault();
//     for (let i = 1; i < Array.from(row.children).length - 2; i++) {
//       const element = Array.from(row.children)[i];
//       console.log(element);
//     }
//   });
// }
