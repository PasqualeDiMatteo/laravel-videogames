const placeholder = "https://marcolanci.it/utils/placeholder.jpg";
const image_input = document.getElementById("image");
const image_preview = document.getElementById("preview");

image_input.addEventListener("input", () => {
    image_preview.src = image_input.value ? image_input.value : placeholder;
});
