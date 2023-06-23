<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_member = [
            ["2", "Mulyadi", "Demak Jaya X No.14", "081329594241"],
            ["1", "tn saifudin", "tambak preng barat no.16", "081939400349"],
            ["1", "NY AULIA SURYA", "TAMBAK DALAM UTAMA NO.35", "081384500732"],
            ["1", "NUR HASISEH", "BUBUTAN DKA NO.66", "085731132170"],
            ["2", "BAPAK NURIL", "TAMBAK LUMPANG III ", "085812051560"],
            ["1", "Tn Agung Wibowo", "Asem jajar II no 17", "0811192461"],
            ["1", "Ny suryati", "Tambak mayor baru barat II no. 94", "085100221799"],
            ["2", "Ny Siti Nuriyah", "Simorejo sari A gang 6 No. 12", "08113320855"],
            ["1", "Tn Titus", "Margodadi 5 no 23", "081246002667"],
            ["2", "Ibu siti", "Asem jaya II/33", "087853133212"],
            ["1", "risna", "tambak asri sedap malam 5/12", "081515111480"],
            ["1", "augry", "genting tambak dalam 74", "081331013500"],
            ["1", "BAPAK MUNIRI (px lama)", "Sidorukun lebar 49", "087853346560"],
            ["2", "lasmi,ny", "kalibutuh barat Gg 5 - 79", "08563063064"],
            ["2", "NY. TITIK ", "DEMAK SELATAN  V no.06", "081232422879"],
            ["2", "Ibu Muhasinah", "Jl. Sukomanunggal Baru PJKA", "087703338822"],
            ["1", "sri purwanti", "tambak pring timur 5/56D", "082131023298"],
            ["2", "fitri", "dupak jaya 3-40", "081338215884"],
            ["1", "diyas", "kedung anyar 1/49", "081235408054"],
            ["1", "Ibu Santi", "Jl. Kalibutuh 73D", "08155266362"],
            ["1", "ANANG", "GUNAWANGSA TIDAR", "083845204480"],
            ["1", "IBU ENDANG", "Tambak Pring Timur IV NO.II", "089639051678"],
            ["2", "Ibu Siti Qomariyah ", "Jl. Simorejo Sari B No. 27", "08179366199"],
            ["1", "Laila", "Jl. Simorejo Sari B Gang X No. 14", "08121768205"],
            ["1", "fitra", "tambak dalam baru barat 4/41", "083831393332"],
            ["1", "IBU SUTRIANI", "TAMBAK PRING TIMUR V/17", "089685299074"],
            ["2", "Bp Imam", "demak timur VIII/17", "087751445000"],
            ["1", "toko bambang", "jl margodadi 16", "085604118817"],
            ["1", "ibu sunarti", "ASEM ROWO I NOMOR 2-4", "082337789358"],
            ["2", "B Syamsudin Datu Iding", "Rowo V/1 asem rowo", "081341081972"],
            ["1", "VIRA", "KALIBUTUH 1/16", "08573001086"],
            ["2", "Muyassir", "Kalianak Timur Hidayah 2 No. 7", "085748411189"],
            ["2", "Bu Nanik", "Jl. Demak Jaya III No. 83", "081235360922"],
            ["1", "Yunita", "Jl. Tembok Sayuran 2 No. 5", "081231259903"],
            ["1", "YAJI", "PERUMAHAN GRAHA MANDIRI C14", "082231888871"],
            ["2", "yono,tn", "gadukan rukun 3-11", "085247092348"],
            ["1", "yuli,ny", "tambak asri 3/2", "087746281990"],
            ["1", "vivi", "aprt. gunawangsa tidar", "082299338933"],
            ["2", "nanang,tn", "tambak dalam baru 1b/31", "083849444147"],
            ["2", "hera mauliana", "asem jaya 10 / 9", "081381597376"],
            ["1", "NIKITA", "ASEM IV/07", "081310186426"],
            ["2", "BU SITI AISYAH", "SIMOREJO SARI B X/34", "087762215131"],
            ["2", "LUSI FERDIANA", "ASEM ROWO IV NO 36A", "08123014940"],
            ["2", "YESY MAGALIANA", "Tambak Dalam Baru V no 21b", "085895111788"],
            ["1", "Syarifah Amaliah", "Demak Timur 4 no 4", "0881036197772"],
            ["2", "Bp edy suwito (pasien lama)", "asem jajar II/57", "082228881229"],
            ["2", "rizkinia", "dupak magersari III/33", "081330098222"],
            ["2", "ibu sulfia", "demak jaya 133", "083146881492"],
            ["2", "bp Hari", "simo pomahan baru barat 1/15", "082232299977"],
            ["2", "ibu dwi indah lestari", "simorejosari B 13/38A", "081252662564"],
            ["1", "ibu heni wijayati", "tambak pring barat 1/38", "085749597233"],
            ["1", "RITA,NY", "GENTING 2 - 12", "081350600246"],
            ["1", "arif fadli", "tambak dalam baru gang 3-41", "081216666711"],
            ["1", "ahm. bilal anwar", "dupak magersari 4-83", "082254323047"],
            ["1", "Tn Yuli Purwanto", "Tambak poka gang lebar no. 43", "08993990629"],
            ["2", "FAISAL", "TIDAR 332", "08563002094"],
            ["1", "Ny venny cahya", "Dupak rukun no. 227", "087798243417"],
            ["1", "Ibu DIAH", "Kalibutuh 229", "082131977497"],
            ["1", "sania", "tambak mayor madya 2/85", "085928843488"],
            ["1", "sylviana may r", "kalibutuh 92", "08563248910"],
            ["2", "bp ahmad", "tambak dalam baru 20", "082244599988"],
            ["1", "Ny kiki Maysaroh", "Kepatian gang V no. 8", "082126820637"],
            ["2", "AAN", "TAMBAK ASRI DAHLIA I NO.16", "087855796353"],
            ["2", "jemmy px lama", "palemahan", "081703203259"],
            ["1", "ibu lurusiana", "demak timur v buntu no 58", "089658441010"],
            ["1", "bpk Matsudi", "Tambak Dalam Baru 1 no 1", "087755000067"],
            ["2", "RUKMINIWATI/ BP BUDI", "MARGO RUKUN v/17", "082151019133"],
            ["2", "BP YOOTJE MEWENGKANG", "JL KALIBUTUH NO 136", "082277883267"],
            ["2", "Tn Andri Cahyono", "Tanjung Sari Jaya II no. 39", "087701242281"],
            ["2", "Ny Nita", "Tambak Asri No. 144 A", "081213119696"],
            ["2", "Ny Danding", "Simorejo 19 No. 24 B", "085736582621"],
            ["1", "NY.MELIN", "Petemon Barat 230", "089668071182"],
            ["2", "Andri Puspitasari ", "Jl. Tambak Dalam Baru No. 61", "087853328555"],
            ["1", "wijayadi,tn (pasien lama)", "tambak asri 18- 24 b", "085645256803"],
            ["1", "p. alex (pasien lama)", "tambak 4 / 5", "081234576682"],
            ["1", "ibu samini", "tambak lumpang RT1/54", "081216360494"],
            ["2", "suwandi", "tambak pring barat 162", "0817795682"],
            ["2", "herianto", "simorejo 23 - 2a", "081231696562"],
            ["2", "MAS TOKE", "GENTING BARU III", "082231449268"],
            ["1", "bp sujalil", "Simorejo Sari A 4/19", "082143782688"],
            ["1", "Siti masrihati", "genting gang 1/10B", "085330007700"],
            ["2", "satria", "teluk sempit 26", "082140076181"],
            ["1", "Warda", "Jl. Gundih Ril No.9", "083857769233"],
            ["1", "Abdul Rohman", "Asem rowo", "087850156897"],
            ["2", "NY ISMUHAYAH (PX LAMA)", "TAMBAK DALAM BARU GANG 6 NO 16", "087751006242"],
            ["2", "PAK SUEF", "JL.MASJID 38 ", "081230000502"],
            ["2", "Ny Dewi", "Kalibutuh no 229", "081230144199"],
            ["1", "Ny Bulish", "Asemjajar 12 No. 21", "081333602030"],
            ["2", "Ny. Bibit Utami", "Jln. Margorukun IV no.63", "082131141055"],
            ["1", "Ny. Tiara", "Jln Asem mulya I no. 60 D", "085895979399"],
            ["2", "DEFI NURAINI", "ASEM ROWO MULYA 46", "081515338568"],
            ["1", "Rahmat adi", "Margorukun 12/1A", "08175400113"],
            ["2", "bp Trimo", "Margorukun Gg Rel No.42
", "082230665303"],
            ["1", "JASON", "SAWAHAN SARIMULYO NO. 6", "082299008169"],
            ["2", "MUSNIA", "JALAN DUPAK MASIGIT 3/20", "081331003110"],
            ["1", "BU ROTIBAH", "TAMBAK ASRI SELATAN I/41", "081999961277"],
            ["2", "Tn Soebarjono (Px lama) ", "Demak Jaya 4 no 12", "081331825757"],
            ["2", "CHANDRA ADITYA", "KALIBUTUH BARAT V NO. 79", "082244487799"],
            ["1", "Nurul", "Jl. Kalibutuh Timur 2A /10B", "081235761779"],
            ["1", "Dian", "Jl. Simorejo Sari B 5 - 14", "083854356704"],
            ["1", "Ny. Sujimiyati", "Jl. Demak Selatan V No. 22 A", "081332010464"],
            ["2", "IBU DIAH", "TEMBOK SAYURAN I/31", "081322251978"],
            ["2", "heru,tn", "asem 5 / 20", "082135620402"],
            ["2", "antin", "rowo 8 - 3", "08113393925"],
            ["2", "Tn Sandy Kharisma", "Simorejo 7 No. 7", "081703904817"],
            ["1", "BAPAK RAHMAT", "JAKARTA", "0816809619"],
            ["1", "Ny. Rodia", "Tambak Mayor VIII No.29", "081343302010"],
            ["1", "Kak Ayu ", "Asem Jajar X no.19", "081228480585"],
            ["2", "Yecika Djojo (Px Lama)", "Jl. Kedung Doro 7 No. 12", "082140641872"],
            ["1", "Nur Hasanah ", "Jl. Tambak Pring Barat Gang Lebar No. 6", "081913647659"],
            ["2", "BU LILA", "DEMAK SELATAN V/30", "089678158012"],
            ["2", "INDAH", "TAMBAK DALAM GANG XIII", "081228312098"],
            ["1", "BU SITOMPUL (PX LAMA)", "JL ASEM II/14", "082233097779"],
            ["1", "jordi", "asem jaya 2/15", "08994170898"],
            ["2", "udik,tn", "simorejo sari A no 22 A", "082196227295"],
            ["2", "tini,ny", "simo rejo 4 - 15", "081357564449"],
            ["2", "rahmat hidayat", "jl.gundih 86 blok A - 6", "083832494111"],
            ["2", "Anggraini", "Sawahan sari mulyo gg 1/4", "081330372728"],
            ["2", "Tn wiyono", "Asem jajar VI/17", "081333301675"],
            ["2", "Ibu anugrah", "Jl dupak VI/17", "081216811001"],
            ["2", "umi khothijah", "asem 4 - 18", "087852923500"],
            ["2", "Bu Ririn Amalia (Px Lama)", "Tambak Mayar Baru 26", "087798167677"],
            ["1", "Tina", "Dharmo Satelit DN20", "081938685319"],
            ["2", "Budi", "Jl. Tambak Asri Bunga Rampas 1 55B", "083812190180"],
            ["1", "Ibu Mujirah", "Jl. Asem Jaya Gg 9 No 22", "0315468961"],
            ["2", "Siti Romlah", "Jl. Demak Jaya Gg X No. 28", "087751073885"],
            ["1", "Rizal", "Jl. Darmokali No 116 A", "085791549027"],
            ["1", "Syahirun alimin", "Kh jainal alimin ", "081235177738"],
            ["1", "kristin", "mojo 3/16", "085649056778"],
            ["2", "tn M Latif", "tambak asri 144", "081222222360"],
            ["2", "satrio", "tambak pring timur 3/68", "08155503592"],
            ["1", "Tn H.M Badrus Shaleh", "simorejo sari b 14/24", "081279360274"],
            ["1", "Adinda", "jl masjid no 36", "081334512729"],
            ["2", "Siti Romlah ", "Jl. Tambak Dalam Timur Gg 5 No 47", "087854489200"],
            ["2", "Farida", "Jl. Tambak Mayor Utara No 534", "087856343702"],
            ["2", "nur hayati", "simorejo 10 - 29", "081230381548"],
            ["2", "Hj. Maimunah ", "Jl. Tambak Pring Utama Asem Rowo", "081779889881"],
            ["2", "hanifah", "tambak pring timur 3 - 53", "085964344628"],
            ["1", "BAPAK MOH SANURI", "JL SIMO POMAHAN BARU 107", "081317817517"],
            ["1", "Bu Anis", "Simorejo Vi /23", "082220357999"],
            ["1", "NY SUMRIATIH", "TAMBAK PRENG BLOK D", "083113396518"],
            ["2", "Toni", "Jl. Tambak Pring Timur Gg. 1", "0881026206442"],
            ["1", "Dwi Amiroh (Px Lama)", "Jl Maspati III / II", "08185644311"],
            ["1", "NY.SONYA", "Jl.SEKOLAHAN NO.5", "081233205313"],
            ["1", "Bu Irwan", "TIara Demak 99", "081277575757"],
            ["2", "indri nur hanista", "petemon kuburan 24c", "08570477704"],
            ["1", "TN GAMA", "SIMOREJO SARI B GG II NO 1A", "0881036786297"],
            ["2", "TN TAUFIK", "demak timur buah/26 A", "085396555519"],
            ["1", "icha", "jl diponegoro gang 7", "082260262003"],
            ["1", "Alfin (pasien lama)", "pasar krembangan", "085748575121"],
            ["2", "NALA", "JL TIDAR 338", "082143422004"],
            ["1", "TN M. AWALUDDIN KHABIBI (px lama) ", "Petemon barat 194", "08563007575"],
            ["1", "Bu  waliyem", "Sidorukun 3/6", "087854469099"],
            ["1", "RUDI", "DEMAK JAYA 2 NO.83A", "085736708085"],
            ["2", "NY MUS", "Demak Timur Gang IV No. 18", "081999956525"],
            ["1", "TN YORENO", "Tembok Lor IV No. 21", "081232016626"],
            ["1", "Ibu Susanti", "Jl. Tambak Pring Timur Gg. 2 No. 9", "081241686826"],
            ["1", "ABAH HODRI", "TAMBAK ASRI GANG 31/11", "087856344466"],
            ["1", "Umik khotijah", "Jl asem 4/18", "081244095646"],
            ["1", "Ny fitria", "Tambak pring gang VI/29", "083830504341"],
            ["2", "Tn Yuli", "Tambak asri Gg 26/23", "085895650220"],
            ["1", "Ny Lailatul Qodariyah", "Gadokan Timur Baru, GG II No. 13", "083856432214"],
            ["1", "Tn Syaiful Umam", "Tambak Preng Utama 2B", "083129971460"],
            ["2", "Ny Nurul", "Tambak Mayor III No. 1", "081803104300"],
            ["2", "ibu suryani", "jl.Simorejo 2/12", "085736099743"],
            ["1", "RUDIANTO", "JL.Balongsari Tama 1 i no.2a", "087701727604"],
            ["2", "Bp Juki", "Jl.Tambak Mayor Madya II no. 54", "083849701106"],
            ["1", "Moestakim", "Asem Jaya 5 no.42a", "087853469009"],
            ["2", "Novi", "Jl.Masjid No.43", "081351416674"],
            ["1", "Azizah", "Jl. Asem II No. 22", "081330344333"],
            ["2", "Sadeko", "Jl. Tambak Asri 133", "082208422663"],
            ["1", "sumardi", "Tambak Dalam Baru 4 No.23", "085336296446"],
            ["2", "Tn Edi", "jl kranggan", "085790819544"],
            ["2", "ayu", "simorejo sari B Gg.14 - 20", "082231506095"],
            ["1", "umik riman", "simo rejo sari A NO.13", "087876890816"],
            ["1", "lisa", "grand pakuwon", "081390228888"],
            ["2", "aulia", "tambak pring barat 45", "08583215847"],
            ["1", "RANDY", "Simopomahan Baru Barat VII No.28", "082244674241"],
            ["1", "SITI ALFIYAH", "TAMBAK DALAM BARU II/4", "081357231123"],
            ["2", "Jubaida", "Tambak asri29/9", "081322373048"],
            ["2", "dr. haris", "rowo 6 - 2", "0818525723"],
            ["1", "Muljati", "Jl. Simorejo Sari B Gg. 8 No. 17", "082243546876"],
            ["1", "Pak Abdul manan", "Tambak Dalam Baru Gg. 7 No. 17", "0818527844"],
            ["1", "Bu umi", "Demak timur26", "082123469331"],
            ["2", "Nabila", "Asemrowo 4 No.28", "087758990544"],
            ["2", "Wilda", "Demak Jaya 8 NO.25", "0881027246680"],
            ["2", "gunawan", "blabak kandat kediri", "081282176851"],
            ["2", "Delly", "asem 1/31", "082264530309"],
            ["1", "NY WINARTIN ALFI'AH", "KALIBUTUH NO.144", "081331033700"],
            ["2", "dimas cahyo", "jln. Tambak Pring Utama I / 9", "087762675069"],
            ["1", "Mita", "Tembok Lor I/5", "082255070740"],
            ["2", "ALFIYAH", "DEMAK TIMUR VII/27", "087851285116"],
            ["2", "Rinantika Oktavia", "jepara", "081249186523"],
            ["1", "TN ADI (px lama) ", "Asemrowo V No.3", "081999941000"],
            ["1", "Tn Ales", "Jl. Embong kenanga No. 32", "081358566677"],
            ["2", "Tjue thoch guan", "Bengawan 58", "0818305458"],
            ["2", "Tn Syaiful", "Asem II No. 3", "085212641752"],
            ["1", "Ervina", "Tambak pring timur 1/1", "081331337437"],
            ["1", "umama", "asem jajar 8/30", "083841787888"],
            ["1", "AMALIA ULFA", "TAMBAK DALAM BARU I/8", "085882542885"],
            ["2", "Ny. Uci", "Simorejo timur2/85", "081230204995"],
            ["1", "Hendra", "Jl. Masjid No. 33 Asem rowo", "087853408890"],
            ["1", "NY JUMRI'AH", "KALIBUTUH BARAT GG IV NO.91", "087753628440"],
            ["2", "Linawati", "Tambak dlm utama 1/1", "08785122280"],
            ["1", "fatir tiu ciu", "jl.tidar no.7", "083184730024"],
            ["1", "Ibu sofia", "Asem mulya V/55", "085231713706"],
            ["1", "Ibu yani", "Tembok dukuh XI/31", "081297939493"],
            ["1", "Ibu ella christiana (pasien lama)", "Margorukun 3 buntu no 18", "08883564090"],
            ["2", "BAPRIS MERCYTA", "ASEM II/12A", "081809747745"],
            ["1", "DIANA", "TOKO SUMBER MAKMUR JL MERBABU ID", "085885553378"],
            ["2", "bu titik indryati (pasien lama)", "demak jaya 9/36", "085230904499"],
            ["1", "NN CAROLINE (PX LAMA)", "JL.ASEM V NO.9", "081232223689"],
            ["2", "NY NILA ", "DUPAK JAYA V NO.40", "089518906622"],
            ["2", "URIATIN", "Genteng Tambak Dalam VII/22", "081233865826"],
            ["2", "FISTA", "TAMBAK DALAM BARU VI/20", "081217062827"],
            ["1", "Rio", "Bratang Lapangan", "082244147940"],
            ["1", "Arman", "Tambak Dalam", "081904452884"],
            ["1", "Ibu Halimah", "Jl. Simorejo Gg. 15 No. 31", "081233112399"],
            ["2", "Ibu Badrus", "Jl. Simorejo Sari B Gg 13 No 14", "082230157559"],
            ["2", "Ny. Safira", "Simo Pomahan Baru Barat VII/09", "088989849968"],
            ["1", "bahri", "tambak mayor baru 4/91", "082141967613"],
            ["2", "Rochana", "Babadan rukun 79", "081779310587"],
            ["1", "Bu yusi", "Tambak mayor26", "085959405283"],
            ["2", "julia", "jl.demak 99", "0895399583058"],
            ["2", "santri", "demak jaya 5 - 40", "081332526333"],
            ["1", "b.sulis (pasien lama)", "jl.masjid no 10", "082138288747"],
            ["1", "annisa", "klampis ngasem 101", "082141589627"],
            ["1", "mahfud,tn", "simo rejo sari B Gg 12 - 61", "081218351558"],
            ["1", "ema", "simorejo sari A Gg 5 - 12", "082234212161"],
            ["2", "Rohma", "Tambak dlm", "087853222448"],
            ["1", "Ny.Aninda Prisa", "Asem Jaya VIII/34", "081359602089"],
            ["2", "Tn.Irwan", "Babatan Rukun VII/7", "087851803485"],
            ["2", "Ny.Otami", "Asem Jajar VI/05", "082332639009"],
            ["2", "bimbing,tn", "perak", "082195532989"],
            ["2", "RATRI", "ASEM JAYA 8 NO 7", "08996650071"],
            ["1", "RAHMA", "SIMOREJO SARI A 20", "083162940407"],
            ["1", "M.SUHENDRI", "SIMOREJO VI NO1", "082231221961"],
            ["2", "NY WIWIK (PX LAMA)", "ASEM RAYA NO.24", "082230767679"],
            ["2", "rafika", "klampis bangkalan", "085336554809"],
            ["1", "Romela", "Demak jaya 7/9", "087878508221"],
            ["2", "Qurrotul Aini", "Jl. Tambak Pring Barat", "08814937993"],
            ["2", "Sahrul", "Jl. Tambak Mayor", "083840336567"],
            ["2", "Heri", "jl dupak gang V", "081515725266"],
            ["2", "tn jatmiko", "pesapen selatan no48", "085648819229"],
            ["2", "Tn Judi Tanto", "jagalan 8d/10a", "081357134949"],
            ["2", "Nia Dahlia", "jl asem bagus 3/38", "081211030638"],
            ["1", "Hana", "tambak asri sedap malam V", "085735745506"],
            ["2", "Tn.Sugiarto", "Asem rowo IA / 49D", "08563455151"],
            ["1", "sandi", "krembangan barat 16", "08113188890"],
            ["1", "Bp dani", "Babadan rokwi", "085940715002"],
            ["2", "anas", "demak 5 24", "081234590713"],
            ["1", "Desi Yuvita", "Asem Jaya 3 no 8", "08155158892"],
            ["2", "Bp irvan", "Margorukun Gg lebar No 5", "087754101224"],
            ["1", "Siti mariyam", "Asem mulya11/12", "085895978699"],
            ["2", "IBU LAILATUL", "TAMBAK ASRI 19 7B", "085649871803"],
            ["2", "IBU MASFUFA", "SIMOREJO SARI B 11/30", "081938107784"],
            ["2", "YUNITA", "GENTING I NO 17", "0822363938137"],
            ["2", "meilia", "simorejo sari b 17 / 26", "081231279017"],
            ["2", "denny oktavianto", "setro Baru Utara 2 / 107", "089660700700"],
            ["1", "febby", "jl.pasar krembangan 14", "082244582330"],
            ["1", "HENDRI ( TIARA )", "Jln. Demak 99", "081231390071"],
            ["2", "An. Aerolla", "asem jajar 6 no.3", "083856817505"],
            ["2", "Bayu", "Demak Jaya 7A / 30", "081931605690"],
            ["2", "UMAMA", "Tambak Mayor Baru 22", "081937245549"],
            ["2", "Magdalena", "Jl. Marbabu No. 4", "08121680089"],
            ["2", "Nur Aini", "Jl. Asem jajar Gang 9 No. 24", "081225486264"],
            ["1", "Pipit", "Jl. Simorejo Sari B No. 41", "08983675959"],
            ["1", "NY.Einsteina", "Simorejo II/23", "0818308926"],
            ["2", "Handayani", "Margorukun x/2", "081235966903"],
            ["1", "Dian", "Perlis sel 9/69", "0856486700937"],
            ["1", "Nicky", "Jl. Genting 5 No. 32", "081296591122"],
            ["2", "M junaidy", "Demak stan 70", "087863006385"],
            ["1", "NY IRA TANJUNG", "DUPAK V NO 1", "085210823022"],
            ["2", "NY MARDIAH", "SIMOREJOSARI A GG.VIII, NO.18", "087773201910"],
            ["1", "NY SUSBANDIA", "TAMBAK ASRI 24/37", "085812334203"],
            ["1", "TN HERMAN ", "KALIBUTUH NO.40", "081333882872"],
            ["1", "NY IRDA", "DEMAK JAYA IX NO.34", "083857800255"],
            ["2", "Ny.Prebiyanti", "Tambak Dalam Baru IA/108", "087848989052"],
            ["1", "Bpk. Moh. Hasbi", "Jln.Sedayu IV/08", "085806287555"],
            ["2", "Ny. Encis", "Jl Asem Bagus I nO.8", "085850704122"],
            ["2", "Ny, Linda", "Tambak Pring Timur VI/39", "083856003142"],
            ["1", "Nn. Lia Febri", "Tambak Asri 29 A/ 6", "085730019886"],
            ["1", "RAYA", "Jl. Dupak Bandar Rejo 2 No. 17", "082232924953"],
            ["2", "Ibu Ika (px lama)", "Jl. Demak Jaya 8/5", "082234261456"],
            ["1", "Aini", "Jl. Tambak Asri Dahliya Raya No. 3", "087810210967"],
            ["1", "bp Dwi priyono", "Demak Selatan V/31", "08123068326"],
            ["2", "BPK MUDAWI", "TAMBAK ASRI GADING 6 NO 6", "081703672369"],
            ["2", "tn joko pamungkas/sulis (pasien lama)", "jl masjid no 10", "082138283316"],
            ["1", "sari", "tambak dalam baru 4 no15", "085336256446"],
            ["1", "IBU SITI", "SIMOREJO SARI A IV/24", "082228897260"],
            ["2", "Siti aisyah", "Tambak pring utama g masjid 7 ", "087701914719"],
            ["1", "NY. YUNITA", "JL.PURWODADI RAYA NO,53", "081255252561"],
            ["2", "Rohimah", "Tambak pring timur 1/41", "081216598481"],
            ["1", "IBU MUFA", "TAMBAK DALAM BARU GANG 7", "087751068377"],
            ["1", "ERWINA", "GUNDIH 2 NO 72", "0818570082"],
            ["1", "IBU RAHMAWATI", "TAMBAK SARI 144 B", "085854990764"],
            ["1", "hanafi", "tambak pring 5/47", "0857752543660"],
            ["2", "BU ASRI", "MARGORUKUN 10", "081332247272"],
            ["1", "salma", "tambak mayor baru 1 - 6", "081803096966"],
            ["2", "afif", "proyek wika", "085284812580"],
            ["1", "tn Djainuri", "tambak asri 29/3", "08563278843"],
            ["2", "porwanto", "tambak mayor rt/rw 8/7", "083130083852"],
            ["2", "anita", "demak jaya 8/38", "082140653391"],
            ["2", "ibu suwarti", "gundi gang rel blok A/28", "087852802822"],
            ["1", "tn mustholih", "tambak mayor madya 1/69", "085932175178"],
            ["1", "ibu ria", "ampel maghfur no 31", "085852544090"],
            ["2", "Tomi", "jl. manukan lor 2A no. 3", "085645729794"],
            ["2", "Siti Fadila", "jl. tambak pring timur no.48", "08774162438"],
            ["2", "bapak khosidin", "jl. tambak mayor madya no. 69", "085102382015"],
            ["2", "NY. Lilik", "jl. simorejo sari A No. 425", "081230172218"],
            ["1", "netty", "jl. asem rowo kali no. 79", "08993907505"],
            ["2", "Ibu isti", "Simosari B no.20", "081235113859"],
            ["1", "Tn syamsul", "Simorejo sari B gang 9 no.14", "089677065859"],
            ["1", "NY ASISEH  (PASIEN LAMA)", "DEMAK JAYA 7/03", "081359857590"],
            ["2", "TN FAUZAN", "JL. ASEM ROWO GG.VI NO.18", "082245026090"],
            ["1", "NY YANTI", "TAMBAK MAYOR MADYA I NO.38", "087849491080"],
            ["1", "NY NURVITA", "ASEMROWO GG.I NO.17", "081231244035"],
            ["1", "NAYASYA GERALDINE", "SAWAHAN BATU II/16", "08883163510"],
            ["1", "DEWI AMBARWATI", "DUPAK RUKUN IV/23", "085334659966"],
            ["2", "IBU MARIJANI", "TEMBOK DUKUH IX/17B", "081703337984"],
            ["1", "Bu yuni ", "Simo magerejo 5/7", "081333397437"],
            ["2", "Ikha doria ", "Asem jajar9/2a", "087851965595"],
            ["2", "moch.zackaria", "tambak lumpang rt 2", "0881027405681"],
            ["1", "m.alex", "tambak pring utama 1 - 12 a", "081222180022"],
            ["2", "hasan", "genting tambak dalam blok i - 1", "081231265484"],
            ["2", "NY DWI SEPTIANI", "KALONGAN 4 NO 3", "085888842488"],
            ["1", "NurulRochmah", "Simorejo Sari A/13", "082257600923"],
            ["2", "Bp Afandi", "Pulo Tegalsari 2/26", "081333300698"],
            ["2", "NY ELLY RUSDIANA", "ASEMJAJAR 1 NO.26", "085755948805"],
            ["1", "NY VINA", "TAMBAK DALAM BARU GANG V NO.12", "083831210008"],
            ["2", "arneta celsya regita", "jl petemon kuburam 32A", "082139064204"],
            ["1", "Sugianto", "Gunawangsa tidar", "08232697878"],
            ["1", "Hesti", "Asem jaya2/33", "087759999027"],
            ["2", "Purwadi", "Tanjung Sari 74", "081333189255"],
            ["2", "ibu sumaroh", "simo pomahan baru timur xiv/10", "082245781571"],
            ["2", "erlina maulida", "jl simorejo II No.2", "087878636974"],
            ["2", "Ali Usman", "Tambak Mayor I No.32", "087762773358"],
            ["2", "Lutfi", "Tembok Dukuh III No.15", "082234068888"],
            ["1", "Ny. Nur hidayah", "Tambak pring timur I ", "0881026306442"],
            ["1", "IBU YAYUK", "PERUM GRAHA SURYANATA BLOK L NO 6", "087854467656"],
            ["1", "Prayitno", "Asem2/20", "085784996661"],
            ["2", "maria teresia", "jl asemrowo baru 4", "085730472709"],
            ["1", "diah aksari", "sedayu 6 no 1 A", "082131996475"],
            ["2", "Kartono", "Simo sidomulyo baru46", "082131075355"],
            ["1", "TN IMAM", "SIMOSIDOMULYO II NO.21", "0817755653"],
            ["1", "NY NUR HIDAYAH", "ASEM JAYA 1 NO.34", "087703397195"],
            ["2", "Bapak Supri", "Jl. Dupak pasar baru 1", "085649249828"],
            ["2", "Lisa", "Jl. Tambak mayor baru barat gang 2 no. 94", "081334244405"],
            ["1", "Choirul huda", "Babatan rukun 7/27", "089691985706"],
            ["2", "RAHMAN", "Simorejo 17", "0895335058805"],
            ["1", "NY ANINDA", "Jl. Tambak dalam baru gg II No.34", "085648650709"],
            ["1", "TN AGUS PURWANTO", "Jl.Tambak Asri No 158 A", "087857061646"],
            ["1", "NY CITRA ARIATI", "Asem jajar VI No.6", "085784728828"],
            ["1", "hasan", "asem jaya 2/33", "0881026118031"],
            ["1", "Vidiani jannah", "jl. banjar melati gang 1 no 219", "085655377092"],
            ["1", "bu fatimah", "jl. dupak rukun barat no 2", "085733243380"],
            ["1", "Munir", "jl tubanan tama no 22", "085336337691"],
            ["2", "Ahmad sobri", "jl tambak dalam 18", "08186141039"],
            ["1", "Lely", "jl. tambak dalam baru barat gg 7 no 30", "085748780263"],
            ["1", "Soni", "jl. asam mulya 5 no. 55", "081330068716"],
            ["1", "nurul ahmadi", "jl.tambak asri gang anggrek no.15", "081216610866"],
            ["2", "MIFTACHUL", "JL ASEM I/10", "082142644345"],
            ["2", "NY PUTRI LINDA", "SAWAHAN BARU III NO.7", "082244824073"],
            ["1", "TN ABDUL KAHAR", "TAMBAK ASRI GG 21 NO.27", "0895631873895"],
            ["1", "Nurul chomariah", "Asem 5/21", "082131888184"],
            ["2", "BU YULI", "MARGOROKON REL 4A", "088230593471"],
            ["1", "Soraya", "Tambak Dalam No 22", "08567819276"],
            ["2", "NY ISMA", "JL.TAMBAK DALAM BARU II NO.39", "087863453164"],
            ["1", "Ibu Siti", "Tambak Dalam Baru 1/23", "081803246371"],
            ["2", "Malik", "Dupak Masigit 15/5", "081333498677"],
            ["2", "HERU", "JL.KRANGGAN", "081230818080"],
            ["1", "IBU MUJIATI", "Tambak Mayor Utara Rel no.12", "08971088088"],
            ["1", "herdian", "margorukun IV/31", "081130530000"],
            ["2", "Abidi", "Tambak Dalam Baru Gg.Melati I/10", "081939316412"],
            ["1", "Bp.Masrukin", "jl. Simorejo No.3", "081411166742"],
            ["2", "Bp. Agus", "Demak Jaya II/80", "081259224958"],
            ["1", "Darti", "Sidorukun8/57", "0835790008"],
            ["1", "Bp wagino", "Rowo3/8", "08113300079"],
            ["1", "TN ABDI KUSUMA", "Jl.Ikan Gurame No.36", "081703036447"],
            ["1", "CHRISTINE", "DUPAK RUKUN VII/21", "085233393191"],
            ["2", "BPK MUTIAH", "TAMBAK MAYOR V/128", "085955257200"],
            ["2", "NUR HAFID", "TAMBAK DALAM BARU VII", "083137946545"],
            ["1", "boy", "tembok dukuh VIIIIA/15", "08563469029"],
            ["1", "roland", "perum pondok candra melon utara 1/23", "081909056772"],
            ["2", "cicik (riska)", "kapas kerampung 1 H", "089666486292"],
            ["2", "MATSULI", "ikan gurami 2/12", "087702836503"],
            ["2", "sumai", "tambak mayor utara no 70", "081330556886"],
            ["1", "Emil", "Jl. Demak 88", "0838307769966"],
            ["1", "Silvi", "Tambak mayor selatan 1/1", "08576614900"],
            ["1", "Yudi setiawan", "Asem rowo 6/3", "085231568731"],
            ["2", "Istik", "Aprt. Gunawangsa tidar", "085257165423"],
            ["1", "DEWI", "SIMOREJO SARI B 8/25", "081285089699"],
            ["2", "ANITA", "ASEM ROWO 3/40", "081328330639"],
            ["2", "TN RIFKY", "JL MARGORUKUN 7 NO.36", "089506090782"],
            ["2", "Wahyu", "Tambak pring utama Gg 2 / 21", "087856701032"],
            ["1", "Nia / Mia", "Demak Jaya 3-15", "081998951133"],
            ["2", "Bp.riyadi", "Lebak Jaya V Utara / 17", "08123018377"],
            ["1", "Sudarti,ny", "Tambak mayor utara no.49", "087851880998"],
            ["1", "Ahmad", "Jl.asem baru no.1", "085850853169"],
            ["1", "Awik.ny", "Apart. Gunawangsa tidar", "081615322999"],
            ["1", "P hariono", "Asem rowo3/16", "0818517215"],
            ["2", "ibu Muslimah", "Tambak Dalam Baru Barat 2 no.52", "081330696188"],
            ["2", "TITIK", "SUKOMANUNGGAL BARU PJKA 144", "08998992538"],
            ["1", "M. Fahri", "jl. demak jaua v no. 40", "081230999940"],
            ["1", "Novia", "ll. margorukun gang II No. 11", "085853250342"],
            ["1", "bu juriah", "jl. tambak mayor utama no. 48", "085732075391"],
            ["1", "Rasnia Putri", "jl. petemon gg. 4 no. 20 z", "082124949354"],
            ["2", "diyah", "jl. kranggan v no. 57", "082232351117"],
            ["2", "bapak asnadi", "jl. demak selatan v no. 22", "082257333550"],
            ["2", "ny. endang", "tembok sayuran mei 22", "08124658733"],
            ["1", "opie", "jl. tidar", "081355025733"],
            ["1", "suyati", "jl. simopamahan baru barat 7 no. 11", "081333087557"],
            ["1", "Dewi manaruh", "jl. demak jaya 2 no. 81", "082274043392"],
            ["1", "andria candra", "jl. demak no 59", "081233940858"],
            ["2", "Jovan", "Tembok .dukuh5/5", "082129293567"],
            ["2", "Eva", "Gunawangsa tidar", "081938883782"],
            ["1", "Sudarmono", "Kalibutuh 158", "085790582270"],
            ["2", "agustin", "tambak pring barat 12A", "081333403756"],
            ["2", "ibu naning", "dupak V/37", "081330744427"],
            ["2", "TN AGAPE PRATEKNO", "TEMBOK DUKUH GG 8 NO 15", "088999807397"],
            ["2", "NY HERLINA ", "JL. KALIBUTUH NO. 221", "08121747522"],
            ["1", "Cinta", "Simorejo 24/6", "08123516348"],
            ["1", "Mas Andri", "Asem Bagus", "081333773996"],
            ["2", "Tn, Purnomo", "Kalianak Timur Gg.Belakang no.31", "081331746816"],
            ["1", "Nn. Rainy", "Asem Jaya gg.9 No.11", "085233260574"],
            ["1", "efita apriliani", "bojonegoro", "083846619161"],
            ["1", "Gustiani", "Simorejo sari B6/1 ", "081331194846"],
            ["2", "IBU UMMU SHOLIHA", "BANJAR BARU 2/3", "081217213137"],
            ["1", "puji utami", "tambak asri 29-1a", "082244824081"],
            ["1", "IBU NURUL", "Tembok Gedhe I/39", "081515459200"],
            ["2", "Tn. SUNI", "SAMPANG MADURA", "081818883346"],
            ["1", "MEGA", "Petemon Sidomulyo V/ 8", "08563288707"],
            ["1", "EKTA LIFIANA", "Asem Jajar gang 11", "082138384645"],
            ["2", "Nur wahyuni", "jl. babadan 113 D", "081357577566"],
            ["2", "Alfin", "jl. Demak selatan IV No. 5", "082143586488"],
            ["2", "MARTHA", "JL ASEM ROWO VI/24", "087806425212"],
            ["2", "ny nurul", "tambak lumpang rt 15", "081703377231"],
            ["1", "yenny", "genting V/45", "081234463942"],
            ["2", "NY CHURNIA SARI", "SIMOREJO SARI B GG 7 NO. 18", "081377005523"],
            ["2", "bp.hari", "Asem Jaya 6/20", "081259447789"],
            ["1", "Anis rahmawati", "Sumber mulyo 6/4a", "081554181707"],
            ["1", "PAK SOLIKIN (PX LAMA)", "KANTOR KECAMATAN ASEM ROWO", "082139154869"],
            ["1", "IBU LIA", "ASEMROWO 3 NO 17", "081315105939"],
            ["2", "IBU OELYA (PX LAMA)", "KAWATAN VI NO 4", "085655915033"],
            ["2", "Hasim", "Asem mulyo6/14a", "5471358"],
            ["1", "Iput", "Asem raya 3i", "082143323666"],
            ["2", "Ny Heni", "Asem Jaya V", "087855580444"],
            ["2", "EMMY", "SIMO POMAHAN BARU SAWAH I/62", "082233337453"],
            ["2", "Tn. Abdul Khodir", "Jl. Genting Baru no.46 A", "081331074833"],
            ["2", "Siska Dyah", "Genting VI / 08", "082233004301"],
            ["1", "Ny, IIM", "Dupak Bangunsari VI /04", "081515442988"],
            ["2", "Abdul rohman", "Tambak lumpang utara 3/67", "081932392633"],
            ["2", "Ela", "Asem 5 - 27", "081293930827"],
            ["1", "Icha", "Kedung anyar 2 / 46", "081703103626"],
            ["1", "Rizkinia", "jl. dupak mager sari", "081217526152"],
            ["1", "ny. tutik martini", "jl. asem bagus pancasila no. 11", "087756803808"],
            ["2", "Fariz", "jl. tambak mayor no. 92", "085704164495"],
            ["1", "anam", "jl. jatisari gg. 2 no. 12", "081316358934"],
            ["2", "Tn Zaini", "Tambak mayor GG Pasar", "083822682825"],
            ["1", "ibu nur", "tambak mayor selatan 2/ 12", "081931569966"],
            ["2", "afandi", "jl masjid 24", "082225376789"],
            ["1", "Luluk hasana bila", "tambak pring timur IV/52", "087762543556"],
            ["2", "TN KAHIRUL ANAM", "DEMAK JAYA 1 NO.24", "085648814531"],
            ["2", "NY YANI", "SABIHARUM", "085232210113"],
            ["2", "DIYAS", "JL tambak asri 144A", "082131315411"],
            ["1", "BAGUS", "JL GENTING NO 2", "088805045887"],
            ["1", "Dini", "jl demak timur 5 - 20", "082143526066"],
            ["1", "Tn Suwoto", "Demak Selatan 4 No. 2", "08123236661"],
            ["2", "Ny Fatmawati", "Jl. Kalibutuh No. 227", "081907642233"],
            ["1", "IBU SELLY", "Darmo Satelit indah 7 DN 20", "081703641548"],
            ["1", "NN.EVIS PUSPITASARI", "Darmo Satelit Indah 7 DN 20", "081333705979"],
            ["1", "Bp. Suhartono", "Simorejo Sari B GANG 10 NO.12", "085100167782"],
            ["1", "Gandhi", "Gunawangsa", "08123022498"],
            ["2", "Allif rosyidy", "Jl .sekolahan 33", "0857366803735"],
            ["2", "rina", "sido rukun Gg 8-15", "087862654055"],
            ["1", "TN SUGENG", "SIMO POMAHAN BARU GG 19 NO.8", "08994948488"],
            ["2", "TN DIBYO ROMARDONO", "JL GUNDI REL 37 BLOK B", "081333587746"],
            ["1", "VIGI LIDYAWATI", "TAMBAK PRING BARU", "085606047074"],
            ["2", "TN YOGA", "JL.SEMARANG NO.16", "081227247896"],
            ["2", "NY JIHAN ", "JL DEMAK JAYA GANG V1 NO.14", "081232000045"],
            ["1", "bp Muhaimin", "demak timur 7 no 28", "081232357777"],
            ["2", "Rizky", "Dinoyo sekolahan4/9", "085648264365"],
            ["2", "NY FITRI", "ASEM JAJAR 3 NO 16", "081334714184"],
            ["2", "NY TANTRI", "SIMOREJO SARI A XI NO.8", "081246018040"],
            ["1", "Titri", "Jl asem bagus gg penjahit no 1", "08885010315"],
            ["1", "IBU MONA", "DEMAK 313", "08124100300"],
            ["1", "TOMI", "TAMBAK PRING BARAT GANG LEBAR", "087780031741"],
            ["2", "IBU RISMA", "PACAR KEMBANG 5A 8", "085741781817"],
            ["1", "nita", "jl sawahan baru 1 no 37A", "081331757079"],
            ["1", "EKA MEGAWATI", "GENTING I/42", "082257512414"],
            ["1", "Asti wahyu ningsih", "Asem jaya 5/42a", "081335640010"],
            ["2", "ENY WIDIYA SARI", "SIMOREJO SARI B VII/18A", "085204806999"],
            ["1", "NY SHOLEHA", "TAMBAK DALAM BARU NO.1 A", "087780620303"],
            ["2", "TN M.SODIQ", "JL.ASEM ROWO GG 4 NO.14", "081529918151"],
            ["2", "MARIANI", "JL DUPAK BANGUNREJO NO 11", "089509545247"],
            ["2", "CLARISSA", "SIDO RUKUN 2 NO 15", "085707016050"],
            ["2", "kurniawan", "tambak asri gang no 29", "082330413973"],
            ["2", "upik", "gundi V no 3", "0816512951"],
            ["1", "putri", "jl simorejo no 8", "083159642116"],
            ["2", "rio", "asemrowo no 18", "081333982884"],
            ["2", "IBU LINA", "SIMOREJO GANG X/41", "081259351888"],
            ["2", "NY, MIKRONP", "Jl. Semarang 57", "081231157003"],
            ["2", "IPIN HARIADI", "Asem Jajar Gang 10/ no.2", "082113245544"],
            ["2", "DIANA", "TENGGUMUNG WETAN II/25", "081232338674"],
            ["2", "TN SOHIB", "Tambak preng utama gang 2B", "083854988816"],
            ["1", "caya / gaya", "asem jaya 5 / 38", "081260398085"],
            ["1", "dwi", "moro krembangan Gg 1e - 56", "0895"],
            ["2", "eki marita", "tambak asri Gg 5 - 197b", "082140762370"],
            ["2", "tomy", "kedung klinter 7 / 36", "08155061123"],
            ["1", "Dana", "Asem romokali sari 3b", "08974868049"],
            ["1", "Bu zainab", "Tambak mayor baru 2/99", "085931097797"],
            ["1", "TN ZAFAR HALIM", "JL DEMAK NO.18", "082131424189"],
            ["2", "TN FEBRIANTO", "JL GRESIK GADUKA UTARA", "085745824233"],
            ["1", "ibu mery", "jl masjid 14", "123456789101"],
            ["1", "Resca indahcahyani", "Kedungtomas", "081375679372"],
            ["1", "Putra", "Tambak Dalam Baru 2 no.9", "085159009437"],
            ["1", "hasan basri", "dupak magersari", "081332007689"],
            ["1", "koko", "jl  asemrowo kali no 61", "082247692920"],
            ["2", "NY IRA", "Jl. Tambak Dalam Baru No. 15 A", "085955361474"],
            ["2", "KARIMAH", "Asem Mulya Buntu no.I", "085102760648"],
            ["1", "HADI HARYADI", "Simorejo Sari B III/77", "087779694433"],
            ["1", "ERSYA", "Simorejo 29 A", "083122242228"],
            ["1", "JOHNY WILLIAM", "SIMORUKUN II No.26", "081332406353"],
            ["1", "Ny. NISA", "Greges Timur III /No.07", "082131162924"],
            ["1", "VICTOR", "Jl. KELUD NO.18", "081231269691"],
            ["2", "Imam", "Simorejo sari A 8/14", "083830352888"],
            ["1", "BP ASMAT", "JL ASEM IV/14C", "0817304224"],
            ["1", "bp khosim", "tambak dalam baru gang IV", "087786062611"],
            ["2", "siti amina", "gunawangsa tidar", "08122831195"],
            ["1", "ibu titik", "jl. demak selatan v no. 6", "0812342422872"],
            ["2", "bapak qalik", "jl. asem rowo kali 53", "081259550327"],
            ["1", "sila", "jl. tambak mayor madya no. 66 B", "087816333822"],
            ["2", "RIANTO", "Tambak Dalam Melati II / 02", "081332259084"],
            ["1", "Ny Rinawati", "Simo pomahan Baru Gg 5 No. 22C", "081225548713"],
            ["1", "NY Fitri", "Tambak Asri gg 32 No. 64", "089619350268"],
        ];

        foreach ($data_member as $data) {
            if (!preg_match('/\d/', $data[3])) {
                continue;
            }

            $insert_data = [
                'user_id' => $data[0],
                'nama_member' => $data[1],
                'alamat_member' => $data[2],
                'no_telpon' => $data[3],
            ];

            Member::create($insert_data);
        }
    }
}
