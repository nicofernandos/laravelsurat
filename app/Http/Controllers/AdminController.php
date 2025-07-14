<?php

namespace App\Http\Controllers;

use Svg\Tag\Rect;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Session\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
       $kategori = Kategori::withCount('surat')->get();
        if (session('users')->level == 'Admin' || session('users')->level == 'Arsiparis' || session('users')->level == 'Kasubbag Tatausaha' || session('users')->level == 'Kepala Biro') {
            $data = [
                'title' => 'Selamat Datang Di',
                'kategori' => $kategori,
            ];
        }
        return view('admin/dashboard', $data);
    }



    public function kategori(){
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $key = Kategori::all();
        $data = [
            'title' => 'Halaman Kategori',
            'kunci' => $key,
        ];
        return view('admin/kategori', $data);   
    }

    public function tambahkategori(Request $request){
        if(empty(session('users'))){
            session()->flash('erros', 'Harap Login Terlebih dahulu');
            return redirect('loginakun');
        }

        $data = [
            'title' => 'Tambah Kategori',
        ];
        return view('admin.tambahkategori', $data);
    }

    public function tambahkategorisimpan(Request $request){  
            $request->validate([
                'judulkategori' => 'required|string',
            ]);

            Kategori::create([
                'judulkategori' => $request->judulkategori,
            ]);

            return redirect('panel/kategori')->with('success','Berhasil menambahkan Kategori');
        }

        public function editkategori($id) {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }

        $value = Kategori::findOrFail($id);
        
        $data = [
            'title' => 'Edit Kategori',
            'key' => $value, 
        ];

        return view('admin/editkategori', $data);
    }

    public function editkategorisimpan(Request $request, $id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $request->validate([
            'judulkategori' => 'required|string|max:255',
        ]);
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'judulkategori' => $request->judulkategori,
        ]);
        return redirect('panel/kategori')->with('success', 'Data kategori berhasil diperbarui');
    }

    public function hapuskategori($id){
    if (empty(session('users'))) {
    session()->flash('error', 'Harap login terlebih dahulu');
    return redirect('loginakun');
    }
    $kategori = Kategori::findOrFail($id);
    $kategori -> delete();
    return redirect('panel/kategori');
    }

    public function surat() 
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $key = Surat::with('kategori')->get();
        $data = [
            'title' => 'Halaman Surat',
            'kunci' => $key,
        ];
        return view('admin/surat', $data);   
    }

    public function tambahsurat()
    {
         if(empty(session('users'))){
            session()->flash('erros', 'Harap Login Terlebih dahulu');
            return redirect('loginakun');
        }

        $kategori = Kategori::all();

        $ambilId = Surat::orderBy('idsurat','desc')->first();
        $idBerikutnya = $ambilId ? $ambilId->idsurat + 1 : 1;

        $url = url('panel.detailsurat/'. $idBerikutnya);
        $qrtemp = \QrCode::format('svg')->size(200)->generate($url);

        $data = [
            'value' => $kategori,
            'title' => 'Tambah Surat',
            'qr' => $qrtemp,
        ];
        return view('admin.tambahsurat', $data);

    }

    public function tambahsuratsimpan(Request $request)
    {
        if (empty(session('users'))){
            session()->flash('error','Silahkan Login terlebih dahulu!');
            return redirect('loginakun');
        }

        $request->validate([
            'idkategori' => 'required|exists:kategoris,id',
            'nosurat' => 'required|string|max:255',
            'dari' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'judulsurat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsisurat' => 'required|string',
            'file' => 'required|mimes:pdf|max:2408',
            'namattd' => 'required|string|max:255',
            'fotottd' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2408',
        ]);

        $filesurat = $request->file('file')->store('surat','public');
        $fotoTTD = $request->file('fotottd')->store('ttd','public');

        $surat = Surat::create([
            'idkategori' => $request->idkategori,
            'nosurat' => $request->nosurat,
            'dari' => $request->dari,
            'tujuan' => $request->tujuan,
            'judulsurat' => $request->judulsurat,
            'tanggal'    => $request->tanggal,
            'deskripsisurat' => $request->deskripsisurat,
            'file' => $filesurat,
            'namattd' => $request->namattd,
            'fotottd' => $fotoTTD,
        ]);

        $path = 'qrcode/qrcode-' . $surat->idsurat . '.png';
        $url = url('panel/detailsurat/' . $surat->idsurat);
        $qrcode = \QrCode::format('svg')->size(200)->generate($url);
        Storage::disk('public')->put($path, $qrcode);
        
        $surat->qrcode = $path;
        $surat->save();

       return redirect('panel/suratkategori/' . $surat->idkategori)
       ->with('success', 'Surat berhasil ditambahkan.');

    }

    public function hapussurat($id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }

        $surat = Surat::findOrFail($id);
        if ($surat->file && \Storage::disk('public')->exists($surat->file)) {
            \Storage::disk('public')->delete($surat->file);
        }

        if ($surat->fotottd && \Storage::disk('public')->exists($surat->fotottd)) {
            \Storage::disk('public')->delete($surat->fotottd);
        }

        $surat->delete();

        return redirect('panel/suratkategori/' . $surat->idkategori)
       ->with('success', 'Surat berhasil dihapus.');
    }


    public function editsurat($id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Silakan login terlebih dahulu!');
            return redirect('loginakun');
        }

        $surat = Surat::findOrFail($id);
        $kategori = Kategori::all();

        return view('admin.editsurat', [
            'title' => 'Edit Surat',
            'surat' => $surat,
            'value' => $kategori
        ]);
    }

    public function editsuratsimpan(Request $request, $id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Silahkan Login terlebih dahulu!');
            return redirect('loginakun');
        }

        $request->validate([
            'idkategori' => 'required|exists:kategoris,id',
            'nosurat' => 'required|string|max:255',
            'dari' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'judulsurat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsisurat' => 'required|string',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2408',
            'namattd' => 'required|string|max:255',
            'fotottd' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2408',
        ]);

        $surat = \App\Models\Surat::findOrFail($id);

        if ($request->hasFile('file')) {
            $fileSurat = $request->file('file')->store('surat', 'public');
            $surat->file = $fileSurat;
        }

        if ($request->hasFile('fotottd')) {
            $fotoTTD = $request->file('fotottd')->store('ttd', 'public');
            $surat->fotottd = $fotoTTD;
        }

        // Update data surat
        $surat->idkategori = $request->idkategori;
        $surat->nosurat = $request->nosurat;
        $surat->dari = $request->dari;
        $surat->tujuan = $request->tujuan;
        $surat->judulsurat = $request->judulsurat;
        $surat->tanggal = $request->tanggal;
        $surat->deskripsisurat = $request->deskripsisurat;
        $surat->namattd = $request->namattd;
        $surat->save();

       return redirect('panel/suratkategori/' . $surat->idkategori)
       ->with('success', 'Surat berhasil di edit. !');
    }

    public function suratkategori($idkategori)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $kategori = Kategori::findOrFail($idkategori);
        $surat = Surat::where('idkategori', $idkategori)->get();

        $data = [
            'title' => 'Surat Kategori: ' . $kategori->judulkategori,
            'kategori' => $kategori,
            'surats' => $surat
        ];

        return view('admin.suratkategori', $data);
    }

    public function detailsurat($id)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Silahkan login terlebih dahulu!');
            return redirect('loginakun');
        }

        $surat = Surat::with('kategori')->findOrFail($id);

        $url = url('panel/detailsurat/' . $surat->idsurat);
        $qr = QrCodeGenerator::size(200)->generate($url);

        $data = [
            'title' => 'Detail Surat',
            'surat' => $surat,
            'qr' => $qr,
        ];

        return view('admin.detailsurat', $data);
    }

    public function cetaksurat($id){
        if (empty(session('users'))){
            session()->flash('error','Silahkan login terlebih dahulu!');
            return redirect('loginakun');
        }

        $row = Surat::with('kategori')->findOrFail($id);
        return view('admin.cetaksurat', compact('row'));


    }


    public function ceklogin()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
    }

    // Profil
    public function profil()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $id = session('users')->idusers;
        $row = DB::table('users')->where('idusers', $id)->first();
        $data = [
            'title' => 'Profil',
            'row' => $row,
        ];
        return view('admin/profil', $data);
    }
    public function profiledit()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $id = session('users')->idusers;
        $row = DB::table('users')->where('idusers', $id)->first();
        $data = [
            'title' => 'Edit Profile',
            'row' => $row,
        ];
        return view('admin/profiledit', $data);
    }
    public function profileditsimpan(Request $request)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $id = session('users')->idusers;
        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        DB::table('users')->where('idusers', $id)->update($data);
        session()->flash('success', 'Data berhasil diedit!');
        return redirect('panel/profil');
    }
    public function login()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $data = [
            'title' => 'Login',
        ];
        return view('login', $data);
    }
    public function logincek(Request $request)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $email = $request->input('email');
        $password = $request->input('password');
        $akun = DB::table('users')
            ->where('email', $email)
            ->where('password', $password)
            ->first();
        if ($akun) {
            session(['users' => $akun]);
            return redirect('panel/dashboard')->with('success', 'Login berhasil');
        } else {
            return redirect()->back()->with('success', 'Anda gagal login, Email atau password salah');
        }
    }


    public function logout()
    {
        session()->flush();
        return redirect('/loginakun');
    }
}