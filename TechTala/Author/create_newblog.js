document.getElementById("publish-form").addEventListener("submit", function(e) {
  e.preventDefault();
  const title = document.getElementById("title").value;

  alert("Blog Published Successfully\n\n Entitled: " + title);
});

document.getElementById("fileUpload").onchange = function(event) {
  document.getElementById("previewImage").src=window.URL.createObjectURL(this.files[0]);

};


