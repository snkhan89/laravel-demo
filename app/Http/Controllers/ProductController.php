<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::select('products.*','categories.name as cat_name')
                ->join("categories","categories.id","=","products.category_id")
                ->paginate(15);
        return view('product/index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_data = Category::get();
        //dd($cat_data);
        return view('product/create',compact('cat_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:products',
            'category_id' => 'required',
            'image'         =>  'required|image|max:2048',
            'description'   => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);

        if ($validator->fails()) {
            return redirect('product/create')
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('image');

        $new_name = $request->title.'_'.rand().time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $new_name);

        $form_data = array(
            'title'            => $request->title,
            'category_id'      => $request->category_id,
            'description'      => $request->description,
            'image'            => $new_name,
            'price'            => $request->price,
            'status'          => 1,
            'created_by'      => Auth::user()->id,
            'created_at'      => Carbon::now()
        );

        Product::create($form_data);

        return redirect('product')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::findOrFail($id);
        return view('product/view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::findOrFail($id);
        $cat_data = Category::get();
        return view('product/edit', compact('data','cat_data'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
//        dd($image);
        if($image != '')
        {
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:products,title,'.$id,
                'category_id' => 'required',
//                'image'         =>  'required|image|max:2048',
                'description'   => 'required',
                'price' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            ]);

            $image_name = $request->title.'_'.rand().time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $image_name);
        }
        else
        {
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:products,title,'.$id,
                'category_id' => 'required',
                'description'   => 'required',
                'price' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            ]);
        }


//        dd($validator->fails());

        if ($validator->fails()) {
            return redirect('product/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $form_data = array(
            'title'            => $request->title,
            'category_id'      => $request->category_id,
            'description'      => $request->description,
            'image'            => $image_name,
            'price'            => $request->price,
            'updated_by'      => Auth::user()->id,
            'updated_at'      => Carbon::now()
        );

        Product::whereId($id)->update($form_data);

        return redirect('product')->with('success', 'Data is successfully updated');
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
