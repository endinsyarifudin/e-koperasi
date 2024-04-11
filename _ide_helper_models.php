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
 * @property string $Nama_desa
 * @property int $Kec_id
 * @property string|null $Tag
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Kecamatan|null $kecamatan
 * @method static \Illuminate\Database\Eloquent\Builder|Desa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Desa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Desa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Desa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Desa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Desa whereKecId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Desa whereNamaDesa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Desa whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Desa whereUpdatedAt($value)
 */
	class Desa extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $kategori
 * @property string|null $deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\JenisFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis whereKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis whereUpdatedAt($value)
 */
	class Jenis extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $kategori_id
 * @property string $jenis_labarugi
 * @property string|null $akun
 * @property string|null $deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LabarugiKategori|null $kategori
 * @method static \Illuminate\Database\Eloquent\Builder|JenisLabarugi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisLabarugi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisLabarugi query()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisLabarugi whereAkun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisLabarugi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisLabarugi whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisLabarugi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisLabarugi whereJenisLabarugi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisLabarugi whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisLabarugi whereUpdatedAt($value)
 */
	class JenisLabarugi extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $jenis
 * @property string|null $akun
 * @property int $kategori_id
 * @property string $deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\NeracaKategori $kategori
 * @method static \Illuminate\Database\Eloquent\Builder|JenisNeraca newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisNeraca newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisNeraca query()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisNeraca whereAkun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisNeraca whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisNeraca whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisNeraca whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisNeraca whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisNeraca whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisNeraca whereUpdatedAt($value)
 */
	class JenisNeraca extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $koperasi_id
 * @property \Illuminate\Support\Carbon $tanggal
 * @property string $kategori
 * @property string|null $kode_trx
 * @property int $jenis_id
 * @property string $uraian
 * @property int $jumlah
 * @property int $saldo_akhir
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\Jenis|null $jenis
 * @method static \Database\Factories\KasFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Kas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kas saldoAkhir($koperasiId = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereJenisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereKodeTrx($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereKoperasiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereSaldoAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kas whereUraian($value)
 */
	class Kas extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $Nama_kec
 * @property int|null $Kab_id
 * @property string|null $Tag
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Desa> $desa
 * @property-read int|null $desa_count
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereKabId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereNamaKec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereUpdatedAt($value)
 */
	class Kecamatan extends \Eloquent {}
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
 * @property string $labarugi_kategori
 * @property string|null $akun
 * @property string $deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LabarugiKategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LabarugiKategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LabarugiKategori query()
 * @method static \Illuminate\Database\Eloquent\Builder|LabarugiKategori whereAkun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabarugiKategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabarugiKategori whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabarugiKategori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabarugiKategori whereLabarugiKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabarugiKategori whereUpdatedAt($value)
 */
	class LabarugiKategori extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $akun
 * @property int $kategori_id
 * @property int $jenis_id
 * @property string $neraca_item
 * @property string $deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\JenisNeraca $jenisneraca
 * @property-read \App\Models\NeracaKategori|null $kategori
 * @method static \Database\Factories\NeracaItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaItem whereAkun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaItem whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaItem whereJenisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaItem whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaItem whereNeracaItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaItem whereUpdatedAt($value)
 */
	class NeracaItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $kategori
 * @property string $akun
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaKategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaKategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaKategori query()
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaKategori whereAkun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaKategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaKategori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaKategori whereKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeracaKategori whereUpdatedAt($value)
 */
	class NeracaKategori extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $rekening
 * @property string|null $no_rek
 * @property string $deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\RekeningFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Rekening newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rekening newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rekening query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rekening whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rekening whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rekening whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rekening whereNoRek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rekening whereRekening($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rekening whereUpdatedAt($value)
 */
	class Rekening extends \Eloquent {}
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
 * @property string|null $nohp
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
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNohp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

