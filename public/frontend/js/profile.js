document.addEventListener('DOMContentLoaded', (event) => {
    const imgPreview = document.querySelector('.img-previews-profile');
    const btnRemove = document.querySelector('.btn-remove');
    const initialImageSrc = imgPreview.src; // Store the initial image src
    const removeImageInput = document.querySelector('#remove_image');

    function previewImage() {
        const image = document.querySelector('#image-profile');

        // Check if file is selected
        if (image.files && image.files[0]) {
            // Check file size (max 2MB)
            const maxSize = 2 * 1024 * 1024; // 2MB in bytes
            if (image.files[0].size > maxSize) {
                alert('File size exceeds 2MB. Please choose a smaller file.');
                resetImage();
                return;
            }

            // Check file type (jpeg, jpg, png, gif)
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!validTypes.includes(image.files[0].type)) {
                alert('Invalid file type. Please choose a JPEG, JPG, PNG, or GIF file.');
                resetImage();
                return;
            }

            imgPreview.style.display = 'block';
            btnRemove.style.display = 'block'; // Show remove button

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

            // Clear the remove image input
            removeImageInput.value = '';
        } else {
            resetImage();
        }
    }

    function removeImage() {
        const image = document.querySelector('#image-profile');
        image.value = ''; // Clear the input
        resetImage();
    }

    function resetImage() {
        imgPreview.src = initialImageSrc; // Reset to initial image
        btnRemove.style.display = 'none'; // Hide remove button
    }

    // Function to remove profile image and reset input
    function removeProfile() {
        const image = document.querySelector('#image-profile');
        const defaultImagePath = 'http://otomod.test/storage/img-profile/default.png';
        console.log(defaultImagePath); // Log the default image path
        imgPreview.src = defaultImagePath; // Set the preview image to default.png
        removeImageInput.value = 'default.png'; // Set the hidden input value to default.png
        image.value = ''; // Clear the file input
        btnRemove.style.display = 'block'; // Show the remove button
    }

    window.previewImage = previewImage; // Make the function available globally
    window.removeImage = removeImage; // Make the function available globally
    window.removeProfile = removeProfile; // Make the function available globally
});
