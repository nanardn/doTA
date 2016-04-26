<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\foto_profile;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{

	// public function getFotoprofile($id_user){
	//     $foto_profile  = foto_profile::find($id_user);
	//     return view('dashboard.dashboard-pengaturan')->withFoto_profile($foto_profile);
	// }

	// public function getFotoprofile($id_user){	    
	// 	$fotoprofile = DB::table('foto_profile')->where('id_user', '=', $id_user)->get();
 //    	return view('dashboard.dashboard-pengaturan')->withFotoprofile($fotoprofile);
	// }

    public function uploadfoto(Request $request){

                if(Input::hasFile('filefoto')){

                        $postprofile = $request->all();

                        $filefoto = Input::file('filefoto');
                        $filefoto->move('dashboard/images/fotoprofile', $filefoto->getClientOriginalName());
                        $namafilefoto = $filefoto->getClientOriginalName();

                        $datatransaksiGambar = array(
                                'id_user'      => $postprofile['id_usergambar'], 
                                'url_foto'     => $namafilefoto, 
                            );

                        $bukti_transaksiDonasi = DB::table('users')->where('id', $postprofile['id_usergambar'])->update(['url_foto' => $namafilefoto]);

                        //$bukti_transaksiDonasi = DB::table('foto_profile')->insert($datatransaksiGambar);

                    	return redirect('dashboard/pengaturan');

                }

        }


}
