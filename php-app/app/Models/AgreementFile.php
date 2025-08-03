<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AgreementFile extends Model
{
    const AGREEMENTFILE = 'Agreement File';
    
    protected $table = 'agreement_files';
    
    protected $fillable = ['agreement_id','name', 'file_name', 'sqs_file_name', 'is_enabled'];
    
    /**
     * Returns the validation rules required to create and update agreement.
     *
     * @return array
     */
    public static function getValidationRules() {
        return [
            'name'          => 'required|max:200',
            'uploaded_file' => 'required_if:doc_title,|required_if:doc_title,null',
        ];
    }
}
