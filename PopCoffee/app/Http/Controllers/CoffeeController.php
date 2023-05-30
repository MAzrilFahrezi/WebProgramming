<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coffee;
use App\Models\transaksi;
use App\Models\customer;
use App\Models\detailpembelian;

class CoffeeController extends Controller
{
    public function index(){
        $this->authorize('view_coffee', coffee::class);

        $coffee = coffee::all();
        return view("coffee.index", compact('coffee'));
    }

    public function variant(){
        $coffee = coffee::all();
        return view("variant", compact('coffee'));
    }

    public function create(){
        $this->authorize('create_coffee', coffee::class);

        return view("coffee.create");
    }

    public function store(Request $request){
        $this->authorize('create_coffee', coffee::class);

        $validation = $request->validate([
            'nama' => 'required|min:5|max:50',
            'foto' => 'required|file|image|max:10000'
        ]);

        $ext = $request->foto->getClientOriginalExtension();
        $nama_file = "foto-".time().".".$ext;
        $path = $request->foto->storeAs("public", $nama_file);

        $coffee = new coffee();
        $coffee->nama = $request->nama;
        $coffee->kdCoffee = $request->kode;
        $coffee->foto = $nama_file;
        $coffee->harga = $request->harga;
        $coffee->stok = $request->stok;
        $coffee->save();

        $request->session()->flash("info", "Data coffee $request->nama berhasil disimpan!");
        return redirect()->route("coffee.create");
    }

    public function show(Request $request, $id){
        $coffee = coffee::find($id);
        return view("coffee.view", compact("coffee"));
    }

    public function edit(Request $request, $id){
        $this->authorize('update_coffee', coffee::class);

        $coffee = coffee::find($id);
        return view("coffee.edit", compact('coffee'));
    }

    public function update(Request $request, $id){
        $this->authorize('update_coffee', coffee::class);

        if ($request->hasFile('foto')) { 
            $validation = $request->validate([
                'nama' => 'required|min:5|max:20',
                'foto' => 'required|file|image|max:5000'
            ]);
        } else{
            $validation = $request->validate([
            'nama' => 'required|min:5|max:20'
            ]);
        }
       
        $coffee = coffee::find($id);
        $coffee->nama = $request->nama;
        $coffee->kdCoffee = $request->kode;
        $coffee->harga = $request->harga;
        $coffee->stok = $request->stok;
        
        if($request->foto){
            $ext = $request->foto->getClientOriginalExtension();  
            $nama_file = "foto-".time().".".$ext;
            $path = $request->foto->storeAs("public", $nama_file);
            $coffee->foto = ($request->hasFile("foto")) ? $nama_file : $coffee->foto;
        }
        
        $coffee->save();
        $request->session()->flash("info", "Data coffee $request->nama berhasil diganti!");
        return redirect()->route("coffee.edit", [$id]);
    }

    public function destroy(Request $request, $kdCoffee){
        $this->authorize('delete_coffee', coffee::class);

        $coffee = coffee::find($kdCoffee);
        if($coffee->kdCoffee){
            $coffee->delete();
        }

        $request->session()->flash("info", "Data coffee $request->nama berhasil dihapus!");
        return redirect()->route("coffee.index");
    }

    public function cart()
    {
        $transaksi = null;
        $themp = transaksi::latest("id")->first();
        
        if($themp != null) {
            $transaksi = $themp;
        } else {
            $transaksi = transaksi::firstOrCreate(
                ["id" => 1],
                ["tanggal" => date("Y-m-d")]
            );
        }
        return view('transaksi.index', compact("transaksi"));
    }
 
    public function addToCart($id)
    {
        $coffee = coffee::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $coffee->nama,
                "quantity" => 1,
                "price" => $coffee->harga,
                "image" => $coffee->foto
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('info', 'Produk telah berhasil ditambah!');
    }
  
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Produk telah berhasil diganti!');
        }
    }
  
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Produk telah berhasil dihapus!');
        }
    }

    public function tes(Request $request)
    {
        $themp = transaksi::latest('id')->first();
        $id2 = $themp->id;
        $themp->tanggal = date('Y-m-d');
        $themp->save();

        $transaksi = new transaksi();
        $transaksi->id = $themp->id + 1;
        $transaksi->save();

        $total = 0;
        foreach(session('cart') as $id => $details) {
            $total += $details['price'] * $details['quantity'];
            $detailpembelian = new detailpembelian();
            $coffee = coffee::where('nama', $details['name'])->first();
            $coffee->decrement('stok', $details['quantity']);
            $kodeCoffee = $coffee->kdCoffee;
            $detailpembelian->kdCoffee = $kodeCoffee;
            $detailpembelian->kdTransaksi = $id2;
            $detailpembelian->jumlahPembelian = $details['quantity'];
            $detailpembelian->save();
        }

        $request->session()->forget('cart');

        return redirect()->route('detailpembelian.index', [$id2]);
    }
}
