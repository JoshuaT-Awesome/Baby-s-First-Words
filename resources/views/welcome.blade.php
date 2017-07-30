<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Baby's First Words</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            textarea.form-control {
                
                height: 100px;
                width: 300px;
                margin-left: auto;
                margin-right:auto;
            }


            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

           
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif


            <div class="content">
                <div class="title m-b-md">
                    Baby's First Words
                    
                </div>
                <h3><strong># of words/phrases: 
                {{  $count }}</strong>
                </h3>
                <hr>
                <div class="alert">
                    @include('flash::message')
                </div>

                 {{ Form::open(['url' => '/']) }}

                 {{  csrf_field()  }}

                 <div class="form-group">
                  {{  Form::label('body', 'Type in word or phrase:')}}
                  {{  Form::textarea('body', null, ['class' => 'form-control'])  }}
                </div>

                <div class="form-group">
                  {{  Form::label('notes', 'Type in any notes here:')}}
                  {{  Form::textarea('notes', null, ['class' => 'form-control'])  }}
                </div>

                <div class="form-group">
                   {{ Form::submit ('Save', ['class' => 'btn btn-primary']) }}
                   {{ Form::reset('Reset', ['class' => 'btn btn-secondary']) }}
                </div>

                {!! Form::close() !!}


                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Number</td>
                            <td>word(s)</td>
                            <td>notes</td>
                            <td>Date </td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($words as $key => $value)
                        <tr>
                            <td>{{ $key + 1}}</td>
                            <td>{{ $value->body }}</td>
                            <td>{{ $value->notes }}</td>
                            <td>{{ $value->created_at->toFormattedDateString() }}</td>
                            <td>

                            {{ Form::open(array('url' => '/' . $value->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                            {{ Form::close() }}                                                        
                                <a class="btn btn-small btn-info" href="{{ URL::to('/' . $value->id . '/edit') }}">Edit </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
        <!-- If using flash()->important() or flash()->overlay(), you'll need to pull in the JS for Twitter Bootstrap. -->
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <script>
            $('#flash-overlay-modal').modal();          
        </script>
        
        
    </body>
</html>
