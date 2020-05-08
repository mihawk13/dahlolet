<?php
namespace App;
 
use Illuminate\Support\Facades\Auth;
use App\Cart;


 
class Helpers {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */

    

    public static function getJmlPesanan() {
        $jml = Cart::where('id_user', Auth::user()->id)->where('qty', '>', 0)->get();
        $qty = 0;
        foreach ($jml as $item) {
            $qty += $item->qty;
        }
        return $qty;
    }

    // public static function getJmlPendaftarKegiatan($idkeg) {
    //     $jml = Peserta_Kegiatan::where('ID_Kegiatan', $idkeg)->count();
    //     return $jml;
    // }

    // public static function getJmlPesertaBaru()
    // {
    //     $id = Auth::user()->id;
    //     $kegAktif = Kegiatan::where('ID_User', $id)->where('Batas_Pendaftaran', '>', date('Y-m-d'))->first();
    //     $baru = Peserta_Kegiatan::where('Status', 'Menunggu Validasi')->where('ID_Kegiatan', $kegAktif['ID_Kegiatan'])->count();
    //     return $baru;
    // }

    // public static function getJmlSertBaruDosen()
    // {
    //     $id = Auth::user()->id;
    //     $belum = DB::table('sertifikat As a')
    //         ->join('mahasiswa As b', 'a.NIM', '=', 'b.NIM')
    //         ->where('b.PA', $id)->where('a.Status_Dosen', 'Menunggu Validasi')->count();
    //     return $belum;
    // }

    // public static function getJmlSertBaruKmh()
    // {
    //     $belum = DB::table('sertifikat')->where('Status_Kmh', 'Menunggu Validasi')->count();
    //     return $belum;
    // }

    // public static function getJmlSertBaruWakil()
    // {
    //     $belum = DB::table('sertifikat')->where('Status_Wakil', 'Menunggu Validasi')->count();
    //     return $belum;
    // }

    // public static function terdaftar($idkeg)
    // {
    //     $nim = Auth::user()->username;
    //     $status = Peserta_Kegiatan::where('ID_Kegiatan', $idkeg)->where('NIM', $nim)->count();
    //     return $status;
    // }
}