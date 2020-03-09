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
                    {!! Form::open(['route' => ['device.update', $device->id], 'method' => 'put', 'class' => 'form-horizontal', 'id' => 'itemForm', 'files' => 'true', 'enctype' => "multipart/form-data"]) !!}
                    <div class="box-body">
                        <div  class="col-md-12">
                            <div class="form-group">
                                <label for="sn" class="col-sm-2 control-label required">Device SN</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="sn" id="sn" value="{{ old('sn', $device->sn) }}" placeholder="Enter SN" autocomplete="off">
                                    @if($errors->has('sn'))
                                        <span class="text-danger">{{ $errors->first('sn') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ip_address" class="col-sm-2 control-label required">IP Address</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="ip_address" id="ip_address" value="{{ old('ip_address', $device->ip_address) }}" placeholder="Enter IP Address" autocomplete="off">
                                    @if($errors->has('ip_address'))
                                        <span class="text-danger">{{ $errors->first('ip_address') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="real_ip" class="col-sm-2 control-label">Real IP</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="real_ip" id="real_ip" value="{{ old('real_ip', $device->real_ip) }}" placeholder="Enter Real IP" autocomplete="off">
                                    @if($errors->has('real_ip'))
                                        <span class="text-danger">{{ $errors->first('real_ip') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="area_id" class="col-sm-2 control-label required">Area</label>
                                <div class="col-sm-5">
                                    <select class="form-control select2"
                                            style="width: 100%;"
                                            id="area_id"
                                            name="area_id">
                                        <option value="">Select a Area</option>
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}" {{ $area->id==$device->area_id?'selected':'' }}>{{ $area->area_name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('area_id'))
                                        <span class="text-danger">{{ $errors->first('area_id') }}</span>
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
