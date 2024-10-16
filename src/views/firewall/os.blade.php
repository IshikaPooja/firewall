@extends('Rule::layout.app')
@section('title','Os Name')
@section('content')
<div class="container">
    <div class="col-12">

        <!-- from -->
        <div class="cart">
            <div class="cart-body">
                <form action="{{route('firewall.oslist_store')}}" method="post">
                    @csrf
                    <div class="d-flex mt-4">
                        <div class="col-4">
                            <div class="row">
                                <label class="col-3">OS Name</label>
                                <div class="col-8">
                                    <input type="text" name="os_name" class="form-control" value="{{ old('os_name') }}">
                                    <br>
                                    @error('os_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <button type="submit" class="btn text-white  btn-info">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <hr>

        <!-- table -->
        <div class="cart">
            <div class="cart-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>OS Name</th>
                        <th>Action</th>
                    </tr>

                    @foreach($datas as $data)
                    <tr>
                        <th>{{$data->id}}</th>
                        <th>{{$data->os_name}}</th>
                        <td><button type="submit" data-id="{{$data->id}}" class="btn btn-danger deletebutton"><i class="fas fa-trash"></i></button></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>


    </div>
</div>

<script>
    var token = "{{ csrf_token() }}";
    var delete_url = "{{route('firewall.os_delete')}}";

</script>

<script>
    $(document).on('click', '.deletebutton', function () {
        var id = $(this).data('id');
        Swal.fire({
            title: "Are you sure?",
            text: "you want to delete ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'alert_btn mr-40',
            cancelButtonClass: 'alert_btn',
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel'
        }).then(function (result) {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: delete_url,
                    dataType:'html',
                    data: { _token:token ,id: id},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function (data) {
                        var arr = jQuery.parseJSON(data);
                        if(arr['status'] == '0'){
                            Swal.fire({ title: arr['message'], confirmButtonColor: "#556ee6" });
                        }else{
                            Swal.fire({ title: arr['message'], confirmButtonColor: "#556ee6" });
                            window.location.reload();
                        }
                    }

                });
            }
            }
        );
    });
</script>
@endsection
