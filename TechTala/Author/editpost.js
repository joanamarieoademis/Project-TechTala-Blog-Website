document.getElementById("edit-form").addEventListener("submit", function(e) {
      e.preventDefault();
      const title = document.getElementById("title").value;

      alert("Post updated:\n\nTitle: " + title);

});

