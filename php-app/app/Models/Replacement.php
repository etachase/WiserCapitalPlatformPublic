<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Replacement extends Model
{
    
    const REPLACEMENT_START = '#';
    const REPLACEMENT_END   = '#';
    
    protected function getReplacementsList() {
        $data = Replacement::lists('value', 'key');
        $replacements = [];
        foreach ($data as $key => $value) {
            $replacements[self::REPLACEMENT_START . $key . self::REPLACEMENT_END] = $value;
        }
        return $replacements;
    }
}
