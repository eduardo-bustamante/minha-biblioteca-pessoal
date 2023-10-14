const titulo = document.getElementById('cabecalho').textContent
const inputFile = document.querySelector("#capa");
const pictureImage = document.querySelector(".picture__image");
const pictureImageTxt = "Adicionar capa";

console.log(pictureImage)

if (titulo == "CADASTRO DE LIVRO") {
  pictureImage.innerHTML = pictureImageTxt;
}
if (pictureImage.firstElementChild == null) {
  pictureImage.innerHTML = pictureImageTxt;
}



inputFile.addEventListener("change", function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;

      const img = document.createElement("img");

      img.src = readerTarget.result;
      img.classList.add("picture__img");
      pictureImage.innerHTML = "";
      pictureImage.appendChild(img);
    });

    reader.readAsDataURL(file);
  } else {
    pictureImage.innerHTML = pictureImageTxt;
  }
});
