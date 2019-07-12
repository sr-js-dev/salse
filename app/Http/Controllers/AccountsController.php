<?php
 
namespace App\Http\Controllers;
use App\Accounts;
use Redirect,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;

 
class AccountsController extends Controller
{
   public function index()
   {
    
      $accounts = Accounts::whereNotNull('id');
      $user_id = Auth::user()->id;

      $accounts = DB::table('accounts')->select('id', 'customer', 'division', 'address', 'city', 'state', 'pocname', 'phone', 'email')->where('team_manager_id', $user_id)->get();
      return view('dashboard.accounts', compact('accounts'));
   }  
 
  public function addAccount(Request $request)
   {          
         $validator = Validator::make($request->all(), [
            'customer' => 'required',
            'division' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pocname' => 'required',
            'phone' => 'required',
            'email' => 'required',

            ]);

            if ($validator->fails()) {
                \Session::flash('warning', 'Please enter the valid details');
                return Redirect::to('dashboard/accounts')->withInput()->withErrors($validator);
            }
       
         
         $accounts = new Accounts();
         $accounts->team_manager_id = Auth::user()->id;            
         $accounts->customer=$request->input('customer');
         $accounts->division=$request->input('division');
         $accounts->address=$request->input('address');
         $accounts->city=$request->input('city');
         $accounts->state=$request->input('state');
         $accounts->pocname=$request->input('pocname');
         $accounts->phone=$request->input('phone');
         $accounts->email=$request->input('email');
         $accounts->save();
         return Redirect::to("dashboard/accounts")->with('success', 'Great! New Account has been added successfully.');
   }

      public function update(Request $request)

      {                    
                  $id=$request->get('id');
                  $accounts = Accounts::find($id);
                
                  $accounts->customer = $request->get('customer');
                  $accounts->division = $request->get('division');
                  $accounts->address = $request->get('address');
                  $accounts->city = $request->get('city');
                  $accounts->state = $request->get('state');
                  $accounts->pocname = $request->get('pocname');
                  $accounts->phone = $request->get('phone'); 
                  $accounts->email = $request->get('email'); 
                  $accounts->save();    

               return redirect('/dashboard/accounts')->with('success', 'Great! New account has been updated successfully.');
      }

      public function getAccountDetail($accounts){
         return Accounts::find($accounts);
      }
      public function removeAccount(Request $request){
         
        $id = $request->get('id');
        Accounts::find($id)->delete();
        return redirect()->back();
      }
      public function customer_accounts_api()

      {
         $accounts = DB::table('accounts')->select('id', 'customer', 'division', 'address', 'city', 'state', 'pocname', 'phone', 'email')->get();

         return json_encode($accounts, JSON_PRETTY_PRINT);      
      }
}