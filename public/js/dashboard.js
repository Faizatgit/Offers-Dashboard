
function deleteOffer(id){

Swal.fire({
title:'Delete Offer?',
text:'This action cannot be undone',
icon:'warning',
showCancelButton:true,
confirmButtonColor:'#d33',
confirmButtonText:'Yes Delete',
cancelButtonText:'Cancel'
}).then((result)=>{

if(result.isConfirmed){

document.getElementById('delete-form-'+id).submit()

}

})

}