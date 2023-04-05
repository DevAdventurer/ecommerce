@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" href="{{asset('admin-assets/libs/summernote/summernote-bs4.min.css')}}"> 

@endpush




@section('main')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{Str::title(str_replace('-', ' ', request()->segment(2)))}}</h4>
            @can('add_admin')
            <div class="page-title-right">
                 <a href="{{ route('admin.'.request()->segment(2).'.index') }}"  class="btn-sm btn btn-secondary waves-effect waves-light btn-label rounded-pill">
                    <i class="bx bx-list-ul label-icon align-middle rounded-pill fs-16 me-2"></i>
                    {{Str::title(str_replace('-', ' ', request()->segment(2)))}} List
                </a>
            </div>
            @endcan

        </div>
    </div>
</div>
<!-- end page title -->


{!! Form::open(['route'=>['admin.'.request()->segment(2).'.update',$slider->id],'method'=>'put', 'files'=>true]) !!}

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', $slider->title, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Title']) !!}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>

                <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                    {!! Form::label('subtitle', 'Subtitle') !!}
                    {!! Form::text('subtitle', $slider->subtitle, ['class' => 'form-control', 'placeholder'=>'Subtitle']) !!}
                    <small class="text-danger">{{ $errors->first('subtitle') }}</small>
                </div>
                

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', $slider->body, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>

            </div>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">

                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', [0 => 'Draft', 1 => 'Publish'], $slider->status, ['class' => 'form-control', 'id' => 'slider_status', 'placeholder'=>'Status']) !!}
                    <small class="text-danger">{{ $errors->first('status') }}</small>
                </div>


                <div class="form-group{{ $errors->has('button_text') ? ' has-error' : '' }}">
                    {!! Form::label('button_text', 'Text On Button') !!}
                    {!! Form::text('button_text', $slider->button_text, ['class' => 'form-control','placeholder'=>'Text On Button']) !!}
                    <small class="text-danger">{{ $errors->first('button_text') }}</small>
                </div>

                <div class="form-group{{ $errors->has('button_link') ? ' has-error' : '' }}">
                    {!! Html::decode(Form::label('button_link','Link On Button <span class="text-danger">*</span>')) !!}
                    {!! Form::text('button_link', $slider->button_link, ['class' => 'form-control','placeholder'=>'Link On Button']) !!}
                    <small class="text-danger">{{ $errors->first('button_link') }}</small>
                </div>

                 <div class="btn-group">
                    {!! Form::submit("Update ".Str::title(str_replace('-', ' ', request()->segment(2))), ['class' => 'btn btn-soft-success btn-border waves-effect waves-light']) !!}
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Slider Image</h6>
            </div>
            <div class="card-body">

                <div class="media-area" file-name="slider_image">

                    <div class="media-file-value">
                        @if($slider->media)
                            <input type="hidden" name="file[]" value="{{$slider->media_id}}" class="fileid{{$slider->media_id}}">
                        @endif
                    </div>
                    <div class="media-file">
                        @if($slider->media)
                            <div class="file-container d-inline-block fileid{{$slider->media_id}}">
                                <span data-id="{{$slider->media_id}}" class="remove-file">✕</span>
                                <img class="w-100 d-block img-thumbnail" src="{{asset($slider->media->file)}}" alt="{{$slider->media->name}}">
                            </div>
                        @endif
                    </div>


                    <p><br></p>
                    <a class="text-secondary select-mediatype" href="javascript:void(0);" mediatype='single' onclick="loadMediaFiles($(this))">Select Media File</a>

                </div>

            </div>
        </div>

    </div>


</div>


{!! Form::close() !!}




@endsection




@push('scripts')
<script type="text/javascript" src="{{asset('admin-assets/libs/summernote/summernote-bs4.min.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function() {
      $('textarea').summernote({
        height: 200,
      });
    });
</script>


@endpush