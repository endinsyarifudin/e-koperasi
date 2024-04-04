<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $koperasi_id
 * @property \Illuminate\Support\Carbon $tanggal
 * @property string|null $kategori
 * @property string $keterangan
 * @property string $jenis
 * @property int $jumlah
 * @property int $saldo_akhir
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $createdBy
 * @method static \Database\Factories\KasFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Kas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kas saldoAkhir($koperasiId = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereKoperasiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereSaldoAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereUpdatedAt($value)
 */
	class Kas extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $telp
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\KoperasiFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Koperasi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Koperasi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Koperasi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Koperasi whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Koperasi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Koperasi whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Koperasi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Koperasi whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Koperasi whereTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Koperasi whereUpdatedAt($value)
 */
	class Koperasi extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $koperasi_id
 * @property string|null $role
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Koperasi|null $koperasi
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKoperasiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

