<?php

namespace App\Controllers;

use App\Models\PindangPatinModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PindangPatin extends BaseController
{
    protected $pindangModel;

    public function __construct()
    {
        $this->pindangModel = new PindangPatinModel();
    }

    /**
     * Menampilkan daftar masakan Pindang Patin (Read + Fitur Tambahan Pencarian & Filter)
     */
    public function index()
    {
        $search   = trim((string)$this->request->getGet('search'));
        $kategori = $this->request->getGet('kategori');
        $pedas    = $this->request->getGet('pedas');
        $status   = $this->request->getGet('status');
        $sort     = $this->request->getGet('sort') ?: 'terbaru';
        $viewType = $this->request->getGet('view') ?: 'grid';

        $builder = $this->pindangModel;

        // Fitur Pencarian (Search)
        if (!empty($search)) {
            $builder = $builder->groupStart()
                ->like('nama', $search)
                ->orLike('deskripsi', $search)
                ->orLike('bahan', $search)
                ->orLike('asal_daerah', $search)
                ->orLike('kategori', $search)
                ->groupEnd();
        }

        // Fitur Filter Kategori
        if (!empty($kategori) && $kategori !== 'Semua') {
            $builder = $builder->where('kategori', $kategori);
        }

        // Fitur Filter Tingkat Pedas
        if (!empty($pedas) && $pedas !== 'Semua') {
            $builder = $builder->where('tingkat_pedas', $pedas);
        }

        // Fitur Filter Status
        if (!empty($status) && $status !== 'Semua') {
            $builder = $builder->where('status', $status);
        }

        // Pengurutan (Sorting)
        switch ($sort) {
            case 'harga_asc':
                $builder = $builder->orderBy('harga', 'ASC');
                break;
            case 'harga_desc':
                $builder = $builder->orderBy('harga', 'DESC');
                break;
            case 'nama_asc':
                $builder = $builder->orderBy('nama', 'ASC');
                break;
            case 'terbaru':
            default:
                $builder = $builder->orderBy('id', 'DESC');
                break;
        }

        $makanan = $builder->findAll();

        $data = [
            'title'         => 'Katalog & Kuliner Pindang Patin Khas Sumatera Selatan',
            'makanan'       => $makanan,
            'total'         => $this->pindangModel->countAllResults(false),
            'search'        => $search,
            'selectedKat'   => $kategori ?? 'Semua',
            'selectedPedas' => $pedas ?? 'Semua',
            'selectedStatus'=> $status ?? 'Semua',
            'selectedSort'  => $sort,
            'viewType'      => $viewType,
            'kategoriList'  => ['Tradisional', 'Tempoyak', 'Kuah Bening', 'Kuah Pedas', 'Spesial'],
            'pedasList'     => ['Sedang', 'Pedas', 'Sangat Pedas'],
            'statusList'    => ['Tersedia', 'Habis'],
        ];

        return view('pindang_patin/index', $data);
    }

    /**
     * Halaman Detail Kuliner & Resep Pindang Patin
     */
    public function detail($id)
    {
        $item = $this->pindangModel->find($id);

        if (!$item) {
            throw new PageNotFoundException("Menu Pindang Patin dengan ID {$id} tidak ditemukan.");
        }

        // Ambil menu rekomendasi lainnya
        $rekomendasi = $this->pindangModel->where('id !=', $id)->orderBy('id', 'RANDOM')->limit(3)->findAll();

        $data = [
            'title'       => $item['nama'] . ' - Detail & Resep Kuliner',
            'item'        => $item,
            'rekomendasi' => $rekomendasi,
        ];

        return view('pindang_patin/detail', $data);
    }

    /**
     * Form tambah masakan baru (Create)
     */
    public function create()
    {
        $data = [
            'title'      => 'Tambah Menu Pindang Patin Baru',
            'validation' => \Config\Services::validation(),
        ];

        return view('pindang_patin/create', $data);
    }

    /**
     * Proses simpan data masakan (Create -> Store)
     */
    public function store()
    {
        $rules = [
            'nama'        => 'required|min_length[3]|max_length[255]',
            'kategori'    => 'required',
            'asal_daerah' => 'required',
            'harga'       => 'required|numeric',
            'deskripsi'   => 'permit_empty',
            'gambar'      => 'permit_empty|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]|max_size[gambar,4096]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle upload gambar jika ada
        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'uploads/pindang', $namaGambar);
        }

        $this->pindangModel->save([
            'nama'           => $this->request->getPost('nama'),
            'kategori'       => $this->request->getPost('kategori'),
            'asal_daerah'    => $this->request->getPost('asal_daerah') ?: 'Sumatera Selatan',
            'deskripsi'      => $this->request->getPost('deskripsi'),
            'bahan'          => $this->request->getPost('bahan'),
            'cara_membuat'   => $this->request->getPost('cara_membuat'),
            'tingkat_pedas'  => $this->request->getPost('tingkat_pedas') ?: 'Sedang',
            'porsi'          => $this->request->getPost('porsi') ?: '2-3 Porsi',
            'estimasi_waktu' => $this->request->getPost('estimasi_waktu') ?: '40 Menit',
            'harga'          => (int)$this->request->getPost('harga'),
            'status'         => $this->request->getPost('status') ?: 'Tersedia',
            'gambar'         => $namaGambar,
        ]);

        return redirect()->to(base_url('pindang-patin'))->with('success', 'Menu Pindang Patin berhasil ditambahkan!');
    }

    /**
     * Form edit masakan (Edit)
     */
    public function edit($id)
    {
        $item = $this->pindangModel->find($id);

        if (!$item) {
            throw new PageNotFoundException("Data Pindang Patin dengan ID {$id} tidak ditemukan.");
        }

        $data = [
            'title'      => 'Edit Varian: ' . $item['nama'],
            'item'       => $item,
            'validation' => \Config\Services::validation(),
        ];

        return view('pindang_patin/edit', $data);
    }

    /**
     * Proses update data masakan (Update)
     */
    public function update($id)
    {
        $item = $this->pindangModel->find($id);

        if (!$item) {
            throw new PageNotFoundException("Data Pindang Patin dengan ID {$id} tidak ditemukan.");
        }

        $rules = [
            'nama'        => 'required|min_length[3]|max_length[255]',
            'kategori'    => 'required',
            'asal_daerah' => 'required',
            'harga'       => 'required|numeric',
            'deskripsi'   => 'permit_empty',
            'gambar'      => 'permit_empty|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]|max_size[gambar,4096]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $item['gambar'];

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'uploads/pindang', $namaGambar);
            
            // Hapus gambar lama jika ada dan file fisik ada
            if (!empty($item['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $item['gambar'])) {
                unlink(FCPATH . 'uploads/pindang/' . $item['gambar']);
            }
        }

        $this->pindangModel->update($id, [
            'nama'           => $this->request->getPost('nama'),
            'kategori'       => $this->request->getPost('kategori'),
            'asal_daerah'    => $this->request->getPost('asal_daerah'),
            'deskripsi'      => $this->request->getPost('deskripsi'),
            'bahan'          => $this->request->getPost('bahan'),
            'cara_membuat'   => $this->request->getPost('cara_membuat'),
            'tingkat_pedas'  => $this->request->getPost('tingkat_pedas'),
            'porsi'          => $this->request->getPost('porsi'),
            'estimasi_waktu' => $this->request->getPost('estimasi_waktu'),
            'harga'          => (int)$this->request->getPost('harga'),
            'status'         => $this->request->getPost('status'),
            'gambar'         => $namaGambar,
        ]);

        return redirect()->to(base_url('pindang-patin'))->with('success', 'Data Pindang Patin berhasil diperbarui!');
    }

    /**
     * Hapus data masakan (Delete)
     */
    public function delete($id)
    {
        $item = $this->pindangModel->find($id);

        if (!$item) {
            throw new PageNotFoundException("Data Pindang Patin dengan ID {$id} tidak ditemukan.");
        }

        if (!empty($item['gambar']) && file_exists(FCPATH . 'uploads/pindang/' . $item['gambar'])) {
            unlink(FCPATH . 'uploads/pindang/' . $item['gambar']);
        }

        $this->pindangModel->delete($id);

        return redirect()->to(base_url('pindang-patin'))->with('success', 'Data Pindang Patin berhasil dihapus!');
    }
}
