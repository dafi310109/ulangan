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
     * Menampilkan daftar masakan Pindang Patin (Read)
     */
    public function index()
    {
        $search   = $this->request->getGet('search');
        $kategori = $this->request->getGet('kategori');
        $pedas    = $this->request->getGet('pedas');

        $builder = $this->pindangModel;

        if (!empty($search)) {
            $builder = $builder->groupStart()
                ->like('nama', $search)
                ->orLike('deskripsi', $search)
                ->orLike('bahan', $search)
                ->orLike('asal_daerah', $search)
                ->groupEnd();
        }

        if (!empty($kategori) && $kategori !== 'Semua') {
            $builder = $builder->where('kategori', $kategori);
        }

        if (!empty($pedas) && $pedas !== 'Semua') {
            $builder = $builder->where('tingkat_pedas', $pedas);
        }

        $data = [
            'title'        => 'Daftar Kuliner Pindang Patin Khas Sumatera Selatan',
            'makanan'      => $builder->orderBy('id', 'DESC')->findAll(),
            'total'        => $this->pindangModel->countAllResults(false),
            'search'       => $search ?? '',
            'selectedKat'  => $kategori ?? 'Semua',
            'selectedPedas'=> $pedas ?? 'Semua',
            'kategoriList' => ['Tradisional', 'Tempoyak', 'Kuah Bening', 'Kuah Pedas', 'Spesial'],
            'pedasList'    => ['Sedang', 'Pedas', 'Sangat Pedas'],
        ];

        return view('pindang_patin/index', $data);
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
