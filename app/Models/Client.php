<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Client extends Model
{
  use HasFactory;
  use HasUuids;


  /**
   * The table associated with the model.
   * @var string
   */
  protected $table = 'clients';

  /**
   * The primary key associated with the table.
   *
   * @var string
   */
  protected $primaryKey = 'id';

  /**
   * Indicates if the IDs are auto-incrementing.
   *
   * @var bool
   */
  public $incrementing = false;

  /**
   * The data type of the primary key.
   *
   * @var string
   */
  protected $keyType = 'string';


  protected $fillable = ['name', 'address', 'observation', 'email', 'password'];


  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */
  public $timestamps = true;
}
