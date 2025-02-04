@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h1 class="display-5">Update a Receipt</h1>
        <form method="post" action="{{ route('receipts.update', $receipt->id) }}">
            @method('PATCH')
            @csrf

            <div class="row">
                <div class="form-group">
                    <label for="date_of_receipt">Date of Receipt:</label>
                    <input type="text" class="form-control date" name="date_of_receipt"/>
                </div>
            </div>

            <div class="row">
                <div class="form-group float-left">
                    <label for="mode">Bank Account:</label>
                        <select class="form-control" id="mode" name="mode">
                            <option value='5' {{ $mode == '5' ? "selected":"" }}>Bank Al-Habib</option>
                            <option value='590' {{ $mode == '590' ? "selected":"" }}>Faysal Bank</option>
                        </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {

    $(document).on("keydown", ":input:not(textarea):not(:submit)", function(event) {
    if(event.keyCode == 13) {
        event.preventDefault();
        return false;
        }
    });

    $('.date').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
            immediateUpdates: true,
            todayBtn: true,
            todayHighlight: true
        }).datepicker("setDate", "<?php echo $receipt->date_of_receipt ?>");

});


</script>

@endsection
