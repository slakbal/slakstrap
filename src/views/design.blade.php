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

            {!! Form::open(['method' => 'post', 'url' => route('slakbal.slakstrap.validate'), 'files' => true, 'id' => 'needs-validation', 'novalidate']) !!}

            {!! Form::hidden('hidden_value', 'Hello World') !!}

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="first_name">First name</label>
                        {!! Form::text('first_name', null, ['placeholder'=>'First name','required']) !!}
                        @subLabel('first_name', 'Please enter your first name')
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="last_name">Last name</label>
                        {!! Form::text('last_name', null, ['placeholder'=>'Last name','required']) !!}
                        @subLabel('last_name', 'Please enter your last name')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="file">file</label>
                        {!! Form::file('file', ['placeholder'=>'file','required']) !!}
                        @subLabel('file', 'Please enter your file')
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="url">url</label>
                        {!! Form::url('url', null, ['placeholder'=>'http://www.google.com','required']) !!}
                        @subLabel('url', 'Please enter your url name')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        {!! Form::email('email', null, ['placeholder'=>'E-mail','required']) !!}
                        @subLabel('email', 'Please enter your email')
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="password">Password</label>
                        {!! Form::password('password', ['placeholder'=>'Password','required']) !!}
                        @subLabel('password', 'Please enter your password with at least 5 characters and digits')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="textarea">textarea</label>
                        {!! Form::textarea('textarea', null, ['placeholder'=>'textarea','required']) !!}
                        @subLabel('textarea', 'Please enter your textarea')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="telephone">telephone</label>
                        {!! Form::tel('telephone', null, ['placeholder'=>'telephone','required']) !!}
                        @subLabel('telephone', 'Please enter your telephone')
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="number">number</label>
                        {!! Form::number('number', null, ['placeholder'=>'number','required']) !!}
                        @subLabel('number', 'Please enter number')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="date">date</label>
                        {!! Form::date('date', null, ['placeholder'=>'date','required']) !!}
                        @subLabel('date', 'Please enter your date')
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="datetime">datetime</label>
                        {!! Form::datetime('datetime', null, ['placeholder'=>'datetime','required']) !!}
                        @subLabel('datetime', 'Please enter datetime')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="datetimeLocal">datetimeLocal</label>
                        {!! Form::datetimeLocal('datetimeLocal', null, ['placeholder'=>'datetimeLocal','required']) !!}
                        @subLabel('datetimeLocal', 'Please enter your datetimeLocal')
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="time">time</label>
                        {!! Form::time('time', null, ['placeholder'=>'time','required']) !!}
                        @subLabel('time', 'Please enter time')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="color">color</label>
                        {!! Form::color('color', null, ['placeholder'=>'time','required']) !!}
                        @subLabel('color', 'Select a color')
                    </div>
                </div>
                <div class="col-md-9 mb-3">
                    <div class="form-group">
                        <label for="time">time</label>
                        {!! Form::time('time', null, ['placeholder'=>'time','required']) !!}
                        @subLabel('time', 'Please enter time')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="city">City</label>
                    {!! Form::text('city', null, ['placeholder'=>'City','required']) !!}
                    @subLabel('city')
                </div>
                <div class="col-md-3 mb-3">
                    <label for="state">State</label>
                    {!! Form::text('state', null, ['placeholder'=>'State','required']) !!}
                    @subLabel('state')
                </div>
                <div class="col-md-3 mb-3">
                    <label for="zip">Zip</label>
                    {!! Form::text('zip', null, ['placeholder'=>'Zip','required']) !!}
                    @subLabel('zip')
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    {!! Form::selectRange('number', 10, 20, null, ['placeholder' => 'Pick a number...']) !!}
                    @subLabel('number')
                </div>
                <div class="col-md-4 mb-3">
                    {!! Form::selectMonth('month', null, ['placeholder' => 'Pick an month...']) !!}
                    @subLabel('month')
                </div>
                <div class="col-md-4 mb-3">
                    {!! Form::selectYear('year', \Carbon\Carbon::now()->year, \Carbon\Carbon::now()->addYears(9)->year, null, ['placeholder' => 'Pick an year...']) !!}
                    @subLabel('year')
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    {!! Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...']) !!}
                    @subLabel('size')
                </div>
                <div class="col-md-6 mb-3">
                    {!! Form::select('animal',['Cats' => ['leopard' => 'Leopard'],'Dogs' => ['spaniel' => 'Spaniel']], null, ['placeholder' => 'Pick an animal...']) !!}
                    @subLabel('animal')
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            {!! Form::checkbox('newsletter', '1', false) !!}
                            Subscribe me for the newsletter
                            @subLabel('newsletter', 'Can also have a subLabel')
                        </label>
                    </div>


                    <label class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">remember me</span>
                    </label>


                </div>
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <label for="zip">How would you rate us?</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    {!! Form::radio('rating', '1', null) !!}
                                    Bad
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    {!! Form::radio('rating', '2', null) !!}
                                    Good
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    {!! Form::radio('rating', '3', null) !!}
                                    Excellent
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            @subLabel('rating')
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right']) !!}
            {!! Form::close() !!}

            @dump(old())

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
