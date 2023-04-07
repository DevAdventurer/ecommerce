@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/libs/dropify/css/dropify.min.css')}}"> 

@endpush




@section('main')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>
            @can('add_admin')
            <div class="page-title-right">
                <a href="{{ route('admin.'.request()->segment(2).'.create') }}"  class="btn-sm btn btn-success waves-effect waves-light btn-label rounded-pill">
                    <i class="bx bx-plus label-icon align-middle rounded-pill fs-16 me-2"></i>
                    Add {{Str::title(str_replace('-', ' ', request()->segment(2)))}}
                </a>
            </div>
            @endcan

        </div>
    </div>
</div>
<!-- end page title -->


<div class="row my-1">


    <div class="col-lg-4 col-4">

        <div class="card">
            <div class="card-content">
                <div class="card-body" id="form">

                    {!! Form::open(['route'=>['admin.'.request()->segment(2).'.update',$brand->id],'method'=>'put', 'class' => 'form-horizontal','files'=>true]) !!}
                    
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Brand Name') !!}
                            {!! Form::text('name', $brand->name, ['class' => 'form-control slugify', 'required' => 'required','placeholder'=>'Enter Brand Name']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        <div class="form-group">
                            <div class="media-area" file-name="brand_image">
                                <div class="media-file-value">
                                    @if($brand->media)
                                        <input type="hidden" name="brand_image[]" value="{{$brand->media_id}}" class="fileid{{$brand->media_id}}">
                                    @endif
                                </div>
                                <div class="media-file">
                                    @if($brand->media)
                                        <div class="file-container d-inline-block fileid{{$brand->media_id}}">
                                            <span data-id="{{$brand->media_id}}" class="remove-file">✕</span>
                                            <img class="w-100 d-block img-thumbnail" src="{{asset($brand->media->file)}}" alt="{{$brand->media->name}}">
                                        </div>
                                    @endif
                                </div>
                                <p><br></p>
                                <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Brand Image</a>
                            </div>
                        </div>
                    
                        <div class="btn-group">
                            {!! Form::submit("Update Brand", ['class' => 'btn btn-success btn-border waves-effect waves-light']) !!}
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
                                <th>Image</th>
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
<script src="{{asset('admin-assets/libs/dropify/js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/libs/dropify/dropify.js')}}"></script>

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
        { "data": "image" }, 
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

                     @can('edit_brand')
                        btn+='<li><a class="dropdown-item edit-item-btn" href="{{ route('admin.'.request()->segment(2).'.index') }}/'+row['id']+'/edit"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>';
                    @endcan

                    @can('delete_tag')
                        btn += '<li><button type="button" onclick="deleteAjax(\'{{ route('admin.'.request()->segment(2).'.index') }}/'+row['id']+'/delete\')" class="dropdown-item remove-item-btn"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</button></li>';
                    @endcan

                    @endcan
                     btn += '</ul></div>';
                    return btn;
                }
                return ' ';
            },
            
    }]

});

$(document).ready(function(){
    $('.dropify-clear').click(function() {
        $("#checkfile").val('');
    });
});
</script>


@endpush