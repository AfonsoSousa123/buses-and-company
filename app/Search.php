<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public function Search($query, $s)
    {

        return $query->where('title', 'like', '%' .$s. '%')
            ->orwhere('created_at', 'like', '%' .$s. '%');

    }
}
