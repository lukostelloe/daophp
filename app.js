const tablecell = document.getElementById("tablecell");

fetch("http://localhost/php/cartable/")
  .then((response) => {
    console.log(response);
    return response.json();
  })
  .then((data) => {
    // Work with JSON data here
    console.log(data);
    tablecell.innerHTML = data;
  })
  .catch((err) => {
    // Do something for an error here
    console.log("Error Reading data " + err);
  });
