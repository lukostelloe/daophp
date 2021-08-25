const table = document.getElementById("cartable");

fetch("./cars.json")
  .then((response) => {
    console.log(response);
    return response.json();
  })
  .then((data) => {
    // Work with JSON data here
    // console.log(data);
    data.forEach((element) => {
      // ROW
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
      img.setAttribute("src", " bin.png");
      img.style.width = "30px";
    });
  })
  .catch((err) => {
    // Do something for an error here
    console.log("Error Reading data " + err);
  });
