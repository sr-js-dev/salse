<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Calendar;
use Validator;
use App\Events;
use App\User;
use Auth;
use App\Team;

use Illuminate\Support\Facades\DB;
use FarhanWazir\GoogleMaps\GMaps;
class DashboardController extends Controller
{
    public function index () 
    {

         $schedule = DB::table('tasks')->select('id', 'customer', 'division', 'service', 'type', 'product_1', 'model_1', 'product_2', 'model_2', 'date', 'time', 'completion_date', 'assigned_sales_rep', 'status')->get();
        
        /********************************** Calendar Start **********************************************/
        $data = Events::get();

        foreach ($data as $key => $value) {
            $events[] = Calendar::event(
                $value->customer,
                true,
                new \DateTime($value->date),
                new \DateTime($value->completion_date.' +1 day'),
                $value->id,
                // Add color and link on event
                [
                    'color' => '#2e488a',
                ]
            );
        }        

        /*******************Calendar Event Management************/
        $calendar = Calendar::addEvents($events)
        ->setOptions([ //set fullcalendar options
            'firstDay' => 1,
            'editable' => true,
            'contentHeight' => 248,
            'color' => '#2e488a',
            'themeSystem' => 'standard',
            'aspectRatio' => 1,
            'eventLimit' => 3,
            'eventTextColor' => 'white',

        ])->setCallbacks([
            'eventClick' => 'calendarEventClickHandler',
        ]);

        /*************************************Calendar End**************************************/

        /***********************Google Map**************************/

        //     $gmap = new GMaps();

        //     $config['center'] = 'Air Canada Centre, Toronto';
        //     $config['zoom'] = '2.8';
        //     $config['map_type'] = 'SATELLITE';
        //     $config['map_height'] = '900px';
        //     $config['scrollwheel'] = false;
        //     $user = Auth::user();
        //     $mylocation= json_decode(file_get_contents("http://ipinfo.io/$user->ipaddress/?key=".env('IP_INFO_KEY')));
        //     $location = ($mylocation->region . ', ' . $mylocation->city);
        //     $gmap = new GMaps();
        //     list( $my_latitude, $my_longitude) = explode(",",$mylocation->loc); 
        //     $location_latlong = "$my_latitude,$my_longitude";
        //     $config["center"] = "$location_latlong";
        //     $gmap->initialize($config);
        //     $marker['position'] = $location_latlong;
        //     $marker['icon'] =asset('img/map_marker_red.png');
        //     /*********** Start Marker Setup ***********/
        //     $marker['infowindow_content'] = $location;
        //     $gmap->add_marker($marker);
    
    
    
    
        //     // get all members
        //     // loop 
        //     $team_members = Team::whereNotNull('id');
        //     $user_id = Auth::user()->id;
      
        //     $team_members = DB::table('team_members')->where('team_manager_id',$user_id)->get();
        //     foreach($team_members as $member){
        //         if($member->latitude && $member->longitude){
        //             $location_latlong = "$member->latitude,$member->longitude";
        //             $marker['position'] = $location_latlong;
        //             $marker['icon'] =asset('img/map_marker_blue.png');
    
    
        //             /*********** Start Marker Setup ***********/
        //             $marker['infowindow_content'] = $member->region;
        //             $gmap->add_marker($marker);                
        //             /*********** End Marker Setup ***********/
        //         }
        //     }
        // /**************************Google Map***********************/
         
         /*********** Reporting Start ***********/
         $total_tasks = DB::table('tasks')->count();
         $assigned_rep_sales_count = DB::table('tasks')->distinct()->count('assigned_sales_rep');
        //  dd($assigned_rep_sales_count);
         $complete_tasks = DB::table('tasks')->where('status','Complete')->count();
         $incomplete_tasks = DB::table('tasks')->where('status',  'Incomplete')->count();
         $inprogress_tasks = DB::table('tasks')->where('status',  'Inprogress')->count();
         $canceled_tasks = DB::table('tasks')->where('status',  'Canceled')->count();
         /*********** Reporting End ***********/
        // $map = $gmap->create_map();
        $config['center'] = 'Air Canada Centre, Toronto';
        $config['zoom'] = '2.8';
        $config['map_type'] = 'SATELLITE';
        $config['map_height'] = '900px';
        $config['scrollwheel'] = false;
        $user = Auth::user();

        /* $users = DB::table('team_manager')->where('id', $user->id)->get();
        dd($location = $users[0]->ipaddress);exit(); */

        $mylocation = json_decode(file_get_contents("http://ipinfo.io/$user->ipaddress/?key=" . env('IP_INFO_KEY')));
        $location = ($mylocation->region . ', ' . $mylocation->city);
        $gmap = new GMaps();
        list($my_latitude, $my_longitude) = explode(",", $mylocation->loc);
        $location_latlong = "$my_latitude,$my_longitude";
        //dd($location_latlong);
        $config["center"] = "$location_latlong";
        $gmap->initialize($config);
        $marker['position'] = $location_latlong;
        $marker['icon'] = asset('img/map_marker_red.png');
        $marker['onclick'] = "showTasksofMember($user->id)";
        /*********** Start Marker Setup ***********/
        $marker['infowindow_content'] = $location." ".$user->name;
        $gmap->add_marker($marker);


        $marker = [];

        // get all members
        // loop 
        $team_members = Team::all('id');
        
        // $user_id = Auth::user()->id;

        $team_members = DB::table('team_members')->get();
        
      
        foreach ($team_members as $member) {
            $marker['onclick'] = "showTasksofMember_member($member->id)";
            if ($member->latitude && $member->longitude) {
                $location_latlong = "$member->latitude,$member->longitude";
                
                $marker['position'] = $location_latlong;
                $marker['icon'] = asset('img/map_marker_blue.png');         
                $marker['infowindow_content'] = $member->region;
                $gmap->add_marker($marker);
            }
            
        }
        
       // dd($member->id,$location_latlong);
        $map = $gmap->create_map();
        return view('dashboard/index', compact('schedule', 'calendar', 'map', 'location', 'total_tasks', 'assigned_rep_sales_count', 'complete_tasks', 'incomplete_tasks', 'inprogress_tasks', 'canceled_tasks' )) ;
    }   

