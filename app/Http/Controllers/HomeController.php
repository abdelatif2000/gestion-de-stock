<?php
namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Command;
use App\Models\product_command;
use App\Models\Rule;
use App\Models\Store;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller

{
  public function index()
  {
  
    //statistic of this month:
    $statistic = $this->statisticPerDate(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());
    //statistic of this week:
    $statistic["earningsWeek"] = $this->statisticWeek(Rule::class);
    $statistic["clientsWeek"] = $this->statisticWeek(Client::class);
        //product close to Finish :
    $statistic["productCloseToFinish"] = $this->productCloseToFinish();
    return view("home", compact("statistic"));
  }
  public function filterByDate(Request $request )
  {
      if($request){
        $statistic =$this->statisticPerDate($request->startDate,$request->endDate);
        return response()->json($statistic);
      }
  }
  ////////////Function of get the week statistics :
  public function   statisticWeek($model)
  {
    $monday = Carbon::now()->startOfWeek();
    $sunday = Carbon::now()->endOfWeek();
    $allDayOfWeek = [1, 2, 3, 4, 5, 6, 7];
    $results = $model::whereBetween('created_at', [$monday, $sunday])
      ->groupBy("created_at")
      ->get()
      ->groupBy(function ($val) {
        return Carbon::parse($val->created_at)->format('N');
      });
    $totalByWeek = [];
    foreach ($results as $key => $value) {
      $total = 0;
      foreach ($value as $item) {
        if (isset($item->total_payment)) {
          $total = $total + $item->total_payment;
        } else {
          $total += 1;
        }
      }
      $totalByWeek[$key] = $total;
    }
    foreach ($allDayOfWeek as $day) {
      $find = 0;
      foreach ($totalByWeek as  $key => $value) {
        if ($day == $key) {
          $find = 1;
        }
      }
      if ($find == 0) {
        $totalByWeek[$day] = 0;
      }
    }
    return collect($totalByWeek)->sortKeys();
  }
  //////////function  get static orders,earnings,topClients ,topProduct :
  public function statisticPerDate($startDate, $endDate)
  {
    $clients = Client::where('isDeleted', 0)
      ->where('isDeleted', 0)
      ->whereBetween("created_at", [$startDate, $endDate])
      ->get()
      ->count();
    //orders of this month:
    $orders = Command::where('isDeleted', 0)
      ->whereBetween("created_at", [$startDate, $endDate])
      ->get()
      ->count();
    //earnings of this month:
    $earnings = Rule::
      whereBetween("created_at", [$startDate, $endDate])
      ->get()
      ->sum("total_payment");
    //topClients of this month:
    $topClients = Client::withCount('commands')
      ->with(['commands' => function ($query) use ($startDate, $endDate) {
        $query->withSum("rules", "total_payment")
          ->withSum("products as price_total", DB::raw('product_command.price *product_command.quantity'))
          ->with(["products" => function ($query) {
            $query->with("product")->get();
          }, "rules" => function ($query) use ($startDate, $endDate) {
            $query
              ->whereBetween("created_at", [$startDate, $endDate])
              ->get();
          }])->where('isDeleted', 0)->get();
      }])->get();
    foreach ($topClients as $client) {
      $total_cost = 0;
      foreach ($client->commands as $command) {
        $total_cost += $command->rules_sum_total_payment;
      }
      $client->total_cost = $total_cost;
    }
    $topClients = $topClients->where("total_cost", ">", "0")->sortByDesc("total_cost");
    //topProduct of this month :
    $topProduct = product_command::selectRaw("count(product_id) as productSold ,product_id")
      ->whereBetween("created_at", [$startDate, $endDate])
      ->with("product", function ($query) {
        $query->with("photos")->get();
      })->groupBy("product_id")->take(3)->get();
    $statistic["topProduct"] = $topProduct;
    $statistic["topClients"] = $topClients;
    $statistic["orders"] = $orders;
    $statistic["earnings"] = $earnings;
    $statistic["clients"] = $clients;

    return $statistic;
  }
  public function productCloseToFinish()
  {
    $productCloseToFinish = Store::where('isReturned', 0)
      ->selectRaw("sum(quantity) as quantity ,product_id ")
      ->groupBy("product_id")
      ->with(["product"=>function($q){
        $q->with("photos")
        ->get();
      }])
      ->get();
    $productCloseToFinish = $productCloseToFinish->filter(function ($item) {
      if ($item->quantity <= $item->product->alert) {
        return $item;
      }
    });
    return $productCloseToFinish;
  }
}
