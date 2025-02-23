document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch("php/process.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data === "success") {
            document.getElementById("successMessage").style.display = "block";
            this.reset();
        } else {
            alert(data);
        }
    })
    .catch(error => console.error("Error:", error));
});
