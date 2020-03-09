@extends('layouts.admin')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Area</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route' => ['area.update', $area->id], 'method' => 'put', 'class' => 'form-horizontal', 'id' => 'itemForm', 'files' => 'true', 'enctype' => "multipart/form-data"]) !!}
                    <div class="box-body">
                        <div  class="col-md-12">
                            <div class="form-group">
                                <label for="item_name" class="col-sm-2 control-label required">Area Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="item_name" id="item_name" value="{{ old('item_name', $item->item_name) }}" placeholder="Enter Item Name" autocomplete="off">
                                    @if($errors->has('item_name'))
                                        <span class="text-danger">{{ $errors->first('item_name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="item_code" class="col-sm-2 control-label required">Item Code(Unique)</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="item_code" id="item_code" value="{{ old('item_code', $item->item_code) }}" placeholder="Enter Item Code" autocomplete="off">
                                    @if($errors->has('item_code'))
                                        <span class="text-danger">{{ $errors->first('item_code') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="reorder_qty" class="col-sm-2 control-label">Reorder Qty</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="reorder_qty" id="item_code" value="{{ old('reorder_qty', $item->reorder_qty) }}" placeholder="Enter Reorder Qty(Optional)" autocomplete="off">
                                    @if($errors->has('reorder_qty'))
                                        <span class="text-danger">{{ $errors->first('reorder_qty') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category_id" class="col-sm-2 control-label required">Category</label>
                                <div class="col-sm-5">
                                    <select class="form-control select2"
                                            style="width: 100%;"
                                            id="category_id"
                                            name="category_id">
                                        <option value="">Select a Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id==$item->category_id?'selected':'' }}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category_id'))
                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="uom" class="col-sm-2 control-label required">UOM</label>
                                <div class="col-sm-5">
                                    <select class="form-control select2"
                                            style="width: 100%;"
                                            id="uom"
                                            name="uom">
                                        <option value="">Unit of Measure(UOM)</option>
                                        @foreach($uoms as $uom)
                                            <option value="{{ $uom->id }}" {{ $uom->id==$item->uom?'selected':'' }}>{{ $uom->full_name }}({{ $uom->short_name }})</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('uom'))
                                        <span class="text-danger">{{ $errors->first('uom') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="item_type_id" class="col-sm-2 control-label required">Item Type</label>
                                <div class="col-sm-5">
                                    @foreach($item_types as $type)
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="item_type_id" value="{{ $type->id }}" {{ $type->id==$item->item_type_id?'checked':'' }}>
                                                <span style="padding: 0 5px">{{ $type->type_name }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                    @if($errors->has('item_type_id'))
                                        <span class="text-danger">{{ $errors->first('item_type_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="photo" class="col-sm-2 control-label">Item Image</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control" name="photo" id="photo">
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
