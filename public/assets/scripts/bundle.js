
document.getElementById('uploadButton').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function() {
    var fileInput = document.getElementById('fileInput');
    var idFrontImage = document.getElementById('id-back');

    if (fileInput.files.length > 0) {
        var selectedFile = fileInput.files[0];
        var objectURL = URL.createObjectURL(selectedFile);

        // Hiển thị ảnh trong ô có id "id-front"
        idFrontImage.innerHTML = '<img src="' + objectURL + '" alt="ID Back" class="thumbnail"/>';
    }
});
document.getElementById('id-front-button').addEventListener('click', function() {
    document.getElementById('id-front-input').click();
});

document.getElementById('id-front-input').addEventListener('change', function() {
    var fileInput = document.getElementById('id-front-input');
    var idFrontImage = document.getElementById('id-front');

    if (fileInput.files.length > 0) {
        var selectedFile = fileInput.files[0];
        var objectURL = URL.createObjectURL(selectedFile);

        // Hiển thị ảnh trong ô có id "id-front"
        idFrontImage.innerHTML = '<img src="' + objectURL + '" alt="ID Front" class="id-front-thumbnail"/>';
    }
});
document.getElementById('id-face-button').addEventListener('click', function() {
    document.getElementById('id-face-input').click();
});

document.getElementById('id-face-input').addEventListener('change', function() {
    var fileInput = document.getElementById('id-face-input');
    var idFrontImage = document.getElementById('id-face');

    if (fileInput.files.length > 0) {
        var selectedFile = fileInput.files[0];
        var objectURL = URL.createObjectURL(selectedFile);

        // Hiển thị ảnh trong ô có id "id-front"
        idFrontImage.innerHTML = '<img src="' + objectURL + '" alt="ID Front" class="id-face-thumbnail"/>';
    }
});
