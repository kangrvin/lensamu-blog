<?php

namespace App\Http\Services;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class ImageService {
    // resize, quality, convert image

    public function uploadImage(array $data, string $oldImage = null) {
    $file = $data['img'];
    $imageName = uniqid() . '.webp'; // pakai webp
    $oriPath = storage_path('app/public/back/' . $imageName);
    $thumPath = storage_path('app/public/back/thumbnail/' . $imageName);

    // Pastikan direktori ada (gunakan dirname())
    if (!file_exists(dirname($oriPath))) {
        mkdir(dirname($oriPath), 0755, true);
    }
    if (!file_exists(dirname($thumPath))) {
        mkdir(dirname($thumPath), 0755, true);
    }

    $intervention = new ImageManager(new Driver);

    // Simpan gambar utama dan thumbnail
    $intervention->read($file)->scale(width: 900)->toWebp(100)->save($oriPath);
    $intervention->read($file)->scale(width: 300)->toWebp(100)->save($thumPath);

    // Hapus gambar lama jika ada
    if ($oldImage) {
        Storage::disk('public')->delete([
            'back/' . $oldImage,
            'back/thumbnail/' . $oldImage,
        ]);
    }

    return $imageName; // jangan return file aslinya, tapi nama file baru
}



}