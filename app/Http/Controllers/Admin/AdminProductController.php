<?php

namespace App\Http\Controllers\Admin;

use App\Models\Picture;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductUpdate;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Http\Requests\AdminProductRequest;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function product()
    {
        //
        $products = Product::with(['picture', 'category'])->orderBy('id', 'DESC')->where('users_id', Auth::user()->id)->get();
        return view('pages', compact('products'));
    }

    public function allproduct()
    {
        //
         //
         $categories = Category::get();
         $products = Product::with(['picture', 'category','user'])->orderBy('id', 'DESC')->paginate(10);
         return view('admin.allproducts', compact(['products', 'categories']));
    }

    public function adminproductpage()
    {
        //
        $categories = Category::get();
        $products = Product::with(['picture', 'category'])->orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->paginate(10);
        return view('admin.adminproduct', compact(['products', 'categories']));
    }
    public function viewproduct(Request $request)
    {
        $id = $request->input('view');
        $view = Product::with(['picture', 'category'])->where('id', $id)->firstOrfail();
        return view('admin.viewproduct', compact(['view']));
    }

    public function vieweditproduct(Request $request)
    {
        $id = $request->input('edit');
        $categories = Category::get();
        $edit = Product::with(['picture', 'category'])->where('id', $id)->firstOrFail();
        return view('admin.vieweditproduct', compact(['id','categories','edit']));
        //
    }


    public function viewdeleteproduct(Request $request){
        $id = $request->input('delete');

        $delete = Product::with(['picture', 'category'])->where('id', $id)->firstOrFail();

        return view('admin.viewdelete', compact(['delete','id']));

    }
    public function index()
    {
        //
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AdminProductRequest $request)
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminProductRequest $request)
    {
        //

        $file = $request->file('image');
        $extension = array('jpg', 'JPG', 'png', 'PNG', 'gif', 'GIF', 'JPEG', 'jpeg');
        $file_extension = $file->getClientOriginalExtension();
        if (!in_array($file_extension, $extension)) {
            return redirect()->back()->with('typeerror', "Invalid image");
        }

        function createRandomPasswords()
        {
            $chars = "0123456789012345678901234567890123456789";
            srand((float)microtime() * 1000000);
            $i = 0;
            $pass = '';
            while ($i <= 5) {

                $num = rand() % 33;

                $tmp = substr($chars, $num, 1);

                $pass = $pass . $tmp;

                $i++;
            }
            return $pass;
        }

        $product = new Product();
        if ($file = $request->file('image')) {
            $setting = Setting::with(['picture'])->where('id', 1)->firstOrFail();
            $files = Image::make($file);
            $imagepath = public_path().'/asset/images/';

       $files->resize(320,300);
       $watermark = public_path()."/asset/design/design.png";
       $files->insert($watermark,  'bottom-right');
      $files->text($setting->company,150,150, function($text){
          $text->color('#00ff00');
          $text->file(4);
          $text->size(30);
          $text->align('center');
      });
       $files->save($imagepath.str_replace(" ", "_",time().$file->getClientOriginalName()));

         $file_name = str_replace(" ", "_", time() . $file->getClientOriginalName());

            // $file->move('asset/images', $file_name);
            $photo = new Picture();
            $photo->file = $file_name;
            $photo->save();
            $product->picture_id = $photo->id;
        }

        $product->product_name = $request->input('name');
        $product->category_id = $request->input('category');
        $product->oldprice = $request->input('oldprice');
        $product->newprice = $request->input('newprice');
        $product->quantity = $request->input('quantity');
        $product->location = $request->input('location');
        $product->description = $request->input('description');
        $slug = $request->input('name') . '-' . $request->input('category') . '-N' . $request->input('newprice') . '-' . $request->input('location') . '-' . createRandomPasswords();
        $product->slug = $slug;
        $product->user_browser = $_SERVER['HTTP_USER_AGENT'];
        $product->user_ipaddress = $_SERVER['REMOTE_ADDR'];
        $product->user_id = Auth::user()->id;
        //   Product::create($product);
        $product->save();
        return redirect()->back()->with('success', "New product add successfully");



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
    public function update(ProductUpdate $request, $id)
    {

        // $product= $request->all();
        $products = Product::with(['picture', 'category'])->where('id', $id)->first();
        // foreach ($products as $product) {
            # code...

        if($request->file('image')){
            $file_delete=Picture::findOrfail($products->picture->id);
            $file_delete->forceDelete();
            unlink(public_path()."/". $file_delete->file);
         }



            function createRandomPasswordss()
            {
                $chars = "0123456789012345678901234567890123456789";
                srand((float)microtime() * 1000000);
                $i = 0;
                $pass = '';
                while ($i <= 5) {

                    $num = rand() % 33;

                    $tmp = substr($chars, $num, 1);

                    $pass = $pass . $tmp;

                    $i++;
                }
                return $pass;
            }
            $product = Product::findOrfail($id);
            if ($file = $request->file('image')) {
    // get the validity of image
                $file = $request->file('image');
                $extension = array('jpg', 'JPG', 'png', 'PNG', 'gif', 'GIF', 'JPEG', 'jpeg');
                $file_extension = $file->getClientOriginalExtension();
                if (!in_array($file_extension, $extension)) {
                    return redirect()->back()->with('typeerror', "This must be of Image of type JPG, PNG, GIF etc.");
                }
                // save the image

        //         $setting = Setting::with(['picture'])->where('id', $id)->firstOrFail();
        //         $files = Image::make($file);
        //         $imagepath = public_path().'/asset/images/';


        //    $files->resize(320,300);
        //    $watermark = public_path()."/asset/design/design.png";
        //    $files->insert($watermark,  'bottom-right');
        //   $files->text($setting->company,150,150, function($text){
        //       $text->color('#00ff00');
        //       $text->file(4);
        //       $text->size(30);
        //       $text->align('center');
        //   });
        //    $files->save($imagepath.str_replace(" ", "_",time()."_".$file->getClientOriginalName()));

                // $file_name = str_replace(" ", "_", time() . $file->getClientOriginalName());
                // $file->move('asset/images', $file_name);
                $setting = Setting::with(['picture'])->where('id', 1)->firstOrFail();
                $files = Image::make($file);
                $imagepath = public_path().'/asset/images/';

           $files->resize(320,300);
           $watermark = public_path()."/asset/design/design.png";
           $files->insert($watermark,  'bottom-right');
          $files->text($setting->company,150,150, function($text){
              $text->color('#00ff00');
              $text->file(4);
              $text->size(30);
              $text->align('center');
          });
           $files->save($imagepath.str_replace(" ", "_",time().$file->getClientOriginalName()));

             $file_name = str_replace(" ", "_", time() . $file->getClientOriginalName());

                $photo = new Picture();
                $photo->file = $file_name;
                $photo->save();
                $product->picture_id = $photo->id;

            }

        $product->product_name = $request->input('name');
        $product->category_id = $request->input('category');
        $product->oldprice = $request->input('oldprice');
        $product->newprice = $request->input('newprice');
        $product->quantity = $request->input('quantity');
        $product->location = $request->input('location');
        $product->description = $request->input('description');
        $slug = $request->input('name') . '-' . $request->input('category') . '-N' . $request->input('newprice') . '-' . $request->input('location') . '-' . createRandomPasswordss();
        $product->slug = $slug;
        $product->user_browser = $_SERVER['HTTP_USER_AGENT'];
        $product->user_ipaddress = $_SERVER['REMOTE_ADDR'];
        $product->user_id = Auth::user()->id;
        //   Product::create($product);
        // return print_r ($product->toArray) ;
        $product->update();
        // Product::findOrfail($id)->update($product);
        return redirect()->back()->with('success', 'product '. $product->product_name .' successfully update to '.$request->input('name'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $product = Product::with(['picture', 'category'])->where('id', $id)->firstOrFail();
        // return $products;
            # code...

        if($product->picture_id){
            $file_delete=Picture::findOrfail($product->picture->id);
            $file_delete->forceDelete();
            unlink(public_path()."/". $file_delete->file);
        }
        $delete=intval($id);
        Product::findOrfail($delete)->forceDelete();
        return redirect()->back()->with('success', 'The product('. $product->product_name .') has been  deleted successfully');
    }
}
