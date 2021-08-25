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
      let row = document.createElement("tr");
      table.appendChild(row);
      for (const key in element) {
        if (Object.hasOwnProperty.call(element, key)) {
          const elem = element[key];
          console.log(elem);
          let cell = document.createElement("td");
          row.appendChild(cell);
          row.innerHTML = elem;
        }
      }
    });
  })
  .catch((err) => {
    // Do something for an error here
    console.log("Error Reading data " + err);
  });
