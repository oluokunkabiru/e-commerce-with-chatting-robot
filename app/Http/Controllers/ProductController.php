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
