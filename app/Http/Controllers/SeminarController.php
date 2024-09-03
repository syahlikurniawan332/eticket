<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seminar;
use App\Models\DetailSeminar;

class SeminarController extends Controller
{
    public function index()
    {
        $seminars = Seminar::paginate(6);
        return view('dashboard.seminarM', compact('seminars'));
    }

    public function create()
    {
        return view('dashboard.seminars.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            // Validasi yang ada
            'foto_seminar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_ruangan.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengambil data dari request, kecuali file gambar
        $data = $request->except(['foto_seminar', 'foto_ruangan']);

        // Menangani upload gambar seminar
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $data['img'] = $imageName;
        }

        // Membuat seminar
        $seminar = Seminar::create($data);

        // Menangani data detail seminar
        $detailData = [
            'seminar_id' => $seminar->id,
            'nama_mc' => $request->input('nama_mc'),
            'bio_mc' => $request->input('bio_mc'),
            'keuntungan' => $request->input('keuntungan'),
            'info_tambahan' => $request->input('info_tambahan'),
            'waktu_mulai' => $request->input('waktu_mulai'),
            'waktu_berakhir' => $request->input('waktu_berakhir'),
            'foto_seminar' => $this->handleMultipleFileUpload($request->file('foto_seminar')),
            'foto_ruangan' => $this->handleMultipleFileUpload($request->file('foto_ruangan')),
        ];

        DetailSeminar::create($detailData);

        return redirect()->route('dashboard.seminarM')->with('status', 'Seminar created successfully!');
    }

    protected function handleMultipleFileUpload($files)
    {
        $filePaths = [];

        if ($files) {
            foreach ($files as $file) {
                $fileName = time() . '_' . uniqid() . '.' . $file->extension();
                $file->move(public_path('images'), $fileName);
                $filePaths[] = $fileName;
            }
        }

        // Mengembalikan string JSON dari array file paths
        return json_encode($filePaths);
    }

    public function edit($id)
    {
        // Ambil seminar dan detailnya
        $seminar = Seminar::with('detailSeminar')->findOrFail($id);

        // Pastikan detail seminar ada
        $detailSeminar = $seminar->detailSeminar;

        return view('dashboard.seminars.edit', compact('seminar', 'detailSeminar'));
    }

    public function update(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'description' => 'nullable',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048',
            'nama_mc' => 'nullable|string',
            'bio_mc' => 'nullable|string',
            'keuntungan' => 'nullable|array',
            'keuntungan.*' => 'string',
            'info_tambahan' => 'nullable|string',
            // 'waktu_mulai' => 'nullable|date_format:H:i',
            // 'waktu_berakhir' => 'nullable|date_format:H:i',
            'foto_seminar' => 'nullable|array',
            'foto_seminar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_ruangan' => 'nullable|array',
            'foto_ruangan.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Temukan seminar berdasarkan ID
        $seminar = Seminar::find($id);

        // Update data seminar
        $seminar->update($request->except(['foto_seminar', 'foto_ruangan']));

        // Temukan detail seminar
        $detail = DetailSeminar::where('seminar_id', $id)->first();

        // $detail->foto_seminar = json_decode($seminar->detailSeminar->foto_seminar, true);
        // $detail->foto_ruangan = json_decode($seminar->detailSeminar->foto_ruangan, true);

        if ($request->file('foto_seminar')) {
            $foto_seminar = $this->handleMultipleFileUpload($request->file('foto_seminar'));

            $detail->foto_seminar = $foto_seminar;
        }

        if ($request->file('foto_ruangan')) {
            $foto_ruangan = $this->handleMultipleFileUpload($request->file('foto_ruangan'));

            $detail->foto_ruangan = $foto_ruangan;
        }

        // dd($detail);

        // Siapkan data update dengan mempertahankan nilai lama jika tidak diubah
        $detailData = [
            'nama_mc' => $request->input('nama_mc', $detail->nama_mc ?? ''),
            'bio_mc' => $request->input('bio_mc', $detail->bio_mc ?? ''),
            'keuntungan' => json_encode($request->input('keuntungan', [])),
            'info_tambahan' => $request->input('info_tambahan', $detail->info_tambahan ?? ''),
            'waktu_mulai' => $request->input('waktu_mulai', $detail->waktu_mulai ?? ''),
            'waktu_berakhir' => $request->input('waktu_berakhir', $detail->waktu_berakhir ?? ''),
            'foto_seminar' => $detail->foto_seminar,
            'foto_ruangan' => $detail->foto_ruangan,
        ];



        // Update atau buat detail seminar baru
        if ($detail) {
            $detail->update($detailData);
        } else {
            DetailSeminar::create(array_merge(['seminar_id' => $id], $detailData));
        }


        return redirect()->route('dashboard.seminarM')->with('status', 'Seminar updated successfully!');
    }

    public function destroy($id)
    {
        $seminar = Seminar::findOrFail($id);
        $seminar->delete();

        return redirect()->route('dashboard.seminarM')->with('status', 'Seminar deleted successfully!');
    }

    public function show($id)
    {
        $seminar = Seminar::with('detailSeminar')->findOrFail($id);

        // Mengubah JSON ke array
        $seminar->detailSeminar->foto_seminar = json_decode($seminar->detailSeminar->foto_seminar, true);
        $seminar->detailSeminar->foto_ruangan = json_decode($seminar->detailSeminar->foto_ruangan, true);
        // $seminar->detailSeminar->keuntungan = json_decode($seminar->detailSeminar->keuntungan, true);

        // dd($seminar->detailSeminar->keuntungan);

        return view('dashboard.seminars.show', compact('seminar'));
    }

    public function landingPage()
    {
        $seminars = Seminar::with('tickets')->get();
        return view('index', compact('seminars'));
    }
}
