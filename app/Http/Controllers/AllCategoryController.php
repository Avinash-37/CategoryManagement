<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use App\Category;
use App\Categories;
use App\SubCategory;

use Image; 
use Validator;

class AllCategoryController extends Controller

{

    public function listCategory()

    {

        $categories = Category::where('parent_id', '=', 0)->get();

        $allCategories = Category::pluck('title','id')->all();


        return view('home',compact('categories','allCategories'));

    }

    public function listCategory1()

    {

        $categories = DB::select("SELECT * FROM `category`");
        $subCategory = DB::select("SELECT * FROM `subcategory`");

        return view('categoryHome',compact('categories','subCategory'));

    }

    public function SubCategoryList()

    {
        $categoriesList = DB::select("SELECT * FROM `subcategory`");

        return view('categoryHome',compact('categoriesList'));

    }

        //Add New Category
    public function addCategory(Request $request)
    {
        $Categories = new Categories;
        $title = $request->input('Category');
        $image = $request->file('uploadimage');
      //dd($image);
         if($request->hasFile('uploadimage')){
                $filenameWithExt=$request->file('uploadimage')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('uploadimage')->getClientOriginalExtension();
                //$fileNameToStore= date('mdYHis') . uniqid() .$filename.'.'.$extension;
                $fileNameToStore= date('dmYHis') .$filename.'.'.$extension;
                request()->uploadimage->move(public_path('uploadImages'), $fileNameToStore);  
             }else{
                   // if no file from request , then put one no-image.jpeg in public/img folder
                   $fileNameToStore='no-image.jpeg';
              }

        $validator = Validator::make($request->all(), [
            'Category' => 'required',
            
        ]);
        if ($validator->fails()) {
            $mesg = $validator->messages();
            return response(json_encode($mesg));
        }else{
                //$categoryName = Categories::where('category_name', $title)->get();

                $categoryName =DB::table("category")
                        ->select("category_name")
                        ->where("category_name",$title)
                        ->get()
                        ->toArray();
                //dd($categoryName);
                    if( count($categoryName) <= 0 ) {
                        $Categories->category_name= $title;
                        $Categories->cat_img = $fileNameToStore;
                        $Categories-> save();
              
                        $message["message"] = [0 =>"success"];
                        $message["link"] = [0 =>"category-home"];
                        return response(json_encode($message));
                    } 
                    else {
                        $message["message"] = [0 =>"This Category is Already Added...Please Add another Category"];
                        return response(json_encode($message));
                    }

            
        }
    }

    // DELETE CATEGORY FROM LIST
public function deletecategory($id){
    $Categories = Categories ::findOrFail($id);
    dd($Categories);
    $Categories->delete();
}

            //Add New Sub Category
    public function addSubCategory(Request $request)
    {
        $SubCategory = new SubCategory;
        $parent_id = $request->input('select_category');
        $subCategorytitle = $request->input('SubCategory');
        $subCategoryinfo = $request->input('SubCategoryInfo');

        $validator = Validator::make($request->all(), [
            'select_category' => 'required',
            'SubCategory' => 'required',
            'SubCategoryInfo' => 'required',
            
        ]);
        if ($validator->fails()) {
            $mesg = $validator->messages();
            return response(json_encode($mesg));
        }else{

                $subCategoryName =DB::table("subcategory")
                        ->select("sub_cat_name")
                        ->where("sub_cat_name",$subCategorytitle)
                        ->get()
                        ->toArray();
                //dd($categoryName);
                    if( count($subCategoryName) <= 0 ) {
                        $SubCategory->category_id = $parent_id;
                        $SubCategory->sub_cat_name = $subCategorytitle;
                        $SubCategory->sub_cat_info = $subCategorytitle;
                        $SubCategory->save();

                        $message["message"] = [0 =>"success"];
                        $message["link"] = [0 =>"category-home"];
                        return response(json_encode($message));
       
                    } 
                    else {
                        $message["message"] = [0 =>"This Sub Category is Already Added...Please Add another Sub Category"];
                        return response(json_encode($message));
                    }

             }
    }


}
?>