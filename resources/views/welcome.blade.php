@extends('layouts.app')

@section('content')
<title>Stock Chart</title>

    <div class="container" style="min-height: 628px;">
        <div style="padding: 40px 15px; text-align: center;">
            <h1>Chart the Stock Market </h1>
            <p class="lead">Enter in a company name or symbol to automatically render a chart!</p>
        </div>
        <div class="col-md-12">
            <div class="span">
                <div id="chartDemoContainer" style="border-style: double; height: 500px; min-width: 500px; margin-bottom: 30px;"></div>
                <form>
                    {{ csrf_field() }}

                        <div class="row">
                            {{--<div class="addStock col-md-8 col-sm-10 col-xs-12">--}}
                        <div class="col-lg-6 col-md-8 col-xs-12">
                           <input type="text" id="symbolsearch" name="symbolsearch" class="form-control" placeholder="Enter company name or symbol">
                        </div>
                            <br>
                        {{--<div class="col-md-3 col-md-3 col-xs-3 text-center">--}}
                            {{--<button class="btn btn-sm btn-success" id="addStock">Add Stock</button>--}}
                        {{--</div>--}}
                                {{--</div>--}}
                            </div>
                    <br>
                    {{--<span class="help-inline hide"> loading...</span>--}}
                    {{--<span class="help-inline hide label label-info"></span>--}}

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