    public function Mark_GetTask($id)
    {
        //dd($id);exit;
        $htmlString = "";

        $user = Auth::user();//current user
        $mylocation = json_decode(file_get_contents("http://ipinfo.io/$user->ipaddress/?key=" . env('IP_INFO_KEY')));//user's Region, country, city from IPaddress
    
        $location = ($mylocation->region . ', ' . $mylocation->city); //current user's Region and City
       
        $gmap = new GMaps(); //Generate Map

        list($my_latitude, $my_longitude) = explode(",", $mylocation->loc);

        $location_lat = "$my_latitude"; // get current user's location latitude
        $location_long = "$my_longitude"; //get current user's location longtitude
       
       //team_member's info same as current user's latitude&longitude.
        // $team_members = DB::table('team_members')->where('team_manager_id', $id)->where('latitude', $location_lat)->where('longitude', $location_long)->get();
        $team_members = DB::table('team_members')->where('latitude', $location_lat)->where('longitude', $location_long)->get();
        // dd($team_members);exit;

        $htmlString .= "<div calss='justify-content-center table-responsive container-sales'>
                            <div class='col-md-auto table-responsive'>
                            <table id='datatable' class='table table-striped table-bordered' style='color:black;font-family:'sans-serif''>
                            <thead>
                            <tr style='color:#fff;'>
                                <th class='col'>Customer</th>
                                <th class='col'>Division</th>
                                <th class='col'>Service</th>
                                <th class='col'>Type</th>
                                <th class='col'>Product1</th>
                                <th class='col'>Model1</th>
                                <th class='col'>Product2</th>
                                <th class='col'>Model2</th>
                                <th class='col'>Date</th>
                                <th class='col'>Time</th>
                                <th class='col'>Completion Date</th>
                                <th class='col'>Assigned Sales Rep</th>
                                <th class='col'>Status</th>
                            </tr>
                            </thead>
                            <tbody>";

        foreach ($team_members as  $team_member) {
         
            $tasks = DB::table('tasks')->where('assigned_sales_rep', $team_member->name)->get();
           // dd($team_members);exit;
            foreach ($tasks as $task) {
                
                $htmlString .=         "<tr style='background:#2e488a;'>    
                                            <td class='col' style='color:white;'>$task->customer</td>
                                            <td class='col' style='color:white;'>$task->division</td>
                                            <td class='col' style='color:white;'>$task->service</td>
                                            <td class='col' style='color:white;'>$task->type</td>
                                            <td class='col' style='color:white;'>$task->product_1</td>
                                            <td class='col' style='color:white;'>$task->model_1</td>
                                            <td class='col' style='color:white;'>$task->product_2</td>
                                            <td class='col' style='color:white;'>$task->model_2</td>
                                            <td class='col' style='color:white;'>$task->date</td>
                                            <td class='col' style='color:white;'>$task->time</td>
                                            <td class='col' style='color:white;'>$task->completion_date</td>
                                            <td class='col' style='color:white;'>$task->assigned_sales_rep</td>
                                            <td class='col' style='color:white;'>$task->status</td>
                                        </tr>";
                                    }
                                     
                           
        }
        $htmlString .=  "</tbody>                
                        </table>
                    </div>
                </div>";
                
        return $htmlString;
    }
    public function Mark_GetTaskMember($id)
    {
        $htmlString = "";
        //dd($id);

        
        $htmlString .= "<div calss='justify-content-center table-responsive container-sales'>
                            <div class='col-md-auto table-responsive'>
                            <table id='datatable' class='table table-striped table-bordered' style='color:black;font-family:'sans-serif''>
                            <thead>
                            <tr style='color:#fff;'>
                                <th class='col'>Customer</th>
                                <th class='col'>Division</th>
                                <th class='col'>Service</th>
                                <th class='col'>Type</th>
                                <th class='col'>Product1</th>
                                <th class='col'>Model1</th>
                                <th class='col'>Product2</th>
                                <th class='col'>Model2</th>
                                <th class='col'>Date</th>
                                <th class='col'>Time</th>
                                <th class='col'>Completion Date</th>
                                <th class='col'>Assigned Sales Rep</th>
                                <th class='col'>Status</th>
                            </tr>
                            </thead>
                            <tbody>";

        
        $team_member_id = DB::table('team_members')->where('id', $id)->first();
     

        $team_members = DB::table('team_members')->where('latitude', $team_member_id->latitude)->where('longitude', $team_member_id->longitude)->get();
        //$team_members = DB::table('team_members')->where('region', $team_member_id->region)->get(); //same region tasks.
        
        foreach ($team_members as $teammember){
            // $team_member = DB::table('team_members')->where('id', $teammember->id)->first();
            
            // foreach ($team_members as  $team_member) {
            
                $tasks = DB::table('tasks')->where('assigned_sales_rep', $teammember->name)->get();
                // dd($tasks);
                foreach ($tasks as $task) {
                    
                    $htmlString .= "        <tr style='background:#2e488a;'>    
                                        <td class='col' style='color:white;'>$task->customer</td>
                                        <td class='col' style='color:white;'>$task->division</td>
                                        <td class='col' style='color:white;'>$task->service</td>
                                        <td class='col' style='color:white;'>$task->type</td>
                                        <td class='col' style='color:white;'>$task->product_1</td>
                                        <td class='col' style='color:white;'>$task->model_1</td>
                                        <td class='col' style='color:white;'>$task->product_2</td>
                                        <td class='col' style='color:white;'>$task->model_2</td>
                                        <td class='col' style='color:white;'>$task->date</td>
                                        <td class='col' style='color:white;'>$task->time</td>
                                        <td class='col' style='color:white;'>$task->completion_date</td>
                                        <td class='col' style='color:white;'>$task->assigned_sales_rep</td>
                                        <td class='col' style='color:white;'>$task->status</td>
                                    </tr>";
                                }
        }
        

        $htmlString .=  "</tbody>                
                        </table>
                    </div>
                </div>";
        return $htmlString;
    }

}
