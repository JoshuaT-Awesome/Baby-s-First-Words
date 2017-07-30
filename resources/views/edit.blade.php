<h1>Edit {{ $word->body }}</h1>



{{ Form::model($word, array('route' => array('update', $word->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('body', 'Word:') }}
        {{ Form::text('body', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('notes', 'Notes:') }}
        {{ Form::text('notes', null, array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Edit the word!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
