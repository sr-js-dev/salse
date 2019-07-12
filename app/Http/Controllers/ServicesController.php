<?php
 
namespace App\Http\Controllers;
use App\Services;
use Redirect,Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
 
class ServicesController extends Controller
{
   public function index()
   {
      $services = Services::whereNotNull('id');
      $user_id = Auth::user()->id;

      $services = DB::table('services')->select('id', 'classification', 'service', 'type', 'product_1', 'model_1', 'product_2', 'model_2')->where('team_manager_id',$user_id)->get();
      return view('dashboard.services', compact('services'));
   }  
 
  public function addService(Request $request)
  {
         $services = new Services();
         $services->team_manager_id = Auth::user()->id;  
         $services->classification=$request->input('classification');
         $services->service=$request->input('service');
         $services->type=$request->input('type');
         $services->product_1=$request->input('product_1');
         $services->model_1=$request->input('model_1');
         $services->product_2=$request->input('product_2');
         $services->model_2=$request->input('model_2');

         $services->save(); 

          return Redirect::to("dashboard/services")->withSuccess('Great! New service has been added successfully.');

   }  

   public function update(Request $request)

      {                    
                  $id=$request->get('id');
                  $services = Services::find($id);
                
                  $services->classification = $request->get('classification');
                  $services->service = $request->get('service');
                  $services->type = $request->get('type');
                  $services->product_1 = $request->get('product_1');
                  $services->model_1 = $request->get('model_1');
                  $services->product_2 = $request->get('product_2');
                  $services->model_2 = $request->get('model_2');
                  $services->save();    

               return redirect('/dashboard/services')->with('success', 'Great! Current service has been updated successfully.');
      }

      public function getServiceDetail($service){

         return Services::find($service);

      }

      public function removeService(Request $request){

         $id = $request->get('id');
         Services::find($id)->delete();

         return redirect()->back();
      }
      
      public function customer_services_api()

      {
         $services = DB::table('services')->select('id', 'classification', 'service', 'type', 'product', 'model')->get();

         return json_encode($services, JSON_PRETTY_PRINT);      
      }

}