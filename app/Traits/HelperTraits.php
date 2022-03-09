<?php
namespace App\Traits;
trait HelperTraits {
  public function  checkIsDelete($model,$request){
    $find = false;
    $result = $model::where('isDeleted', 1)->get();
    foreach ($result as $item) {
        if ($item->name==$request->name  || 
           ( isset($item->QR) && $item->QR==$request->QR )||
           ( isset($item->fullName) && $item->fullName==$request->fullName )||
           ( isset($item->ICE) && $item->ICE==$request->ICE )
           ) {
            $request->request->add(["isDeleted"=>0]);
            $model::find($item->id)->update($request->all());
            $find = true;
            break;
        }
    }
    return $find==true ? true : false;
  }
}
?>