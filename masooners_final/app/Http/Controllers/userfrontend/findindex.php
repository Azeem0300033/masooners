<?php

namespace App\Http\Controllers\userfrontend;
use App\Models\IdeaStyle;
use App\Models\IdeaCategory;
use App\Models\Idea;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProSubCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Portfolio;
use App\Models\ProfessionalDetail;
use App\Models\ProfessionalProfile;
use App\Models\stepform;
use Illuminate\Support\Facades\DB;

class findindex extends Controller
{
    //
    public function index()
    {
        $ideaCategories = IdeaCategory::with(['media'])->get();
        $ideaStyles = IdeaStyle::all();
        $ideas=Idea::with(['category','style','media'])->get();
        // dd($ideas);
        return view('manso.index', compact('ideaCategories','ideaStyles','ideas') );
    }
    public function inquiry(request $request)
    {
        // dd($request->all());
        $data = array('location' => $request->location,'email' => $request->email,'name' => $request->name,'purpose' => $request->purpose,'service' => json_encode($request->service),'appartment'=>json_encode($request->appartment));
        // $result=DB::table('stepform')->insert('');
        // dd($data);
        $query = stepform::create($data);
        return view('manso.form');

    }
    /**z
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findprofessional()
    {

        $categories = Category::all();
        $proSubCategories = ProSubCategory::with(['prof_category', 'media'])->get();
        // dd($categories);
        return view('manso.findprofessional', compact('categories','proSubCategories'));
    }

    public function professionals($id)
    {
        // dd($id);

        $professionalProfiles = ProfessionalProfile::with(['user', 'media'])->get();
        $professionalDetails = ProfessionalDetail::with(['category', 'user'])->where('subcategory_id',$id)->get();
        // dd($professionalProfiles);
        return view('manso.shop',compact('professionalDetails','professionalProfiles') );

    }

    public function profile($id)
    {
        // dd($id);
        // $professionalProfiles = ProfessionalProfile::with(['user', 'media'])->get();
        $Profiles = ProfessionalProfile::with(['user', 'media'])->where('user_id',$id)->first();
        $Details = ProfessionalDetail::with(['category', 'user'])->where('user_id',$id)->first();
        // $professionalProfiles=$professionalProfiles[0];
        // dd($Profiles);
        // dd($Details);
        // dd($professionalDetails);

        $portfolios = Portfolio::with(['user', 'media'])->where('user_id',$id)->get();
        // dd($portfolios);
        return view('manso.profile',compact('Profiles','Details','portfolios'));
    }

    public function landingpage()
    {
        // $ideaCategories = IdeaCategory::with(['media'])->get();
        // $ideaStyles = IdeaStyle::all();
        // $ideas=Idea::with(['category','style','media'])->get();
        // dd($ideas);
        return view('manso.landingpage');
    }

    public function form()
    {
        // $ideaCategories = IdeaCategory::with(['media'])->get();
        // $ideaStyles = IdeaStyle::all();
        // $ideas=Idea::with(['category','style','media'])->get();
        // dd($ideas);
        return view('manso.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function shopping()
    {
        
        $productSubCategories = ProductSubCategory::with(['category'])->get();
        $productCategories = ProductCategory::with(['media'])->get();
        $products = Product::with(['category', 'sub_category', 'media'])->get();
        // dd($products);
        $data_cat = DB::select('SELECT GROUP_CONCAT(DISTINCT(product_categories.id)) AS cat_id,
        GROUP_CONCAT(product_sub_categories.id) AS sub_cat_id,
        GROUP_CONCAT(product_sub_categories.name) AS sub_cat_name,
        GROUP_CONCAT(DISTINCT(product_categories.name)) AS cat_name
        FROM product_categories
        INNER JOIN product_sub_categories ON product_categories.id=product_sub_categories.category_id
        GROUP BY product_categories.id');
        return view('manso.shoping',compact('products','productSubCategories','productCategories','data_cat'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
