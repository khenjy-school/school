Ini diteruskan dari Tabel spp.txt


Di sini aku akan membuat beberapa list teks yang ingin kumasukkan ke chatgpt
Tujuannya supaya chatgpt bisa menggantikanku melakukan beberapa hal manual yang melelahkan
Dan itu dapat benar-benar membantu dalam mempercepat engineering dari aplikasi ini

Tables to drop

Tables to be changed or expanded
petugas (from user)


Table to rename
history -> history_lelang t2
id_history
id_lelang
id_barang
id_user
penawaran_harga

siswa -> tb_masyarakat t4
id_user
nama_lengkap
username
password
telp

kelas -> tb_level t5
id_level
level

spp-> tb_barang t6
id_barang
nama_barang
tgl
harga_awal
deskripsi_barang

pengaturan -> tb_pengaturan t7
id
nama
favicon
logo
foto
alamat
email
hp
metadesc
fb
ig

pembayaran -> tb_lelang t8
id_lelang
id_barang
tgl_lelang
harga_akhir
id_user
id_petugas
status

petugas -> tb_petugas t9
id_petugas
nama
email
password
hp
level
login_count

Nominal tabel yang dipakai dan tidak diubah
t7
t9

Nominal tabel yang tidak dipakai
t1
t3
t10
t11




###
Lines that needs to be replaced
$this->tabel2
to
$this->aliases['tabel2']



'tabel2' => $
to
'tbl2' => $



$this->tabel2
to 
$this->aliases['tabel2_alias']



$this->tabel2_field1
to
$this->aliases['tabel2_field1']

<?= site_url('
to
<?= site_url($

'?>

###
Things to find
name="

<?= site_url(



###
Things to move
$this->declarew()





