<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Coupon extends Model
    {
        use HasFactory;

        protected $fillable = ['code', 'discount'];

        /**
         * Get the coupon code in uppercase.
         *
         * @param  string  $value
         * @return string
         */
        public function getCodeAttribute($value)
        {
            return strtoupper($value);
        }

        /**
         * Set the coupon code in lowercase before saving to the database.
         *
         * @param  string  $value
         * @return void
         */
        public function setCodeAttribute($value)
        {
            $this->attributes['code'] = strtolower($value);
        }
    }

?>
