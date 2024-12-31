<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'id' => $row[0],
            'name' => $row[1],
            'email' => $row[2],
            'dob' => "2024/12/12",
            'occupation' => $row[4],
            'password' => Hash::make($row[5]),
            'status'=> $row[6],
            'role'=> $row[8],
        ]);
    }
}
