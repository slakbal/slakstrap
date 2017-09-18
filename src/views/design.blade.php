<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Slakstrap</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-8">

            {!! Form::open(['method' => 'post', 'url' => route('slakbal.slakstrap.validate'), 'id' => 'needs-validation', 'novalidate']) !!}

            {!! Form::text('first_name', $value = '', $label = 'First name', $options = ['required'], $help = null) !!}
            {!! Form::text('last_name', $value = '', $label = 'Last Name', $options = ['required'], $help = null) !!}
            {!! Form::text('business_name', $value = '', $label = 'Business Name', $options = ['required','placeholder'=>'Business Pty Ltd.'], $help = 'for example Business Pty Ltd.') !!}
            {!! Form::email('email', $value = '', $label = 'Email', $options = ['required'], $help = null) !!}
            {!! Form::password('password', $label = 'Password', $options = [], $help = null) !!}
            {!! Form::search('search', $value = '', $label = 'Search', $options = [], $help = null) !!}
            {!! Form::tel('tel', $value = '', $label = 'Telephone', $options = [], $help = null) !!}
            {!! Form::number('number', $value = '', $label = 'Number', $options = [], $help = null) !!}
            {!! Form::date('date', $value = '', $label = 'Date', $options = [], $help = null) !!}
            {!! Form::datetime('datetime', $value = '', $label = 'Datetime', $options = [], $help = null) !!}
            {!! Form::datetimeLocal('datetimeLocal', $value = '', $label = 'DatetimeLocal', $options = [], $help = null) !!}
            {!! Form::time('time', $value = '', $label = 'Time', $options = [], $help = null) !!}
            {!! Form::file('file', $label = 'Select a file', $options = [], $help = 'select a file') !!}
            {!! Form::url('url', $value = '', $label = 'Url', $options = [], $help = null) !!}
            {!! Form::textarea('textarea', $value = '', $label = 'Textarea', $options = [], $help = null) !!}
            {!! Form::dropdown('size', $list = ['L' => 'Large', 'S' => 'Small'], $selected = null, $label = 'Size', $selectAttributes = ['placeholder' => 'Pick a size...'], $optionsAttributes = [], $help = 'make a selection') !!}
            {!! Form::checkbox('checkbox', $value = 1, $label = 'newsletter', $checked = false, $options = [], $help="by checking the select box you agree") !!}
            {!! Form::radio('radio', $value = 1, $label = 'radio', $checked = true, $options = [], $help="by checking the radio you agree") !!}
            {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right']) !!}

            {!! Form::close() !!}

            @icon('bug fa-5x')

            <?php $user=json_encode(['name'=>'leslie']); ?>

            @set(user,$user)

{{--
@dump('Hello')
@dd('Hello')
--}}

{{--
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        "use strict";
        window.addEventListener("load", function() {
            var form = document.getElementById("needs-validation");
            form.addEventListener("submit", function(event) {
                if (form.checkValidity() == false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add("was-validated");
            }, false);
        }, false);
    }());
</script>
--}}

</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
