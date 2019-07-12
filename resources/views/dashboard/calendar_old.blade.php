@extends('layouts.calendarLayout');

@section('style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

@endsection

@section('content')

  <div class="container" style="margin-top:200px;">
      <div class="panel panel-primary" style="color: #fff;background-color: #2e488a;border-color: #2e488a;">
          <div class="panel-heading" style="color: #fff;background-color: #2e488a;border-color: #fff;">Salesc2 Schedule</div>
              <div class="panel-body">
        
                {!! Form::open(array('route' => 'events.add', 'method'=>'POST', 'files'=>'true')) !!}
                    <div class="row">
                        @if (Session::has('success'))
                            <div class="alert alter-success">{{ Session::get('success') }}</div>
                        @elseif (Session::has('warning'))
                            <div class="alert alert-danger">{{ Session::get('warning') }}</div>
                        @endif
                    </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                                {!! Form::label('title', 'Title:') !!}
                                <div class="">
                                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('title', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                                {!! Form::label('segment', 'Segment:') !!}
                                <div class="">
                                    {!! Form::text('segment', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('segment', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                                {!! Form::label('name', 'Name:') !!}
                                <div class="">
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                                {!! Form::label('division', 'Division:') !!}
                                <div class="">
                                    {!! Form::text('division', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('division', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                                {!! Form::label('start_date', 'Start Date:') !!}
                                <div class="">
                                    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                                {!! Form::label('end_date', 'End Date:') !!}
                                <div class="">
                                    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-1 col-sm-1 col-md-1 text-center" >
                        {!! Form::submit('Add Event', ['class'=>'table-btn']) !!}
                        </div>                                
              </div>
              {!! Form::close() !!}
              
              <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Full Calendar Example</div>
                        <div class="panel-body">
                           
                            {!! $calendar->calendar() !!}
                            {!! $calendar->script() !!}
                        </div>
                    </div>
                </div>
              </div>
                
            </div>
        </div>
@endsection
 
@section('script')
    <script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    
@endsection

