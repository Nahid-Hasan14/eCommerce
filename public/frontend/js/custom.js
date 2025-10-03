//Order Cancel Function for sweetalert
function orderCancel(id) {
    event.preventDefault();

    let delete_form = document.getElementById('delete_'+id);
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Cancel Order!"
    }).then((result) => {
        if (result.isConfirmed) {
            delete_form.submit();
        }
    });

    return false;
}


