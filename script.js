const  toggle = document.querySelector("#toggle-button");
toggle.addEventListener('click', function(){
    document.querySelector("#sidebar").classList.toggle("expand");
});

document.getElementById("addClientBtn").addEventListener("click", function() {
    var form = document.getElementById("clientForm");
    if (form.style.display === "none") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
});

function deleteClient(id) {
    if(confirm("Are you sure you want to delete this user?")) {
        window.location.href = "action.php?id=" + id;
    }
}



// document.querySelectorAll('.editLink').forEach(function(link) {
//     link.addEventListener('click', function(event) {
//         event.preventDefault(); 

//         var form = document.getElementById("clientUpdate");
//         if (form.style.display === "none") {
//             form.style.display = "block";
//         } else {
//             form.style.display = "none";
//         }
//     });
// });


