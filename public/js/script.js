let productApiUrl = "http://127.0.0.1:8000/api/products";

document.querySelector("#fetch").addEventListener("click", fetchData);

async function fetchData() {
    let response = await fetch(productApiUrl);
    let jsonResponse = await response.json();

    console.log(jsonResponse);
}
