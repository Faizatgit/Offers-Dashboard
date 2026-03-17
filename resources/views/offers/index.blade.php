<!DOCTYPE html>
<html>
<head>
<title>Offers Dashboard</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<style>
    
body{
background:#f4f6f9;
}

.dashboard-card{
border-radius:12px;
box-shadow:0 4px 15px rgba(0,0,0,0.08);
padding:25px;
background:white;
}

.table thead{
background:#0d6efd;
color:white;
}

.table tbody tr:hover{
background:#f2f7ff;
}

.badge-active{
background:#28a745;
}

.badge-inactive{
background:#dc3545;
}

</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

<div class="container mt-5">

    <div class="dashboard-card">

        <div class="d-flex justify-content-between mb-3">

            <h3>Offers Dashboard</h3>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#offerModal">
            Add Offer
            </button>

        </div>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Expiry</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach($offers as $offer)

            <tr>
                <td>{{$offer->title}}</td>
                <td>{{$offer->description}}</td>
                <td>{{$offer->expiry_date}}</td>
                <td>
                    @if($offer->active)
                    <span class="badge badge-active">Active</span>
                    @else
                    <span class="badge badge-inactive">Inactive</span>
                    @endif
                </td>

                <td>
                    <form id="delete-form-{{$offer->id}}" action="{{ route('offers.destroy',$offer->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-danger btn-sm"
                        onclick="deleteOffer({{$offer->id}})">
                        Delete
                        </button>
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</div>


<!-- Create Offer Modal -->

<div class="modal fade" id="offerModal">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title">Create Offer</h5>

<button class="btn-close" data-bs-dismiss="modal"></button>

</div>

<form action="{{route('offers.store')}}" method="POST">

@csrf

<div class="modal-body">

<div class="mb-3">
<label>Title</label>
<input type="text" name="title" class="form-control" required>
</div>

<div class="mb-3">
<label>Description</label>
<textarea name="description" class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Expiry Date</label>
<input type="date" name="expiry_date" class="form-control">
</div>

<div class="mb-3">
<label>Status</label>
<select name="is_active" class="form-control">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>
</div>

</div>

<div class="modal-footer">

<button class="btn btn-secondary" data-bs-dismiss="modal">
Cancel
</button>

<button type="submit" class="btn btn-primary">
Save Offer
</button>

</div>

</form>

</div>

</div>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    
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
</script>

</body>
</html>