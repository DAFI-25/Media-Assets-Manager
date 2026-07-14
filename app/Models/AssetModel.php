<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetModel extends Model
{
    protected $table = 'assets';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'category_id',
        'title',
        'description',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'uploaded_by'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';

    protected $returnType = 'array';



    /**
     * Ambil asset terbaru + nama kategori
     */
    public function getRecentAssets($limit = 5)
    {
        return $this->select('
                assets.*,
                categories.name AS category_name
            ')
            ->join(
                'categories',
                'categories.id = assets.category_id',
                'left'
            )
            ->orderBy(
                'assets.created_at',
                'DESC'
            )
            ->findAll($limit);
    }



    /**
     * Total ukuran file
     */
    public function getTotalStorage()
    {
        $result = $this
            ->selectSum('file_size')
            ->first();

        return $result['file_size'] ?? 0;
    }
}