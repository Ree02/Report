<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Report extends Model
{
    use SoftDeletes;

    //状態定義
    const STATUS = [
        1 => [ 'label' => '未着手', 'class' => 'label-danger'],
        2 => [ 'label' => '着手中', 'class' => 'label-warning' ],
        3 => [ 'label' => '完了', 'class' => 'label-success' ],
    ];

    //状態を表すHTMLクラス
    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];
    
        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];
    
        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['class'];
    }

     //日付の表示方式変更
     public function getFormattedDueDateAttribute()
     {
         return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['due_date'])
            ->format('Y/m/d H:i');
     }  
    
    //課題の状態が「完了」ではないもの取得
    public function scopeDeadlineStatus($query){
        return $query->where('status', '!=', '3' );
    }

    // 期限日が現在から7日後未満
    public function scopeDeadlineDueDateGreaterThan($query){
        return $query->wheredate('due_date', '<', now()->addWeek());
    }
    // 期限日が現在より上
    public function scopeDeadlineDueDateLessThan($query){
        return $query->wheredate('due_date', '>=', now());
    }    
 }