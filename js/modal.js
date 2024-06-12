document.addEventListener('DOMContentLoaded', function() {
    var message = document.getElementById('modalMessage').getAttribute('data-message');
    var status = document.getElementById('modalMessage').getAttribute('data-status');

    // Show the modal with the message
    $('#modalMessage').text(message);
    let url1;
    if (status === "success") {
        $('#messageModalLabel').text("Success");
        url1='index.php';
    }
    else if(status ==="Deleted" || status==="Updated" ||status=== "Not" ){
        $('#messageModalLabel').text("Deleted12");
        url1='welcomepage.php';

        
    } else {
        $('#messageModalLabel').text("Error");
        url1='signup.php';
    }
    $('#messageModal').modal('show');
    
    document.getElementById('closeModalButton').addEventListener('click', function() {
        window.location.href = url1; 
    
    });
});