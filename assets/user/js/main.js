// function validateImage(input) {
//   // Check if the file is a jpeg or png
//   if (!input.files[0].type.includes("jpeg") && !input.files[0].type.includes("png")) {
//     document.getElementById("error").innerHTML = "Error: Please select a jpeg or png file.";
//     input.value = "";
//     return false;
//   }
//
//   // Check if the file size is less than or equal to 200kb
//   if (input.files[0].size > 200000) {
//     document.getElementById("error").innerHTML = "Error: File size must be less than or equal to 200kb.";
//     input.value = "";
//     return false;
//   }
//
//   // Check if the file dimensions are 400px x 600px
//   const img = new Image();
//   img.onload = function () {
//     if (this.width !== 400 || this.height !== 400) {
//       document.getElementById("error").innerHTML = "Error: Image dimensions must be 400px x 400px.";
//       input.value = "";
//       return false;
//     }
//   };
//   img.src = URL.createObjectURL(input.files[0]);
//
//   return true;
// }



// // Initialize CropperJS
// let cropper;
//
// // Handle Image Input Change
// document.getElementById('photo_of_mate').addEventListener('change', function(e) {
//   let files = e.target.files;
//   let reader = new FileReader();
//   reader.onload = function() {
//     // Display image in modal
//     document.getElementById('cropper-image').src = reader.result;
//     // Show modal
//     document.getElementById('crop-modal').style.display = 'block';
//     // Initialize CropperJS
//     cropper = new Cropper(document.getElementById('cropper-image'), {
//       aspectRatio: 1,
//       viewMode: 1,
//     });
//   }
//   reader.readAsDataURL(files[0]);
// });
//
// // Handle Crop Confirm Button Click
// document.getElementById('crop-confirm').addEventListener('click', function() {
//   // Get cropped image data
//   let croppedDataUrl = cropper.getCroppedCanvas().toDataURL('image/png');
//   // Set src of cropped image tag
//   document.getElementById('cropped-image').src = croppedDataUrl;
//   // Display cropped image tag
//   document.getElementById('cropped-image').style.display = 'block';
//   // Set value of cropped image filename input tag
//   document.getElementById('cropped-image-filename').value = 'cropped-image.png';
//   // Hide modal
//   document.getElementById('crop-modal').style.display = 'none';
// });
