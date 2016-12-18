@extends('layouts.app')

@section('content')
<title>Stock Chart</title>

    <div class="container">
        <div class="col-md-12">
            <div class="span">
                <div id="chartDemoContainer" style="height: 500px; min-width: 500px; margin-bottom: 30px;"></div>
                <form method="get" action="{{ route('index') }}">
                    <div class="form-group">
                    <label>Search for a stock:</label>
                    <input type="text" id="symbolsearch" name="symbolsearch" class="form-control" placeholder="Enter company name or symbol">
                        {{ csrf_field() }}
                    {{--<span class="help-inline hide"> loading...</span>--}}
                    {{--<span class="help-inline hide label label-info"></span>--}}
                </div>
                </form>
                <br />
                <div id="stockButtons">
                </div>
            </div>
        </div>
    </div>



<script>
    var token = '{{ Session::token() }}';
    var stockData = '{{ route('getStockData') }}';
</script>
@endsection