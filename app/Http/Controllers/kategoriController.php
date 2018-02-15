<?php

namespace App\Http\Controllers;

use App\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class kategoriController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('rule:admin');
    }
    public function getKategori()
    {
      // $kategori=new kategori();
      $category=DB::table('kategori')->get();
      // dd($category);
      return view('admin.kategori.kategori',['kategori'=>$category]);
    }

    public function addKategori()
    {
      $namaK=Input::get('nama_kategori');

      $kategori=new kategori();
      $kategori->nama_kategori=$namaK;
      $kategori->save();
      $id=DB::table('kategori')->select('id_kategori')->where('nama_kategori','=',$namaK)->get();
      $kategoris=DB::table('kategori')->where('id_kategori','=',$id[0]->id_kategori)->update(['link_kategori'=>'/kategori/'.$id[0]->id_kategori]);

      return redirect('admin/kategori');
    }

    public function editKategori()
    {
      $id=Input::get('id');
      $nama=Input::get('nama');
      $update=DB::table('kategori')->where('id_kategori','=',$id)
              ->update(['nama_kategori'=>$nama]);
      return redirect('admin/kategori');
    }

    public function deleteKategori($id)
    {
      $data['id']=$id;
      DB::table('kategori')->where('id_kategori','=',$data['id'])->delete();
      return redirect('admin/kategori');

    }
}
