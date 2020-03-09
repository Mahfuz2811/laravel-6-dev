@extends('layouts.admin')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Item</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route' => 'area.store', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'itemForm', 'files' => 'true', 'enctype' => "multipart/form-data"]) !!}
                    <div class="box-body">
                        @if(Session::has('message'))
                            <div class="alert alert-{{ Session::get('alert-status') }}" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <div  class="col-md-12">
                            <div class="form-group">
                                <label for="area_name" class="col-sm-2 control-label required">Area Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="area_name" id="area_name" value="{{ old('area_name') }}" placeholder="Enter Area Name" autocomplete="off">
                                    @if($errors->has('area_name'))
                                        <span class="text-danger">{{ $errors->first('area_name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="areacode" class="col-sm-2 control-label required">Area Code(Unique)</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="areacode" id="areacode" value="{{ old('areacode') }}" placeholder="Enter Area Code" autocomplete="off">
                                    @if($errors->has('areacode'))
                                        <span class="text-danger">{{ $errors->first('areacode') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info col-md-offset-6">Save</button>
                    </div>
                    <!-- /.box-footer -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </section>
@endsection

@section('script')
    <script>
        $('#itemForm').validate({ // initialize the plugin
            rules: {
                item_name: {
                    required: true
                },
                item_code: {
                    required: true
                },
                category_id: {
                    required: true
                },
                uom: {
                    required: true
                },
                item_type_id: {
                    required: true
                }
            },
            messages: {
                item_name : {
                    required : "Please enter item name"
                },
                item_code: {
                    required: "Please enter item code"
                },
                category_id: {
                    required: "Please select a category"
                },
                uom: {
                    required: "Please select an uom"
                },
                item_type_id: {
                    required: "Please select item type"
                }
            },
            submitHandler: function (form) {
                return true;
            }
        });
    </script>
@endsection
