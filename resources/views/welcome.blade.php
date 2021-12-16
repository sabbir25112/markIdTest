@extends('master')

@section('content')
    <div class="container">
        <h3 class="text-center my-4">Calculator</h3>
        <form action="#" id="calculator">
            <div class="form-check form-check-inline">
                <input type="number" class="form-control" placeholder="Operand 1" id="operand1" required>
            </div>
            - &nbsp;
            <div class="form-check form-check-inline">
                <select class="form-control" id="operator">
                    @foreach(config('calculator.emoji_operators') as $operator => $emoji)
                        <option value="{{ $operator }}">{!! $emoji !!}</option>
                    @endforeach
                </select>
            </div>
            - &nbsp;
            <div class="form-check form-check-inline">
                <input type="number" class="form-control" placeholder="Operand 2" id="operand2" required>
            </div>
            = &nbsp;
            <div class="form-check form-check-inline">
                <input type="submit" class="btn btn-primary" value="Click to Calculate">
            </div>
        </form>
        <hr>
        <h3>Result: <span id="result"></span></h3>
    </div>


    <script>
        var _token = "{{ csrf_token() }}";

        $('#calculator').submit(function (event) {
            event.preventDefault();
            $('#result')
                .removeClass('text-danger')
                .removeClass('text-success')
                .text('');

            var operand1 = $('#operand1').val();
            var operand2 = $('#operand2').val();

            var operator = $('#operator').val();

            $.post({
                'url': '/calculate',
                'data': {
                    '_token': _token,
                    'operand1': operand1,
                    'operator': operator,
                    'operand2': operand2
                }
            }).done(function (response) {
                if (response.success) {
                    $('#result')
                        .addClass('text-success')
                        .text(response.result);
                } else {
                    $('#result')
                        .addClass('text-danger')
                        .text(response.error_message);
                }
            });
        });
    </script>
@endsection
