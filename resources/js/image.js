const imageUpload = document.getElementById('imageUpload');
const imagePreview = document.getElementById('imagePreview');

imageUpload.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function() {
            imagePreview.innerHTML = `<img src="${this.result}" alt="Image Preview" class="max-w-xs max-h-xs mt-2 border border-gray-300 rounded-lg">`;
        });

        reader.readAsDataURL(file);
    } else {
        imagePreview.innerHTML = '<p class="text-gray-500">No image selected</p>';
    }
});