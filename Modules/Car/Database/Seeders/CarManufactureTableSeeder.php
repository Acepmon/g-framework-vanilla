<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marksModels = [
            'Acura' => ['CDX','CL','CSX','ILX','Integra','Legend','RL','RDX','NSX','RLX','TSX','ZDX','Vigor','SLX','RSX','MDX','TLX','EL','TL'],
            'Alfa Romeo' => ['Brera','159','Alfetta','Spider','166','156','8C','MiTo','145','146','147','164','Arna','Giulia','Giulietta','GT','6C','Montreal','GTV6','Sprint','SZ','RL','155','GTA','GTC','GTV','TZ','TZ 2','Milano','GT Veloce','Duetto','Berlina','4C'],
            'Aston Martin' => ['DB11','DB7','DB9','DBS','Lagonda','One-77','Rapide','Vanquish','Vantage','Virage','Volante'],
            'Audi' => ['80','90','100','A1','A3','A4','A5','A6 Allroad Quattro','A7','A8','Allroad','Cabriolate','e-tron','Q3','Q5','Q7','R8','RS3','RS4','RS5','RS6','RS7','S3','S4','S5','S6','S7','S8','SQ5','TT','TTRS','TTS','V8'],
            'Bentley' => ['Arnage','Azure','Bentayga','Brooklands','Continental','Corniche','Eight','Flying Spur','Mulsanne','Turbo R'],
            'BMW' => ['1Series','2Series','3Series','4Series','5Series','6Series','7Series','8Series','Gran Turismo','i3','i8','M Coupe/Roadster','M2','M3','M4','M5','M6','X1','X2','X3','X3M','X4','X4M','X5','X6','X6M','X7','Z3','Z4','Z8'],
            'Bugatti' => ['Chiron','EB110','EB118','Veyron']            
            
            // 'Trucks' => ['AEV','Agrale','Albion','Alfa Romeo','AM General','Amico Azar Motor Industrial Co','Amur','AMW','Argyle','Armstrong','Ashok Leyland','Asia MotorWorks (AMW)','Askam','Astra','Atkinson','Audi','Autocar','Avia Trucks','AVM','AvtoVAZ','AWD','Az Universal Motors','Bailey','BAW','Beau-Roc','BeiBen','Beijing Automobile Works(BAW)','BelAZ','BEML','Bering rucks','BharatBenz','BMC','BMW','Brabus','Bremach','Brockway','Büssing','BYD Company ','C&C','Cadillac','Callaway','CAMC','Carmichael','Caterpillar ','CCC','Cenntro','CEV','Changan','Chery','Chevrolet','Chrysler','Citroen','CNJ','Colet','Crane Carrier Corporation (CCC)','DAC','Dacia','Dadi','Daewoo','DAF Trucks','Daihatsu','Daimler Group','Dart','Dayun','Dennis','Dennison','Diamond T','Dina','Dodge','Dongfeng','Ebro','Eicher Motors','ERF','Euclid Trucks','FAP','Fassi','FAW','Ferrari','Fiat','Flextruc','Foden ','Force Motors','Ford','Forland','Foton','Freightliner','FTF Trucks','Garner','Garrett','GAZ','General Motors(GM)','Genoto','Gilford','GINAF','GMC','Gonow','Gräf & Stift','Great Wall','Greenkraft Inc','Hafei','Haulamatic','Hayes Truck','Hendrickson','Hindustan Motors ','Hino','Hitachi','Hohan','Holden','Honda','Hongyan','HSV','Hualing Xingma Automobile','Hummer','Hyundai','Infinite','International','Iran Khodro','Isuzu','Iveco','JAC','JAC Motors(Anhui Jianghuai Automobile)','Jeep','Jiangling','JMC','Kamaz','Karry','Kenworth','Kia','Komatsu','KrAZ','Lamborghini','Land Rover','Leader Trucks','Lexus','Leyland','Liebherr Group','Lincoln','Liuzhou motor','Lomont','Mack','Mahindra','MAN','Marmon','Master','Maxus','MAZ(Minsk Automobile Plant)','Mazda','Mercedes-Benz','MG Motors','Mini','Mitsubishi','Multicar','MZKT','Navistar International','New entosa CV','Nissan','OAF','Orange EV','Oshkosh','Otokar','Paccar','Pegaso','Perkasa Truck','Perlini','Persika','Peterbilt','Peugeot','Polarsun','Pontiac','Proton','Qingling','Ralph ','Ram','Renault','Rivian','Roman','SAIC-Iveco Hongyan','SAIPA','Saleen','Saviem','SCAM','Scania','SD','Sentinel','Shaanxi','Shacman','Shangdong Wuzheng Group','Shelby','Silant','Sinotruk','Sisu','Sitom','Sitrak','Skoda','Smith','SML Isuzu','SNVI','SsangYong','Star','Steyr','Subaru','Suzuki','Tadano','Tata','Tatra','TAV','Terberg','Terex','Tesla Motors','Tiger Truck','Tonar','Toyota','TVS','UAZ','UD Trucks','Union','UralAZ','Uri','Vauxhall','Vehicle Factory Jabalpur (VFJ)','Volkswagen','Volvo Trucks','Western Star','Workhorse','XCMG','Yarovit','Yuejin','Yulon','Zastava','Ziyang Nanjun','ZX'],
            // 'Bus' => ['Ankai','Arboc','Ashok Leyland','Asiastar','BharatBenz','BYD','Champion','Changan','Ciferal','Cobus','Collins','Daewoo','Daihatsu','Daimler','Dongfeng','Eicher','Eldorado','Enc','Federal','Force','Ford','Foton','GAZ OAO','Gillig','Golden dragon','Goshen','Henan Shaolin','Higer','Hino','Honda','Huazhong','Hunan','Hyundai','Irisbus Iveco','Isuzu','J-Bus','Jiangsu Alpha','Kamaz','Kia','King Long','Kingstar','Krystal','Ksir','Liaz','Mahindra','MAN','Marcopolo','Mazda','Mercedes-Benz','Mitsubishi','Muran','MV-1','Nanjing','Nissan','Nor-Cal Vans','PAZ','Proterra','Scania','Shenzhen Wuzhoulong otors Group','Sinotruk','SML Isuzu','Solaris','Ssangyong','Subaru','Sunlong','Suzhou','Suzuki','Tata','Temsa','Toyota','Trans Tech Buses','Turbus','Turtle Top Buses','UD Trucks','VDL','Vision Bus','Volare','Volgren','Volvo','World Trans','Yaxing','Yutong','Zhongtong Bus','Zuhai'],
            // 'Heavy' => ['Ace','Aichi','Atlas Copco','Belarus','Bobcat','Bomag','Case','CAT','Caterpillar','Cathefeng','Cema','Changlin','Cummins','Daewoo','Daf','Dayun','DEMAG','Dongfeng','Doosan','Dynapac','Everdigm','Faw','Fayat','Foton','Furukawa','Fuso','Halla','Hamm','Hanix','HBXG','Heli','Hino','Hitachi','Hyundai','IHI','Isuzu','Jcb','Jingong','John Deere','Kamaz','Kato','Kawasaki','Kia','Kobelco','Komatsu','Kraz','Kubota','L&T','Lgmg','Liebherr','Linuo','Liugong','Lonking','Lovol','Man ','Manitowoc','Mazda','Mazda','Meiwa','Mercedes-Benz','Mitsubishi','Morooka','N.Traffic','New Holland','Nissan','North Benz','Reddot','Renault','Rightchoice','Sakai','Samsung','Sany','Scania','Schaeff','SDLG','Sem','Shacman','Shandong','Shantui','Sinomach','Sinotruk','Sonstige','Ssangyong','Sumitomo','Sunward','Tadano','Taian Zhengtai','TCM','Terex','Toyota','Triton Valves','Tym','Universal','Vogele','Volvo','Wecan','Wirtgen','XCMG','XGMA','Xiajin','Yanmar','Yongmao','YTO','Yugong','Zil','Zoomlion']
        ];

        $carManufacturer = TaxonomyManager::register('Car Manufacturer', 'car', null, ['metaKey' => 'markName']);
        foreach ($marksModels as $mark => $models) {
            $markTaxonomy = TaxonomyManager::register($mark, 'car-manufacturer', $carManufacturer->term->id, [
                'logo' => url(asset('images/manufacturers/' . \Str::slug($mark) . '.png')),
                'metaKey' => 'modelName'
            ]);
            foreach ($models as $model) {
                TaxonomyManager::register($model, 'car-' . \Str::kebab($mark), $markTaxonomy->term->id);
            }
            TaxonomyManager::updateTaxonomyChildrenSlugs($markTaxonomy->id);
        }
        TaxonomyManager::updateTaxonomyChildrenSlugs($carManufacturer->id);
    }
}
