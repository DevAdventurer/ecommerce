@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/libs/dropify/css/dropify.min.css')}}"> 
<link rel="stylesheet" href="{{asset('admin-assets/libs/summernote/summernote-bs4.min.css')}}"> 

@endpush




@section('main')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>
            

        </div>
    </div>
</div>
<!-- end page title -->


<div class="row my-1">


    <div class="col-lg-4 col-4">

        <div class="card">
            <div class="card-content">
                <div class="card-body" id="form">

                    {!! Form::open(['method' => 'POST', 'route' => 'admin.'.request()->segment(2).'.store', 'class' => 'form-horizontal','id'=>'tagForm']) !!}
                    
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Tag Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control slugify', 'required' => 'required','placeholder'=>'Enter Tag Name']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                    
                        <div class="btn-group">
                            {!! Form::button("Create Tag", ['class' => 'btn btn-success btn-border','onClick'=>'createTag(this)']) !!}
                        </div>
                    
                    {!! Form::close() !!}

                    

                </div>
            </div>
        </div>
        
             
    </div>


    <div class="col-lg-8 col-8">

        <div class="card">
            <div class="card-content">
                <div class="card-body">

                    <table id="dataTableAjax" class="display dataTableAjax table table-striped table-bordered dom-jQuery-events" >
                        <thead>
                            <tr>
                                <th style="width:30px;">Si</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created at</th>
                                @can(['edit_tag','delete_tag'])
                                  <th style="width:30px;">Action</th>
                                @endcan

                            </tr>
                        </thead>
            
                    </table>

                </div>
            </div>
        </div>

             
    </div>
</div>



@endsection


@push('scripts')


<script type="text/javascript">

var table2 = $('#dataTableAjax').DataTable({
    "processing": true,
    "serverSide": true,
    'ajax': {
        'url': '{{ route('admin.'.request()->segment(2).'.index') }}',
        'data': function(d) {
            d._token = '{{ csrf_token() }}';
            d._method = 'PATCH';
        }

    },
    "columns": [
        { "data": "sn" }, 
        { "data": "name" }, 
        { "data": "slug" },  
        { "data": "created_at" }, 
        {
            "data": "action",
            render: function(data, type, row) {
                if (type === 'display') {
                    var btn = '<div class="dropdown d-inline-block"><button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill align-middle"></i></button><ul class="dropdown-menu dropdown-menu-end">';

                    @can(['edit_tag','delete_tag','read_tag'])

                    @can('read_tag')
                    // btn += '<li><a class="dropdown-item" href="{{ request()->url() }}/' + row['id'] + '"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>';
                    @endcan

                    @can('edit_tag')
                        btn+='<li><button class="dropdown-item edit-item-btn" onClick="editData(\''+window.location.href+'/'+row['id']+'\')"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li>';
                    @endcan

                    @can('delete_tag')
                        btn += '<li><button type="button" onclick="deleteAjax(\''+window.location.href+'/'+row['id']+'/delete\')" class="dropdown-item remove-item-btn"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</button></li>';
                    @endcan

                    @endcan
                     btn += '</ul></div>';
                    return btn;
                }
                return ' ';
            },
            
    }]

});





var createForm = '<form method="POST" action="{{ route('admin.'.request()->segment(2).'.index') }}" accept-charset="UTF-8" class="form-horizontal" id="tagForm">{{csrf_field()}}<div class="form-group"><label for="name">Tag Name</label><input class="form-control" required="required" placeholder="Enter Tag Name" name="name" type="text" id="name"><small class="text-danger"></small></div><div class="btn-group"><button class="btn btn-success btn-border" onclick="createTag(this)" type="button">Create Tag</button></div></form>';



function createTag(element){
    var button = new Button(element);
    button.process();
    clearErrors();
    var requestData,otpdata,data;

    formData = new FormData(document.querySelector('#tagForm'));

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url:'{{ route('admin.'.request()->segment(2).'.store') }}',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success:function(response){
            //toast.success(response.message); 
            Toastify({
                text: response.message,
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                className: response.class,

            }).showToast();

            table2.draw('page');
            button.normal();
            document.querySelector('#tagForm').reset();
        },
        error:function(error){
            Toastify({
                text: response.message,
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                className: response.class,

            }).showToast(); 
            button.normal();
            handleErrors(error.responseJSON);
            
        }
    });
}

function editData(url) {
    var editURL = url;
    
    $.ajax({
        type: "GET",
        enctype: 'multipart/form-data',
        url:url+'/edit',
        success:function(response){
           $('#form').html('<form id="tagForm" method="POST" action="{{ route('admin.'.request()->segment(2).'.index') }}" accept-charset="UTF-8">{{method_field('PUT')}} {{csrf_field()}}<div class="form-group"><label for="name">Tag Name</label><input class="form-control" required="required" value="'+response.data.name+'" placeholder="Enter Tag Name" name="name" type="text" id="name"><small class="text-danger"></small></div><div class="btn-group"><button class="btn btn-success btn-border" onclick="UpdateTag(this,'+response.data.id+')" type="button">Update Tag</button></div></form>');
        },
        error:function(error){
            //toastr.error(error.responseJSON.message);  
        }
    });

}


function UpdateTag(element,id){
    var button = new Button(element);
    button.process();
    clearErrors();
    var requestData,otpdata,data;

    formData = new FormData(document.querySelector('#tagForm'));

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url:'{{ route('admin.'.request()->segment(2).'.update','') }}/'+id,
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        success:function(response){
            Toastify({
                text: response.message,
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                className: response.class,

            }).showToast();
            table2.draw('page');
            button.normal();
            $('#form').html(createForm);
        },
        error:function(error){
            Toastify({
                text: response.message,
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                className: response.class,

            }).showToast();
            //toastr.error(error.responseJSON.message); 
            button.normal();
            handleErrors(error.responseJSON);
            
        }
    });
}


function createData(){
    $('#form').html(createForm);
}
</script>


@endpush