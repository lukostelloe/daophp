const tablecell = document.getElementById("tablecell");

fetch("./cars.json")
  .then((response) => {
    console.log(response);
    return response.json();
  })
  .then((data) => {
    // Work with JSON data here
    console.log(data);
    data.forEach((element) => {
      for (const key in element) {
        if (Object.hasOwnProperty.call(element, key)) {
          const elem = element[key];
          console.log(elem);
          tablecell.innerHTML = elem;
        }
      }
    });
  })
  .catch((err) => {
    // Do something for an error here
    console.log("Error Reading data " + err);
  });
