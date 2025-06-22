// To preview image or auto-fill
document.querySelector('input[type=file]').addEventListener('change', function() {
    const reader = new FileReader();
    reader.onload = function(e) {
        console.log("Image selected");
    };
    reader.readAsDataURL(this.files[0]);
});
