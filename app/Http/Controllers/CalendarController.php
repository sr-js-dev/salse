<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Calendar;
use Validator;
use App\Events;
use App\Tasks;
use Illuminate\Support\Facades\DB;



class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $data = Tasks::get();
        $events = [];
        foreach ($data as $key => $value) {
            $events[] = Calendar::event(
                $value->customer,
                true,
                new \DateTime($value->date),
                new \DateTime($value->completion_date . ' +1 day'),
                $value->id,
                // Add color and link on event
                [
                    'color' => '#2e488a',
                ]
            );
        }
        $calendar = Calendar::addEvents($events)
            ->setOptions([ //set fullcalendar options
                'firstDay' => 1,
                'contentHeight' => 700,
                'themeSystem' => 'bootstrap3',
                'columnHeader' => false,
                'aspectRatio' => 1
            ])->setCallbacks([
                'eventClick' => 'calendarEventClickHandler',
            ]);

        $tasks = Tasks::all();
        
        return view('dashboard.calendar', compact('calendar', 'tasks'));
    }

    public function getEventDetail($event){
        $event = Tasks::find($event); 
        return $event;
    }
    public function postTaskUpdate(Request $request){
       //var_dump($request->all());exit;
        $id = $request->id;
        $customer = $request->customer;
        $division = $request->division;
        $service = $request->service;
        $type = $request->type;
        $product_1 = $request->product1;
        $model_1 = $request->modal1;
        $product_2 = $request->product2;
        $model_2 = $request->model2;
        //var_dump($model_1,"service");exit;
        $date = $request->date;
        $time = $request->time;
        $completion_date = $request->completion_date;
        $assigned_sales_rep = $request->assigned_sales_rep;
        $status = $request->status;
        $update = DB::table('tasks')
                ->where('id',$id)
                ->update(['customer' => $customer, 
                            'division' => $division, 
                            'service' => $service, 
                            'type'=> $type, 
                            'product_1' => $product_1, 
                            'model_1' => $model_1, 
                            'product_2' => $product_2, 
                            'model_2' => $model_2, 
                            'date' => $date,
                             'time' => $time, 
                             'completion_date' => $completion_date, 
                             'assigned_sales_rep' => $assigned_sales_rep, 
                             'status' => $status
                             ]);
        // var_dump($request->all());
        \Session::flash('success', 'Data updated successfully.');
        return $update;
    }

    public function addEvent(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'customer' => 'required',
            'division' => 'required',
            'service' => 'required',
            'type' => 'required',
            'product_1' => 'required',
            'model_1' => 'required',
            'date' => 'required',
            'completion_date' => 'required',
            'assigned_sales_rep' => 'required',
            'status' => 'required',
            ]);

            if ($validator->fails()) {
                \Session::flash('warning', 'Please enter the valid details');
                return Redirect::to('dashboard/calendar')->withInput()->withErrors($validator);
            }
            $event = new Tasks;
            $event->customer = $request['customer'];
            $event->division = $request['division'];
            $event->service = $request['service'];
            $event->type = $request['type'];
            $event->product_1 = $request['product_1'];
            $event->model_1 = $request['model_1'];
            $event->product_2 = $request['product_2'];
            $event->model_2 = $request['model_2'];
            $event->date = $request['date'];
            $event->time = $request['time'];
            $event->completion_date = $request['completion_date'];
            $event->assigned_sales_rep = $request['assigned_sales_rep'];
            $event->status = $request['status'];
          
            $event->save();
            \Session::flash('success', 'Event added successfully.');
            return Redirect::to('dashboard/calendar');
        }
    
        public function schedule_api()
    
        {
            $schedule = DB::table('tasks')->select('customer', 'division', 'service', 'type', 'product_1', 'model_1', 'product_2', 'model_2', 'date', 'time', 'completion_date', 'assigned_sales_rep', 'status')->get();
    
            return  json_encode($schedule, JSON_PRETTY_PRINT);
        }
    }
    