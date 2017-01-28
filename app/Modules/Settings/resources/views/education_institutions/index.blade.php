@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{route('settings.education_institutions.create')}}" class="btn btn-primary pull-right">{{trans('app.settings.education_institutions.add_new')}}</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="custom-panel">
            <div class="custom-panel-heading">{{trans('app.settings.education_institutions.main')}}</div>
            <table class="table table-bordered table-hover" id="educationInstitutionsTable">
                <thead>
                    <th>{{trans('app.id')}}</th>
                    <th>{{trans('app.settings.education_institutions.name')}}</th>
                    <th></th>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
@section('additionalCSS')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
@endsection
@section('additionalJS')
<script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#educationInstitutionsTable').DataTable({
                "bServerSide": true,
                "bProcessing": true,
                "sAjaxSource": '{{ route("settings.education_institutions.datatable")}}',
                "aoColumns": [
                    { "aaData": "id" },
                    { "aaData": "name" },
                    { "aaData": "actions"}
                ]
        });
    });
</script>
@endsection