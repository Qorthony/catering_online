<?php

namespace App\Http\Controllers;

use App\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Query\Builder;

class produkController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('rule:admin');
    }

    public function getProduk()
    {

      $products =DB::table('produk')->join('kategori','kategori.id_kategori','=','produk.id_kategori')->select('produk.*','kategori.*')->orderBy('id_produk','desc')->get();
      $kategoris=DB::table('kategori')->get();
      // dd($products);
      return view('admin.produk.produk',['products'=>$products,'kategoris'=>$kategoris]);
    }

    public function deleteProduk($id)
    {
      $data['id']=$id;
      DB::table('produk')->where('id_produk','=',$data['id'])->delete();
      return redirect('admin/produk');
    }

    public function editProduk()
    {

      $id=Input::get('id');
      $nama=Input::get('nama');
      $harga=Input::get('harga');
      $kategori=Input::get('kategori');
      $desc=Input::get('desc');
      if(Input::hasFile('file')){
       $file = Input::file('file');
       $file->move('uploads', $file->getClientOriginalName());
       $gambar="uploads/".$file->getClientOriginalName();
        // dd($produk);
        $update=DB::table('produk')->where('id_produk','=',$id)
                ->update(['nama_produk'=>$nama,'harga'=>$harga,'id_kategori'=>$kategori,'description'=>$desc,'gambar'=>$gambar]);
        return redirect('admin/produk');
        }
      $update=DB::table('produk')->where('id_produk','=',$id)
              ->update(['nama_produk'=>$nama,'harga'=>$harga,'id_kategori'=>$kategori,'description'=>$desc]);
      return redirect('admin/produk');
    }

    public function addProduk()
    {
      $rules=['nama'=>'required','harga'=>'required','desc'=>'required'];

      $validasi=Validator::make(Input::only('nama','harga','desc'),$rules);

      if ($validasi->passes()) {
        $produk= new produk();
        $produk->id_kategori=Input::get('kategori');
        $produk->nama_produk=Input::get('nama');
        $produk->harga=Input::get('harga');
        $produk->description=Input::get('desc');
        if(Input::hasFile('file')){
        //
			  //      echo 'Uploaded';
			   $file = Input::file('file');
			   $file->move('uploads', $file->getClientOriginalName());
         $produk->gambar="uploads/".$file->getClientOriginalName();
			    //             echo '';
          // dd($produk);
          $produk->save();

          return redirect('admin/produk');
		      }
        // dd($produk);
        $produk->save();

        return redirect('admin/produk');
      }
      else {
        return redirect('admin/produk');
      }

    }
}
