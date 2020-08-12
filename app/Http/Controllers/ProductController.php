<?php

namespace App\Http\Controllers;

use App\Picture;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function marketer()
    {
        //
        $categories = Category::get();

        $products = Product::with(['picture','category'])->where('users_id', Auth::user()->id)->paginate(10);
        return view('marketers.product', compact(['products','categories']));
    }

    public function admin()
    {
        //
        $categories = Category::get();
        $products = Product::with(['picture','category'])->where('users_id', Auth::user()->id)->paginate(10);
        return view('admin.product', compact(['products','categories']));
    }

    public function product()
    {
        //
        $products = Product::with(['picture','category'])->where('users_id', Auth::user()->id)->get();
        return view('pages', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminProduct(AdminProductRequest $request)
    {
        $file= $request->file('image');
        $extension = array('jpg','JPG','png','PNG','gif','GIF','JPEG','jpeg');
        $file_extension = $file->getClientOriginalExtension();
        if(! in_array($file_extension, $extension)){
           return redirect()->back()->with('typeerror', "Invalid image");
        }

        function createRandomPasswords() {
           $chars = "0123456789012345678901234567890123456789";
           srand((double)microtime()*1000000);
           $i = 0;
           $pass = '' ;
           while ($i <= 5) {

               $num = rand() % 33;

               $tmp = substr($chars, $num, 1);

               $pass = $pass . $tmp;

               $i++;

           }
           return $pass;
       }

    $product = new Product();
        if($file = $request->file('image'))
        {
            $file_name = str_replace(" ", "_", time().$file->getClientOriginalName());

            $file->move('asset/images', $file_name );
            $photo = new Picture();
            $photo->file = $file_name;
            $photo->save();
           $product->picture_id = $photo->id;
        }

        $product->product_name =$request->input('name');
        $product->category_id =$request->input('category');
        $product->oldprice =$request->input('oldprice');
        $product->newprice =$request->input('newprice');
        $product->quantity =$request->input('quantity');
        $product->location =$request->input('location');
        $product->description =$request->input('description');
        $slug = $request->input('name').'-'. $request->input('category').'-N'.$request->input('newprice').'-'.$request->input('location').'-'. createRandomPasswords();
       $product->slug =$slug;
        $product->user_browser= $_SERVER['HTTP_USER_AGENT'];
          $product->user_ipaddress=$_SERVER['REMOTE_ADDR'];
          $product->users_id=Auth::user()->id;
       //   Product::create($product);
        $product->save();
        return redirect()->back()->with('success', "New product add successfully");


    }

    public function marketerProduct(Request $request)
    {
        //
        $request->validate([
            'name' =>'required|string',
            'category' => 'required|string',
            'oldprice' => 'required|numeric',
            'newprice' => 'required|numeric',
            'location' => 'required|string',
            'quantity' =>'required|numeric',
            'description' => 'required|string|min:10',
            'image' => 'required',
            // 'image'=>'mimes:png,jpg, png, jpeg, gif, JPG, PNG, JPEG, GIF',

        ]);

        function createRandomPassword() {
           $chars = "0123456789012345678901234567890123456789";
           srand((double)microtime()*1000000);
           $i = 0;
           $pass = '' ;
           while ($i <= 5) {

               $num = rand() % 33;

               $tmp = substr($chars, $num, 1);

               $pass = $pass . $tmp;

               $i++;

           }
           return $pass;
       }

        $product = new Product();
        $product->product_name =$request->input('name');
        $product->category_id =$request->input('category');
        $product->oldprice =$request->input('oldprice');
        $product->newprice =$request->input('newprice');
        $product->quantity =$request->input('quantity');
        $product->location =$request->input('location');
        $product->description =$request->input('description');
        $file_name = "";
        if($file = $request->file('image'))
        {
            $file_name=str_replace(" ", "_", time().$file->getClientOriginalName());
            $file->move('asset/images', $file_name );
            $photo = new Picture();
            $photo->file = $file_name;
            $photo->save();
           $product->picture_id = $photo->id;
        }
        $slug = $request->input('name').'-'. $request->input('category').'-N'.$request->input('newprice').'-'.$request->input('location').'-'. createRandomPassword();
       $product->slug =$slug;
        $product->user_browser= $_SERVER['HTTP_USER_AGENT'];
          $product->user_ipaddress=$_SERVER['REMOTE_ADDR'];
          $product->users_id=Auth::user()->id;
       //   Product::create($product);
        $product->save();
        return redirect()->back()->with('success', "New product add successfully");


    }

    public function viewproduct(Request $request){
        $id = $request->input('view');
        $views = Product::with(['picture','category'])->where('id', $id)->get();
        foreach($views as $view){
        $display ='
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">'.$view->product_name.'</h2>
             <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">Close</span>
             </button>
            </div>
      <div class="modal-body">

<div class="row">
    <div class="col-md-4 col-lg-4">
        <img src="../'.$view->picture->file.'" id="image" width="200px" class="img-fluid">
    </div>
  <!----- //Picture -->
  <div class="col-lg-4 col-md-4">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>'. $view->product_name .'</h3>
        <p>Product Name</p>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4">
    <div class="small-box bg-info">
      <div class="inner">
        <h3>'. $view->category->category .'</h3>
        <p>Product Category</p>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-4">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3 ><span class="fa">&#8358;</span>'. $view->oldprice .'</h3>
            <p>Product Old Price</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3 ><span class="fa">&#8358;</span>'. $view->newprice .'</h3>
            <p>Product New Price</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3 >'. $view->quantity .'</h3>
            <p>Available Quantity</p>
          </div>
        </div>
      </div>
</div>

<div class="row">
    <div class="col-lg-5 col-md-5">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h4 >Marketer Location</h4>
            <p>'. $view->location .'</p>
          </div>
        </div>
      </div>
      <div class="col-lg-7 col-md-7">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3 >Description</h3>
            <p>'. $view->description .'</p>
          </div>
        </div>
      </div>
</div>
</div>

</div>
      </div>

    </div>';
        }

        return $display;

    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
