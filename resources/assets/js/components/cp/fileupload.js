const imgBtn = document.querySelectorAll(".photos");
const antUpload = document.querySelector(".get-image");
const image_container = document.querySelector(".image-container");

window.addEventListener("load", () => {
	if (imgBtn) {
		for (let img of imgBtn) {
			img.addEventListener("change", (event) => {
				const tmppath = URL.createObjectURL(event.target.files[0]);
				img.parentElement.style.backgroundImage = "url("+tmppath+")";
			});
		} 
	}
});