<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use App\Tasks;
use App\Accounts;
use DB;
use Redirect;
use Validator;

class TasksController extends Controller
{
    public function index(Request $request){
    /*****************************search 
     * 
     * 
        $events = Events::whereNotNull('id');
        if(isset($request->search2)){
            $filter = $request->search2;
            $filter =strtolower( $filter);
            $events = $events->where(DB::Raw("LOWER(title)") ,"like", "%$filter%");
            // ->orWhere(DB::Raw("Lower(segment)"), "like", "%$filter%")
            // ->orWhere(DB::Raw("Lower(name)"), "like", "%$filter%")
            // ->orWhere(DB::Raw("Lower(division)"), "like", "%$filter%")
            // ->toSql();
            // dd($events);
            // 'title', 'segment', 'name', 'division'
            // $events = Events::search($request->search2)->get();
            // dd($request->search2);
            //dd($events);
        }

        if(isset($request->name)){
            $filter = $request->name;
            if( $filter != ""){
                $filter =strtolower( $filter);
                $events = $events->where(DB::Raw("LOWER(name)") ,"like", "%$filter%");
            }
        }
        if(isset($request->segment)){
            $filter = $request->segment;
            if( $filter != ""){
                $filter =strtolower( $filter);
                $events = $events->where(DB::Raw("LOWER(segment)") ,"like", "%$filter%");
            }
        }
        if(isset($request->division)){
            $filter = $request->division;
            if( $filter != ""){
                $filter =strtolower( $filter);
                $events = $events->where(DB::Raw("LOWER(division)") ,"like", "%$filter%");
            }
        }
       
        ******** Search function   ****/
        $events = Events::whereNotNull('id');

        $events = DB::table('tasks')->select('id', 'customer', 'division', 'service', 'type', 'product_1', 'model_1', 'product_2', 'model_2', 'date', 'time', 'completion_date', 'assigned_sales_rep', 'status', 'notes')->get();
        
        // dd($reps);
            $total_events = DB::table('tasks')->count();
            
            $complete_events = DB::table('tasks')->where('status', 'complete')->count();
            $incomplete_events = DB::table('tasks')->where('status', 'incomplete')->count();
            $inprogress_events = DB::table('tasks')->where('status', 'inprogress')->count();
            $canceled_events = DB::table('tasks')->where('status', 'canceled')->count();

            $tasks = DB::table('tasks')->get();
        /*********Customer, Division from Accounts/Customer page */
        $customers = Accounts::all();
        $customer = DB::table('accounts')->select('customer')->distinct()->get(); 
        $division = DB::table('accounts')->select('division')->distinct()->get();
        $service = DB::table('services')->select('service')->distinct()->get();
        $type = DB::table('services')->select('type')->distinct()->get();
        $product_1 = DB::table('services')->select('product_1')->distinct()->get();
        $model_1 = DB::table('services')->select('model_1')->distinct()->get();
        $product_2 = DB::table('services')->select('product_2')->distinct()->get();
        $model_2 = DB::table('services')->select('model_2')->distinct()->get();
        $name = DB::table('team_members')->select('name')->distinct()->get();

        return view('dashboard.tasks', compact('customers', 'customer', 'division', 'service','type', 'product_1', 'product_2', 'model_1', 'model_2', 'name', 'tasks', 'events', 'total_events', 'complete_events', 'incomplete_events', 'inprogress_events', 'canceled_events', 'assigned_sales_rep', 'notes'));             
    }

    public function getTaskDetail($task){
        return Tasks::find($task);
    }

    public function removeTask(Request $request){
        $id = $request->get('id');
        Tasks::find($id)->delete();
        return redirect()->back();
    }
    public function getAssignedSalesRep($assigned_sales_rep){
        $id = Auth :: user()->id;
        $admin = Tasks::find($id);
        $assigned_sales_rep = DB :: table('team_members')->distinct()->pluck('assigned_sales_rep')->toArray();
        return view('/dashboard/tasks')->with('admin', $admin)->with('assigned_sales_rep', $assigned_sales_rep);
    }

    public function addTask(Request $request){

        $validator = Validator::make($request->all(), [
            'customer' => 'required',
            'division' => 'required',
            'service' => 'required',
            'type' => 'required',
            'product_1' => 'required',
            'model_1' => 'required',
            'date' => 'required',
            'time' => 'required',
            'completion_date' => 'required',
            'assigned_sales_rep' => 'required',
            'status' => 'required',

            ]);

            if ($validator->fails()) {
                \Session::flash('warning', 'Please enter the valid details');
                return Redirect::to('dashboard/tasks')->withInput()->withErrors($validator);
            }
       
        $tasks = new Tasks();

         $tasks->customer = $request->input('customer');
         $tasks->division = $request->input('division');
         $tasks->service = $request->input('service');
         $tasks->type = $request->input('type');
         $tasks->product_1 = $request->input('product_1');
         $tasks->model_1 = $request->input('model_1');
         $tasks->product_2 = $request->input('product_2');
         $tasks->model_2 = $request->input('model_2');
         $tasks->date = $request->input('date');
         $tasks->time = $request->input('time');
         $tasks->completion_date = $request->input('completion_date');
         $tasks->assigned_sales_rep = $request->input('assigned_sales_rep');
         $tasks->status = $request->input('status');
         $tasks->notes = $request->input('notes');
         $tasks->save(); 
         

         return Redirect::to("dashboard/tasks")->withSuccess('Great! New task has been added successfully.');
    }
    public function postTaskUpdate(Request $request){
         $id = $request->get('id');
    
         $tasks= Tasks::find($id);
         $tasks->customer =$request->get('customer');
         $tasks->division =$request->get('division');
         $tasks->service =$request->get('service');
         $tasks->type =$request->get('type'); 
         $tasks->product_1 =$request->get('product_1');
         $tasks->model_1 =$request->get('model_1');
         $tasks->product_2 =$request->get('product_2');
         $tasks->model_2 =$request->get('model_2');         
         $tasks->date =$request->get('date');     
         $tasks->time =$request->get('time');       
         $tasks->completion_date =$request->get('completion_date');
         $tasks->assigned_sales_rep =$request->get('assigned_sales_rep');
         $tasks->status =$request->get('status');         
         $tasks->notes =$request->get('notes');         
         $tasks->save();
         \Session::flash('success', 'Data updated successfully.');
         return redirect('/dashboard/tasks')->with('success', 'Great! Current service has been updated successfully.');
     }
}
