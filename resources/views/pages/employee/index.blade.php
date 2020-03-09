@extends('layouts.admin')

@section('content')
    <section class="content">

        <div class="row">
            <div  class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">All Employee List</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 col-md-offset-9">
                            <div style="margin-top: 10px;" class="pull-right">
                                <a href="{{ route('device.create') }}" class="btn btn-danger"><i style="margin-right: 3px;" class="fa fa-plus"></i>Add New</a>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-body no-padding">
                            @if(Session::has('message'))
                                <div class="alert alert-{{ Session::get('alert-status') }}" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            <table id="example1" class="table table-condensed">
                                <thead>
                                <tr class="header">
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Employee Code</th>
                                    <th>Enrollment Device</th>
                                    <th>Card Number</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $id = 1; $j = 1; ?>
                                @foreach($employees as $employee)
                                    <tr class="border-bottom">
                                        <td>{{ $id++ }}</td>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->emp_code }}</td>
                                        <td>{{ $employee->enroll_sn }}</td>
                                        <td>{{ $employee->card_no }}</td>
                                        <td>
                                            <a href="{{ route('employee.edit', $employee->id) }}"><span class="badge bg-red">Edit</span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection

@section('style')
    <style>
        .box {
            position: relative;
            border-radius: 3px;
            background: #ffffff;
            border-top: 0;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }

        .header th{
            padding: 10px !important;
            border-bottom: 4pt solid #EEEFF0;
            background-color: #1E97C4;
            color: #ffffff;
        }

        tr.border-bottom td {
            padding: 10px !important;
            border-bottom: 5pt solid #EEEFF0;
        }

        tr.border-bottom-last td {
            padding: 10px !important;
        }

        div.dataTables_wrapper div.dataTables_length label {
            font-weight: normal;
            text-align: left;
            white-space: nowrap;
        }

        div.dataTables_wrapper div.dataTables_length select {
            width: 75px;
            display: inline-block;
        }

        label{
            margin-left: 20px;
            margin-top: 20px;
        }

        .dataTables_info{
            margin-left: 10px;
        }

        .dataTables_paginate{
            margin-right: 10px !important;
        }

    </style>
@endsection


@section('script')
    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //for datatable   "aoColumns": [{"bSortable": false}, null]
            var table = $('#example1').DataTable(

            );

        });

    </script>
@endsection
