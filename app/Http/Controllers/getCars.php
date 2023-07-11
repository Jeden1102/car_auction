<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;

class getCars extends Controller
{

    public function getCar($id)
    {
        $query = car::where('id', $id);
        return $query->get();
    }

    public function getCarsByVin($vin)
    {
        $query = car::where('vin', "LIKE", '%' . $vin . '%');
        return $query->get();
    }


    public function getCars(Request $req)
    {
        $query = car::orderBy('id', 'desc');
        $data = $req->all();
        $limit = 0;
        $query->where('claimed', "=", 0);
        foreach ($data as $key => $value) {
            if ($key === 'yearFrom') {
                $query->where('production_year', ">=", $value);
                continue;
            }
            if ($key === 'yearTo') {
                $query->where('production_year', "<=", $value);
                continue;
            }
            if ($key === 'search') {
                $query->where('marka', "LIKE", '%' . $value . '%')->orWhere('model', "LIKE", '%' . $value . '%');
                continue;
            }
            if ($key === 'page') {
                $limit = $value * 15;
                continue;
            }
            if ($key === 'vin') {
                $query->where('vin', "LIKE", '%' . $value . '%');
                continue;
            }
            $query->where($key, "=", $value);
        }
        $allRes = $query->count();
        return [
            'data' => $query->limit($limit)->get(),
            'count' => $allRes
        ];
    }

    public function getRandomCars()
    {
        return car::inRandomOrder()->limit(6)->where('claimed', "=", 0)->get();
    }

    public function claimLot(Request $req)
    {
        if ($req->vin && $req->stock) {
            $query = car::where('vin', "=", $req->vin)
                ->where('odometer', '=', $req->odometer)->update([
                    'claimed' => true,
                ]);
            return $query;
        } else {
            return "Error";
        }
    }
}
