<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    const AGREEMENTS = 'agreements';
    const AGREEMENT = 'agreement';
    
    protected $fillable = ['key','name', 'is_enabled', 'position', 'site_id', 'active_si'];
    
    
    public function projects()
    {
        return $this->belongsToMany('App\Models\Site', 'agreement_site', 'agreement_id');
    }
    public function files()
    {
        return $this->hasMany('App\Models\AgreementFile')->where('is_enabled', 1);
    }
    public function allFiles()
    {
        return $this->hasMany('App\Models\AgreementFile');
    }
    
    /**
     * @return string
     */
    public function getProjectsNameAttribute()
    {
        return $this->projects()->count() ?
                implode(", ", $this->projects()->lists('name')->toArray()) : '';
    }
    
    /**
     * Returns the validation rules required to create and update agreement.
     *
     * @return array
     */
    public static function getValidationRules() {
        return [
            'name'          => 'required|max:200',
            'agreement_type'=> 'required|in:all,one',
            'site'          => 'required_if:agreement_type,one'
        ];
    }
    
    public function getAgreementPositionList($id = null)
    {
        $query = $this->query()->leftJoin('agreement_site AS as', 
                'agreements.id', '=', 'as.agreement_id')
                ->select('position', 'name')->whereNull('as.site_id');
        if ($id) {
            $query->where('id', '!=', $id);
        }
        return $query->orderBy('position')->get()->toArray();
    }
    
    /**
     * Decrease the position of agreements
     * 
     * @param object $agreements
     */
    public function decreasePosition($agreements)
    {
        foreach($agreements as $agreementRow) {
            $agreementRow->position = $agreementRow->position - 1;
            $agreementRow->save();
        }
    }
    
    /**
     * Increase the position of agreements
     * 
     * @param object $agreements
     */
    public function increasePosition($agreements)
    {
        foreach($agreements as $agreementRow) {
            $agreementRow->position = $agreementRow->position + 1;
            $agreementRow->save();
        }
    }
}
