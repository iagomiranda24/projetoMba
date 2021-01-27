<?php


namespace App\repositories;

use App\models\cobricaoFivModel;
use Illuminate\Support\Facades\DB;

class cobricaoFivRepository
{
    protected $cobricaoFivModel;

    public function __construct(cobricaoFivModel $cobricaoFivModel) {

        $this->cobricaoFivModel = $cobricaoFivModel;

    }

    public function dadosCobricaoFivModel() {

        return DB::table('cobricaofivmodel');

    }
}