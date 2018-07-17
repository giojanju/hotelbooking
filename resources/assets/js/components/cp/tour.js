const imgBtn = document.querySelector("#image");
const antUpload = document.querySelector(".get-image");

if (imgBtn) {
	imgBtn.addEventListener("change", (event) => {
		const tmppath = URL.createObjectURL(event.target.files[0]);
		antUpload.style.backgroundImage = "url("+tmppath+")";
	});
}