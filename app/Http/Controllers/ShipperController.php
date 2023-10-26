<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipper;

class ShipperController extends Controller
{
    public function index()
    {
        $shippers = Shipper::all();
        $isOrder = "";
        $isShipper = "active";
        return view('ship.shipper.index', compact('shippers','isOrder', 'isShipper'));
    }

    public function add()
    {
        $isOrder = "";
        $isShipper = "active";
        return view('ship.shipper.create',compact('isOrder', 'isShipper'));
    }

    public function store(Request $request)
    {
        $product = new Shipper();
        $product->id = rand(11111, 99999);
        $product->name = $request->name;
        $product->phone = $request->phone;
        $product->email = $request->email;
        $product->address = $request->address;
        $new_name = "";
        if ($file = $request->file('image')) {
            $path = "Uploads/";
            $name_file = $file->getClientOriginalName();
            $new_name = current(explode('.', $name_file)) . rand(0, 100) . '.' . $file->getClientOriginalExtension();
            $file->move($path, $new_name);
        }
        $product->image = $new_name;
        $product->save();
        
        return redirect()->route('ship.shiper.index');
    }

    public function edit($id)
    {
        $shipper_edit = Shipper::find($id);
        $isOrder = "";
        $isShipper = "active";
        return view('ship.shipper.create', compact("shipper_edit",'isOrder', 'isShipper'));
    }

    public function update(Request $request, $id)
    {
        $shipper_edit = Shipper::find($id);
        $shipper_edit->name = isset($request->name) ? $request->name : $shipper_edit->name;
        $shipper_edit->phone = isset($request->phone) ? $request->phone : $shipper_edit->phone;
        $shipper_edit->email = isset($request->email) ? $request->email : $shipper_edit->email;
        $shipper_edit->address = isset($request->address) ? $request->address : $shipper_edit->address;
        $new_name = $shipper_edit->image;
        // Image()()()
        if ($file = $request->file('image')) {
            //Xoa old Image
            $path_file_old = public_path() . '\Uploads/' . $shipper_edit->image;
            if (file_exists($path_file_old)) {
                unlink($path_file_old);
            }

            // Cap nhat new Image
            $path = "Uploads/";
            $name_file = $file->getClientOriginalName();
            $new_name = current(explode('.', $name_file)) . rand(0, 100) . '.' . $file->getClientOriginalExtension();
            $file->move($path, $new_name);
        }
        $shipper_edit->image = $new_name;
        $shipper_edit->save();
        
        return redirect()->route('ship.shiper.index');
    }
}
