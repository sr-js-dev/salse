<?php

namespace App\Http\Controllers;
use Redirect,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Team;
use Auth;
use Validator;

 
class TeamController extends Controller
{
   public function index()
   {
      $team_members = Team::whereNotNull('id');
      $user_id = Auth::user()->id;

      $team_members = DB::table('team_members')->select('id', 'name', 'role', 'email', 'phone', 'territory', 'region', 'area', 'address')->where('team_manager_id',$user_id)->get();
      return view('dashboard.team', compact('team_members'));

   }
 
  public function store(Request $request)
  {
          $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'territory' => 'required',
            'region' => 'required',
            'area' => 'required',
            'address' => 'required',
            'add_member_lat' => 'required',
            'add_member_lng' => 'required',

            ]);

            if ($validator->fails()) {
                \Session::flash('warning', 'Please enter the valid details');
                return Redirect::to('dashboard/team')->withInput()->withErrors($validator);
            }
       
            $team = new Team();

            $team->team_manager_id = Auth::user()->id;
            $team->name = $request->input('name');
            $team->role = $request->input('role');
            $team->email = $request->input('email');
            $team->phone = $request->input('phone');
            $team->territory = $request->input('territory');
            $team->region = $request->input('region');
            $team->area = $request->input('area');
            $team->address = $request->input('address');
            $team->latitude = $request->input('add_member_lat'); 
            $team->longitude = $request->input('add_member_lng'); 
            $team->save();          

         return Redirect::to("dashboard/team")->withSuccess('Great! New task has been added successfully.');
      }
  public function update(Request $request)
  {
         $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'territory' => 'required',
            'region' => 'required',
            'area' => 'required',
            'address' => 'required'
          ]);
            $id=$request->get('id');
            $team = Team::find($id);
            $team->name = $request->get('name');
            $team->role = $request->get('role');
            $team->email = $request->get('email');
            $team->phone = $request->get('phone');
            $team->territory = $request->get('territory');
            $team->region = $request->get('region');
            $team->area = $request->get('area'); 
            $team->address = $request->get('address'); 

            $team->save();    

          return redirect('/dashboard/team')->with('success', 'Great! New task has been updated successfully.');
      }

      public function getTeamDetail($team){
         return Team::find($team);
      }
      public function removeTeam(Request $request){
         $id = $request->get('id');
        Team::find($id)->delete();
        return redirect()->back();
      }
            
      // public function team_api()

      //    {
      //       $team = DB::table('team_members')->select('id', 'name', 'title', 'role', 'area', 'region', 'territory', 'phone', 'email')->get();

      //       return json_encode($team, JSON_PRETTY_PRINT);      
      //    }
}